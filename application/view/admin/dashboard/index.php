<?php
 include("../../../../config.php");
 $call_config = new config();
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
   $result=$call_config->get("SELECT * FROM `tbl_admin_master` WHERE `id`='".$sess_data_var['sess_adm_id']."'");

 include('../../../../public/admin/v1_HeadPart.php');
 include('../../../../public/admin/v2_sidebar.php');
 include('../../../../public/admin/v3_TopNavBar.php');
include('../../../../public/admin/v4_content.php');
include('../../../../public/admin/v5_Footer.php');

?>