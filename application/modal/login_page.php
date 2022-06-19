<?php 
include('../../config.php');
$call_config = new config(); 
if(isset($_POST["submit"]))
{
	 $param1 = mysqli_escape_string($call_config->con,$_POST['_email']);
	 $password = mysqli_escape_string($call_config->con,$_POST['_password']);
	 $key = mysqli_escape_string($call_config->con,$_POST['_key']);
	if( $param1 != ''   || $param1 != null    || 
		$password != '' || $password != null  ||
		$key != ''      || $key != null       		
		)
	{
		switch($key)
		{
			case 1: // admin

				$str = "select * from tbl_admin_master where  email = '".$param1."' ";
				$res = $call_config->get($str);
				if(md5($password) == $res['password'])
				{
					// session_start();					
					$_SESSION['sess_adm_id']    = $res["id"];
					$_SESSION['sess_adm_name']  = $res["name"];
					$_SESSION['sess_adm_mobile']= $res["mobile"];
					$_SESSION['sess_adm_img'] = $res["image"];
$call_config->msg("Login Successfull!!","Login As Admin","success","admin/dashboard/","");

				}else{
					?>

					<script>alert("Invalid email or password admin...!")</script>

					<?php
					$res = $call_config->slient_session_flash();
				}
				break;				
			case 3: //user login code
			 if ($call_config->checkEmail($param1)) 
{
 	$column1="email";
 }
 else
 {
 	$column1="mobile";
 }
			    $str = "SELECT * FROM `tbl_customer_master` WHERE `".$column1."` = '".$param1."' and status = 1  ";
				$res = $call_config->get($str);
				if(md5($password) == $res['password'])
				{					
					$cookie=md5($password.uniqid());
					$cookie_pass=md5(uniqid());
					$_SESSION['sess_user_id']    = $res["id"];
					$_SESSION['sess_user_name']  = $res["first_name"]." ".$res['last_name'];
					$_SESSION['sess_user_email']= $res["email"];
    				$_SESSION['sess_user_mobile']=$res['mobile'];
    				$_SESSION['sess_user_image']=$res['image'];
  $insert="UPDATE `tbl_customer_master` SET `cookie`='".$cookie."',`cookie_pass`='".$cookie_pass."' WHERE `".$column1."`='".$param1."'";
  if ($call_config->IDU($insert)) {
  setcookie("grocer_cookie", $cookie, time() + (86400 * 30), "/");
  setcookie("cookie_pass", $cookie_pass, time() + (86400 * 30), "/");
  $call_config->msg("Login Successfull!!","Login As Customer","success","user/dashboard/","");
//  echo '<html>
 // <body>
//<script src="../../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  //  <script src="../../app-assets/vendors/js/extensions/sweetalert2.all.js" type="text/javascript"></script>
//    <script>
  //    swal("Login Successfully..!!","User Login Successfull!!","success",{button: "waas",})
    //  .then((value)=>{
     //   window.location.href="'.$call_config->base_url().'application/modal/set_cookies.php";
     // })
    //</script></body></html>';
  }					
}
else
{
					?><script>alert("Invalid email or password...!")</script><?php
					$res = $call_config->slient_session_flash();
}				
			break;
			default: // default
				?><script>alert("=> Invalid email or password...!")</script><?php
					$res = $call_config->slient_session_flash();
		}

	}else{

	}



}else{
	?><script>alert("not submited...!")window.location = "<?php echo $call_config->base_url(); ?>application/view/admin/inc/index.php";</script><?php
}


?>