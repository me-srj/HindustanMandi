 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<?php
if (isset($_GET['search_key'])) {
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-12 col-12">
<form method="GET" action="<?= $call_config->base_url()?>application/view/user/dashboard/">
<input required autocomplete="OFF" style="width: 80%;height: 40px;" id="search_key" type="search" name="search_key"  value="<?= $_GET['search_key'] ?>" placeholder="Search..." class="form-control float-left form-group">
<button style="width: 19%;height: 40px;" class="btn btn-neutral float-right btn-sm"><i class="fas fa-search"></i></button>
</form> 
            </div>
<ul id="searchResult" style="display: none;list-style: none;margin-top: -25px;max-height: 200px;overflow-x: auto;" class="col-lg-12 col-12"></ul> 
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
$count_p=0;
$result=$call_config->get_all("SELECT * FROM `tbl_product_master` WHERE `name` LIKE '%".$_GET['search_key']."%' OR `description` LIKE '%".$_GET['search_key']."%' AND `status`='1' ORDER BY `con` DESC");
	foreach ($result as $key) {
		$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$key['unit']."'");
		$Productimage=$call_config->get("SELECT * FROM `tbl_product_image_master` WHERE `pid`='".$key['id']."'");
		$sub_cat=$call_config->get("SELECT * FROM `tbl_sub_category_master` WHERE `id`='".$key['sub_category_id']."'");
		$category=$call_config->get("SELECT * FROM `tbl_category_master` WHERE `id`='".$sub_cat['category_id']."'");
		$tax_amt=($key['selling_price']/100)*$category['tax_value_percent'];
    $off_percent=number_format((($key['mrp']- $key['selling_price']+$tax_amt) * 100) / $key['mrp'],2);
     $off_percent_value=($key['mrp']-$key['selling_price']+$tax_amt)*100;
      $off_percent1=number_format($off_percent_value/$key['mrp'],2)."% OFF";
      $saved=$key['mrp']-$key['selling_price'];
      $off_percent="Save ".$saved." ₹/".$off_percent1;
        ?>
<div class="col-xl-12 btn p-0">
<a href="<?php echo $call_config->base_url() ?>application/view/user/view_product/?id=<?= base64_encode($key['id']) ?>">
<img src="<?= $call_config->base_url().$Productimage['path'] ?>" style="width:45%;height:150px" class="float-left" />
  <div class="float-right mt-2" style="text-align: left;width: 50%;">
  <b ><?= $key['name'] ?></b><br><br>
  <p class="text-muted" style="font-size: 10px;"><?= $key['quantitty'] ?></p>
  <b><?= $key['selling_price']+$tax_amt?> ₹/<?= $unit['unit'] ?></b><br>
  <s class="text-muted"><?= $key['mrp'] ?></s>&nbsp;<b class="text-success"><?= $off_percent ?></b> 
  </div>
</a>
<?php
if ($key['stock']<=0) 
{
  ?>
<button id="<?= base64_encode($key['id']) ?>" class="btn btn-danger mt-3" style="width: 100%;" onclick="">OUT OF STOCK</button>
  <?php
}
else
{
  ?>
  <button onclick="add_to_cart(this.id)" id="<?= base64_encode($key['id']) ?>" class="btn btn-warning mt-3" style="width: 100%;" onclick="">ADD TO CART</button>
  <?php
}
?>
</div>
</a>
<?php		
	$count_p++;
  }
if ($count_p==0) {
 echo '<div class="col-xl-12 btn text-primary">Sorry No Products Found.</div>';
}

?>
</div>
          </div>
        </div>
       
      </div>
    </div>
<?php	
}
else
{
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row pb-2">
            <div class="col-lg-12 col-12">
              <form method="GET" action="<?= $call_config->base_url()?>application/view/user/dashboard/">
<input required autocomplete="OFF" style="width: 80%;height: 40px;" id="search_key" type="text" name="search_key" placeholder="Search..." class="form-control float-left form-group typeahead">
 <button style="width: 19%;height: 40px;" type="submit" class="btn float-right btn-neutral btn-sm"><i class="fas fa-search"></i></button>             </form>
            </div>
<ul id="searchResult" style="display: none;list-style: none;margin-top: -25px;max-height: 200px;overflow-x: auto;" class="col-lg-12 col-12"></ul> 
          </div>
        </div>
      </div>
    </div>
  <div id="carouselExampleIndicators" class="carousel slide mt--7" data-ride="carousel">
    <?php
$count=$call_config->get("SELECT COUNT(*) as total FROM `tbl_banner_master`");
$banner=$call_config->get_all("SELECT * FROM `tbl_banner_master`");
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
foreach ($banner as $key) {
  if ($key['type']==0) {
    $link=$call_config->base_url().'application/view/user/dashboard/?search_key='.$key['keyword'];
  }
  else
  {
    $link=$call_config->base_url()."application/view/user/dashboard/search_by_cat.php?id=".base64_encode($key['type']);
  }
if ($z==1) {
echo '<div class="carousel-item active"><a href="'.$link.'"><img style="height: 200px;" class="d-block w-100" src="'.$call_config->base_url().$key['image'].'" alt="slide '.$z.'" /></a></div>';
  }
  else
  {
echo '<div class="carousel-item"><a href="'.$link.'"><img style="height: 200px;" class="d-block w-100" src="'.$call_config->base_url().$key['image'].'" alt="slide '.$z.'" /></a></div>'; 
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
<div class="card m-0">
  <img style="width:100%;height:150px;" src="<?= $call_config->base_url() ?>app-assets/banner.jpg">
</div>
  <?php
$message=$call_config->get_all("SELECT * FROM `tbl_message_master`");
foreach ($message as $key) {
 ?>
 <div class="card m-0">
  <div class="col-xl-12 btn p-3 text-center">
    <h3 class="text-primary"><?php echo $key['head'] ?></h3>
    <p class="text-muted" style="font-size: 9px;"><?= $key['body'] ?></p>
    <p class="float-right" style="font-size: 7px;">
      <i class="text-muted">By,</i>
    <?= $key['designation'] ?></p>
  </div>
</div>
 <?php
}
  ?>
<div class="card mt--4">
  <?php
if (isset($sess_data_var['sess_user_id'])) {
  
  ?>
<div class="col-xl-12 align-items-center">
  <button class="btn btn-neutral float-left" style="width: 48%;font-size: 20px;" data-toggle="modal" data-target="#camera_order" ><i class="ni ni-camera-compact">&nbsp;<i style="font-size: 14px;">*Take a snap</i></i></button>
  <button class="btn btn-neutral float-right" style="width: 48%;font-size: 20px;" data-toggle="modal" data-target="#message_order" ><i class="ni ni-single-copy-04"><i style="font-size: 14px;">*Create your list</i></i></button>
  </div>
  <!--code for modal starts here-->
<?php 
$address_count=$call_config->get("SELECT COUNT(*) as total FROM `tbl_address_master` WHERE `cid`='".$sess_data_var['sess_user_id']."' AND `status`='1'")
?>
                  <!--camera order starts model starts-->
<div class="modal fade text-left" id="camera_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-primary">
<h4 class="modal-title text-white" id="myModalLabel17">Image Order</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php
if ($address_count['total']>0) {
  ?>
<form class="form form-horizontal p-5 needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url()."application/modal/user/place_image_order.php"; ?>">
<div class="row"><b class="col-lg-12 alert alert-info">Click a picture or upload one, after that we will get to you with a order list...</b></div>
<div class="row">
   <div class="col-md-4">
  <center><img id="profile-img-tag" style="width:100px; height:100px" class="image" /></center>
  </div>
  <div class="col-md-4 text-center">
    <label style="font-size: 60px;" for="photo"><i class="ni ni-camera-compact"></i></label>
    <input required style="display: none;" type="file" id="photo" onchange="readURL(this)" name="image" hidden accept="image/*;capture=camera">
    <b class="alert-success alert row text-white" style="display: none;" id="success_image"><center>Image Selected!</center></b>
    <b class="alert alert-primary text-white row" id="select_image"><center>Please Select An Image!</center></b>
    <br>
  </div>
  <div class="col-md-4">
        <label>Select Address</label><br>
    <?php
$address=$call_config->get_all("SELECT * FROM `tbl_address_master` WHERE `cid`='".$sess_data_var['sess_user_id']."' AND `status`='1'");
foreach ($address as $key) {
echo "<div style='width:100%;' class='btn btn-secondary'><input class='float-left' type='radio' required='' value='".$key['id']."' name='address'>  ".$key['address']." ".$key['pin_code']." ".$key['city']." ".$key['state']." ".$key['mobile']."</div>";
}
     ?>
  </div>
  <div class="col-md-4">
<center><input type="submit" class="btn btn-primary mt-3" name="submit" value="Place Order!!"></center>
</div>
                        </div>
<br>
<div class="row"><b class="col-lg-12 alert alert-info">If you are having problem while uploading images please WhatsApp us the list/Image, after that we will get to you with a order list...</b></div>
  </form>
  <?php
}
else
{
  echo "<a class='btn btn-warning m-3' href='".$call_config->base_url()."application/view/user/profile/address.php'>Add Address First!!</a>";
}
?>
</div>
</div>
</div>
<!--code for message order starts-->
<div class="modal fade text-left" id="message_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-primary">
<h4 class="modal-title text-white" id="myModalLabel17">Message Order</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php
if ($address_count['total']>0) {
  ?>
  <form class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url()."application/modal/user/place_message_order.php"; ?>">
<div class="row p-5">
  <b class="col-lg-12 alert alert-info">Describe your list and we will get to you after a while after creating an order as your list...</b>
  <div class="col-md-6">
    <label class="text-muted">Enter Your Message Order Here:-</label>
<textarea style="width: 100%;" placeholder="Enter Your Message Here..." class="form-control form-group" name="message"></textarea>
  </div>
   <div class="col-md-6">
    <label>Select Address</label><br>
    <?php
$address=$call_config->get_all("SELECT * FROM `tbl_address_master` WHERE `cid`='".$sess_data_var['sess_user_id']."'  AND `status`='1'");
foreach ($address as $key) {
  echo "<div style='width:100%;' class='btn btn-secondary'><input class='float-left' type='radio' required='' value='".$key['id']."' name='address'>  ".$key['address']." ".$key['pin_code']." ".$key['city']." ".$key['state']." ".$key['mobile']."</div>";
}
     ?>
  </div>
  <div class="col-md-6">
    <center><input type="submit" class="btn btn-primary mt-5" name="submit"></center>
  </div>
</div>
                        </form>
  <?php
}
else
{
  echo "<a class='btn btn-warning m-3' href='".$call_config->base_url()."application/view/user/profile/address.php'>Add Address First!!</a>";
}
?>
</div>
</div>
</div>
  <!--code for modal ends here-->

<?php
}
else
{
 ?>
<div class="col-xl-12 align-items-center p-2">
<a class="btn btn-warning float-left" style="width: 48%;" data-dismiss="modal" data-toggle="modal" data-target="#login_model" href="">Login!</a>
<a href="#" class="btn btn-neutral float-right" style="width: 48%;" data-dismiss="modal" data-target="#register_model" data-toggle="modal">Register!</a>
</div>
 <?php
}

  ?>
  </div>
  <?php
$offer=$call_config->get_all("SELECT * FROM `tbl_offer_master`");
foreach ($offer as $key) {
  if ($key['type']=="0") {
    ?>
<a class="card mt--4" href="<?= $call_config->base_url().'application/view/user/dashboard/?search_key='.$key['keyword'] ?>">
  <div class="col-xl-12 btn text-left">
  <img class="float-left mr-4" src="<?= $call_config->base_url().$key['image'] ?>" style="width: 40%;height:100px" >
        <b class="text-success"><?= $key['off_text'] ?></b><br>
        <b class=""><?= $key['title'] ?></b><br>
        <p class="text-muted" style="font-size: 11px;"><?= chunk_split($key['description'], 25,"<br>") ?></p>
  </div>
</a>
    <?php
  }
  else
  {
?>

<a class="card mt--4" href="<?= $call_config->base_url()."application/view/user/dashboard/search_by_cat.php?id=".base64_encode($key['type']) ?>">
  <div class="col-xl-12 btn text-left">
        <img class="float-left mr-4" src="<?= $call_config->base_url().$key['image'] ?>" style="width: 40%;height: 100px;" >
        <b class="text-success"><?= $key['off_text'] ?></b><br>
        <b class=""><?= $key['title'] ?></b><br>
        <p style="font-size: 11px;" class="text-muted"><?= chunk_split($key['description'],25,"<br>") ?></p>
  </div>
</a>
<?php
  }
}
  ?>
<?php
if (isset($sess_data_var['sess_user_id'])) {
$recent=$call_config->get_all("SELECT * FROM `tbl_recent_view_master` WHERE `cid`='".$sess_data_var['sess_user_id']."' order by `id` DESC");
$rtotal=sizeof($recent);
if ($rtotal>0) {
  echo "<div class='card p-2' style='color:#5e72e4;'><b>Recent Views</b><br><div style='max-height:250px;overflow-x: auto;overflow-y: hidden;white-space: nowrap;'><i style='font-size:30px;' class='ni ni-bold-right'></i>";
 foreach ($recent as $key) {
    $key['pid']."<br>";
    ?>
      <div class="btn" style="display: inline-block;border: 1px solid;">
<?php
$count_p=0;
$result=$call_config->get_all("SELECT * FROM `tbl_product_master` WHERE `id`='".$key['pid']."' and `status`='1'");
  foreach ($result as $key) {
    $unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$key['unit']."'");
    $Productimage=$call_config->get("SELECT * FROM `tbl_product_image_master` WHERE `pid`='".$key['id']."'");
    $sub_cat=$call_config->get("SELECT * FROM `tbl_sub_category_master` WHERE `id`='".$key['sub_category_id']."'");
    $category=$call_config->get("SELECT * FROM `tbl_category_master` WHERE `id`='".$sub_cat['category_id']."'");
    $tax_amt=($key['selling_price']/100)*$category['tax_value_percent'];
    $off_percent=number_format((( $key['selling_price']+$tax_amt - $key['mrp']) * 100) / $key['mrp'],2);
    $off_percent_value=($key['mrp']-$key['selling_price']+$tax_amt)*100;
      $off_percent1=number_format($off_percent_value/$key['mrp'],2)."% OFF";
      $saved=$key['mrp']-$key['selling_price'];
      $off_percent="Save ".$saved." ₹/".$off_percent1;
        ?>
<a class="p-2" href="<?php echo $call_config->base_url() ?>application/view/user/view_product/?id=<?= base64_encode($key['id']) ?>">
<img src="<?= $call_config->base_url().$Productimage['path'] ?>" style="width:40%;height:130px" class="float-left" />
  <div class="float-right" style="text-align: left;width: 50%;">
  <p><b><?= wordwrap($key['name'],15,"<br>\n");  ?></b></p>
  <p class="text-muted" style="font-size: 10px;"><?= $key['quantitty'] ?></p>
  <b><?= $key['selling_price']+$tax_amt?> ₹/<?= $unit['unit'] ?></b>
  <s class="text-muted"><?= $key['mrp'] ?></s><br>&nbsp;<b class="text-success"><?= $off_percent ?></b> 
  </div>
</a>
<?php   
  $count_p++;
  }
?>
</div>
    <?php
 }
 ?>
</div>
</div>
 <?php
}
}
?>  
<div class="card">
  <img src="<?= $call_config->base_url() ?>app-assets/banner_service.jpg">
</div>
<?php
}
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

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
                $("#select_image").hide();
                $("#success_image").slideDown();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
     $(document).ready(function(){

            $("#search_key").keyup(function(){
                var search = $(this).val();
                $("#searchResult").show();
                if(search != "" && search!=null){

                    $.ajax({
                        url: '<?php echo $call_config->base_url()  ?>application/modal/user/search_product.php',
                        type: 'post',
                        data: {key:search},
                        dataType: 'json',
                        success:function(response){
                         // alert(response);
                            var len = response.length;
                            $("#searchResult").empty();
                            for( var i = 0; i<len; i++){
                                var id = btoa(response[i]['id']);
                                var name = response[i]['name'];
                                var quantitty=response[i]['quantitty'];
                                if (id=="#") 
                                {
                                  $("#searchResult").append("<li class='alert alert-neutral m-0' style='width:100%;border:none;border-radius:0px;' >No Product Found.</li>");
                                }
                                else
                                {
$("#searchResult").append("<a href='<?php echo $call_config->base_url() ?>application/view/user/view_product/?id="+id+"'><li class='alert alert-neutral m-0' style='width:100%;border:none;border-radius:0px;' value='"+id+"'>"+name+"("+quantitty+")</li></a>");
                                }
                            }

                            // binding click event to li
                            $("#searchResult li").bind("click",function(){
                                setText(this);
                            });


                        }
                    });
                }
                else
                {
                  $("#searchResult").html("");
                }

            });
        });
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
</script>