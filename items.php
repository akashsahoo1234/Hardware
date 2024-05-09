<?php
include "header.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
if (isset($_GET['key'])) {
    $key = $_GET['key'];
    switch ($key) {
        case '1':
            $key_name = "FTTH";
            $image_src = "product-images/ftth-logo.png";
            break;
        case '2':
            $key_name = "EXCHANGES";
            $image_src = "product-images/exchange-logo.png";
            break;
        case '3':
            $key_name = "WI-FI";
            $image_src = "product-images/wif-logo.png";
            break;
        case '4':
            $key_name = "BOOM BARRIERS";
            $image_src = "product-images/Boom-logo.png";
            break;
        case '5':
            $key_name = "CCTV";
            $image_src = "product-images/cctv-logo.png";
            break;
        case '6':
            $key_name = "GPS";
            $image_src = "product-images/gps-logo.png";
            break;
        case '7':
            $key_name = "BIOMETRICS";
            $image_src = "product-images/biometric-logo.png";
            break;
        case '8':
            $key_name = "VIDEO CONFERENCING SYSTEM";
            $image_src = "product-images/vc-set.png";
            break;
        case '9':
            $key_name = "EQUIPMENTS";
            $image_src = "product-images/equipments.png";
            break;
        default:
            $key_name = "Unknown system";
            header('Location: index.php');
            exit();
    }
} else {
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
                <nav class="navbar navbar-expand-lg navbar-dark  bg-dark rounded shadow mb-2">
                    <a href="#Section6" id="sec6" class="navbar-brand"><img class="rounded" src="<?php echo $image_src ?>" width="40px" alt=""></a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target=".mynavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mynavbar">
                        <ul class="navbar-nav nav-pills">
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-danger font-weight-bold" href="#Section1" id="sec1">BREAKDOWN</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <div class="dropdown">
                                    <a class="nav-link text-white bg-success font-weight-bold dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">INSTALLATION</a>
                                    <div class="dropdown-menu">
                                        <!-- Dropdown items -->
                                        <a class="dropdown-item" href="#Section2" id="sec2">New Installation</a>
                                        <a class="dropdown-item" href="#Section15" id="sec15">Update Information</a>
                                        <!-- Add more dropdown items as needed -->
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-primary font-weight-bold" href="#Section3" id="sec3">ACQUIRE</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white font-weight-bold" href="#Section7" id="sec7" style="background-color:orangered">PRODUCT</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-info font-weight-bold" href="#Section5" id="sec5">MODEL</a>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-warning font-weight-bold" href="#Section4" id="sec4">MAKE</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse mynavbar justify-content-end">
                        <ul class="navbar-nav nav-pills">
                            <li class="nav-item rounded shadow m-2 text-center">
                                <div class="dropdown">
                                    <a class="nav-link text-white bg-primary font-weight-bold dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="sec8"><span id="selectedValueReport">REPORT</span></a>
                                    <div class="dropdown-menu" aria-labelledby="sec8">
                                        <!-- Dropdown items -->
                                        <a class="dropdown-item" href="#Section9" id="sec9">Installation Report</a>
                                        <a class="dropdown-item" href="#Section20" id="sec20">Ipv4 Table</a>
                                        <a class="dropdown-item" href="#Section21" id="sec21">Breakdown History</a>
                                        <a class="dropdown-item" href="#Section22" id="sec22">Breakdown Report</a>
                                        <a class="dropdown-item" href="#Section13" id="sec13">Availability Report</a>
                                        <a class="dropdown-item" href="#Section14" id="sec14">Consumption Report</a>

                                        <!-- Add more dropdown items as needed -->
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item rounded shadow m-2 text-center">
                                <a class="nav-link text-white bg-danger font-weight-bold " href="#" id="logoutt">LOGOUT</a>
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
                                            <button class="btn btn-dark blacked" type="submit" id="brk-sl-submit">Search</button>
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
                                    <label for="brk-no" class="text-success">Machine Serial Number :</label>
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
                                <button type="submit" class="btn btn-dark blacked mt-3 float-right" id="brk-submit">Register</button>
                            </div>
                        </div>

                    </form>
                </section>
                <section id="Section2" class="p-4">
                    <div class="row">
                        <div class="col-md-6 text-center m-auto">
                            <h3 class="text-white text-center p-2  my-2 rounded shadow" style="background-color: black;">Install A Product</h3>
                        </div>
                    </div>
                    <form class="my-4 bg-light shadow p-3 needs-validation" id="installation-form" novalidate>
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
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="machine-no">Machine Serial Number :</label>
                                        <input type="text" class="form-control font-weight-bold inputcap" id="machine-no">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="machine-ip">IPv4 Address :</label>
                                        <input type="text" class="form-control font-weight-bold inputcap" id="machine-ip" pattern="(?:[0-9]{1,3}\.){3}[0-9]{1,3}" title="Enter a valid IPv4 address">
                                        <div class="invalid-feedback">
                                            Please enter a valid IP Address .
                                        </div>
                                    </div>
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
                                <button type="submit" class="btn btn-dark blacked" id="install-submit">Install</button>
                            </div>
                        </div>

                    </form>
                </section>
                <section id="Section15" class="p-4">
                    <div class="row">
                        <div class="col-8 text-center m-auto">
                            <h3 class="text-white text-center p-2  my-2 rounded shadow" style="background-color: black;">UPDATE INFORMATION</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <form id="instup-search-form" class="mt-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <!-- Input Field -->
                                        <input type="text" class="form-control font-weight-bold inputcap" id="instup-sl-search" placeholder="Enter Machine Serial No" aria-label="Enter Machine Serial No">
                                        <!-- Search Button -->
                                        <div class="input-group-append">
                                            <button class="btn btn-dark blacked" type="submit" id="instup-sl-submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form class="my-4 bg-light shadow p-3 d-none needs-validation" id="instup-form" novalidate>
                        <div class="row">
                            <div class="col-md-4 border-right border-md-0">
                                <div class="form-group">
                                    <p class="text-primary font-weight-bold">Product Information :</p>
                                </div>

                                <div class="form-group">
                                    <label for="instup-no" class="text-success">Machine Serial Number :</label>
                                    <input type="text" class="form-control font-weight-bold inputcap" id="instup-no">
                                </div>
                                <div class="form-group">
                                    <label for="instup-id">Installation ID :</label>
                                    <input type="number" class="form-control" id="instup-id" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="instup-product">Product :</label>
                                    <input type="text" class="form-control" id="instup-product" readonly>

                                </div>
                                <div class="form-group">
                                    <label for="instup-make">Make :</label>
                                    <input type="text" class="form-control" id="instup-make" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="instup-model">Model :</label>
                                    <input type="text" class="form-control" id="instup-model" readonly>
                                </div>



                            </div>
                            <div class="col-md-4 border-right border-md-0">
                                <div class="form-group">
                                    <p class="text-primary font-weight-bold">Installation Location :</p>
                                </div>
                                <div class="form-group">
                                    <label for="instup-unit">Unit :</label>
                                    <select class="form-control SelectionofUnit" id="instup-unit" name="instup-unit">
                                        <option value="5H01">GM Office</option>
                                        <option value="5H01">AOCP</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="instup-dept">Department :</label>
                                    <select class="form-control SelectionofDept" id="instup-dept" name="instup-dept">
                                        <option value="5H01">E and T</option>
                                        <option value="5H01">Excavation</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="instup-loc">Location :</label>
                                    <input type="text" class="form-control inputcap" id="instup-loc">
                                </div>
                                <div class="form-group">
                                    <label for="instup-inName">Incharge Name :</label>
                                    <input type="text" class="form-control inputcap" id="instup-inName">
                                </div>
                                <div class="form-group">
                                    <label for="instup-inPh">Incharge Phone :</label>
                                    <input type="text" class="form-control" id="instup-inPh">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="instup-ip">IPv4 Address :</label>
                                    <input type="text" class="form-control font-weight-bold inputcap" id="instup-ip" pattern="(?:[0-9]{1,3}\.){3}[0-9]{1,3}" title="Enter a valid IPv4 address">
                                    <div class="invalid-feedback">
                                        Please enter a valid IP Address .
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="instup-comp">compliance :</label>
                                    <input type="text" class="form-control inputcap" id="instup-comp">
                                </div>
                                <div class="form-group">
                                    <label for="instup-remark">Remark :</label>
                                    <textarea class="form-control inputcap" id="instup-remark" rows="2"></textarea>
                                </div>

                                <fieldset class="form-group">
                                    <legend class="text-danger">Status:</legend>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pme-add-gender" id="Active" value="A">
                                        <label class="form-check-label font-weight-bold" for="Active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pme-add-gender" id="Returned" value="R">
                                        <label class="form-check-label font-weight-bold" for="Returned">
                                            Returned
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pme-add-gender" id="Surveyedoff" value="S">
                                        <label class="form-check-label font-weight-bold" for="Surveyedoff">
                                            Surveyed off
                                        </label>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-dark blacked mt-3 float-right" id="instup-submit">Update</button>
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
                    <form class="my-4 bg-light shadow p-3">
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
                                <button type="submit" class="btn btn-dark blacked" id="acquire-submit">Acquire</button>
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
                            <div class="col-md-6 border-right border-md-0 ">
                                <div class="form-group">
                                    <label for="makeinput">Make:</label>
                                    <input type="text" class="form-control inputcap" id="makeinput">
                                    <small class="form-text text-danger">check the existing makes first</small>
                                </div>
                                <button type="submit" class="btn btn-dark blacked" id="registermake">Register</button>
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
                                <button type="submit" class="btn btn-dark blacked" id="registermodel">Register</button>

                            </div>
                        </div>
                    </form>
                </section>
                <section id="Section7" class="p-4">
                    <div class="row">
                        <div class="col-8 text-center m-auto">
                            <h3 class="text-white text-center p-2  my-2 rounded shadow" style="background-color: black;">Add a Product of <?php echo $key_name; ?></h3>
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
                                <button type="submit" class="btn btn-dark blacked" id="add-product">Add</button>
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
                                    <option value="home-brkin-in">Installations</option>
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
                <section id="Section9" class=" mx-4 rounded shadow">
                    <div class="row pb-2">
                        <!-- <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded text-center" style="width:200px" id="home-brkin-select">
                        <option value="home-brkin-in" >Installations</option>
                        <option value="home-brkin-brk" selected>Breakdowns</option>
                        </select> -->

                        <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded SelectionofProduct" style="width:180px" id="sec9-product" name="sec9-product">
                        </select>
                        <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded SelectionofMake" style="width:140px" id="popup4-make" name="popup4-make">
                            <!-- Options will be loaded here dynamically -->
                        </select>
                        <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded SelectionofModel" style="width:180px" id="popup4-model" name="popup4-model">
                            <!-- Options will be loaded here dynamically -->
                        </select>
                        <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded SelectionofUnit" style="width:250px" id="sec9-unit" name="sec9-unit">
                            <option value="5H01">GM Office</option>
                            <option value="5H01">AOCP</option>
                        </select>
                        <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded SelectionofDept" style="width:280px" id="sec9-dept" name="sec9-dept">
                            <option value="5H01">E and T</option>
                            <option value="5H01">Excavation</option>
                        </select>
                        <button type="submit" class="btn btn-danger" id="sec9-check">Check</button>
                        <button type="submit" class="btn btn-success ml-4" id="sec9-download">Download CSV</button>
                    </div>
                    <div class="row my-4 p-3 bg-white">
                        <div id="installation-Table" class="table-responsive font-weight-bold" style="max-height: 660px;">
                            <table class="table table-bordered" id="down-installation">
                                <thead class="thead-dark align-middle">
                                    <tr>
                                        <th scope="col" class="text-center">ID</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Sl.Number</th>
                                        <!-- <th scope="col">IP Address</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
                <section id="Section20" class=" mx-4 rounded shadow">
                    <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded SelectionofProduct" style="width:180px" id="sec20-product" name="sec20-product">
                    </select>
                    <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded SelectionofUnit" style="width:250px" id="sec20-unit" name="sec20-unit">
                        <option value="5H01">GM Office</option>
                        <option value="5H01">AOCP</option>
                    </select>
                    <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded SelectionofDept" style="width:280px" id="sec20-dept" name="sec20-dept">
                        <option value="5H01">E and T</option>
                        <option value="5H01">Excavation</option>
                    </select>
                    <button type="submit" class="btn btn-danger" id="sec20-check">Check</button>
                    <button type="submit" class="btn btn-success ml-4" id="sec20-download">Download CSV</button>
                    <div class="row my-4 p-3 bg-white">
                        <div id="ipv4-Table" class="table-responsive font-weight-bold" style="max-height: 660px;">
                            <table class="table table-bordered" id="down-ipv4">
                                <thead class="thead-dark align-middle">
                                    <tr>
                                        <th scope="col">IP Address</th>
                                        <th scope="col">Sl.Number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <section id="Section13" class=" mx-4 rounded shadow">
                    <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded SelectionofProduct" style="width:180px" id="sec13-product" name="sec13-product">
                    </select>
                    <button type="submit" class="btn btn-danger" id="sec13-check">Check</button>
                    <button type="submit" class="btn btn-success ml-4" id="sec13-download">Download CSV</button>
                    <div class="row my-4 p-3 bg-white">
                        <div id="Available-Table" class="table-responsive font-weight-bold" style="max-height: 660px;">
                            <table class="table table-bordered" id="down-Available">
                                <thead class="thead-dark align-middle">
                                    <!-- table head -->
                                    <tr>
                                        <th scope="col" >Product</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Availaible</th>
                                        <th scope="col" >Total Availaible</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <!-- table body -->
                                    <tr>
                                        <td rowspan="3">Laptop</td>
                                        <td>fjf</td>
                                        <td >1</td>
                                        <td rowspan="3"></td>
                                    </tr>
                                    <tr>
                                 
                                        <td>fjf</td>
                                        <td >1</td>
                                     
                                    </tr>
                                    <tr>
                                       
                                        <td>fjf</td>
                                        <td >1</td>
                                     
                                    </tr>
                                    <tr>
                                    <td rowspan="3">Camera</td>
                                        <td>fjf</td>
                                        <td >1</td>
                                        <td rowspan="3"></td>
                                    </tr>
                                </tbody>
                            </table>
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
                            <button type="button" class="btn btn-dark blacked" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        var loggedUser = <?php echo json_encode($_SESSION['username'], JSON_HEX_TAG); ?>;
        var Key = <?php echo json_encode($key, JSON_HEX_TAG); ?>;
    </script>
    <script src="cctv.js"></script>

</body>

</html>