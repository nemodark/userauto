<?php
    require_once("createdb.php");
    if(isset($_POST) & !empty($_POST)){
        $createdb = new Createdb;
        $idnum = $_POST['idnum'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $date = date("Y_m");
        $dbname = $date."_".$username.$idnum;

        $res = $createdb->createDatabase($username, $pass, $dbname);
        if($res){
            echo "Successfully registered.";
        }
        else{
            echo "Failed to register";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl"
        crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post">
                    <div class="form-group">
                        <label for="username">ID No.</label>
                        <input type="text" name="idnum" id="idnum" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="pass" id="pass" class="form-control">
                    </div>
                    <input type="submit" value="Register" class="btn btn-secondary">
                </form>
            </div>
        </div>
    </div>
</body>

</html>