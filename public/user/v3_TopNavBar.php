<!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark p-0 bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line" style="height: 4px;width: 25px;"></i>
                  <i class="sidenav-toggler-line" style="height: 4px;width: 25px;"></i> 
                  <i class="sidenav-toggler-line" style="height: 4px;width: 25px;"></i>
                </div> 
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" data-toggle="modal" data-target="#login_model">
                <div class="media align-items-center">
                  <span class="rounded-circle">
                  <i class="ni ni-satisfied" style="font-size: 30px;"></i> </span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->

    <!--login model starts-->
<div class="modal fade text-left" id="login_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-primary">
<h4 class="modal-title text-white" id="myModalLabel17">Login</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" class="mt-3" action="<?php echo $call_config->base_url() ?>application/modal/login_page.php">
                <div class="form-group mb-4">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" oninput="check_cred(this)" placeholder="Email/Mobile" type="text" name="_email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" name="_password" type="password">
                  </div>
                  <input type="hidden" name="_key" value="3">
                </div>
                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary my-3">Sign in</button>
                </div>
<div class="text-center mb-2">
<a href="#" data-dismiss="modal" data-target="#register_model" data-toggle="modal"><small>Register Now.</small></a>
<a href="#" data-dismiss="modal" data-target="#f_password" data-toggle="modal"><small>Forgot password?</small></a></div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
 function check_cred(emobile)
 {
  value=emobile.value;
  if (value.length<=10) 
  {
    emobile.type="text";
  }
  else
  {
    emobile.type="email";
  }
 }
</script>
<!--register model starts-->
<div class="modal fade text-left" id="register_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-primary">
<h4 class="modal-title text-white" id="myModalLabel17">Register Now</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/user/register.php">
<div class="modal-body">
<label>Email/Mobile:</label>
<input type="text" oninput="check_cred(this)" name="email_mobile" class="form-control">
<label for="tax">Password:</label>
<input type="text" name="password" class="form-control">
<div class="mt-3 text-center" ><input class="btn btn-info" type="submit" value="Register!" name="sub"></div>
</div>
</form>
</div>
</div>
</div>
<!--modal to forget password-->
<div class="modal fade text-left" id="f_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-primary">
<h4 class="modal-title text-white" id="myModalLabel17">Forget Password</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/user/frpass.php">
<div class="modal-body">
  <div id="result_otp"></div>
<label for="tax">Email/Mobile:</label>
<input type="text" id="key" name="email_mobile" class="form-control">
<div style="display: none;" id="otp_div">
  <label for="tax">OTP:</label>
<input type="text" name="otp" class="form-control">
<label for="tax">New-Password:</label>
<input type="text" name="password" class="form-control">
</div>
</div>
<div class="text-center mb-3">
<button type="button" id="otp_send_btn" onclick="send_otp()" class="btn btn-info">Send OTP</button>
<button id="reset_btn" style="display: none;" type="submit" class="btn btn-primary">Reset</button>
</div></form>
</div>
</div>
</div>
<script type="text/javascript">
  function send_otp() {
   email_mobile= $("#key").val();
   var phoneRegex = /^(\+91-|\+91|0)?\d{10}$/; // Change this regex based on requirement
    var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (phoneRegex.test(email_mobile) || emailRegex.test(email_mobile)) 
    {
      $.ajax({
url:"<?= $call_config->base_url() ?>application/modal/user/send_otp.php",
type:"POST",
data:{param:email_mobile},
success:function(data)
{
//  alert(data);
var obj = JSON.parse(data);
//alert(obj['mobile']);
if (obj['email']==1 && obj['mobile']==1) 
{
  var msg="OTP sended to E-mail,Mobile.";
  $("#result_otp").attr("class","alert alert-success");
  $("#result_otp").html(msg);
}
else if(obj['email']==1)
{
 var msg="OTP sended to E-mail.";
  $("#result_otp").attr("class","alert alert-success");
  $("#result_otp").html(msg); 
}
else if(obj['mobile']==1)
{
  var msg="OTP sended to Mobile.";
  $("#result_otp").attr("class","alert alert-success");
  $("#result_otp").html(msg);
}
else
{
  var msg="Failed to send OTP";
  $("#result_otp").attr("class","alert alert-danger");
  $("#result_otp").html(msg);
}
$("#otp_send_btn").hide();
$("#reset_btn").show();
$("#otp_div").show();
$("#key").attr("readonly","");

}
      });
    }
    else
    {
      alert("Enter Valid Data!!");
    }
  }
</script>