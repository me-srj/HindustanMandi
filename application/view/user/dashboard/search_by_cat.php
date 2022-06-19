<?php
 include("../../../../config.php");
if (isset($_GET['id'])) {
$id=base64_decode(mysqli_escape_string($call_config->con,$_GET['id']));
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
          <div class="row pb-2">
            <div class="col-lg-12 col-12">
            </div> 
<ul id="searchResult" style="display: none;list-style: none;margin-top: -25px;max-height: 200px;overflow-x: auto;" class="col-lg-12 col-12"></ul> 
          </div>
        </div>
      </div>
    </div>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
<div id="table_responsive_div" class="row p-3">
<?php
$count_p=0;
	$result=$call_config->get_all("SELECT * FROM `tbl_product_master` WHERE `sub_category_id`='".$id."' AND `status`='1' ORDER BY `con` DESC");
	foreach ($result as $key) {
		$unit=$call_config->get("SELECT * FROM `tbl_product_unit_master` WHERE `id`='".$key['unit']."'");
		$Productimage=$call_config->get("SELECT * FROM `tbl_product_image_master` WHERE `pid`='".$key['id']."'");
		$sub_cat=$call_config->get("SELECT * FROM `tbl_sub_category_master` WHERE `id`='".$key['sub_category_id']."'");
		$category=$call_config->get("SELECT * FROM `tbl_category_master` WHERE `id`='".$sub_cat['category_id']."'");
		$tax_amt=($key['selling_price']/100)*$category['tax_value_percent'];
    $off_percent_value=($key['mrp']-$key['selling_price']+$tax_amt)*100;
      $off_percent1=number_format($off_percent_value/$key['mrp'],2)."% OFF";
      $saved=$key['mrp']-$key['selling_price'];
      $off_percent="Save ".$saved." ₹/".$off_percent1;
?>
<div class="col-xl-12 p-0">
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

<script type="text/javascript">
	function add_to_cart(argument) {
	//	alert(argument);
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
//  	alert(data);
		$("#cart_tag").html(data);
  }
});	
	}
	$(document).ready(function(){
  get_cart();
});
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

<?php
 include('../../../../public/user/v5_Footer.php');

}
else
{
	$call_config->msg("Error!!","Invalid URL","error","user/dashboard/");
}

?>
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
