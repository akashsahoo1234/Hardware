<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

include "header.php";
?>
<body style="background-color:black">
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="container-fluid">
            <div class="row justify-content-center"> <!-- Center the row -->
                <div class="col-md-10"> <!-- Make the container occupy 10 grid columns -->
                    <div class="row justify-content-around">
                        <div class="col-md-2 col-sm-4 mb-5">
                            <a href="items.php?key=5"  target="_blank">
                                <div class="card shadow">
                                    <img src="product-images/cctv-logo.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-5">
                            <a href="items.php?key=3"  target="_blank">
                                <div class="card shadow">
                                    <img src="product-images/wif-logo.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-5">
                            <a href="items.php?key=6"  target="_blank">
                                <div class="card shadow">
                                    <img src="product-images/gps-logo.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-5">
                            <a href="items.php?key=1"  target="_blank">
                                <div class="card shadow">
                                    <img src="product-images/ftth-logo.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-5">
                            <a href="items.php?key=2"  target="_blank">
                                <div class="card shadow">
                                    <img src="product-images/exchange-logo.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-5">
                            <a href="items.php?key=4"  target="_blank">
                                <div class="card shadow">
                                    <img src="product-images/Boom-logo.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-5">
                        </div>
                        <div class="col-md-2 col-sm-4 mb-5">
                            <a href="items.php?key=7"  target="_blank">
                                <div class="card shadow">
                                    <img src="product-images/biometric-logo.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-5">
                            <a href="items.php?key=8"  target="_blank">
                                <div class="card shadow">
                                    <img src="product-images/vc-set.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-5">
                            <a href="items.php?key=9"  target="_blank">
                                <div class="card shadow">
                                    <img src="product-images/equipments.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div>
                        
                        <!-- <div class="col-md-3 col-sm-4">
                            <a href="items.php?key=3">
                                <div class="card shadow">
                                    <img src="product-images/ups4.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div> -->
                        <!-- <div class="col-md-3 col-sm-4">
                            <a href="items.php?key=4">
                                <div class="card shadow">
                                    <img src="product-images/network4.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div> -->
                        <div class="col-md-2 col-sm-4 ">
                            <a href="uploadhome.php"  target="_blank">
                                <div class="card shadow">
                                    <img src="product-images/documents.png" class="card-img-top rounded" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-sm-4 mb-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
