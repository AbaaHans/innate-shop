<?php 
session_start(); 
if (isset($_SESSION['name']) != ""){
    header('location:../index.php');
}
?>
<html>
    <head>
    <title>Signup</title>
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
    .btn-shadow {
        margin-left: 30px;
    }
    .btn-primary {
    background-color: green;
    border-color: green;}
</style>
    <body>
   
<div class="container">
    <div class="row ">
        <div class="col-md-6 mx-auto p-2 my-3 shadow-lg bg-white ">
      <form action="create.php" method="POST" enctype="multipart/form-data">
      <div class="text-center">
      <a href="../index.php"> <img src="../img/innate.png" alt="" width="180px"></a>
          <h1>Créer votre compte</h1>
          </div>
            <div class="form-group">
            <label for="nom"> Nom </label>
            <input type="text" name="nom" placeholder="Votre nom*" class="form-control" required>
            <span class="text-danger"><?= @$_GET['name_error']; ?></span>  
            </div>

            <div class="form-group">
            <label for="tel"> Téléphone </label>
            <input type="text" name="tel" placeholder="Votre téléphone*" class="form-control" required>
            <span class="text-danger"><?= @$_GET['tel_error']; ?></span>  
            </div>

            <div class="form-group">
            <label for="adresse"> Adresse </label>
            <input type="text" name="adresse" placeholder="Votre adresse*" class="form-control" required>
            </div>

            <div class="form-group">
            <label for="email"> Email </label>
            <input type="text" name="email" placeholder="example@example.com*" class="form-control" required>
            <span class="text-danger"><?= @$_GET['email_error']; ?></span>  
            </div>

            <div class="form-group">
            <label for="mdp"> Password </label>
            <input type="password" name="mdp" placeholder="mot de passe*" class="form-control" required>
            <span class="text-danger"><?= @$_GET['mdp1_error']; ?></span>  
            </div>

            <div class="form-group">
            <label for="mdp2"> Confirm Password </label>
            <input type="password" name="mdp2" placeholder="mot de passe*" class="form-control" required>
            <span class="text-danger"><?= @$_GET['mdp2_error']; ?></span>  
            </div>

            <div class="form-group">
            <label for="profpic"> Profil Pic </label>
            <input type="file" name="profpic" class="form-control">
            </div>

            <br><div>
            <button  type="submit" class="btn btn-primary btn-shadow btn-lg" >Valider</button>&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            </form></div>
      </div>
      </div>
      
            </body>
</html>