<?php
 include("../../../../config.php");
include('../../../../public/user/v1_HeadPart.php');
include('../../../../public/user/v2_sidebar.php');
if ($call_config->cookiecheck()) {
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
  include('../../../../public/user/v3_TopNavBar_login.php');
}
 else
 {
  include('../../../../public/user/v3_TopNavBar.php');
 }
 ?> 
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4"> 
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
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
<div class="row p-3">

<?php
if (isset($_GET['id'])) {
$id=base64_decode(mysqli_escape_string($call_config->con,$_GET['id']));
if(isset($sess_data_var))
{
    $crecent=$call_config->get_all("SELECT * FROM `tbl_recent_view_master` WHERE `cid`='".$sess_data_var['sess_user_id']."'");
$crsize=sizeof($crecent);
if ($crsize>8) {
for ($i=8; $i<$crsize;$i++) { 
 $call_config->IDU("DELETE FROM `tbl_recent_view_master` WHERE `id`='".$crecent[$i]['id']."'");
}
}
$recent=$call_config->get_all("SELECT * FROM `tbl_recent_view_master` WHERE `cid`='".$sess_data_var['sess_user_id']."' and `pid`='".$id."'");
$total=sizeof($recent);
if ($total>0) {
  $call_config->IDU("DELETE FROM `tbl_recent_view_master` WHERE `cid`='".$sess_data_var['sess_user_id']."' and `pid`='".$id."'");
  $call_config->IDU("INSERT INTO `tbl_recent_view_master`(`cid`, `pid`) VALUES ('".$sess_data_var['sess_user_id']."','".$id."')");
}
else
{
 $call_config->IDU("INSERT INTO `tbl_recent_view_master`(`cid`, `pid`) VALUES ('".$sess_data_var['sess_user_id']."','".$id."')"); 
}
}
$product=$call_config->get("SELECT * FROM `tbl_product_master` WHERE `id`='".$id."'");
$pimage=$call_config->get_all("SELECT * FROM `tbl_product_image_master` WHERE `pid`='".$product['id']."' ORDER BY `con` ");
$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$product['unit']."'");
$sub_category=$call_config->get("SELECT * FROM `tbl_sub_category_master` WHERE `id`='".$product['sub_category_id']."'");
$category=$call_config->get("SELECT * FROM `tbl_category_master` WHERE `id`='".$sub_category['category_id']."'");
$tax_amt=($product['selling_price']/100)*$category['tax_value_percent'];
$off_percent=number_format((($product['mrp']- $product['selling_price']+$tax_amt) * 100) / $product['mrp'],2);
     $off_percent_value=($product['mrp']-$product['selling_price']+$tax_amt)*100;
      $off_percent1=number_format($off_percent_value/$product['mrp'],2)."% OFF";
      $saved=$product['mrp']-$product['selling_price'];
      $off_percent="Save ".$saved." ₹/".$off_percent1;
?>
<div class="col-xl-12">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php
$count=$call_config->get("SELECT COUNT(*) as total FROM `tbl_product_image_master` WHERE `pid`='".$product['id']."'");
    ?>
          <ol class="carousel-indicators">
            <?php
$i=1;
while ($i <= $count['total']) {
  if ($i==1) {
    echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'" class="active"></li>';
  }
  else
  {
echo ' <li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
  }
  $i++;
}
            ?>
          </ol>
          <div class="carousel-inner">
            <?php
            $z=1;
foreach ($pimage as $key) {
if ($z==1) {
echo '<div class="carousel-item active"><img style="height: 200px;" class="d-block w-100" src="'.$call_config->base_url().$key['path'].'" alt="slide '.$z.'" /></div>';
  }
  else
  {
echo '<div class="carousel-item"><img style="height: 200px;" class="d-block w-100" src="'.$call_config->base_url().$key['path'].'" alt="slide '.$z.'" /></div>'; 
  }
  $z++;
}
            ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
<h1><?= $product['name'] ?></h1>
<label class="float-left text-muted"><strike><?= $product['mrp'] ?></strike> ₹/<?= $unit['unit'] ?></label>
<label class="float-right"><?= $product['selling_price']+$tax_amt ?> ₹/<?= $unit['unit'] ?><br><b style="font-size:10px;" class="text-success"><?= $off_percent ?></label>
  <hr>
  <div id="collapsable_row" style="overflow: hidden;height: auto;" class="row p-3">
    <h3>Product Details:-</h3>
    <table class="table table-bordered table-hover">
      <?php
if ($product['key_features']!=null ||$product['key_features']!="" ) {
      ?><tr>
        <th style="font-size: 10px;">Key Features:</th>
        <td style="font-size: 10px;"><?= wordwrap($product['key_features'],15,"<br>"); ?></td>
      </tr><?php
}
      ?>
      <?php
if ($product['quantitty']!=null ||$product['quantitty']!="" ) {
  ?>
      <tr>
        <th style="font-size: 10px;">Quantity:</th>
        <td style="font-size: 10px;"><?= wordwrap($product['quantitty'],15,"<br>"); ?></td>
      </tr>
  <?php
}
      ?>
       <?php
if ($product['shelf_life']!=null ||$product['shelf_life']!="" ) {
  ?>
        <tr class="hidable" style="display: none;">
        <th style="font-size: 10px;">Shelf Life:</th>
        <td style="font-size: 10px;"><?= wordwrap($product['shelf_life'],15,"<br>"); ?></td>
      </tr>
  <?php
}
      ?>
       <?php
if ($product['mfg_details']!=null ||$product['mfg_details']!="") {
 ?>
      <tr class="hidable" style="display: none;">
        <th style="font-size: 10px;">MFG Info:</th>
        <td style="font-size: 10px;"><?= wordwrap($product['mfg_details'],15,"<br>"); ?></td>
      </tr>
  <?php
}
      ?>
       <?php
if ($product['seller']!=null ||$product['seller']!="" ) {
  ?>
<tr class="hidable" style="display: none;">
        <th style="font-size: 10px;">Seller Info:</th>
        <td style="font-size: 10px;"><?= wordwrap($product['seller'],15,"<br>"); ?></td>
      </tr>
  <?php
}
      ?>
       <?php
if ($product['disclaimer']!=null ||$product['disclaimer']!="" ) {
  ?>
      <tr class="hidable" style="display: none;">
        <th style="font-size: 10px;">Disclaimer:</th>
        <td style="font-size: 10px;"><?= wordwrap($product['disclaimer'],15,"<br>"); ?></td>
      </tr>
  <?php
}
      ?>
    </table>
  </div>
  <button id="collapsable_btn" class="btn text-primary btn-neutral col-xl-12" onclick="show_more()">View More</button>
<script type="text/javascript">
  function collaspe_function() {
    $(".hidable").fadeOut(500);
    $("#collapsable_btn").html('Show More');
    $("#collapsable_btn").attr('onclick','show_more()');
  }
  function show_more() {
    $(".hidable").fadeIn(500);
    $("#collapsable_btn").html('Show Less');
    $("#collapsable_btn").attr('onclick','collaspe_function()');
  }
</script>
   <?php
if ($product['stock']<=0) 
{
  ?>
<button id="<?= base64_encode($product['id']) ?>" class="btn btn-danger mt-3" style="width: 100%;">OUT OF STOCK</button>
  <?php
}
else
{
  ?>
  <button onclick="add_to_cart(this.id)" id="<?= base64_encode($product['id']) ?>" class="btn btn-warning mt-3" style="width: 100%;" onclick="">ADD TO CART</button>
  <?php
}
?>
<script type="text/javascript">
function add_to_cart(argument) {
  //  alert(argument);
      $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/cart.php' ?>',
  type:'POST',
  data:{id:argument,action:"add"},
  success:function(data){
//alert(data);
var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
get_cart();
  }
});
  }
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
    $(document).ready(function(){
  get_cart();
});
</script>
</div>
<?php
}
else
{
$call_config->msg("Invalid!!","Invalid URL!!","info","user/dashboard/","");
}
?>


          </div>
        </div>
      </div>
    </div>
<?php
 include('../../../../public/user/v5_Footer.php');
?>
<script type="text/javascript">
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

function get_all()
{
$.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/get_cart.php' ?>',
  type:'POST',
  data:{action:"show"},
  success:function(data){
//    alert(data);
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
//    alert(data);
    $("#cart_tag").html(data);
  }
}); 
  }
</script>
<style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>
<div id="snackbar">Product Added Successfully!!</div>
