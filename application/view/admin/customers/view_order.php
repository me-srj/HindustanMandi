<?php
 include("../../../../config.php");
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
if (isset($_GET['id'])) {
$order_id=$_GET['id'];
$result=$call_config->get("SELECT * FROM `tbl_admin_master` WHERE `id`='".$sess_data_var['sess_adm_id']."'");
include('../../../../public/admin/v1_HeadPart.php');
include('../../../../public/admin/v2_sidebar.php');
 include('../../../../public/admin/v3_TopNavBar.php');
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body"> 
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"><b>Order ID:</b>#<?= $order_id ?></h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"></a></li>
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
<input type="number" name="last_record_number" id="last_record_number" hidden value="10">
<input type="number"  id="order_id" value="<?= $order_id ?>" hidden name="">
<div id="table_responsive_div" class="row">
<?php
$total=0;
$subo=$call_config->get_all("SELECT * FROM `tbl_child_order_master` WHERE `pid`='".$order_id."' ORDER BY `con`");
foreach ($subo as $key) {
  $total=$total+$key['amount'];
$prod=$call_config->get("SELECT * FROM `tbl_product_master` WHERE `id`='".$key['proid']."'");
$pimage=$call_config->get("SELECT * FROM `tbl_product_image_master` WHERE `pid`='".$prod['id']."' ORDER BY `con` ");
$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$prod['unit']."'");
?>
<div class="col-sm-12 btn mt-3">
	<p class="float-left" style="text-align: left;"><?= $prod['name'] ?> X (<?= $key['items'] ?>)<br>Price:₹<?= $key['uamount'] ?>/<?= $unit['unit'] ?><br>Total:<b><?= $key['amount'] ?>₹</b></p>
  	<img class="img-thumbnail float-right" src="<?= $call_config->base_url().$pimage['path']?>" style="width:100px; height:100px"  /><br>
  </div>
<?php
}
?>
<div class="col-sm-12 btn mt3">
  Total:<?php
if ($total>299) {
  echo $total." + Free Delivery!";
}
else
{
  echo ($total+25)." 25 For Delivery";
}
    ?>
</div>
          </div>
        </div>
<div id="recipt_div"  class="row">
  <?php
  $porder=$call_config->get("SELECT * FROM `tbl_parent_order_master` WHERE `id`='".$order_id."'");
  $customer=$call_config->get("SELECT * FROM `tbl_customer_master` WHERE `id`='".$porder['cid']."'");
  $address=$call_config->get("SELECT * FROM `tbl_address_master` WHERE `id`='".$porder['addressid']."'");
?>
<div class="col-xl-12">
  <b class="float-left">Order No:</b><?= $porder['id'] ?>
  <time class="float-right"><?= date("d-M-Y", strtotime($porder['con'])) ?></time><b class="float-right">On:</b>
  <br>
  <div class="float-left">
    <b>Sold By</b><br><p>
    Hindustan Mandi
      <br>
      Sharkari mandi,Chapra,841301
    </p>
  </div>
  <div class="float-right">
    <b>Shipping/Billing Address</b><br>
    <?= $customer['first_name']." ".$customer['last_name'] ?><br>
    <?= $address['id'].$address['pin_code']."<br>".$address['city'].",".$address['state'].",".$address['mobile'] ?>
  </div>
</div>
<div class="col-xl-12 table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr><th>S.No</th>
        <th>Product</th>
        <th>Discount</th>
        <th>Unit Amount <b>X</b> Quantity</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
       $total_amount=0;
foreach ($subo as $key) {
$prod=$call_config->get("SELECT * FROM `tbl_product_master` WHERE `id`='".$key['proid']."'");
$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$prod['unit']."'");
$sub_cat=$call_config->get("SELECT * FROM `tbl_sub_category_master` WHERE `id`='".$prod['sub_category_id']."'");
$category=$call_config->get("SELECT * FROM `tbl_category_master` WHERE `id`='".$sub_cat['category_id']."'");
$tax_amt=($prod['selling_price']/100)*$category['tax_value_percent'];
$off_percent=number_format((( $prod['selling_price']+$tax_amt - $prod['mrp']) * 100) / $prod['mrp'],2);
$off_percent_value=($prod['selling_price']+$tax_amt-$prod['mrp'])*100;
if ($off_percent_value>0) {
      $off_percent=number_format($off_percent_value/$prod['mrp'],2)."% OFF";
    }
    else
    {
      $saved=$prod['mrp']-$prod['selling_price'];
      $off_percent="Saved ".$saved." ₹";
    }
?>
<tr><td><?= $i++; ?></td>
<td><?= $prod['name']." (".$prod['quantitty'].")" ?></td>
<td><?= $off_percent ?></td>
<td><?= $key['uamount']."<b> X </b>(".$key['items'].")" ?></td>
<td><?= $key['amount'] ?></td></tr>
<?php
$total_amount=$total_amount+$key['amount'];
}
if ($porder['flat_off']=="0") {
  $offed_amount=$total_amount;
  $amount_string=$total_amount;
}
else
{
  $off=($total_amount/100)*$porder['flat_off'];
  $offed_amount=($total_amount-$off);
  $amount_string="<s>".$total_amount."</s><b class='text-success'> ".$porder['flat_off']."% Off</b>= ".$offed_amount;
}
if ($offed_amount>299) {
  ?>
<tr><td colspan="0">Total:</td><td colspan="3"><?= $amount_string." ₹ + Free Delivery" ?></td></tr>
  <?php
}
else
{
 ?>
<tr><td colspan="0">Total:</td><td colspan="2"><?= $amount_string." + 25 ₹ Delivery Charge" ?></td><td colspan="4"><?= $total_amount+25 ?>₹</td></tr>
  <?php 
}
  ?>
    </tbody>
  </table>
</div>
</div>
<center><button onclick="print_div()" class="btn btn-info mb-4">Print</button></center>
      </div>
    </div>
    <script type="text/javascript">
      function print_div() {
 var html="<html>";
   html+= document.getElementById("recipt_div").innerHTML;

   html+="</html>";

   var printWin = window.open('size=auto,margin=0');
   printWin.document.write(html);
   printWin.document.close();
   printWin.focus();
   printWin.print();
   printWin.close();
      }
    </script>
<?php
 include('../../../../public/admin/v5_Footer.php');
}
else
{
$call_config->msg("Failed!!","Invalid URL!!","error","user/dashboard/","");
}

?>