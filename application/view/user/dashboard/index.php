<?php
 include("../../../../config.php");
  if ($call_config->cookiecheck()) 
  {
$call_config->user_sess_checker();
$sess_data_var=$call_config->user_sess_data_bind();
$include='../../../../public/user/v3_TopNavBar_login.php';
}
 else
 {
     $include='../../../../public/user/v3_TopNavBar.php';
 }
 include('../../../../public/user/v1_HeadPart.php');
include('../../../../public/user/v2_sidebar.php');
include($include);
//   $result=$call_config->get("SELECT * FROM `tbl_user_master` WHERE `id`='".$sess_data_var['sess_adm_id']."'");

 include('v4_content.php');
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
//    alert(data);
    $("#cart_tag").html(data);
  }
}); 
  }
</script>