<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">My Profile</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Profile</a></li>
                  <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right"> 
              <a href="#" data-toggle="modal" data-target="#password_modal" class="btn btn-sm btn-neutral">Password</a>
                  <!--password model starts-->
<div class="modal fade text-left" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-primary">
<h4 class="modal-title text-white" id="myModalLabel17">Change Password</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
  <form class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url()."application/modal/user/update_user_password.php"; ?>" novalidate>
                            <div class="form-body">
                                <div class="form-group row mt-3">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip01">Old Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" id="validationTooltip01" class="form-control" placeholder="Old Password" name="oldpassword" required>                                       
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip02">New Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" id="validationTooltip02" class="form-control Password" placeholder="New Password" name="newpassword" required>
                                       
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip03">Re-New Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" id="validationTooltip03" class="form-control Re-Password" placeholder="Re-Password" name="repassword" required="">
                                       
                                    </div>
                                    </div>
                                </div>
<div class="mb-5 text-center">
                                <button type="button" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary" name="submit">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
</div>
                            </div>
                        </form>
</div>
</div>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
        <div class="container-fluid mt--6">
          <a class="btn float-right btn-neutral btn-sm" href="<?= $call_config->base_url() ?>application/view/user/profile/address.php">Address</a>
              
<?php
$user=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `id`='".$sess_data_var['sess_user_id']."'");
//print_r($user);
 ?>  
 <form class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url()."application/modal/user/update_user.php"; ?>" novalidate>
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-eye"></i> Edit Profile</h4>
                                <div class="col-md-12">
                                <img src="<?php echo $call_config->base_url().$user['image']; ?>" id="profile-img-tag" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            <br>
                                <div class="row">
                                   <div class="col-md-6">
                                     <label class="text-muted">First Name:</label>
                                     <input type="text" placeholder="Enter Your First Name" required class="form-control form-group" value="<?= $user['first_name'] ?>" name="first_name">
                                   </div>
                                   <div class="col-md-6">
                                     <label class="text-muted">Last Name:</label>
                                     <input type="text" placeholder="Enter Your Last Name" required class="form-control form-group" value="<?= $user['last_name'] ?>" name="last_name">
                                   </div> 
                                </div>                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-md-3 text-muted label-control" for="userinput8">Image</label>
                                <input type="file" class="custom-file-input image-file" id="photo" name="image" value="<?php echo $result['image']; ?>">
                                        </div>
                                  
                                    <div class="col-md-6">
                                        <label class="col-md-3 text-muted label-control" for="userinput8">Date Of Birth</label>
                                <input type="date" class="form-control form-group" name="dob" value="<?php echo strftime('%Y-%m-%d',
  strtotime($user['dob'])); ?>" >
                                    </div>
                                </div>
<div class="row form-group">
<?php
if ($user['email']==null || $user['email']=="") {
?>
<div class="col-md-6">
<label class="text-muted">E-mail:</label>
<input type="email" placeholder="Enter Your E-mail" required class="form-control form-group" name="email">
</div>
<?php
}
if ($user['mobile']==null || $user['mobile']=="") {
?><div class="col-md-6">
<label class="text-muted">Mobile Number:</label>
<input type="text" maxlength="10" minlength="10" placeholder="Enter Your Mobile" required class="form-control form-group" name="mobile">
</div>
<?php
}
?>
</div>
                            </div>
<div class="form-actions right">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
    </div>
<!-- BEGIN: Page JS-->
    <script src="http://localhost:8080/grocer/app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#photo").change(function(){
        readURL(this);
    });
</script>

 
    </div>
    <script type="text/javascript">
  $(document).ready(function(){
  get_cart();
});
function get_cart() {
$.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/cart_number.php' ?>',
  type:'POST',
  data:{action:"show"},
  success:function(data){
//    alert(data);
    $("#cart_tag").html(data);
  }
}); 
  }
</script>