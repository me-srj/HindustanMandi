<?php
include('../../config.php');
if (isset($_SESSION['sess_user_id'])) {
	 $str = "SELECT * FROM `tbl_customer_master` WHERE `id` = '".$_SESSION['sess_user_id']."' and status = '1'";
	$res = $call_config->get($str);
	$cookie=md5($res['password'].uniqid());
	$cookie_pass=md5(uniqid());
$insert="UPDATE `tbl_customer_master` SET `cookie`='".$cookie."',`cookie_pass`='".$cookie_pass."' WHERE `id`='".$_SESSION['sess_user_id']."'";
  if ($call_config->IDU($insert)) {
  setcookie("grocer_cookie", $cookie, time() + (86400 * 30), "/");
  setcookie("cookie_pass", $cookie_pass, time() + (86400 * 30), "/");
  die;
?>
<script type="text/javascript">
	window.location.href="<?php echo $call_config->base_url() ?>application/view/user/dashboard/";
</script>
<?php
}
}
else
{
    die;
	?>
<script type="text/javascript">
	window.location.href="<?php echo $call_config->base_url() ?>application/view/user/dashboard/";
</script>
<?php
}
?>