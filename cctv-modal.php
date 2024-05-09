<?php
include "header.php";
?>

<body style="background-color: #452c63;">
    <div class="container-fluid py-2">
        <!-- Navbar Strarts -->
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-md navbar-light  bg-light rounded shadow mb-2" style="background-color: #004080;">
                    <a href="" class="navbar-brand"><img class="rounded" src="product-images/cctv-logo.webp" width="40px" alt=""></a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#mynavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="navbar-nav nav-pills">
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-danger font-weight-bold" href="#" id="popupTrigger1">Breakdown</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-success font-weight-bold" href="#" id="popupTrigger2">Installation</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-primary font-weight-bold" href="#" id="popupTrigger3">Acquire</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-warning font-weight-bold" href="#" id="popupTrigger4">Make</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-info font-weight-bold" href="#" id="popupTrigger5">Model</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar ends -->
        <!-- popup modals start -->
        <div class="row">

            <div class="modal fade" id="popupModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel1">Popup for Item 1</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Your popup content for Item 1 -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4th popup -->
            <div class="modal fade" id="popupModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger font-weight-bold " id="ModalLabel4">Register a New Make</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="makeinput">Make:</label>
                                    <input type="text" class="form-control" id="makeinput">
                                    <small class="form-text text-danger">check the existing makes</small>
                                </div>
                                <button type="submit" class="btn btn-success" id="registermake">Register</button>
                            </form>
                            <p class="text-primary mt-3">Existing Makes:</p>
                            <div class="row" id="existing-rows">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- 5th popup -->
            <div class="modal fade" id="popupModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger font-weight-bold" id="ModalLabel5">Register a New Model</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="makeSelect">Select a Make:</label>
                                    <select class="form-control SelectionofMake" id="makeSelect" name="makeSelect">
                                        <!-- Options will be loaded here dynamically -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="modelinput">Model:</label>
                                    <input type="text" class="form-control" id="modelinput">
                                    <small class="form-text text-danger">check the existing models</small>
                                </div>
                                <button type="submit" class="btn btn-success" id="registermodel">Register</button>
                                <p class="text-primary mt-3">Existing Models:</p>
                                <div class="row" id="existingModels">

                                </div>
                            </form>
                            <!-- Your popup content for Item 1 -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- popup modals ends -->

        <div class="row">
            <div class="col-md-6">
                <div class="row">

                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
    <script src="cctv.js"></script>
</body>
<!-- ALTER productmake AUTO_INCREMENT = 1; -->
</html>

