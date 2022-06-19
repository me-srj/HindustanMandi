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
            <div class="col-lg-3 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Product List</h6>
            </div>
            <div class="col-lg-9 col-5 text-right">
              <input type="text" class="form-control float-left" style="width: 40%;height: 43px;" id="name" placeholder="Search by product name,mrp and selling price">
               <button type="button" class="btn btn-nutral btn-secondary float-left" style="width: 7%;height: 43px;" onclick="search()" ><i class="ni ni-zoom-split-in"></i></button>
                  <select onchange="get_by_sub(this.value)" style="width: 40%;height: 43px;" class="float-right form-control">
                    <optgroup>
                      <option selected="" disabled="">--Search By Category--</option>
                      <?php
$scat=$call_config->get_all("SELECT * FROM `tbl_sub_category_master`");
foreach ($scat as $key) {
    echo "<option value='".$key['id']."'>".$key['name']."</option>";
  }  
                      ?>
                    </optgroup>
                  </select>
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
            <div class="table-responsive">
       <table class="table table-striped table-bordered dom-positioning dataTable">
 <thead>
    <tr>
              <th >Sno</th>
                <th >Name(Category)-Quantity</th>
                <th >Description/Search Key</th>
                <th >MRP/Selling Price/Tax</th>
                <th>Seller Details</th>
                <th >Self Life</th>
                <th>Origin</th>
                <th>MFG Details</th>
                <th>Key Features</th>
                <th>Disclaimer</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
                                </thead>
                                <tbody id="table_body">

                                  
</tbody>
                            </table>
            </div>
          </div>
        </div>
       
      </div>
<script type="text/javascript">
  function get_by_sub(subc)
  {
//    alert(subc);
    op=subc;
         $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/get_sub_pro.php' ?>',
  type:'POST',
  data:{op:op},
  success:function(data){
   $('#table_body').html(data);
  }
});
  }
function search()
  {
    name=$("#name").val();
    if (name.length==0) {
      alert("No Data in Search Bar");
      exit();
    }
    op="sadf";
         $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/custom_product_search.php' ?>',
  type:'POST',
  data:{name:name,op:op},
  success:function(data){
   // alert(data);
   $('#table_body').html(data);
  }
});
  }
</script>
      

 <?php
include('../../../../public/admin/v5_Footer.php');

?>