<?php
    include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Thesis Website</title>

        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <script src="https://aframe.io/releases/0.9.2/aframe.min.js"></script>
        <script src="https://unpkg.com/aframe-orbit-controls@1.0.0/dist/aframe-orbit-controls.min.js"></script>
        <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.7.1/aframe/build/aframe-ar.js"></script> 
        <script src="includes/resize.js"></script>
       
    </head>

        <body>

             <nav class="navbar navbar-expand-sm navbar-light bg-light"> 
                <a href="index.php" class="navbar-brand">Home</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a href="#" class="nav-link">Buildings</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">Architects</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="ARcamera.html" class="nav-link">Camera</a>
                        </li>
                    </ul>

                    <form action="search.php" method="GET" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit" name="submit-search">Search</button>
                    </form>
                </div> 
            </nav>



            