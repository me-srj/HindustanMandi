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
              <h6 class="h2 text-white d-inline-block mb-0">Add A Product</h6>
            </div>
            <div class="col-lg-6 col-5">
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
<form method="POST" enctype="multipart/form-data" action="<?= $call_config->base_url() ?>application/modal/admin/add_product.php" style="padding: 20px;">
  <div class="row">
    <div class="col-md-4">
      <label>Product Name</label>
      <input type="text" name="name" required class="form-control form-group" placeholder="Enter Product Name">
    </div>
    <div class="col-md-4">
      <label>Description</label>
      <textarea name="description" required placeholder="Enter Description/Key words to search" class="form-group form-control"></textarea>
    </div>
    <div class="col-md-4">
      <label>Mrp</label>
      <input type="number" required placeholder="Enter MRP" name="mrp" step="0.01" class="form-control form-group">
    </div>
  </div>
    <div class="row">
    <div class="col-md-4">
      <label>Selling Price</label>
      <input type="number" required step="0.01" placeholder="Enter Selling Price(Without TAX)" name="selling_price" class="form-group form-control" placeholder="Enter Product Name">
    </div>
    <div class="col-md-4">
      <label>Unit</label>
<select required name="unit" class="form-control form-group">
  <optgroup>
    <?php
$unit=$call_config->get_all("SELECT * FROM `tbl_product_unit_master`");
foreach ($unit as $key) {
echo "<option value='".$key['id']."'>".$key['unit']."</option>";
}
    ?>
  </optgroup>
</select>
    </div>
    <div class="col-md-4">
      <label>Quantity</label>
      <input required type="text" name="quantitty" placeholder="Enter Quantity" class="form-control form-group">
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <label>Category</label>
<select required name="category" id="category" onchange="get_subcat(this.value)" class="form-control form-group">
  <optgroup>
    <?php
$unit=$call_config->get_all("SELECT * FROM `tbl_category_master`");
foreach ($unit as $key) {
echo "<option value='".$key['id']."'>".$key['name']."</option>";
}
    ?>
  </optgroup>
</select>
    </div>
    <div class="col-md-4">
      <label>Sub-Category</label>
      <select required name="scategory" class="form-control form-group">
  <optgroup id="subcatopgr">
    <option selected="" disabled="">--First Select Category--</option>
  </optgroup>
</select>
    </div>
    <div class='col-md-4'>
      <label>Photo</label>
      <input required type='file' multiple="multiple" name='photo[]' class='form-control form-group'></div>
  </div>
  <div class="row">
    <div class="col-md-4">
<label>Key Features</label>
      <textarea required name="key_features" class="form-control" placeholder="Enter Key Features"></textarea></div>
    <div class="col-md-4">
<label>Shelf Life</label>
      <input type="text" placeholder="Shelf Life" class="form-control" name="shelf_life"></div>
    <div class="col-md-4"><textarea  name="mfg_details" class="form-control" placeholder="Enter MFG details"></textarea></div>
  </div>
  <div class="row">
    <div class="col-md-4">
<label>Seller Details</label>
      <textarea required name="seller" class="form-control" placeholder="Enter Seller Details"></textarea></div>
    <div class="col-md-4">
<label>Disclaimer</label>
      <textarea required name="disclaimer" class="form-control" placeholder="Enter Product Disclaimer"></textarea></div>
    <div class="col-md-4"></div>
  </div>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4"><input type="submit" name="sub" class="btn mt-3 btn-primary" value="Add"></div>
    <div class="col-md-4"></div>
  </div>
</form>
          </div>
        </div>
       
      </div>
    <script type="text/javascript">
      function get_subcat(argument) {
        //alert(argument);
          $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/get_sub_category.php' ?>',
  type:'POST',
  data:{argument:argument},
  success:function(data){
   $('#subcatopgr').html(data);
  }
});
      }
    </script>
 <?php
include('../../../../public/admin/v5_Footer.php');

?>