(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
$(document).ready(function () {

    $('.inputcap').on('input', function () {
        $(this).val($(this).val().toUpperCase());
    });
    var yourIntegerParameter = Key;
    loadSubProductsFromServer(yourIntegerParameter);

    document.getElementById('Section6').style.display = 'block';

    function loadOptionsFromServer(integerParameter) {
        var url = 'loadmakes.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                yourIntegerParameter: integerParameter
            }, // Pass your integer as data
            dataType: 'json',
            success: function (data) {
                $('#existing-rows').empty();
                // Populate the select dropdown with options
                $.each(data, function (index, option) {
                    $('#existing-rows').append('<div class="col-md-6"><p class="blacked text-white text-center rounded p-2 m-2">' + option.make + '</p></div>');
                });
            },
            error: function () {
                console.error('Error loading makes');
            }
        });
    }
    function loadSubProductsName(integerParameter) {
        var url = 'loadsubproducts.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                yourIntegerParameter: integerParameter
            }, // Pass your integer as data
            dataType: 'json',
            success: function (data) {
                $('#existing-products').empty();
                // Populate the select dropdown with options
                $.each(data, function (index, option) {
                    $('#existing-products').append('<div class="col-md-6"><p class="blacked text-white text-center rounded p-2 m-2">' + option.SpName + '</p></div>');
                });
            },
            error: function () {
                console.error('Error loading products');
            }
        });
    }
    function loadSubProductsFromServer(integerParameter) {
        // You can customize the URL and other parameters as needed
        var url = 'loadsubproducts.php';

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                yourIntegerParameter: integerParameter
            }, // Pass your integer as data
            dataType: 'json',
            success: function (data) {
                // Clear existing options before appending new ones
                $('.SelectionofProduct').empty();

                // Populate the select dropdown with options
                $('.SelectionofProduct').append('<option value="">Select a Product</option>');
                $.each(data, function (index, option) {

                    $('.SelectionofProduct').append('<option value="' + option.SpId + '">' + option.SpName + '</option>');
                });
            },
            error: function () {
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
            data: {
                yourIntegerParameter: integerParameter
            }, // Pass your integer as data
            dataType: 'json',
            success: function (data) {
                // Clear existing options before appending new ones
                $('.SelectionofMake').empty();

                // Populate the select dropdown with options
                $('.SelectionofMake').append('<option value="">Select a Make</option>');
                $.each(data, function (index, option) {

                    $('.SelectionofMake').append('<option value="' + option.MakeID + '">' + option.make + '</option>');
                });
            },
            error: function () {
                console.error('Error loading makes');
            }
        });
    }
    function loadModelsFromServer(selectedValue) {
        $.ajax({
            url: 'loadmodels.php',
            type: 'POST',
            data: {
                selectedOption: selectedValue
            },
            dataType: 'json',
            success: function (data) {
                // Clear existing options before appending new ones
                $('.SelectionofModel').empty();

                $('.SelectionofModel').append('<option value="">Select a Model</option>');
                $.each(data, function (index, option) {
                    $('.SelectionofModel').append('<option value="' + option.ModelID + '">' + option.ModelName + '</option>');
                });
            },
            error: function () {
                console.error('Error loading options');
            }
        });
    }
    function loadUnitsFromServer() {
        return new Promise(function (resolve, reject) {
            $.ajax({
                url: 'loadunits.php',
                type: 'POST',
                data: {},
                dataType: 'json',
                success: function (data) {
                    // Clear existing options before appending new ones
                    $('.SelectionofUnit').empty();

                    $('.SelectionofUnit').append('<option value="">--unit--</option>');
                    $.each(data, function (index, option) {
                        $('.SelectionofUnit').append('<option value="' + option.UnCode + '">' + option.UnName + '</option>');
                    });
                    // Resolve the promise once the AJAX request is successful
                    resolve();
                },
                error: function () {
                    console.error('Error loading units');
                    // Reject the promise if there's an error
                    reject();
                }
            });
        });
    }

    function loadDepartmentsFromServer() {
        return new Promise(function (resolve, reject) {
            $.ajax({
                url: 'loaddepts.php',
                type: 'POST',
                data: {},
                dataType: 'json',
                success: function (data) {
                    // Clear existing options before appending new ones
                    $('.SelectionofDept').empty();

                    $('.SelectionofDept').append('<option value="">--department--</option>');
                    $.each(data, function (index, option) {
                        $('.SelectionofDept').append('<option value="' + option.DmCode + '">' + option.DmName + '</option>');
                    });
                    // Resolve the promise once the AJAX request is successful
                    resolve();
                },
                error: function () {
                    console.error('Error loading departments');
                    // Reject the promise if there's an error
                    reject();
                }
            });
        });
    }

    function InsertMakeInServer(makename, produtCat) {
        var url = 'insertmakes.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                makename: makename,
                productCat: produtCat
            },
            success: function (data) {
                $("#makeinput").val("");
                loadOptionsFromServer(produtCat);
            },
            error: function () {
                console.error('Error inserting make');
            }
        });
    }
    function InsertSubProductsInServer(spname, produtCat) {
        var url = 'insertsubproducts.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                spname: spname,
                productCat: produtCat
            },
            success: function (data) {
                $("#product-input").val("");
                loadSubProductsName(produtCat);
            },
            error: function () {
                console.error('Error inserting product');
            }
        });
    }

    function InsertModelInServer(SelectedMake, modelinput, productCat) {
        var url = 'insertmodels.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                SelectedMake: SelectedMake,
                modelinput: modelinput,
                productCat: productCat
            },
            success: function (data) {
                alert(data);
                $("#modelinput").val("");
                handleMakeSelection(SelectedMake);
            },
            error: function () {
                alert.error(data);
            }
        });
    }

    function handleMakeSelection(selectedValue) {
        $.ajax({
            url: 'loadmodels.php',
            type: 'POST',
            data: {
                selectedOption: selectedValue
            },
            dataType: 'json',
            success: function (data) {
                // Clear existing options before appending new ones
                $('#existingModels').empty();

                // Populate the select dropdown with options
                $.each(data, function (index, option) {
                    $('#existingModels').append('<div class="col-md-6"><p class="blacked text-white text-center rounded p-2 m-2">' + option.ModelName + '</p></div>');
                });
            },
            error: function () {
                console.error('Error loading options');
            }
        });
    }
    function InsertAcquireInServer(product, make, model, amount, order, description, productCat) {
        var url = 'insertacquire.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                product: product,
                make: make,
                model: model,
                amount: amount,
                order: order,
                description: description,
                productCat: productCat
            },
            success: function (data) {
                alert(data);
                $("#acquire-amount").val("");
                $("#acquire-description").val("");
                $("#purchase-od").val("");

            },
            error: function () {
                alert.error(data);
            }
        });
    }
    function InsertInstallInServer(cat, pr, mk, ml, unit, dept, loc, amount, comp, name, ph, sl, rk, loggedUser, ip) {
        $.ajax({
            url: 'insertinstall.php',
            type: 'POST',
            data: { cat: cat, pr: pr, mk: mk, ml: ml, unit: unit, dept: dept, loc: loc, amount: amount, comp: comp, name: name, ph: ph, sl: sl, rk: rk, loggedUser: loggedUser, ip: ip },
            success: function (data) {
                alert(data);
                $("#install-amount").val("");
                $("#machine-no").val("");

            },
            error: function () {
                alert.error(data);
            }
        });

    }
    function UpdateInstallInServer(unit, dept, loc, comp, name, ph, sl, rk, loggedUser, ip, id, status) {
        $.ajax({
            url: 'updateinstall.php',
            type: 'POST',
            data: { unit: unit, dept: dept, loc: loc, comp: comp, name: name, ph: ph, sl: sl, rk: rk, loggedUser: loggedUser, ip: ip, id: id, status: status },
            success: function (data) {
                alert(data);
            },
            error: function () {
                alert.error(data);
            }
        });
    }
    function InsertbrkInServer(name, ph, sl, rk) {


        $.ajax({
            url: 'insertbrk.php',
            type: 'POST',
            data: { name: name, ph: ph, sl: sl, rk: rk },
            success: function (data) {
                alert(data);
                $("#brk-remark").val("");
                $('#brk-form').addClass('d-none');

            },
            error: function () {
                alert.error(data);
            }
        });

    }
    function loadmachine(brk_sl) {
        $.ajax({
            url: 'loadmachine.php',  // Replace with your server endpoint
            method: 'GET',
            data: { serialNumber: brk_sl },
            dataType: 'json',
            success: function (data) {
                if (data) {
                    $('#brk-inPh').val(data.InP);
                    $('#brk-inName').val(data.InN);
                    $('#brk-no').val(data.InM);
                    $('#brk-product').val(data.InSN);
                    $('#brk-make').val(data.InMkN);
                    $('#brk-model').val(data.InMlN);
                    $('#brk-unit').val(data.InUN);
                    $('#brk-dept').val(data.InDN);
                    $('#brk-loc').val(data.InL);
                    $('#brk-form').removeClass('d-none');
                    console.log(data);

                }
                else {
                    alert("Machine Does Not Exist Kindly enter correct serial Number else contact Admin ");
                    $('#brk-form').addClass('d-none');
                }


                // console.log(data);
            },
            error: function (xhr, status, error) {
                console.error('Error fetching machine data:', error);
                alert('Error fetching machine data. Please try again later.');
            }
        });


    }
    function loadmachine2(brk_sl) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                url: 'loadmachine.php',
                method: 'GET',
                data: { serialNumber: brk_sl },
                dataType: 'json',
                success: function (data) {
                    if (data) {
                        $('#instup-id').val(data.InId);
                        $('#instup-inPh').val(data.InP);
                        $('#instup-inName').val(data.InN);
                        $('#instup-no').val(data.InM);
                        $('#instup-product').val(data.InSN);
                        $('#instup-make').val(data.InMkN);
                        $('#instup-model').val(data.InMlN);
                        $('#instup-unit').val(data.InU);
                        $('#instup-dept').val(data.InD);
                        $('#instup-loc').val(data.InL);
                        $('#instup-ip').val(data.ipv4);
                        $('#instup-comp').val(data.InCo);
                        $('#instup-remark').val(data.InRk);
                        var radioButtons = document.getElementsByName('pme-add-gender');
                        for (var i = 0; i < radioButtons.length; i++) {
                            if (radioButtons[i].value === data.InSt) {
                                radioButtons[i].checked = true;
                            }
                        }
                        $('#instup-form').removeClass('d-none');
                        console.log(data);
                        resolve(); // Resolve the promise when successful
                    } else {
                        alert("Machine Does Not Exist Kindly enter correct serial Number else contact Admin ");
                        $('#brk-form').addClass('d-none');
                        reject(); // Reject the promise if machine data is not found
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching machine data:', error);
                    alert('Error fetching machine data. Please try again later.');
                    reject(); // Reject the promise if there's an error
                }
            });
        });
    }

    function loadInstallsFromServer() {

        var url = 'loadlatestinstall.php';

        $.ajax({
            url: url,
            type: 'GET',
            data: {},
            dataType: 'html',
            success: function (data) {
                var resultContainer = $('#install-table');

                resultContainer.empty();

                resultContainer.append(data);
            },
            error: function () {
                console.error('Error loading breakdown data');
            }
        });
    }
    function loadBreaksFromServer() {
        var url = 'loadbreakdown.php';
        var key = Key;

        $.ajax({
            url: url,
            type: 'GET',
            data: { key: key },
            dataType: 'html',
            success: function (data) {
                var resultContainer = $('#brk-table');

                resultContainer.empty();

                resultContainer.append(data);
            },
            error: function () {
                console.error('Error loading Breakdown data');
            }
        });

    }
    function SingleBoxRefresh(targetID) {
        var url = 'singlebox.php';
        var targetbox = "#brkbox" + targetID;
        $.ajax({
            url: url,
            type: 'GET',
            data: { targetID: targetID },
            dataType: 'html',
            success: function (data) {
                var resultContainer = $(targetbox);

                resultContainer.empty();

                resultContainer.append(data);
            },
            error: function () {
                console.error('Error loading installation data');
            }
        });

    }
    function loadavailablefromserver(subid, AvCat) {
        var url = 'loadavailable.php';

        $.ajax({
            url: url,
            type: 'GET',
            data: { subid: subid, AvCat: AvCat },
            dataType: 'html',
            success: function (data) {
                var resultContainer = $('#available-table');

                resultContainer.empty();

                resultContainer.append(data);
            },
            error: function () {
                console.error('Error loading installation data');
            }
        });
    }

    //popup trigger functions
    $('#sec1').click(function () {
        $('section').css('display', 'none');
        document.getElementById('Section1').style.display = 'block';
    });
    $('#sec15').click(function () {
        $('section').css('display', 'none');
        document.getElementById('Section15').style.display = 'block';
    });
    $('#sec2').click(function () {
        var yourIntegerParameter = Key;
        loadSubProductsFromServer(yourIntegerParameter);
        loadMakesFromServer(yourIntegerParameter);
        loadDepartmentsFromServer();
        loadUnitsFromServer();
        $('section').css('display', 'none');
        document.getElementById('Section2').style.display = 'block';
    });
    $('#sec3').click(function () {
        var yourIntegerParameter = Key;
        loadSubProductsFromServer(yourIntegerParameter);
        loadMakesFromServer(yourIntegerParameter);
        $('section').css('display', 'none');
        document.getElementById('Section3').style.display = 'block';
    });
    $('#sec4').click(function () {
        var yourIntegerParameter = Key;
        loadOptionsFromServer(yourIntegerParameter);
        $('section').css('display', 'none');
        document.getElementById('Section4').style.display = 'block';
    });
    $('#sec5').click(function () {
        var yourIntegerParameter = Key;
        loadMakesFromServer(yourIntegerParameter);
        $('section').css('display', 'none');
        document.getElementById('Section5').style.display = 'block';
    });
    $('#sec7').click(function () {
        var yourIntegerParameter = Key;
        loadSubProductsName(yourIntegerParameter);
        $('section').css('display', 'none');
        document.getElementById('Section7').style.display = 'block';
    });
    $('#sec6').click(function () {
        var yourIntegerParameter = Key;
        loadSubProductsFromServer(yourIntegerParameter);
        $('#home-product-select').trigger('change');
        $('section').css('display', 'none');
        document.getElementById('Section6').style.display = 'block';
    });
    $('#sec9').click(function () {
        var yourIntegerParameter = Key;
        loadMakesFromServer(yourIntegerParameter);
        loadUnitsFromServer();
        loadDepartmentsFromServer();
        // $('#home-product-select').trigger('change');
        $('section').css('display', 'none');
        document.getElementById('Section9').style.display = 'block';
    });
    $('#sec20').click(function () {
        loadUnitsFromServer();
        loadDepartmentsFromServer();
        // $('#home-product-select').trigger('change');
        $('section').css('display', 'none');
        document.getElementById('Section20').style.display = 'block';
    });
    $('#sec13').click(function () {
        $('section').css('display', 'none');
        document.getElementById('Section13').style.display = 'block';
    }); $('#sec21').click(function (e) {
        e.preventDefault();
        $('section').css('display', 'none');
        document.getElementById('Section21').style.display = 'block';
    });
    $('#sec24').click(function () {

        $('section').css('display', 'none');
        document.getElementById('Section24').style.display = 'block';
    });
    $('#sec22').click(function () {

        $('section').css('display', 'none');
        document.getElementById('Section22').style.display = 'block';
    });
    $('#sec23').click(function () {

        $('section').css('display', 'none');
        document.getElementById('Section23').style.display = 'block';
    });

    $("#logoutt").click(function (e) {
        e.preventDefault();

        $.ajax({
            url: "logout.php", // Change this to the path of your PHP script handling logout
            type: "POST",
            data: { action: 'logout' },
            success: function (response) {
                // Handle success, for example, redirecting the user to a logged out page
                window.location.replace("index.php");
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });
    });
    $('#registermake').on('click', function (e) {
        e.preventDefault();
        var makename = $("#makeinput").val().trim();
        var productCat = Key;
        if (makename == "") {
            return;
        }
        InsertMakeInServer(makename, productCat);
    });
    $('#registermodel').on('click', function (e) {
        e.preventDefault();
        var productCat = Key;
        var SelectedMake = $("#makeSelect").val();
        var modelinput = $("#modelinput").val().trim();
        if (modelinput == "") {
            return;
        }
        InsertModelInServer(SelectedMake, modelinput, productCat);
    });

    $('#add-product').on('click', function (e) {
        e.preventDefault();
        var spname = $("#product-input").val().trim();
        var productCat = Key;
        if (spname == "") {
            return;
        }
        InsertSubProductsInServer(spname, productCat);
    });
    $('#acquire-submit').on('click', function (e) {
        e.preventDefault();
        var product = $("#popup3-product").val();
        var make = $("#popup3-make").val();
        var model = $("#popup3-model").val();
        var amount = $("#acquire-amount").val();
        var order = $("#purchase-od").val().trim();
        var description = $("#acquire-description").val();
        var productCat = Key;
        if (!amount) {
            return;
        }
        InsertAcquireInServer(product, make, model, amount, order, description, productCat);
    });
    $('#install-submit').on('click', function (e) {
        var form = $('#installation-form')[0];
        if (form.checkValidity()) {
            e.preventDefault();
            var cat = Key;
            var pr = $("#popup2-product").val();
            var mk = $("#popup2-make").val();
            var ml = $("#popup2-model").val();
            var unit = $("#install-unit").val();
            var dept = $("#install-dept").val();
            var loc = $("#install-loc").val().trim();
            var amount = $("#install-amount").val();
            var comp = $("#install-comp").val();
            var name = $("#install-inName").val();
            var ph = $("#install-inPh").val();
            var sl = $("#machine-no").val().trim();
            var rk = $("#install-remark").val();
            var ip = $("#machine-ip").val();
            if (!amount) {
                return;
            }
            InsertInstallInServer(cat, pr, mk, ml, unit, dept, loc, amount, comp, name, ph, sl, rk, loggedUser, ip);
        }
    });
    $('#instup-submit').on('click', function (e) {
        var form = $('#instup-form')[0];
        if (form.checkValidity()) {
            e.preventDefault();
            var unit = $("#instup-unit").val();
            var dept = $("#instup-dept").val();
            var loc = $("#instup-loc").val();
            var comp = $("#instup-comp").val();
            var name = $("#instup-inName").val();
            var ph = $("#instup-inPh").val();
            var id = $("#instup-id").val().trim();
            var sl = $("#instup-no").val().trim();
            var rk = $("#instup-remark").val();
            var ip = $("#instup-ip").val();
            var status = $("input[name='pme-add-gender']:checked").val();
            UpdateInstallInServer(unit, dept, loc, comp, name, ph, sl, rk, loggedUser, ip, id, status);
        }
    });
    //select change functions
    $('#makeSelect').change(function () {
        var selectedValue = $(this).val();
        handleMakeSelection(selectedValue);
    });
    $('#popup3-make').change(function () {
        var selectedValue = $(this).val();
        loadModelsFromServer(selectedValue);
    });
    $('#popup2-make').change(function () {
        var selectedValue = $(this).val();
        loadModelsFromServer(selectedValue);
    });
    $('#popup4-make').change(function () {
        var selectedValue = $(this).val();
        loadModelsFromServer(selectedValue);
    });
    $('#brk-sl-submit').on('click', function (e) {
        e.preventDefault();
        var brk_sl = ($("#brk-sl-search").val()).trim();
        if (brk_sl != "") {
            loadmachine(brk_sl);
        }
        else {
            alert("Enter a Serial Number To Proceed");
        }


    });
    $('#instup-sl-submit').on('click', function (e) {
        e.preventDefault();
        var brk_sl = ($("#instup-sl-search").val()).trim();
        if (brk_sl != "") {
            loadDepartmentsFromServer().then(function () {
                return loadUnitsFromServer();
            }).then(function () {
                loadmachine2(brk_sl);
            }).catch(function (error) {
                console.error("Error loading departments or units:", error);
            });
        } else {
            alert("Enter a Serial Number To Proceed");
        }


    });
    $('#brk-submit').on('click', function (e) {
        e.preventDefault();
        var name = $("#brk-inName").val();
        var ph = $("#brk-inPh").val();
        var sl = $("#brk-no").val();
        var rk = $("#brk-remark").val();
        InsertbrkInServer(name, ph, sl, rk);
    });
    $('#home-brkin-select').change(function () {
        var selectedValue = $(this).val();
        if (selectedValue == "home-brkin-in") {
            loadInstallsFromServer();
            $('#install-table').show();
            $('#brk-table').hide();
        }
        else {
            loadBreaksFromServer();
            $('#install-table').hide();
            $('#brk-table').show();
        }

    });
    $('#home-product-select').change(function () {
        var selectedValue = $(this).val();
        AvCat = Key;
        loadavailablefromserver(selectedValue, AvCat);
    });
    $('#home-brkin-select').trigger('change');
    $('#home-product-select').trigger('change');
    $(document).on("click", ".repair-box-btn", function (e) {
        e.preventDefault();
        var targetID = $(this).data("id");
        $("#box" + targetID).toggleClass("d-none");
    });

    $(document).on("click", ".a-open", function (e) {
        e.preventDefault();
        var targetID = $(this).data("id");
        var url = 'opencase.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                targetID: targetID
            },
            success: function (data) {
                alert(data);
                SingleBoxRefresh(targetID);

            },
            error: function () {
                console.error('Error opening case');
            }
        });
    });
    $(document).on("click", ".a-reopen", function (e) {
        e.preventDefault();
        // var targetID = $(this).data("id");
        // var url = 'opencase.php';
        // $.ajax({
        //     url: url,
        //     type: 'POST',
        //     data: {
        //         targetID : targetID
        //     },
        //     success: function(data) {
        //         alert(data);
        //         SingleBoxRefresh(targetID);

        //     },
        //     error: function() {
        //         console.error('Error opening case');
        //     }
        // });
    });
    $(document).on("click", ".a-mail", function (e) {
        e.preventDefault();
        var targetID = $(this).data("id");
        var url = 'generatemail.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                targetID: targetID
            },
            success: function (data) {
                var resultContainer = $("#gen-mail-text");

                resultContainer.empty();

                resultContainer.append(data);
                $('#exampleModalCenter').modal('show');
            },
            error: function () {
                console.error('Error Generating Mail Text');
            }
        });
    });
    $(document).on("click", ".a-prgs", function (e) {
        e.preventDefault();
        var targetID = $(this).data("id");
        var url = 'addprogress.php';
        var progress = $('textarea.add-progess-in[data-id="' + targetID + '"]').val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                targetID: targetID, progress: progress
            },
            success: function (data) {
                SingleBoxRefresh(targetID);

            },
            error: function () {
                console.error('Error updating progress');
            }
        });
    });
    $(document).on("click", ".a-clse", function (e) {
        e.preventDefault();
        var targetID = $(this).data("id");
        var url = 'closecase.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                targetID: targetID
            },
            success: function (data) {
                alert(data);
                SingleBoxRefresh(targetID);

            },
            error: function () {
                console.error('Error closing case');
            }
        });
    });
    function InstallTableLoad(sub, make, model, unit, dept, key) {
        var url = 'LIST/listofinstall.php';
        $.ajax({
            url: url,
            type: 'GET',
            data: { sub: sub, make: make, model: model, unit: unit, dept: dept, key: key },
            dataType: 'html',
            success: function (data) {
                var resultContainer = $('#installation-Table');

                resultContainer.empty();

                resultContainer.append(data);
            },
            error: function () {
                console.error('Error loading Breakdown data');
            }
        });
    };
    function Ipv4TableLoad(sub, unit, dept, key) {
        var url = 'LIST/listofipv4.php';
        $.ajax({
            url: url,
            type: 'GET',
            data: { sub: sub, unit: unit, dept: dept, key: key },
            dataType: 'html',
            success: function (data) {
                var resultContainer = $('#ipv4-Table');

                resultContainer.empty();

                resultContainer.append(data);
            },
            error: function () {
                console.error('Error loading Breakdown data');
            }
        });
    };
    function AvailableTableLoad(sub, key) {
        var url = 'LIST/listofavailable.php';
        $.ajax({
            url: url,
            type: 'GET',
            data: { sub: sub, key: key },
            dataType: 'html',
            success: function (data) {
                var resultContainer = $('#Available-Table');

                resultContainer.empty();

                resultContainer.append(data);
            },
            error: function () {
                console.error('Error loading Breakdown data');
            }
        });

    };
    function BreakdownHistoryLoad(slno, key) {
        var url = 'LIST/breakdownhistorylist.php';
        $.ajax({
            url: url,
            type: 'GET',
            data: { slno: slno, key: key },
            dataType: 'html',
            success: function (data) {
                var resultContainer = $('#breakdown-his-table');

                resultContainer.empty();

                resultContainer.append(data);
            },
            error: function () {
                console.error('Error loading Breakdown data');
            }
        });

    };
    function InformationLoad(slno, key) {
        var url = 'LIST/informationload.php';
        $.ajax({
            url: url,
            type: 'GET',
            data: { slno: slno, key: key },
            dataType: 'html',
            success: function (data) {
                var resultContainer = $('#information-loading');

                resultContainer.empty();

                resultContainer.append(data);
            },
            error: function () {
                console.error('Error loading Breakdown data');
            }
        });

    };
    function Breakdownreportload(std, end) {
        var url = 'LIST/breakdownreportload.php';
        $.ajax({
            url: url,
            type: 'GET',
            data: { std: std, end: end },
            dataType: 'html',
            success: function (data) {
                var resultContainer = $('#breakdown-report-table');

                resultContainer.empty();

                resultContainer.append(data);
            },
            error: function () {
                console.error('Error loading Breakdown data');
            }
        });

    };
    $('#sec9-check').on('click', function (e) {
        e.preventDefault();
        ke = Key;
        var sub = $("#sec9-product").val();
        var make = $("#popup4-make").val();
        var model = $("#popup4-model").val();
        var unit = $("#sec9-unit").val();
        var dept = $("#sec9-dept").val();
        if (unit == "") {
            alert("Please select a Unit to Proceed");
        }
        else {
            InstallTableLoad(sub, make, model, unit, dept, ke);
        }

    });
    $('#sec20-check').on('click', function (e) {
        e.preventDefault();
        ke = Key;
        var sub = $("#sec20-product").val();
        var unit = $("#sec20-unit").val();
        var dept = $("#sec20-dept").val();
        if (unit == "") {
            alert("Please select a Unit to Proceed");
        }
        else {
            Ipv4TableLoad(sub, unit, dept, ke);
        }

    });
    $('#sec13-check').on('click', function (e) {
        e.preventDefault();
        ke = Key;
        var sub = $("#sec13-product").val();
        AvailableTableLoad(sub, ke);

    });
    $('#sec21-submit').on('click', function (e) {
        e.preventDefault();
        ke = Key;
        var slno = $("#sec21-sl").val();
        if (slno == "") {
            alert("Please Enter a Serial Number to Proceed");
        }
        else {
            BreakdownHistoryLoad(slno, ke);
            InformationLoad(slno, ke);
        }
    });
    $(document).ready(function () {
        $('#sec22-submit').on('click', function (e) {
            e.preventDefault();
            var std = $("#sec22-sdt").val();
            var end = $("#sec22-edt").val();
            var now = new Date().toISOString().slice(0, 10);

            if (std == "" || end == "") {
                alert("Please Enter a Start or End date to Proceed");

            } else {
                var startDate = new Date(std);
                var endDate = new Date(end);

                if (endDate > startDate && startDate <= new Date(now) && endDate <= new Date(now)) {
                    Breakdownreportload(std, end);
                    alert("Valid");
                } else {
                    alert("Invalid Date Selection");
                }
            }
        });
    });


    // Function to convert table data to CSV format
    function convertToCSV(table) {
        var csv = [];
        $(table).find('tr').each(function () {
            var row = [];
            $(this).find('th,td').each(function () {
                row.push($(this).text());
            });
            csv.push(row.join(','));
        });
        return csv.join('\n');
    }

    // Click event handler for the download button
    $('#sec9-download').click(function () {
        var csvContent = convertToCSV($('#down-installation'));
        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        var link = document.createElement("a");
        if (link.download !== undefined) {
            var url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", 'table_data.csv');
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    });
    $('#sec20-download').click(function () {
        var csvContent = convertToCSV($('#down-ipv4'));
        var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        var link = document.createElement("a");
        if (link.download !== undefined) {
            var url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", 'table_data.csv');
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    });
    $(document).ready(function () {
        $(".dropdown-item").click(function () {
            var selectedValue = $(this).text();
            $("#selectedValueReport").text(selectedValue);
        });
    });

});