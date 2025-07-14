<?php
include '../inc/fonction.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}
$user = $_SESSION['user'];

$list_objet = list_object();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Accueil</title>

</head>

<body>
    <header class="mt-5 mb-5 ">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid position-fixed">
                <div class="container d-flex">
                    <a href="/" class="navbar-brand">
                        <span class="fs-2" style="font-weight: 900;">Ebay</span>
                    </a>
                    <!-- Bouton hamburger -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                        style="border: none; margin-left: auto;">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Menu -->
                    <div class="collapse navbar-collapse " id="navbarNav" style="margin-left: 90px;">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="#home" class="nav-link" aria-current="page"
                                    style="color: white; font-size: 18px; margin-right: 10px;">Home</a></li>
                            <!--<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    style="color: white; font-size: 18px; margin-right: 10px;">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link"
                                    style="color: white; font-size: 18px; margin-right: 10px;">Inner Page</a></li>
                            <li class="nav-item"><a href="#contact" class="nav-link"
                                    style="color: white; font-size: 18px; margin-right: 10px;">Contact Us</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section >
            <div class="container">
                <div class="row gap-4">
                    <?php foreach ($list_objet as $list) { ?>
                        <?php $emprunter= objet_emprunter()?>
                       
                        <article class="col-2 bg-white p-0"
                            style="border: 1px #ddd solid; border-radius: 10px; display: inline-block;">
                            <!-- Lien vers la page fiche.php avec l'ID de la propriété -->
                                <div class="text mt-2">
                                    <h5><?= $list['nom_objet'] ?></h5>
                                    <?php if($emprunter['emp'] == $list['id_objet']){?> 
                                        <p><?= $emprunter['date_retour']?></p>    
                                    <?php }?>
                                </div>
                            </a>
                        </article>
                    <?php } ?>
                </div>
            </div>

        </section>
    </main>
</body>

</html>