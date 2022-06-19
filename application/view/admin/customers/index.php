<?php
 include("../../../../config.php");
 $call_config = new config();
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
 $result=$call_config->get("SELECT * FROM `tbl_admin_master` WHERE `id`='".$sess_data_var['sess_adm_id']."'");
 include('../../../../public/admin/v1_HeadPart.php');
 include('../../../../public/admin/v2_sidebar.php');
 include('../../../../public/admin/v3_TopNavBar.php');
//include('../../../../public/admin/v4_content.php');
 ?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Customers</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
              <div class="card-body">
<div class="row">
    <input type="text" placeholder="Search By name,E-mail,mobile" class="d-inline-block form-control" style="width: 60%;" id="search_input" name="">
    <button class="btn btn-primary" style="width: 29%;" onclick="search()">Search</button>
</div>
<script type="text/javascript">
    function search() {
var search_key=$("#search_input").val();
if (search_key==null || search_key=="") 
{
    swal('Empty!!','Empty search value!!','info',{button: 'Okay',});
}
else
{
 $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/customer_list.php' ?>',
  type:'POST',
  data:{search:search_key},
  success:function(data){
    //alert(data);
    $("#table_body").html(data);
  }
});
}
    }
</script>
<div class="table-responsive">
    <table class="table-striped table">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Image</th>
                <th>Name</th>
                <th>Contact</th>
                <th>DOB</th>
                <th>Orders</th>
            </tr>
        </thead>
        <tbody id="table_body">
<?php
$i=1;
$customer=$call_config->get_all("SELECT * FROM `tbl_customer_master` order by `con`");
foreach ($customer as $key) {
  ?>
<tr><td><?= $i++ ?> </td>
  <td><img style="width: 10%;height: 10%;border: groove;border-radius: 40px;" src="<?= $call_config->base_url().$key['image'] ?>" alt="N/A"></td>
  <td><?= $key['first_name']." ".$key['last_name'] ?></td>
  <td>Email:<?= $key['email'] ?><br>
    Mobile:<?= $key['mobile'] ?></td>
  <td><?= $key['dob'] ?></td>
  </tr>
  <?php
}
?>  
        </tbody>
    </table>
</div>
            </div>
          </div>
        </div>
       
      </div>
    
      
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- BEGIN: Page JS-->
    <script src="<?php echo $admin_base_url ?>app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->

 <?php
include('../../../../public/admin/v5_Footer.php');

?>