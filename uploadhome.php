<?php
include "header.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

?><body style="background-color:black">
<div class="container-fluid py-2 h-100">
    <!-- Navbar Starts -->
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded shadow mb-2">
                <a href="#" id="sec6" class="navbar-brand"><img class="rounded" src="product-images/doc-icon2.png" width="40px" alt=""></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target=".mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mynavbar justify-content-end">
                    <ul class="navbar-nav nav-pills">
                        <li class="nav-item rounded shadow m-2 text-center">
                            <a class="nav-link text-white bg-danger font-weight-bold" href="#" id="signOut">SIGN OUT</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar ends -->
    <div class="row d-flex justify-content-center align-items-center h-100 font-weight-bold">
        <div class="col-12">
            <div class="row p-4 mt-4 align-items-start">
                <div class="col-md-4 mx-auto bg-white rounded">
                    <div class="row text-center">
                        <div class="col-10 mx-auto my-3">
                            <h3 class="text-white p-2 my-2 rounded shadow" style="background-color: black">UPLOAD FILE</h3>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-10 mx-auto my-3">
                            <form id="uploadForm" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="filecat">File Category:</label>
                                    <br>
                                    <select class="custom-select" style="width:300px" id="filecat" name="filecat">
                                        <option value="poc">Purchase Order Copy</option>
                                        <option value="est">Estimates</option>
                                        <option value="tps">Technical Parameter Sheet</option>
                                        <option value="sod">Surveyed off Documents</option>
                                        <option value="pr">Purchase Requisition</option>
                                        <option value="gendoc" selected>General document</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fileremark">File Description:</label>
                                    <textarea class="form-control inputcap" id="fileremark" name="fileremark" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                <div class="mb-5">
                                    <label for="file" class="form-label">Select file:</label>
                                    <input type="file" class="form-control" name="file" id="file">
                                </div>
                                </div>
                                
                                <button type="submit" class="btn btn-dark blacked">Upload file</button>
                                <br>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 mx-auto rounded shadow">
                        <div class="row pb-2">
                        <!-- <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded text-center" style="width:200px" id="home-brkin-select">
                        <option value="home-brkin-in" >Installations</option>
                        <option value="home-brkin-brk" selected>Breakdowns</option>
                        </select> -->
                        <select class="custom-select custom-select-bg-dark mr-sm-2 shadow rounded text-center" style="width:300px" id="selectfilecat" name="selectfilecat">
                            <option value="poc">Purchase Order Copy</option>
                            <option value="est">Estimates</option>
                            <option value="tps">Technical Parameter Sheet</option>
                            <option value="sod">Surveyed off Documents</option>
                            <option value="pr">Purchase Requisition</option>
                            <option value="gendoc" selected>General document</option>
                        </select>
                        <select class="custom-select custom-select-bg-dark pb-2" style="width:80px ; margin-left:10px" id="fileyear" name="fileyear">
                            <option value="2024" selected>2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                        </select>
                        </div>
                    <div class="row">
                        <div class="col-10">
                            <div id="files-table">
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery Script -->
<script>
    $(document).ready(function () {
        $('.inputcap').on('input', function() {
            $(this).val($(this).val().toUpperCase());
        });
        $('#uploadForm').submit(function (e) {
            e.preventDefault(); // Prevent default form submission
            var formData = new FormData(this);
            $.ajax({
                url: 'upload.php', // Form submission URL
                type: 'POST',
                data: formData,
                success: function (data) {
                    // Handle success response
                    alert(data); // Log success response for debugging
                    // Optionally, display a success message or redirect to another page
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText); // Log error response for debugging
                    // Optionally, display an error message to the user
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        function loadFilesFromServer(file_cat_selected,file_year_selected) {

            var url = 'loadfiles.php';

            $.ajax({
                url: url,
                type: 'GET',
                data: {file_cat_selected:file_cat_selected,file_year_selected:file_year_selected}, 
                dataType: 'html',
                success: function(data) {
                    var resultContainer = $('#files-table');

                    resultContainer.empty();

                    resultContainer.append(data);
                },
                error: function() {
                    console.error('Error loading files');
                }
            });
        }   
        $('#selectfilecat').change(function() {
            var file_cat_selected = $("#selectfilecat").val(); 
            var file_year_selected = $("#fileyear").val();
            loadFilesFromServer(file_cat_selected,file_year_selected);  
        });
        $('#fileyear').change(function() {
            var file_cat_selected = $("#selectfilecat").val(); 
            var file_year_selected = $("#fileyear").val();
            loadFilesFromServer(file_cat_selected,file_year_selected);  
        });
        $('#selectfilecat').trigger('change');
        $("#signOut").click(function(e){
                e.preventDefault();
                
                $.ajax({
                    url: "logout.php", // Change this to the path of your PHP script handling logout
                    type: "POST",
                    data: {action: 'logout'},
                    success: function(response){
                        // Handle success, for example, redirecting the user to a logged out page
                        window.location.replace("index.php");
                    },
                    error: function(xhr, status, error){
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });
    });
</script>
</body>
</html>