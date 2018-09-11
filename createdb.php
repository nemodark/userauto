<?php

    class Createdb{
 
        public function createDatabase($username, $pass, $dbname){
            $host = 'localhost';
            $user = 'root';
            $user_password = '';
            $db = new PDO("mysql:host=$host", $user, $user_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try{
                $create = $db->exec("CREATE DATABASE $dbname");
                if($create === false){
                    echo "Could not create database";
                    return false;
                }
                $create = $db->exec("CREATE USER '$username'@'localhost' IDENTIFIED BY '$pass'");
                if($create === false){
                    echo "Could not create user";
                    return false;
                }
                $create = $db->exec("GRANT ALL ON `$dbname`.* TO '$username'@'localhost'");
                if($create === false){
                    echo "Could not grant user privileges";
                    return false;
                }
                $create = $db->exec("FLUSH PRIVILEGES");
                if($create === false){
                    echo "Could not flush privileges";
                    return false;
                }
            } catch(PDOException $e){
                echo "DB ERROR: ". $e->getMessage();
                return false;
            }
            return true;
        }

    }
?>