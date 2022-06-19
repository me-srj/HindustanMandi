<?php
include('../../../config.php');
$call_config = new config(); 
 $call_config->admin_sess_checker();
 $sess_data_var=$call_config->adm_sess_data_bind();
 $base_url=$call_config->base_url();
if (isset($_POST['op'])) {
	$sql="SELECT * FROM `tbl_product_master` WHERE `sub_category_id`='".$_POST['op']."'";
$result=$call_config->get_all($sql);
$output="";
$i=1;
foreach ($result as $key) {
$unit=$call_config->get_where("tbl_product_unit_master",$key['unit']);
$scategory=$call_config->get_where("tbl_sub_category_master",$key['sub_category_id']);
$category=$call_config->get_where("tbl_category_master",$scategory['category_id']);
$catstring=$category['name']."(".$scategory['name'].")";
?>
<tr><td><?= $i++ ?></td>
	<td><?= $key['name']."(".$catstring.")-".$key['quantitty'] ?></td>
	<td><?= $key['description'] ?></td>
	<td>MRP:<?= $key['mrp']."/".$unit['unit'] ?><br>Selling Price:<?= $key['selling_price']."/".$unit['unit'] ?><br><?= $category['tax_value_percent'] ?>%</td>
	<td><?= $key['seller'] ?></td><td><?= $key['shelf_life'] ?></td>
	<td>Creation:<?= $key['cby']." ".$key['con'] ?><br>Updation:<?= $key['uby']." ".$key['uon'] ?></td>
	<td><?= $key['mfg_details'] ?></td>
	<td><?= $key['key_features'] ?></td>
	<td><?= $key['disclaimer'] ?></td>
  <td><?= $key['stock'] ?>&nbsp;
    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit_stock<?= $key['id'] ?>">Add</button>
    <div class="modal fade" id="edit_stock<?= $key['id'] ?>" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-danger">Edit Stock</h4>
          </div>
          <form class="form" method="POST" action="<?= $call_config->base_url() ?>application/modal/admin/add_stock.php">
            <input type="hidden" required="" name="pid" value="<?= $key['id'] ?>" >
            <div class="row">
              <div class="col-md-6"><label>Current Stock: &nbsp;<?= $key['stock'] ?></label></div>
              <div class="col-md-6"><input required="" type="number" name="number" class="form-control form-group" placeholder="Enter Change In Stock">
<button class="btn btn-info" type="submit">Apply</button>
              </div>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </td>
	<td>
<?php
if ($key['status']=="1") {
	?>
<a class='btn btn-danger btn-sm' href='<?= $call_config->base_url()."application/modal/admin/hide_product.php?id=".$key['id'] ?>'>Hide</a>
	<?php
}
else
{
	?>
<a class='btn btn-success btn-sm' href='<?= $call_config->base_url()."application/modal/admin/unhide_product.php?id=".$key['id'] ?>'>Un-Hide</a>
	<?php
}

?>
	<button class='btn btn-info btn-sm' data-toggle='modal' data-target='#edit_product<?= $key['id'] ?>'>Edit</button>
	<div class="modal fade text-left" id="edit_product<?php echo $key["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header bg-lighten-4">
<h4 class="modal-title text-danger" id="myModalLabel17">Edit Product</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?= $call_config->base_url() ?>application/modal/admin/update_product.php">
  <div class="row">
    <div class="col-md-4"><label>Product Name</label>
      <input type="text" value="<?= $key['name'] ?>" name="name" required class="form-control form-group" placeholder="Enter Product Name">
    </div>
    <div class="col-md-4">
    	<label>Description</label>
      <textarea name="description" required placeholder="Enter Description" class="form-group form-control"><?= $key['description'] ?></textarea>
    </div>
    <div class="col-md-4"><label>MRP:</label>
      <input value="<?= $key['mrp'] ?>" type="number" required placeholder="Enter MRP" name="mrp" step="0.01" class="form-control form-group">
    </div>
  </div>
    <div class="row">
    <div class="col-md-4"><label>Selling Price</label>
      <input type="number" value="<?= $key['selling_price'] ?>" required step="0.01" placeholder="Enter Selling Price(Without TAX)" name="selling_price" class="form-group form-control" placeholder="Enter Product Name">
    </div>
    <div class="col-md-4">
    	<label>Unit</label>
<select required name="unit" class="form-control form-group">
  <optgroup>
    <option disabled="">--Select Unit--</option>
    <?php
$unit=$call_config->get_all("SELECT * FROM `tbl_product_unit_master`");
foreach ($unit as $unit_s) {
	if ($key['unit']==$unit_s['id']) {
echo "<option selected value='".$unit_s['id']."'>".$unit_s['unit']."</option>";
	}
	else
	{
echo "<option value='".$unit_s['id']."'>".$unit_s['unit']."</option>";
}
} 
    ?>
  </optgroup>
</select>
    </div>
    <div class="col-md-4">
    	<label>Quantity</label>
      <input value="<?= $key['quantitty'] ?>" required type="text" name="quantitty" placeholder="Enter Quantity" class="form-control form-group">
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
    	<label>Category</label>
<select required name="category" id="category" onchange="get_subcat<?= $key['id'] ?>(this.value)" class="form-control form-group">
  <optgroup>
    <option disabled="">--Select Category--</option>
    <?php
$categorya=$call_config->get_all("SELECT * FROM `tbl_category_master`");
foreach ($categorya as $cat) {
	if ($category['id']==$cat['id']) {
echo "<option selected value='".$cat['id']."'>".$cat['name']."</option>";
	}
	else
	{
echo "<option value='".$cat['id']."'>".$cat['name']."</option>";
}
}
    ?>
  </optgroup>
</select>
    </div>
    <div class="col-md-4">
    	<label>Sub-Category</label>
      <select required name="scategory" class="form-control form-group">
  <optgroup id="subcatopgr<?= $key['id'] ?>">
    <option disabled="">--First Select Category--</option>
  	<option value="<?= $scategory['id']?>"><?= $scategory['name'] ?></option>
  </optgroup>
</select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
    	<label>Key Features</label><textarea required name="key_features" class="form-control" placeholder="Enter Key Features"><?= $key['key_features'] ?></textarea></div>
    <div class="col-md-4">
    	<label>Shelf Life</label><input value="<?= $key['shelf_life'] ?>" required type="text" placeholder="Shelf Life" class="form-control" name="shelf_life"></div>
    <div class="col-md-4">
    	<label>MFG Details</label><textarea required name="mfg_details" class="form-control" placeholder="Enter MFG details"><?= $key['mfg_details'] ?></textarea></div>
  </div>
  <div class="row">
    <div class="col-md-4"><label>Seller Details</label>
<textarea required name="seller" class="form-control" placeholder="Enter Seller Details"><?= $key['seller'] ?></textarea></div>
    <div class="col-md-4"><label>Disclaimer</label>
<textarea required name="disclaimer" class="form-control" placeholder="Enter Product Disclaimer"><?= $key['disclaimer'] ?></textarea></div>
    <div class="col-md-4"></div>
  </div>
  <div class="row mb-4">
    <div class="col-md-4"><input type="hidden" name="id" value="<?= $key['id'] ?>" ></div>
    <div class="col-md-4"><input type="submit" name="sub" class="btn float-center mt-3 btn-warning" value="Update"></div>
    <div class="col-md-4"></div>
  </div>
</form>
</div>
</div>
</div>
  <script type="text/javascript">
      function get_subcat<?= $key['id'] ?>(argument) {
        //alert(argument);
          $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/admin/get_sub_category.php' ?>',
  type:'POST',
  data:{argument:argument},
  success:function(data){
   $('#subcatopgr<?= $key['id'] ?>').html(data);
  }
});
      }
    </script>
</td></tr>

<?php
}
if ($output=="" || $output==null) {
echo "<tr><td>No data in table</td></tr>";
}

}
else
{
		$call_config->msg("Failed!!","Invalid action","error","","");	
}

?>