<?php
    include "header.php";
?>
<body style="background-color: #001f3f;">
    <div class="container-fluid">
        <!-- Navbar Strarts -->
        <div class="row">
            <div class="col-12 pr-0 pl-0">
                <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #004080;">
                    <a href="" class="navbar-brand"><img class="rounded" src="product-images/3.jpg" width="40px" alt=""></a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#mynavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="nav-link" href="#" id="popupTrigger1">Breakdown</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#" id="popupTrigger2">Installation</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#" id="popupTrigger3">Acquire</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#" id="popupTrigger4">Make</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#" id="popupTrigger5">Model</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar ends -->
        <!-- popup modals start -->
        <div class="row">
            
            <div class="modal fade" id="popupModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary  " id="ModalLabel4">Register a New Make</h5>
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
                    <ul id="existingMakes"></ul>
                </div>
                </div>
            </div>
            </div>
            <!-- 5th popup -->
            <div class="modal fade" id="popupModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel5">Register a New Model</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="makeSelect">Select a Make:</label>
                            <select class="form-control" id="makeSelect" name="makeSelect">
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
                        <ul id="existingModels"></ul>
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
    <script>
        $(document).ready(function () {
            function loadOptionsFromServer(integerParameter) {
                var url = 'loadmakes.php';
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: { yourIntegerParameter: integerParameter }, // Pass your integer as data
                    dataType: 'json',
                    success: function(data) {
                        $('#existingMakes').empty();
                        // Populate the select dropdown with options
                        $.each(data, function(index, option) {
                            $('#existingMakes').append('<li>'+option.make+'</li>');
                        });
                    },
                    error: function() {
                        console.error('Error loading makes');
                    }
                });
            }
            function loadMakesFromServer(integerParameter) {
                // You can customize the URL and other parameters as needed
                var url = 'loadmakes.php';

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: { yourIntegerParameter: integerParameter }, // Pass your integer as data
                    dataType: 'json',
                    success: function(data) {
                        // Clear existing options before appending new ones
                        $('#makeSelect').empty();

                        // Populate the select dropdown with options
                        $.each(data, function(index, option) {
                            $('#makeSelect').append('<option value="' + option.MakeID + '">' + option.MakeID +" :: "+option.make + '</option>');
                        });
                    },
                    error: function() {
                        console.error('Error loading makes');
                    }
                });
            }
            function InsertMakeInServer(makename,produtCat) {
                var url = 'insertmakes.php';
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: { makename: makename , productCat:produtCat}, 
                    success: function(data) {
                        alert("success");
                        // $("#makeinput").val("");
                        loadOptionsFromServer(produtCat);
                    },
                    error: function() {
                        alert("error");
                        console.error('Error inserting make');
                    }
                });
            }
            function InsertModelInServer(SelectedMake,modelinput) {
                var url = 'insertmodels.php';
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {SelectedMake:SelectedMake , modelinput:modelinput}, 
                    success: function(data) {
                        
                        $("#modelinput").val("");
                        // handleMakeSelection(SelectedMake);
                    },
                    error: function() {
                        alert.error(data);
                    }
                });
            }
            function handleMakeSelection(selectedValue) {
                $.ajax({
                    url: 'loadmodels.php',
                    type: 'POST',
                    data: { selectedOption: selectedValue },
                    dataType: 'json',
                    success: function(data) {
                        // Clear existing options before appending new ones
                        $('#existingModels').empty();

                        // Populate the select dropdown with options
                        $.each(data, function(index, option) {
                            $('#existingModels').append('<li>'+option.ModelName+'</li>');
                        });
                    },
                    error: function() {
                        console.error('Error loading options');
                    }
                });
            }
            //popup trigger functions
            $('#popupTrigger1').click(function () {
            $('#popupModal1').modal('show');
            });

            $('#popupTrigger4').click(function () {
                $('#popupModal4').modal('show');
                var yourIntegerParameter = 5;
                loadOptionsFromServer(yourIntegerParameter);
            });
            $('#popupTrigger5').click(function () {
                $('#popupModal5').modal('show');
                var yourIntegerParameter = 5;
                loadMakesFromServer(yourIntegerParameter);
                handleMakeSelection(1);
            });

            $('#registermake').click(function () {
                var makename = $("#makeinput").val();
                var productCat = 5;
                InsertMakeInServer(makename,productCat);
            });
            $('#registermodel').click(function () {
                var SelectedMake = $("#makeSelect").val();
                var modelinput = $("#modelinput").val();

                InsertModelInServer(SelectedMake,modelinput);
            });
            //select change functions
            $('#makeSelect').change(function() {
                var selectedValue = $(this).val();
                handleMakeSelection(selectedValue);
            });
            
        });
    </script>
</body>
</html>

