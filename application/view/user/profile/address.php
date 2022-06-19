<?php
 include("../../../../config.php");
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
include('../../../../public/user/v1_HeadPart.php');
include('../../../../public/user/v2_sidebar.php');
include('../../../../public/user/v3_TopNavBar_login.php');
//include('v4_content.php');
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">My Address</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">

                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
 <button class="btn btn-neutral" href="#" data-toggle="modal" data-target="#password_modal">Add</button>
 <!--modal to add address starts-->
 <div class="modal fade text-left" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-primary">
<h4 class="modal-title text-white" id="myModalLabel17">Add Address</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
  <form class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url()."application/modal/user/add_address.php"; ?>">
                            <div class="form-body">
                                <div class=" row mt-3">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip01">Name</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
<input type="text" name="addname" placeholder="Enter a name" class="form-control form-group">                                    
                                    </div>
                                    </div>
                                </div>
                                <div class=" row mt-3">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip01">Address</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <textarea required class="form-control form-group" name="address" placeholder="Enter Address"></textarea>                                       
                                    </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip02">Pincode</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input required value="841301" readonly="" onchange="onlyNumberKey(this)" type="number" id="validationTooltip02" class="form-control form-group" placeholder="Enter Pincode" name="pincode">
                                       
                                    </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip03">City</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input value="Chapra" readonly="" required type="text"  class="form-control form-group" placeholder="Enter City Name" name="city" >
                                    </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip03">State</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input value="Bihar" readonly="" required type="text"  class="form-control form-group" placeholder="Enter State Name" name="state" >
                                       
                                    </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip03">Mobile Number</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input step="1" required type="number" min="1000000000" max="9999999999"  class="form-control form-group" placeholder="Enter Mobile Number" name="mobile" >
                                    </div>
                                    </div>
                                </div>
<div class="mb-5 text-center">
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
<?php
$address=$call_config->get_all("SELECT * FROM `tbl_address_master` WHERE `cid`='".$sess_data_var['sess_user_id']."' AND `status`='1'");
//print_r($user);
 ?>  
 <div class="card">
 	<?php
 	$i=1;
foreach ($address as $key) {
	?>
<div class="col-md-12 btn p-5">
	<b class="float-left"><?= $i++; ?>.</b>
	<b><?= $key['aname'] ?></b>
 	<p><?= $key['address'] ?></p>
 	<p><?= $key['city'].','.$key['state'].','.$key['pin_code'].',' ?><b><?= $key['mobile'] ?></b></p>
  <button class="btn btn-primary" data-toggle="modal" data-target="#edit_address<?= $key['id'] ?>">Edit</button>
 </div>
   <!--modal to add address starts-->
 <div class="modal fade text-left" id="edit_address<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-primary">
<h4 class="modal-title text-white" id="myModalLabel17">Add Address</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
  <form class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url()."application/modal/user/edit_address.php"; ?>">
    <input type="hidden" name="pre_id" value="<?= $key['id'] ?>">
                            <div class="form-body">
                                <div class=" row mt-3">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip01">Name</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
<input type="text" name="addname" placeholder="Enter a name" value="<?= $key['aname'] ?>" class="form-control form-group">                                    
                                    </div>
                                    </div>
                                </div>
                                <div class=" row mt-3">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip01">Address</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
<textarea required class="form-control form-group" name="address" placeholder="Enter Address"><?= $key['address'] ?></textarea>                                    
                                    </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip02">Pincode</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input required value="841301" readonly="" type="number" id="validationTooltip02" class="form-control form-group" placeholder="Enter Pincode" name="pincode">
                                       
                                    </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip03">City</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input value="Chapra" readonly="" required type="text"  class="form-control form-group" placeholder="Enter City Name" name="city" >
                                    </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip03">State</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input value="Bihar" readonly="" required type="text"  class="form-control form-group" placeholder="Enter State Name" name="state" >
                                       
                                    </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-md-4 text-center label-control" for="validationTooltip03">Mobile Number</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input step="1" value="<?= $key['mobile'] ?>" required type="number" min="1000000000" max="9999999999"   class="form-control form-group" placeholder="Enter Mobile Number" name="mobile" >
                                    </div>
                                    </div>
                                </div>
<div class="mb-5 text-center">
                                <button type="submit" class="btn btn-primary" name="submit">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
</div>
                            </div>
                        </form>
</div>
</div>
</div>
	<?php
}

 	?>
 </div>
 
    </div>
<?php
 include('../../../../public/user/v5_Footer.php');
?>
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
//  	alert(data);
		$("#cart_tag").html(data);
  }
});	
	}
</script>