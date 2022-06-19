<?php 
include("config.php");
  session_destroy();
    setcookie("grocer_cookie", null, time() - (86400 * 1), "/");
  setcookie("cookie_pass", null, time() - (86400 * 1), "/");
 $call_config->msg("Logout!!","Logout Successfull!!","success","user/dashboard","");
?>