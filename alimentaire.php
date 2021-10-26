<!DOCTYPE html>
<html lang="en">
<?php
require "client/class/dbconnect.class.php";
session_start();

$req = 'SELECT * FROM produits WHERE  type = "alimentaire" ';
$db = new BasesDonnees;
$pr = $db->connectDB(); 
$result = $pr->prepare($req);
$result->execute();  
$data = $result->setFetchMode(PDO::FETCH_ASSOC);
?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InnateShop</title>
    <meta name="description" content="Resto">
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
    padding-bottom: 1%; height: 38px;
}
.btn-primary {
    background-color: green;
    border-color: green;
   
}
 .btn-outline-danger:hover {
    background-color: lightgreen;
    border-color: lightgreen;
}
.navbar-brand {
    padding-bottom: 4rem;
    margin-right: 2rem;}
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
                                <a class="nav-link" href="index.php"><h4> Accueil</h4> <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mr-5">
                                <a class="nav-link" href="index.php#about"><h4>A propos</h4></a>
                            </li>

                        </div>
                    </ul>

                    <a class="navbar-brand  d-flex align-items-center only-desktop" href="index.php">
                        <img src="img/innate.png" alt="" width="200px">
                    </a> 
                    <ul class="navbar-nav d-flex justify-content-between">
                        <div class="d-flex flex-lg-row flex-column">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <h4> Catégorie</h4>
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
                                <a class="nav-link" href="client/logout.php?logout"><h4>Logout</h4></a>
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
                            <?php } ?>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">
        <div class="row mt-5">
                    <?php 
                    while ($data = $result->fetch()  ) {
                    ?>
                        <div class="col-lg-4 menu-wrap mt-4">
                            <div class="menus d-flex align-items-center">
                                <div class="menu-img rounded-circle">
                                    <img class="img-fluid" src="admin/uploads/<?php echo $data['file'] ?>" alt="">
                                    
                                </div>
                                <div class="text-wrap">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h4><a href="prod_detail.php?id=<?php echo $data['pid'] ?>"><?php echo $data['name'] ?></a></h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-muted menu-price"><?php echo $data['price'] ?><sup>DHS</sup></h4>
                                        </div>
                                    </div>
                                    <p><?php 
                                    $string = $data['description'];
                                    echo mb_strimwidth(utf8_encode($string), 0, 30, "...")
                                    ?></p>
                                    <button class="btn btn-primary mt-3 btn-for_jquery" id="id_<?php echo $data['pid'] ?>" >Acheter</button>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
         </div>
         </div>



                <!-- End of Reservation Section -->
             <footer class="mastfoot pb-5 bg-white section-padding pb-0">
            <div class="inner container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-widget pr-lg-5 pr-0">
                            <img src="img/logo2.jpg" class="img-fluid footer-logo mb-3" alt="">
                            <p>Pour plus d’infos contactez-nous via les coordonnées suivantes:</p>
                            <nav class="nav nav-mastfoot justify-content-start">
                                <a class="nav-link" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="nav-link" href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </nav>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="footer-widget px-lg-5 px-0">
                            <h4>Heures d'ouverture</h4>
                            <ul class="list-unstyled open-hours">
                                <li class="d-flex justify-content-between"><span>Lundi</span><span>9:00 - 24:00</span>
                                </li>
                                <li class="d-flex justify-content-between"><span>Mardi</span><span>9:00 - 24:00</span>
                                </li>
                                <li class="d-flex justify-content-between"><span>Mercredi</span><span>9:00 -
                                        24:00</span></li>
                                <li class="d-flex justify-content-between"><span>Jeudi</span><span>9:00 -
                                        24:00</span></li>
                                <li class="d-flex justify-content-between"><span>Vendredi</span><span>9:00 - 02:00</span>
                                </li>
                                <li class="d-flex justify-content-between"><span>Samedi</span><span>9:00 -
                                        02:00</span></li>
                                <li class="d-flex justify-content-between"><span>Dimanche</span><span> Fermé</span></li>
                            </ul>
                        </div>

                    </div>

    
                    <div class="col-lg-4">
                        <div class="footer-widget pl-lg-5 pl-0">
                            <h4>Newsletter</h4>
                            
                            <form id="newsletter">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="emailNewsletter"
                                        aria-describedby="emailNewsletter" placeholder="Enter email">
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Envoyer</button>
                            </form>
                        </div>
                    </div> <br><section id="contact" class="section">
                        <div class="container">
                            <h1 class="section-title">Trouvez-nous</h1>
                            <div id="contact-info">
                                <p>IFIAG Casablanca, Tour des Habous,Casablaca</p>
                                
                            </div>
                           <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d26590.630933424625!2d-7.65220000822815!3d33.58379231707741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m3!3m2!1d33.570879!2d-7.654270599999999!4m5!1s0xda7d282b7c663cb%3A0xe95e482a5cf0a110!2sIFIAG!3m2!1d33.5962318!2d-7.6126787!5e0!3m2!1sfr!2sma!4v1616517515875!5m2!1sfr!2sma" width="400" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </section>
                </div>
            </div>
        </footer>
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

    <script src="js/app.min.js "></script>
    <script>

/*
$("#btn").click(function() {
    var pid = $("#pid").val();
    }
*/
$(document).ready(function(){

$(".btn-for_jquery").click(function(){
var pid = $(this).attr('id');

$.post("panier.php", //Required URL of the page on server
{ // Data Sending With Request To Server
product:pid
},
function(response,status){ // Required Callback Function
    $('#success').html(response); //"response" receives - whatever written in echo of above PHP script.

});
});
});
</script>
</body>

</html