<?php
 include("../../../../config.php");
 $call_config = new config();
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
 $result=$call_config->get("SELECT * FROM `tbl_admin_master` WHERE `id`='".$sess_data_var['sess_adm_id']."'");
 if (isset($_GET['id'])&&isset($_GET['cid'])&&isset($_GET['type'])&&isset($_GET['aid'])) {
$order_id=mysqli_escape_string($call_config->con,$_GET['id']);
$cid=mysqli_escape_string($call_config->con,$_GET['cid']);
$tbl_name=mysqli_escape_string($call_config->con,$_GET['type']);
  $Customer=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `id`='".$cid."'");
  $address=$call_config->get("SELECT * FROM `tbl_address_master` WHERE `id`='".$_GET['aid']."'");
include('../../../../public/admin/v1_HeadPart.php');
 include('../../../../public/admin/v2_sidebar.php');
 include('../../../../public/admin/v3_TopNavBar.php');
?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Create Orders</h6>
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <!-- Page content -->
    <form method="POST" action="<?= $call_config->base_url() ?>application/modal/admin/create_order.php">
      <input type="hidden" name="order_id" value="<?= $order_id ?>">
<input type="hidden" name="cid" value="<?= $cid ?>">
<input type="hidden" name="tbl_name" value="<?= $tbl_name ?>">
<input type="hidden" name="addressid" value="<?= $_GET['aid']?>">
    <div class="container-fluid mt--6">
              <div class="row">
  <div class="col-md-6">
    <h3>Search Product</h3>
    <input type="text" onchange="search_product(this.value)" class="form-control" id="search_key" placeholder="Enter Name,Description,mrp or selling price of product" name="">
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr><th>Name</th><th>Description</th><th>Category</th><th>MRP</th><th>Price</th><th>Action</th></tr>
      </thead>
      <tbody id="product_table_body"></tbody>
    </table>
  </div>
  </div>
  <div class="col-md-6">
        <h3>Cart</h3>
<input type="number" required="" readonly step="0.00" id="total_amount" class="form-control" name="total_amount">
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr><th>Product</th><th>Price<b>X</b>(Quantity)=Total</th><th>Action</th></tr>
      </thead>
      <tbody id="cart_table_body"></tbody>
    </table>
  </div>
  </div>
  <div class="col-md-12">
    <button type="submit" name="submit" class="btn btn-success float-center">Place Order</button>
    <a onclick="clear_cart()" class="btn text-white float-right btn-danger">Clear Cart</a>
    <a onclick="window.top.close()" class="btn float-right text-white btn-warning">Exit</a>
  </div>
</div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
              <div class="card-body">
<div class="row">
<div class="col-xl-12">
    <h4>Customer Details</h4>
  Name:<?= $Customer['first_name']." ".$Customer['last_name'] ?>
  <p>Email:<?= $Customer['email'] ?>
  Mobile:<?= $Customer['mobile'] ?></p>
  <label>Address:</label><?= $address['address'].",".$address['city'].",".$address['state'].",".$address['state'].",".$address['pin_code'] ?>
</div>
</div>
            </div>
          </div>
        </div>
       
      </div>
    
      </div>
      </form>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- BEGIN: Page JS-->
    <script src="<?php echo $admin_base_url ?>app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->

<script type="text/javascript">
    $(document).ready(function(){
  get_cart();
  //get_all();
});
    function remove_one(argument) {
  //alert(argument);
  $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/cart.php' ?>',
  type:'POST',
  data:{action:"remove_one",id:argument},
  success:function(data){
  //  alert(data);
get_cart();
  }
}); 
}
function remove(argument) {
$.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/cart.php' ?>',
  type:'POST',
  data:{action:"remove",id:argument},
  success:function(data){
    //alert(data);
get_cart();
  }
}); 
}
  function get_cart(){
     id="sss";
     $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/get_cart.php' ?>',
  type:'POST',
  data:{action:id},
  success:function(data){
//alert(data);
obj = JSON.parse(data);
$("#cart_table_body").html(obj['html']);
$("#total_amount").val(obj['total']);
  }
});
  }
  function addtocart(argument) {
   // alert(argument);
     $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/cart.php' ?>',
  type:'POST',
  data:{id:argument,action:"add"},
  success:function(data){
//alert(data);
get_cart();
  }
});
  }
  function search_product(argument) {
    if (argument==null|| argument=="") {
swal('Empty!!','Empty search value','info',{button: 'Okay',}); 
   }
    else
    {
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/search_product.php' ?>',
  type:'POST',
  data:{search:argument},
  success:function(data){
    //alert(data);
    $("#product_table_body").html(data);
  }
});
  }
}
function clear_cart() {
  $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/cart.php' ?>',
  type:'POST',
  data:{action:"clear"},
  success:function(data){
  //  alert(data);
//get_all();
get_cart();
  }
}); 
}
</script>
<?php
 include('../../../../public/admin/v5_Footer.php');
 }
 else
 {
  $call_config->msg("Error!!","Failed to get data!!","error","admin/dashboard/","");
 }
 //include('../../../../public/admin/v4_content.php');
 ?>
