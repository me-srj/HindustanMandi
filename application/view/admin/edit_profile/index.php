<?php
 include("../../../../config.php");
 $call_config = new config();
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
 $result=$call_config->get("SELECT * FROM `tbl_admin_master` WHERE `id`='".$sess_data_var['sess_adm_id']."'");
 include('../../../../public/admin/v1_HeadPart.php');
 include('../../../../public/admin/v2_sidebar.php');
 include('../../../../public/admin/v3_TopNavBar.php');
//include('../../../../public/admin/v4_content.php');
 ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"></h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
              <div class="card-body">
<form class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url()."application/modal/admin/update_admin.php"; ?>" novalidate>
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-eye"></i> Edit Profile</h4>
                                <div class="col-md-12">
                                <img src="<?php echo $admin_base_url.'app-assets/images/admin/'.$result['image']; ?>" id="profile-img-tag" style="width:100px; height:100px" class="img-thumbnail" />
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="validationTooltip01">Name</label>
                                            <div class="col-md-9">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="validationTooltip01" class="form-control border-primary" placeholder="Name" name="name" value="<?php echo $result['name'];?>" required>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput2">Phone No.</label>
                                            <div class="col-md-9">
                                                <div class="position-relative has-icon-left">
                                                <input type="tel" id="userinput2" class="form-control border-primary" placeholder="Phone Number" name="mobile" value="<?php echo $result['mobile'];?>" max="10" min="10" required>
                                        
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput8">Image</label>
                                        <div class="col-md-9">
                                        <fieldset class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image-file" id="photo" name="image" value="<?php echo $result['image']; ?>">
                                <label class="custom-file-label" for="userinput7">Choose file</label>
                            </div>
                                        </fieldset>
                                     </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <input type="text" name="currentimg" value="<?php echo $result['image']; ?>" hidden>
                            <div class="form-actions right">
                                <button type="button" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary" name="submit">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                <!--/ form end -->
            </div>
          </div>
        </div>
       
      </div>
    
      
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


<!-- BEGIN: Page JS-->
    <script src="<?php echo $admin_base_url ?>app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->

 <?php
include('../../../../public/admin/v5_Footer.php');

?>