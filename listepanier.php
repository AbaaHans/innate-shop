<?php 
require "panier/classes/pnaier.class.php";
session_start();
if(isset($_SESSION['name']) == ''){
    header('location:client/loginc.php');
}
$panier = new Panier;
$res = $panier->whatinpanier();
$data = $res->setFetchMode(PDO::FETCH_ASSOC);
?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InnateShop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Josefin+Sans:300,400,700">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/5b67370c4c.js"></script>


    <link rel="stylesheet" href="css/style.css">



</head>
<style>
.navbar-brand-center img {
  height: 90px;
}
.btn-outline-danger {
    padding-bottom: 1%;    height: 38px;
}
.btn-primary {
    background-color: green;
    border-color: green;
   
}
 .btn-outline-danger:hover {
    background-color: lightgreen;
    border-color: lightgreen;
}
</style>
<body id="" data-spy="scroll" data-target="#navbar" class="static-layout">

    <div class="boxed-page">
        <nav id="navbar-header" class="navbar navbar-expand-lg">
            <div class="container">
               
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="lnr lnr-menu"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-between">
                        <li class="nav-item only-desktop">
                            <a class="nav-link" id="side-nav-open" href="#"></a>
                        </li>
                        <div class="d-flex flex-lg-row flex-column">
                            <li class="nav-item active mr-5">
                                <a class="nav-link" href="index.php"><h4>Accueil</h4> <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mr-5">
                                <a class="nav-link" href="index.php#about"><h4>A propos</h4></a>
                            </li>

                        </div>
                    </ul>

                   <a class="navbar-brand  d-flex align-items-center only-desktop" href="index.php">
                        <img src="img/innate.png" alt="" width="160px">
                    </a>
                    <ul class="navbar-nav d-flex justify-content-between">
                        <div class="d-flex flex-lg-row flex-column">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <h4>  Catégorie</h4>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="cosmetique.php"><h4>cosmétique</h4></a>
                                    <a class="dropdown-item" href="alimentaire.php"><h4>alimentaire</h4></a>
                                </div>
                            </li>
                            <?php 
                            if(isset($_SESSION['name'])){
                            ?>

                            <li class="nav-item">
                            <img src="client/<?php echo $_SESSION['img']; ?>"  style="width:40px; height:40px; border-radius:50%;">
                            </li>
                            
                            <li class="nav-item">
                                <a href="client/profil.php" class="nav-link"><h4><?php echo $_SESSION['name']; ?></h4></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="client/logout.php?logout"><h4>Déconnecter</h4></a>
                            </li>
                            <li class="nav-item ml-5">
                            <style>
                                .btn-outline-danger:hover {
                                    color:white !important;
                                }
                            </style>
                                <a href="listepanier.php" class="btn btn-outline-danger">
                                    <i class="fa fa-shopping-cart" style="opacity:1"></i>
                                    &nbsp;&nbsp;<span class="badge badge-sm-light" id="success"></span>
                                </a>
                            </li>
                            <?php }else {?>

                           

                            <li class="nav-item">
                                <a class="nav-link" href="client/loginc.php"><h4>Connecter</h4></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="client/register.php"><h4>S'inscrire</h4></a>
                            </li>
                            <?php } ?>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th class="text-center">Prix</th>
                        <th class="text-center">Opération</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $total_prix = 0;
                while($data = $res->fetch()) {
                    $total_prix += $data['price'];
                    ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="admin/uploads/<?php echo $data['file']?>" style="width: 50px; height: 50px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $data['name']?></h4>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="text" class="form-control"  value="<?php echo $data['qty']?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $data['price']?> <sup>DHS</sup></strong></td>
                        <td class="col-sm-1 col-md-1">
                        <a href="deletepanier.php?id=<?php echo $data['pid']?>" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <h5>livraison : gratuit</h5>
            <h3> Total : <?php echo $total_prix ;?> <sup>DHS</sup></h3>
            <a href="index.php" class="btn btn-default">
                <span class="glyphicon glyphicon-shopping-cart"></span> Continue votre Shopping
            </a>
                    <style>
                        .btn-success:hover{
                            color: aliceblue;
                        }
                    </style>
            <a href="checkout.php" class="btn btn-success">
                valider la commande <span class="glyphicon glyphicon-play"></span>
            </a>
        </div>
    </div>
</div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="vendor/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  
</body>

</html