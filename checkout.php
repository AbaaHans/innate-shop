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
   <br> <center> <h1>details de facturation</h1> </center>
    <div class="boxed-page">
     
        <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th class="text-center">Prix</th>
                        
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
        </div>
    </div>
    
 
    <h1>Mode de paiement</h1>
        <form method="" action="">

 

<a href="check.php"><label class="btn btn-outline-success" for="success-outlined" name="modep"><i class="fa fa-truck"></i> Paiement a la livraison</label></a>
<a href="payment-cart.php"><label class="btn btn-outline-success" for="success-outlined" name="modep"><i class="fa fa-cc-visa"></i> Paiement par Carte </label></a>

<br>
             
        </form>
    </div>
</div>



    </body>
</html>








