<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">My Orders</h6>
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
        
<!-- BEGIN: Page JS-->
    <script src="<?php echo $call_config->base_url() ?>app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
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
<!--code for table starts here-->

  <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         <div class="row p-3">
           <div class="col-md-4"></div>
           <div class="col-md-4"></div>
           <div class="col-md-4">
             <select class="form-control" name="select_type" onchange="change_table_name(this.value)">
               <optgroup>
                <option value="" selected="" disabled="">--Select Type Of Order--</option>
                <option value="tbl_parent_order_master">Normal Orders</option>
                 <option value="tbl_image_order_master">Image Orders</option>
                 <option value="tbl_message_order_master">Message Orders</option>
               </optgroup>
             </select>
               <input type="text" name="table_name" id="table_name" hidden="">
               <input type="number" name="last_record_number" id="last_record_number" hidden value="0">
           </div>
         </div>
<div id="table_responsive_div" class="row p-3">
    <div class="col-xl-12 btn text-center btn-neutral">Please Select Order Type</div>
<!-- <div class="col-xl-12 pr-3 pl-3 btn">
  <p class="float-left">Order No:</p><b class="float-right">#12345673</b><br><br>
  <img src="<?= $call_config->base_url() ?>" style="width:100%; height:150px" class="img-thumbnail" /><br><br>
  <b class="float-left text-muted" style="font-size: 20px;">this date,</b><a href="#" class="btn btn-secondary float-right">View All</a>
</div> -->
</div>
          </div>
        </div>
       
      </div>
    </div>

<!--code for table ends here-->
<script type="text/javascript">
  function load_more_rows()
  {
    tbl_name=$("#table_name").val();
    last_record=$("#last_record_number").val();
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/get_orders_raw.php' ?>',
  type:'POST',
  data:{tbl_name:tbl_name,last_record:last_record},
  success:function(data){
//alert(data);
obj = JSON.parse(data);
$("#last_record_number").val(obj['last_record']);
$('#table_responsive_div').append(obj['html_data']);
  }
});
  }
  function load_more() {
  $("#load_more_btn").remove();
  load_more_rows();
 }
  function change_table_name(argument) {
   // alert(argument);
   $("#last_record_number").val(0);
   $("#table_name").val(argument);
   load_rows();
  }
  function load_rows()
  {
    tbl_name=$("#table_name").val();
    last_record=$("#last_record_number").val();
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/get_orders_raw.php' ?>',
  type:'POST',
  data:{tbl_name:tbl_name,last_record:last_record},
  success:function(data){
//alert(data);
obj = JSON.parse(data);
$("#last_record_number").val(obj['last_record']);
$('#table_responsive_div').html(obj['html_data']);
  }
});
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
  get_cart();
   tbl_name="tbl_parent_order_master";
    last_record=$("#last_record_number").val();
       $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/get_orders_raw.php' ?>',
  type:'POST',
  data:{tbl_name:tbl_name,last_record:last_record},
  success:function(data){
//alert(data);
obj = JSON.parse(data);
$("#last_record_number").val(obj['last_record']);
$('#table_responsive_div').html(obj['html_data']);
  }
});
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