<?php 
session_start(); 
if (isset($_SESSION['name']) != ""){
    header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/loginc.css" class="css">
    <link rel="stylesheet" href="../css/style.css" class="css">
</head>
<style>
    .form-control {
        width: 85%;
        margin-left: 30px;
    }

    label {
        line-height: 2.5;
        margin-left: 30px;
    }

    .mb-2 {
        margin-left: 30px;
    }
    .btn-primary {
    background-color: green;
    border-color: green;
   
}
</style>
<body>
    <div class="text-center">
<?php
if(@$_GET['success'] == 'create') {?>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> The customer is created successfully.
        </div>
    <?php } 

if(@$_GET['error'] == 'wrong') {?>
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Wrong!</strong> The email and password you entered did not match our records. Please double-check and try again.
        </div>
    <?php } ?>
    </div>

    <div class="container">
    <div class="row ">
        <div class="col-md-6 mx-auto p-2 my-3 shadow-lg bg-white ">
    <form name="login" method="POST" action="verifloginc.php">
    <div class="text-center">
   <a href="../index.php">   <img src="../img/innate.png" alt="" width="180px"></a>
   
    </div>
        <span class="text-danger"><?= @$_GET['msg'] ?></span><br>
        <div>
        <label for="email">Email</label><br>
        <input class="form-control " type="text" name="email" placeholder="example@example.com" required><br>
        </div>
        <div>
        <label for="mdp">Password</label><br>
        <input class="form-control" type="password" name="mdp" placeholder="********" required><br>
        </div>
        <div class="mb-2">
        <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">Valider</button><br><br>
       
        <p>Si vous êtes nouveau? <a href="register.php">Inscrivez vous maintenant »</a></p> </div>
    </form>
    </div>
    </div>
</div>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>