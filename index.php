<?php
include "header.php";
?>
<body style="background-color:black">
<!-- background-color: #001f3f; -->
  <section class="vh-100" style="display: block;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-10">
          <div class="card shadow" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block  ">
                <img src="images/Departmentlogo.avif"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; object-fit:cover ;  width: 100%; height: 100%;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-3 p-lg-5 text-black">

                  <form id="loginForm">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0"><img src="images/department-icon.jpeg" class="img-fluid rounded border border-dark shadow" style="height: 80px; max-height: 100%;"></span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    <div class="form-outline mb-4">
                      <input type="text" name="username" id="username" class="form-control form-control-lg"/>
                      <label class="form-label" for="username">Employee ID</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="password" class="form-control form-control-lg" />
                      <label class="form-label" for="password">Password</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark blacked btn-lg btn-block" type="button" id="loginButton">Login</button>
                      <span class="text-danger" id="loginResult"></span>
                    </div>
                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2 text-muted" style="color: #393f81;">Don't have an account? <a href="#!"
                        style="color: #393f81;">Register here</a></p>
                    
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
        $(document).on("click","#loginButton",function(){
            var username = $("#username").val();
            var password = $("#password").val();       
            $.ajax({
                type: 'POST',
                url: 'login.php',
                data: { username: username, password: password },
                success: function(data) {
                    if(data==1)
                    {
                        window.location.href = 'dashboard.php';
                    }
                    else
                    {
                        $('#loginResult').html(data);
                    }
                },
                error: function() {
                    alert('Error in AJAX request');
                }
            });

        });

    });
  </script>
</body>
</html>
