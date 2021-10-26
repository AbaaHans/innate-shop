<?php 
require "client/class/dbconnect.class.php";
session_start();

$rq = "SELECT * FROM produits ORDER BY pid LIMIT 15";
$db = new BasesDonnees;
$pr = $db->connectDB(); 
$result = $pr->prepare($rq);
$result->execute();
$data = $result->setFetchMode(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InnateShop </title>
    <meta name="description" content="">
   
   
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
.navbar-brand {
    padding-bottom: 4rem;
    margin-right: 2rem;}
 .btn-outline-danger:hover {
    background-color: lightgreen;
    border-color: lightgreen;
}

/*=====  End of RESPONSIVE  ======*/

.footer1 {
  padding: 30px;
  color: #fffefe;
  text-align: center;
  background: #0b0b0b;
  margin: 0;
  width: 100%;
}
.container-footer {
  font-size: 15px;
}
.icons-social__item {
  -webkit-font-smoothing: antialiased;
  display: inline-block;
  font-style: normal;
  font-variant: normal;
  text-rendering: auto;
  line-height: 1;
}
.icons-social__link {
  font-size: 23px;
  color: #ffffff;
  padding: 10px;
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
                        <img src="img/innate.png" alt="" width="200px">
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
                             <li class="nav-item dropdown">
                                <a class="nav-link" href="admin/login_to_admin_panel/admin.php"><h4>Dashboard</h4></a>
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
        <div class="hero">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 hero-left">
                        <h1 class="display-4 mb-5">Bienvenue <br>chez I-Shop</h1>
                        <div class="mb-2">
                            <a class="btn btn-primary btn-shadow btn-lg" href="lundin.php" role="button">Explorer le menu</a>

                        </div>

                        <ul class="hero-info list-unstyled d-flex text-center mb-0">
                            <li class="border-right">
                                <span class="lnr lnr-rocket"></span>
                                <h5>
                                    Livraison rapide
                                </h5>
                            </li>
                            <li class="border-right">
                                <span class="lnr lnr-leaf"></span>
                                <h5>
                                    100% Bio
                                </h5>
                            </li>
                            <li class="">
                                <span class="lnr lnr-bubble"></span>
                                <h5>
                                    24/7 Support
                                </h5>
                            </li>
                        </ul>

                    </div>
                    <div class="col-lg-6 hero-right">
                        <div class="owl-carousel owl-theme hero-carousel">
                            <div class="item">
                                <img class="img-fluid" src="img/hero.jpeg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="img/hero-6.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="img/hero-5.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <section id="gtco-welcome" class="bg-white section-padding">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-sm-5 img-bg d-flex shadow align-items-center justify-content-center justify-content-md-end img-2"
                            style="background-image: url(img/cosmetiques-bio.jpg);">

                        </div>
                        <div class="col-sm-7 py-5 pl-md-0 pl-4" id="about">
                            <div class="heading-section pl-lg-5 ml-md-5">
                                <span class="subheading">
                                    A propos
                                </span>
                                <h2>
                                    Bienvenue chez I-Shop
                                </h2>
                            </div>
                            <div class="pl-lg-5 ml-md-5">
                                <p>InnateShop à pour mission de la commercialisation des produits cosmétiques et culinaires 100% bios . notre but principale c’est le bien-être de nos chers clients , loin des produits chimiques munis des effets indésirables graves . En général, nos produits sont de haute gamme, efficace et bio . Ils sont à base de l’huile d’argan (très riche en acide gras essentiel et en antioxydant ) . Nous offrons à nos clients une gamme de produits divers, pour les soins de visage, de la peau, des cheveux et pour l’alimentation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
        <section id="gtco-special-dishes" class="bg-grey section-padding">
            <div class="container">
                <div class="section-content">
                    <div class="heading-section text-center">
                        <span class="subheading">
                            Notre produits
                        </span>
                        <h2>
                           Produits Spéciaux
                        </h2>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-5 col-md-6 align-self-center py-5">
                            <h2 class="special-number">01.</h2>
                            <div class="dishes-text">
                                <h3><span>Huile</span><br> Argan</h3>
                                <p class="pt-3">Elle préserve l'hydratation de la peau . Sa forte teneur en vitamine E et divers acides gras font d'elle le soin parfait pour la peau. Elle est rapidement absorbée et peut  également être utilisée en soin du visage. L'huile d'argan rend les cheveux plus doux et plus brillants.</p>
                                <h3 class="special-dishes-price">100<sup>DHS</sup></h3>
                                <a href="cosmetique.php" class="btn-primary mt-3">View</a>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0">
                            <img src="img/argan.jpeg" alt="" class="img-fluid shadow w-100">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-5 col-md-6 align-self-center order-2 order-md-1 mt-4 mt-md-0">
                            <img src="img/FEUILLE DE MANIOC.jpg" alt="" class="img-fluid shadow w-100">
                        </div>
                        <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center order-1 order-md-2 py-5">
                            <h2 class="special-number">02.</h2>
                            <div class="dishes-text">
                                <h3><span>Feuille</span><br> Manioc</h3>
                                <p class="pt-3">En plus d'être riche en vitamines B, ses feuilles possèdent une action antibactérienne. Le manioc est également recommandé aux personnes diabétiques car il a un faible indice glycémique. Sa forte teneur en fibres permet de ralentir la vitesse d'absorption du sucre dans le sang</p>
                                <h3 class="special-dishes-price">50<sup>DHS</sup></h3>
                                <a href="alimentaire.php"  class="btn-primary mt-3">View <span><i
                                            class="fa fa-long-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section id="gtco-menu" class="section-padding">
            <div class="container">
                <div class="section-content">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="heading-section text-center">
                                <span class="subheading">
                                  Spécial
                                </span>
                                <h2>
                                   Notre Menu
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php 
                    while ($data = $result->fetch()) {
                    ?>
                        <div class="col-lg-4 menu-wrap">
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
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                    <div class="d-flex justify-content-around">
                        <a href="cosmetique.php" class="btn-primary mt-3">Produit cosmétique</a>
                        <a href="alimentaire.php" class="btn-primary mt-3">Produit alimentaire</a>
                    </div> 

                </div>
            </div>            
        </section>
      
        <section id="gtco-testimonial" class="overlay bg-fixed section-padding"
            style="background-image: url(img/bg.jpg);">
            <div class="container">
                <div class="section-content">
                    <div class="heading-section text-center">
                        
                        <h2>
                           Citations
                        </h2>
                    </div>
                    <div class="row">
                        
                        <div class="testi-content testi-carousel owl-carousel">
                            <div class="testi-item">
                                <i class="testi-icon fa fa-3x fa-quote-left"></i>
                                <p class="testi-text">Nous croyons regarder la nature et c’est la nature qui nous regarde et nous imprègne.</p>
                                <p class="testi-author">Hristian Charrière</p>
                                
                            </div>
                            <div class="testi-item">
                                <i class="testi-icon fa fa-3x fa-quote-left"></i>
                                <p class="testi-text">Le bonheur est le meilleur des cosmétiques.</p>
                                <p class="testi-author">Bobbi Brown</p>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
       
        <section id="gtco-team" class="bg-white section-padding">
            <div class="container">
                <div class="section-content">
                    <div class="heading-section text-center">
                        <h2 class="pb-5">
                            Notre Equipe
                        </h2>
                    </div> 
                    <div class="row">
                        <div class="col-md-3">
                            <div class="team-card mb-5">
                                <img class="img-fluid" src="img/ayman.jpg" alt="">
                                <div class="team-desc">
                                    <h4 class="mb-0">Ayman Janani</h4>
                                    <p class="mb-1">Développeur</p>
                                    <ul class="list-inline mb-0 team-social-links">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="team-card mb-5">
                                <img class="img-fluid" src="img/hicham.jpeg" alt="">
                                <div class="team-desc">
                                    <h4 class="mb-0">Hicham Chatir</h4>
                                    <p class="mb-1">Graphiste</p>
                                    <ul class="list-inline mb-0 team-social-links">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="team-card mb-5">
                                <img class="img-fluid" src="img/guenol.jpeg" alt="">
                                <div class="team-desc">
                                    <h4 class="mb-0">Yanik Mathe</h4>
                                    <p class="mb-1">Resp.communcation</p>
                                    <ul class="list-inline mb-0 team-social-links">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="team-card mb-5">
                                <img class="img-fluid" src="img/hance.jpg" alt="">
                                <div class="team-desc">
                                    <h4 class="mb-0">Aba Hans</h4>
                                    <p class="mb-1">Chef de projet</p>
                                    <ul class="list-inline mb-0 team-social-links">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <section id="gtco-reservation" class="bg-fixed bg-white section-padding overlay"
            style="background-image: url(img/bio.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-content bg-white p-5 shadow">
                           
                              
                                    <div class="col-md-12 text-center">
                                        <a class="btn btn-primary btn-shadow btn-lg mt-3" href="client/loginc.php"
                                            name="submit">S'inscrire</a>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     
        <div class="container">
            <div class="section-content">
                <div class="heading-section text-center">
        
                    <h2>
                        Contactez-nous
                    </h2>
                </div>
        <footer class="mastfoot pb-5 bg-white section-padding pb-0">
            <div class="inner container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-widget pr-lg-5 pr-0">
                            <img src="img/innate.png" alt="" width="150px">
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
                                        aria-describedby="emailNewsletter" placeholder="Entrer email">
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
<footer class="footer1">
    <div class="icons-social">
        <ul class="list-social">
            <li class="icons-social__item"><a class="icons-social__link" href="#"><i
                        class="icons-social__i fab fa-codepen"></i></a></li>
            <li class="icons-social__item"><a class="icons-social__link" href="#"><i
                        class="icons-social__i fab fa-instagram"></i></a></li>
            <li class="icons-social__item"><a class="icons-social__link" href="#"><i
                        class="icons-social__i fab fa-facebook"></i></a></li>
            <li class="icons-social__item"><a class="icons-social__link" href="#"><i
                        class="icons-social__i fab fa-twitter"></i></a></li>
            <li class="icons-social__item"><a class="icons-social__link" href="#"><i
                        class="icons-social__i fab fa-linkedin"></i></a></li>
        </ul>
    </div>
    <div class="container-footer">
        <p> <a href="term.php" class="container-footer__link"  >
          Politique de confidentilaité  </a> | Copyright &copy; 2021 Tous droits réservés</p>
    </div>
</footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="vendor/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="js/app.min.js "></script>
    
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html