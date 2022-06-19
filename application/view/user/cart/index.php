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
              <h6 class="h2 text-white d-inline-block mb-0">My Cart</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="ni ni-cart"></i></a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
<div id="table_responsive_div" class="row p-3">




          </div>
        </div>
        <div class="card" style="display: none;" id="address_card">
          <form method="POST" action="<?= $call_config->base_url() ?>application/view/user/cart/checkout.php" >
            <div class="row">
              <?php
$address=$call_config->get_all("SELECT * FROM `tbl_address_master` WHERE `cid`='".$sess_data_var['sess_user_id']."'");
foreach ($address as $key) {
  ?>
<div class="col-xl-12 text-center btn btn-neutral">
<input class="float-left" type="radio" required="" name="address" value="<?= $key['id'] ?>">
<p class="mt--1 ml-3"><?= $key['address'] ?>,<?= $key['pin_code'] ?><br><?= $key['city'] ?>,<?= $key['state'] ?>,<?= $key['mobile'] ?></p>    
</div>
  <?php
}

              ?>
          </div>
<center>
<a class='btn btn-warning m-3' href='<?= $call_config->base_url()?>application/view/user/profile/address.php'>Add Address</a>
  <?php
if (sizeof($address)>0) {
 ?>
 <input type="submit" name="submit" value="Place Order!!" class="btn mt-2 btn-info mb-3"></center>
 <?php
}
  ?>
          </form>
        </div>
  <button class="btn btn-danger float-left mb-3" onclick="clear_cart()">Clear Cart</button>
  <a onclick="show_address()" id="show_address_btn" href="#" class="btn btn-info float-right mb-3 text-white">CheckOut</a>
      </div>
    </div>
<?php
 include('../../../../public/user/v5_Footer.php');
?>
<script type="text/javascript">
function show_address() {
  $("#show_address_btn").hide();
  $("#address_card").show();
}
  function clear_cart() {
  $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/cart.php' ?>',
  type:'POST',
  data:{action:"clear"},
  success:function(data){
  //  alert(data);
get_all();
get_cart();
  }
}); 
}
function add_one(argument) {
  //alert(argument);
  $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/cart.php' ?>',
  type:'POST',
  data:{action:"add",id:argument},
  success:function(data){
  //  alert(data);
get_all();
get_cart();
  }
}); 
}
function remove_one(argument) {
	//alert(argument);
	$.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/cart.php' ?>',
  type:'POST',
  data:{action:"remove_one",id:argument},
  success:function(data){
  //	alert(data);
get_all();
get_cart();
  }
});	
}
function remove(argument) {
$.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/cart.php' ?>',
  type:'POST',
  data:{action:"remove",id:argument},
  success:function(data){
  	//alert(data);
get_all();
get_cart();
  }
});	
}
function get_all()
{
$.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/get_cart.php' ?>',
  type:'POST',
  data:{action:"show"},
  success:function(data){
//  	alert(data);
$("#table_responsive_div").html(data);
  }
});		
}
	$(document).ready(function(){
  get_cart();
  get_all();
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