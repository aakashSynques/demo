<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo APP_TITLE." | ".$title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>includes/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>includes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>includes/dist/css/adminlte.min.css">
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>includes/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo base_url(); ?>" class="h1"><img src="<?php echo base_url(); ?>includes/dist/img/logo.png" /></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

        <div class="input-group mb-3">
          <input type="email" class="form-control" id="user_email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="user_password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-block" id="login_btn" onclick="validate_login();">Sign In</button>
          </div>
          <!-- /.col -->
        </div>

        <p class="mb-1 text-center" id="err_msg">
         &nbsp;
        </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<script>
 function validate_login()
  {
   var user_email = $("#user_email").val();
   var user_password = $("#user_password").val();
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   if(user_email.replace(/ /gi , "") == "" || re.test(user_email) == false)
    {
     $("#user_email").focus();
     $("#err_msg").html("<font color='red'><b>Enter your valid Email-ID.</b></font>");
    }
   else if(user_password.replace(/ /gi , "") == "")
    {
     $("#user_password").focus();
     $("#err_msg").html("<font color='red'><b>Enter your Password.</b></font>");
    }
   else
    {
     $("#login_btn").prop("disabled" , true);
     $("#err_msg").html("<font color='blue'><b><i class='fa fa-spinner fa-spin'></i> Wait, Validating...</b></font>");
     var base_url = '<?php echo base_url(); ?>';
         $.ajax({
                 type: "POST",
                 dataType: "JSON",
                 url: base_url+"app/login/validate_user_login",
                 data: { '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>' , 'user_email':user_email , 'user_password':user_password },
                 cache: false,
                 success: function (data, textStatus, jqXHR) {
	                  
	                  if(data.response == true)
	                   {
	                    $("#err_msg").html("<font color='green'><b>"+data.message+"</b></font>");
	                    window.location = base_url+"app/home";
	                   }
	                  else
	                   {
	                    $("#login_btn").prop("disabled" , false);
	                    $("#err_msg").html("<font color='red'><b>"+data.message+"</b></font>");
	                   }
	                  
	         }
               });
    }
  }
</script>

<script src="<?php echo base_url(); ?>includes/dist/js/adminlte.min.js"></script>
</body>
</html>
