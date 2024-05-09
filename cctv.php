<?php
include "header.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>
<!-- style="background-color: black" -->
<body style="background-color:black">

    <div class="container-fluid py-2 h-100">
        <!-- Navbar Strarts -->
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-md navbar-dark  bg-dark rounded shadow mb-2">
                    <a href="#Section6" id="sec6" class="navbar-brand"><img class="rounded" src="product-images/cctv-logo.webp" width="40px" alt=""></a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#mynavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="navbar-nav nav-pills">
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-danger font-weight-bold" href="#Section1" id="sec1">Breakdown</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-success font-weight-bold" href="#Section2"  id="sec2">Installation</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-primary font-weight-bold" href="#Section3"  id="sec3">Acquire</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white font-weight-bold" href="#Section7"  id="sec7" style="background-color:orangered">Product</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-info font-weight-bold" href="#Section5"  id="sec5">Model</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-warning font-weight-bold" href="#Section4"  id="sec4">Make</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar ends -->
        <div class="row d-flex justify-content-center align-items-center h-100 font-weight-bold">
             
            <div class="col-10 bg-white shadow rounded mt-5" id="record-part">
                <section id="Section1" class="p-4">
                    <div class="row">
                        <div class="col-8 text-center m-auto">
                            <h3 class="text-white text-center p-2  my-2 rounded shadow" style="background-color: black;">REGISTER A NEW COMPLAINT</h3>        
                        </div>
                    </div>
                    <div class="row justify-content-center">
                    <div class="col-auto">
                    <form id="brk-search-form" class="mt-3">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control font-weight-bold inputcap" id="brk-sl-search" placeholder="Enter Machine Serial No" aria-label="Enter Machine Serial No">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="submit" id="brk-sl-submit">Search</button>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                    <form class="my-4 bg-light shadow p-3 d-none" id="brk-form">
                        <div class="row">
                            <div class="col-md-6 border-right border-md-0">
                                <div class="form-group">
                                    <p class="text-primary font-weight-bold">Product Information :</p>
                                </div>
                                <div class="form-group">
                                    <label for="brk-product">Product :</label>
                                    <input type="text" class="form-control" id="brk-product" readonly>
                                    
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="brk-make">Make :</label>
                                            <input type="text" class="form-control" id="brk-make" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="brk-model">Model :</label>
                                        <input type="text" class="form-control" id="brk-model" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p class="text-primary font-weight-bold">Installation Location :</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="brk-unit">Unit :</label>
                                        <input type="text" class="form-control" id="brk-unit" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="brk-dept">Department :</label>
                                        <input type="text" class="form-control" id="brk-dept" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="brk-loc">Location :</label>
                                    <input type="text" class="form-control inputcap" id="brk-loc" readonly>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="brk-no" class="text-success" >Machine Serial Number :</label>
                                    <input type="text" class="form-control font-weight-bold inputcap" id="brk-no" readonly>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="brk-inName">Incharge Name :</label>
                                            <input type="text" class="form-control inputcap" id="brk-inName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="brk-inPh">Incharge Phone :</label>
                                            <input type="text" class="form-control" id="brk-inPh">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <p class="text-danger">*Update incharge name and phone number if required . If any other Information is not correct kindly contact admin .</p>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="brk-remark">Problem :</label>
                                    <textarea class="form-control inputcap" id="brk-remark" rows="2"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark mt-3 float-right" id="brk-submit">Register</button>
                            </div>
                        </div>

                    </form>
                </section>              
                <section id="Section2" class="p-4"> 
                    <div class="row">
                        <div class="col-6 text-center m-auto">
                            <h3 class="text-white text-center p-2  my-2 rounded shadow" style="background-color: black;">Install A New Product</h3>
                        </div>
                    </div>  
                    <form class="my-4 bg-light shadow p-3 " >
                        <div class="row">
                            <div class="col-md-6 border-right border-md-0">
                                <div class="form-group">
                                    <p class="text-primary font-weight-bold">Product Information :</p>
                                </div>
                                <div class="form-group">
                                    <label for="popup2-product">Product :</label>
                                    <select class="form-control SelectionofProduct font-weight-bold" id="popup2-product" name="popup2-product">
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="popup2-make">Make :</label>
                                            <select class="form-control SelectionofMake" id="popup2-make" name="popup2-make">
                                                <!-- Options will be loaded here dynamically -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="popup2-model">Model :</label>
                                        <select class="form-control SelectionofModel" id="popup2-model" name="popup2-model">
                                            <!-- Options will be loaded here dynamically -->
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p class="text-primary font-weight-bold">Installation Location :</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="install-unit">Unit :</label>
                                        <select class="form-control SelectionofUnit" id="install-unit" name="install-unit">
                                            <option value="5H01">GM Office</option>
                                            <option value="5H01">AOCP</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="install-dept">Department :</label>
                                        <select class="form-control SelectionofDept" id="install-dept" name="install-dept">
                                            <option value="5H01">E and T</option>
                                            <option value="5H01">Excavation</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="install-loc">Location :</label>
                                    <input type="text" class="form-control inputcap" id="install-loc">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="install-amount">Quantity:</label>
                                    <input type="number" class="form-control font-weight-bold" id="install-amount" name="install-amount" style="width:100px">
                                </div>
                                <div class="form-group">
                                    <label for="machine-no">Machine Serial Number :</label>
                                    <input type="text" class="form-control font-weight-bold inputcap" id="machine-no">
                                </div>
                                <div class="form-group">
                                    <label for="install-comp">compliance :</label>
                                    <input type="text" class="form-control inputcap" id="install-comp">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="install-inName">Incharge Name :</label>
                                            <input type="text" class="form-control inputcap" id="install-inName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="install-inPh">Incharge Phone :</label>
                                            <input type="text" class="form-control" id="install-inPh">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="install-remark">Remark :</label>
                                    <textarea class="form-control inputcap" id="install-remark" rows="2"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success" id="install-submit">Install</button>
                            </div>
                        </div>

                    </form>
                </section>
                <section id="Section3" class="p-4"> 
                    <div class="row">
                    <div class="col-6 text-center m-auto">
                        <h3 class="text-white text-center p-2  my-2 rounded shadow" style="background-color: black;">Acquire For Stock</h3>
                    </div>
                    </div>  
                    <form class="my-4 bg-light shadow p-3" >
                        <div class="row">
                            <div class="col-md-6 border-right border-md-0">
                                <div class="form-group">
                                <label for="popup3-product">Product :</label>
                                <select class="form-control SelectionofProduct" id="popup3-product" name="popup3-product">
                                    <!-- Options will be loaded here dynamically -->
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="popup3-make">Make :</label>
                                <select class="form-control SelectionofMake" id="popup3-make" name="popup3-make">
                                    <!-- Options will be loaded here dynamically -->
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="popup3-model">Model :</label>
                                <select class="form-control SelectionofModel" id="popup3-model" name="popup3-model">
                                    <!-- Options will be loaded here dynamically -->
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="acquire-amount" class="text-primary">Quantity:</label>
                                <input type="number" class="form-control font-weight-bold" id="acquire-amount" name="acquire-amount" style="width:100px">
                                </div>
                                <div class="form-group">
                                <label for="purchase-od">Purchase Order:</label>
                                <input type="text" class="form-control inputcap" id="purchase-od" name="purchase-od" rows="2">
                                </div>
                                <div class="form-group">
                                <label for="acquire-description">Description:</label>
                                <textarea class="form-control inputcap" id="acquire-description" rows="2"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success" id="acquire-submit">Acquire</button>
                            </div>
                            
                        </div>

                    </form>
                </section>
                <section id="Section4" class="p-4">
                    <div class="row">
                        <div class="col-6 text-center m-auto">
                            <h3 class="text-white text-center p-2  my-2 rounded shadow" style="background-color: black;">Register a New Make</h3>
                        </div>
                    </div>
                    <form class="my-4 pme-form bg-light shadow p-3">
                        <div class="row">
                            <div class="col-md-6 border-right border-md-0 " >
                                <div class="form-group">
                                    <label for="makeinput">Make:</label>
                                    <input type="text" class="form-control inputcap" id="makeinput">
                                    <small class="form-text text-danger">check the existing makes first</small>
                                </div>
                                <button type="submit" class="btn btn-success" id="registermake">Register</button>
                            </div>
                            <div class="col-md-6">
                                  <p class="text-primary mt-3">Existing Makes:</p>
                                <div class="row" id="existing-rows"></div> 
                            </div>
                        </div>
                    </form>
                </section>
                <section id="Section5" class="p-4">
                    <div class="row">
                        <div class="col-6 text-center m-auto">
                            <h3 class="text-white text-center p-2  my-2 rounded shadow" style="background-color: black;">Register a New Model</h3>
                        </div>
                    </div>
                    <form class="my-4 pme-form bg-light shadow p-3">
                        <div class="row">
                            <div class="col-md-6 border-right border-md-0">
                                <div class="form-group">
                                <label for="makeSelect">Select a Make:</label>
                                <select class="form-control SelectionofMake" id="makeSelect" name="makeSelect">
                                    <!-- Options will be loaded here dynamically -->
                                </select>
                                </div>
                                <p class="text-primary mt-3">Existing Models:</p>
                                <div class="row" id="existingModels"></div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="modelinput">Model:</label>
                                <input type="text" class="form-control inputcap" id="modelinput">
                                <small class="form-text text-danger">check the existing models of the selected make first</small>
                                </div>
                                <button type="submit" class="btn btn-success" id="registermodel">Register</button>

                            </div>
                        </div>   
                    </form>
                </section>
                <section id="Section7" class="p-4">
                    <div class="row">
                        <div class="col-8 text-center m-auto">
                            <h3 class="text-white text-center p-2  my-2 rounded shadow" style="background-color: black;">Add a Product of CCTV System</h3>
                        </div>
                    </div>
                    <form class="my-4 bg-light shadow p-3">
                        <div class="row">
                            <div class="col-md-6 border-right border-md-0">
                                <div class="form-group">
                                <label for="product-input">Product name :</label>
                                <input type="text" class="form-control inputcap" id="product-input">
                                <small class="form-text text-danger">check the existing products first</small>
                                </div>
                                <button type="submit" class="btn btn-success" id="add-product">Add</button>
                            </div>
                            <div class="col-md-6">
                                <p class="text-primary mt-3">Existing products of CCTV System :</p>
                                <div class="row" id="existing-products"></div> 
                            </div>
                        </div>
                        
                    </form>
                </section>
                       
            </div>
            <div class="col-12">
            <!-- style="background-color:black" -->
            <section id="Section6" class="p-4">
                <div class="row ">
                    <div class="col-md-5 mx-auto">
                        <div class="row pb-2">
                        <select class="custom-select custom-select-bg-dark mr-sm-2 shadow SelectionofProduct rounded text-center" style="width:400px" id="home-product-select">
                        </select>
                        </div>
                        <div id="available-table">
                        </div>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <div class="row pb-2">
                        <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded text-center" style="width:200px" id="home-brkin-select">
                        <option value="home-brkin-in" >Installations</option>
                        <option value="home-brkin-brk" selected>Breakdowns</option>
                        </select>
                        </div>
                        <div id="install-table">
                        <div class="row bg-white mb-3 p-1 rounded shadow border border-dark">
                            <div class="col-lg-3 bg-danger text-white d-flex align-items-center justify-content-center">
                                <h5 class="text-center" id="home-inst-id ">100003<br>2024-01-23</h5>
                            </div>
                            <div class="col-lg-5 border-right border-md-1">
                                <p id="home-inst-pr" class="mt-2"><span class="bg-success text-white p-1 rounded">DOM CAMERA</span><br>PRAMA :: M300-B250</p>
                                <p id="home-inst-loc">CONTROL ROOM<br>ANANTA OCP :: SYSTEMS</p>
                            </div>
                            <div class="col-lg-4 d-flex align-items-center justify-content-center">

                                <p id="home-inst-machine" class="text-white bg-primary rounded shadow p-2 text-center">UXVQNSI778K2356436<br></p>
                            </div>
                            
                        </div>
                        </div>
                        <div id="brk-table">

                        </div>
                    </div>
                </div>
            </section>  
            </div>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLongTitle">Generated Mail Text</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="gen-mail-text">
                        
                    </div>
                </div>
                <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary mr-auto" id="copyButton">Copy</button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
                </div>
            </div>
            </div>
               
        </div>
    </div>
    <script>
        var loggedUser = <?php echo json_encode($_SESSION['username'], JSON_HEX_TAG); ?>;
    </script>
    <script src="cctv.js"></script>

</body>
</html>