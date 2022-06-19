<?php 
session_start();
class config{

	  public  $localhost = "localhost";
      public  $user = "hindusta_admin";
	  public  $password = ";xrHBZAfDg@Q";
	  public  $dbname = "hindusta_grocer";
	  public  $con;

	function __construct()
	{	   	
	    date_default_timezone_set('Asia/Kolkata');
	   $this->con =  mysqli_connect($this->localhost,$this->user,$this->password,$this->dbname); 
	   if($this->con != true)
		{
			echo "Database is not connected.<br>";
		echo	mysqli_connect_error();
			exit();	
		}
	} 
	public function base_url()
	{ 
		
		$set_base_url = "/";                                            
		$server_host = "https://".$_SERVER['HTTP_HOST']."";
		$final_base_url =  $server_host.$set_base_url;
		return $final_base_url;
	}
	public function send_otp($mobile,$otp)
{
      // Send the GET request with cURL
$ch = curl_init('https://www.fast2sms.com/dev/bulk?authorization=6LJxVtjNwz4lZbT1oGmHka8cuIDW2hQYBOpE5Uey7PACrsMnXKOgBoLsSdNmwFqjhWceaX6CEPVzlbI4&sender_id=FSTSMS&language=english&route=qt&numbers='.$mobile.'&message=31105&variables={BB}&variables_values='.$otp);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

}
	public function send_sms($mobile,$mess)
{
        $no = urlencode('+91'.$mobile);
    $mess = rawurlencode($mess);
      // Send the GET request with cURL
    $ch = curl_init('https://www.fast2sms.com/dev/bulk?authorization=6LJxVtjNwz4lZbT1oGmHka8cuIDW2hQYBOpE5Uey7PACrsMnXKOgBoLsSdNmwFqjhWceaX6CEPVzlbI4&sender_id=FSTSMS&message='.$mess.'&language=english&route=p&numbers='.$mobile);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

}
function checkEmail($email) 
{
   $find1 = strpos($email, '@');
   $find2 = strpos($email, '.');
   return ($find1 !== false && $find2 !== false && $find2 > $find1);
}
public function msg($alert,$msg,$type,$path,$path2)
{
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script src='<?php echo $this->base_url() ?>app-assets/vendors/js/vendors.min.js' type='text/javascript'></script>
	<script src='<?php echo $this->base_url() ?>app-assets/vendors/js/extensions/sweetalert2.all.js' type='text/javascript'></script>
	<script>
	swal('<?= $alert;?>','<?= $msg;?>','<?= $type;?>',{button: 'Okay',})
       .then((value)=>{
         window.location='<?= $this->base_url(); ?>application/view/<?= $path.$path2;?>';
       })
    </script>
</body>
</html>
    <?php 

}
public function getuniquestring()
{
	$generatorstringaafff="1234567890";
	$sgddg = "";  
    for ($aaaagg = 1; $aaaagg <= 4; $aaaagg++) { 
        $sgddg .= substr($generatorstringaafff, (rand()%(strlen($generatorstringaafff))), 1); 
    } 
    return uniqid().$sgddg;
}
public function jsontoarray($json)
{
return json_decode($json);
}
public function arraytojson($array)
{
return json_encode($array);
}
 public function session_flash() 
 { 
    
 	session_destroy();
 	?>

 	<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<script src='<?php echo $this->base_url() ?>app-assets/vendors/js/vendors.min.js' type='text/javascript'></script>
	<script src='<?php echo $this->base_url() ?>app-assets/vendors/js/extensions/sweetalert2.all.js' type='text/javascript'></script>
	<script>
	swal('Login First!!','Please Login First!!','info',{button: 'Okay',})
       .then((value)=>{
         window.location='<?= $this->base_url(); ?>index.html';
       })
    </script>
</body>
</html>
 	<?php
 }

 public function slient_session_flash()
 {
 	
 	session_destroy();
 	?><script>
 		window.location = "<?php echo $this->base_url(); ?>index.html";
 	</script>
 	<?php
 }
 

 public function adm_sess_data_bind()
 {
     
			$sess_admin = array(
				        'sess_adm_id' =>$_SESSION['sess_adm_id'] ,
				        'sess_adm_name'=>$_SESSION['sess_adm_name'],
				        'sess_adm_mobile'=>$_SESSION['sess_adm_mobile'],
				        'sess_adm_img'=>$_SESSION['sess_adm_img']
			            );
			return $sess_admin;
				
 }
 public function admin_sess_checker()
 {

 	if($_SESSION['sess_adm_id'] != '' || $_SESSION['sess_adm_id'] != null)
 	{
 		$sql = "select * from tbl_admin_master where id = '".$_SESSION['sess_adm_id']."' ";
 		$res = $this->get($sql);
 		if($res['name'] != $_SESSION['sess_adm_name'] || $res['mobile'] != $_SESSION['sess_adm_mobile'])
 		{
 		   $this->session_flash();
 		   die;
 		}
 	}else{
 		$this->session_flash();
 		die;
 	}

 }

 public function user_sess_data_bind()
 {

			$sess_acc = array(
				        'sess_user_id' =>$_SESSION['sess_user_id'] ,
				        'sess_user_name'=>$_SESSION['sess_user_name'],
				        'sess_user_email'=>$_SESSION['sess_user_email'],
				        'sess_user_mobile'=>$_SESSION['sess_user_mobile'],
				        'sess_user_image'=>$_SESSION['sess_user_image']
			            );
			return $sess_acc;
				
 }
  public function user_sess_checker()
 {
if(isset($_SESSION['sess_user_id']))
{
  	if($_SESSION['sess_user_id'] != '' || $_SESSION['sess_user_id'] != null)
 	{
 		$sql = "SELECT * FROM `tbl_customer_master` where id = '".$_SESSION['sess_user_id']."' ";
 		$res = $this->get($sql);
 		if($res['email'] != $_SESSION['sess_user_email'])
 		{
 		   $this->session_flash();
 		   die;
 		}
 	}else{
 		$this->session_flash();
 		die;
 	}   
}
else
{
    
 		$this->session_flash();
 		die;
}
 }
public function cookiecheck()
{ 
	$bool=false;
if(!isset($_COOKIE['grocer_cookie'])) 
{
} 
else 
{
$str="SELECT * FROM `tbl_customer_master` WHERE `cookie`='".$_COOKIE['grocer_cookie']."'";
				$res = $this->get($str);
				if($_COOKIE['cookie_pass'] == $res['cookie_pass'])
				{
					
					$_SESSION['sess_user_id']    = $res["id"];
					$_SESSION['sess_user_name']  = $res["first_name"]." ".$res['last_name'];
					$_SESSION['sess_user_email']= $res["email"];
    				$_SESSION['sess_user_mobile']=$res['mobile'];
    				$_SESSION['sess_user_image']=$res['image'];
$bool=true;
}
}
return $bool;
}
 public function IDU($sql)
 {
 	try{
 		if($sql != null || $sql != '')
 		{
 			  $res = mysqli_query($this->con,$sql);
 			  if($res)
 			  {
 			  	 $y =  mysqli_affected_rows($this->con);
 			  	 if($y > 0)
 			  	 {
 			  	 	return true;
 			  	 }else{
 			  	 	return false;
 			  	 }
 			  }else{
 			  	 	return false;
 			  }
 		}else{
 			return false;;
 		}

 	}catch(exception $e){
 		return false;
 	}
 }

 public function get($sql)
 {
 	try{
		$x = mysqli_query($this->con,$sql);
		if($x)
		{
           return mysqli_fetch_assoc($x);
		}else{
			return array();
		}
 	}catch(exception $e){
 		return array();
 	}
 }
  public function get_where($tbl_name,$id)
 {
 	$sql="SELECT * FROM `".$tbl_name."` WHERE `id`='".$id."'";
 	try{
		$x = mysqli_query($this->con,$sql);
		if($x)
		{
           return mysqli_fetch_assoc($x);
		}else{
			return array();
		}
 	}catch(exception $e){
 		return array();
 	}
 }



//  public function get_all($sql)
//  {
//  	try{
//  		$x = mysqli_query($this->con,$sql);
//  	    $result=mysqli_fetch_all($x, MYSQLI_ASSOC);
 	
           
//           return $result;
//  	}
//  	catch(exception $e){
//  		return $e;
//  	}
//  }
   public function get_all($sql)
 {
 	try
 	{
 		$result = array( );
 		//$result[];
 		$x = mysqli_query($this->con,$sql);
 	   // $result=mysqli_fetch_all($x, MYSQLI_ASSOC);
 	     while($row=mysqli_fetch_assoc($x))
 	     {
 	     	$result[]=$row;
 	     }
 	}
 	catch(exception $e)
 	{
 		return $e;
 	}
 	return $result;
 }
 public function get_all_where($tbl_name,$id)
 {
 	$sql="SELECT * FROM `".$tbl_name."` WHERE `id`='".$id."'";
 	try{
 		$x = mysqli_query($this->con,$sql);
 
          return $result;
 	}
 	catch(exception $e){
 		return $e;
 	}
 }

}

$call_config= new config();
?>

