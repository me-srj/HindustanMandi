<div class="header bg-primary pb-6"> 
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4"> 
            <div class="col-lg-3 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Category List</h6>
            </div>
            <div class="col-lg-9 col-5 text-right">
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add">ADD CATEGORYS</button>
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
         
<div class="table-responsive">
                            <table class="table table-striped table-bordered file-export">
                               <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Tax Value</th>
                                            <th>Created On</th>
                                            <th>Modify On</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                                      <tbody>
                                       <?php 
                                       
                                   $sql="SELECT * FROM tbl_category_master";
                                        $s_no=0;
                                        $result = mysqli_query($call_config->con, $sql);
                                        // Associative array
                                        while($row = mysqli_fetch_array($result))
                                        {
                                           
                                      if($row['status']=='1')
                                      {
                                        $status='<span class="badge badge-success">Active</span>';
                                      }
                                      else{
                                      $status='<span class="badge badge-danger">InActive</span>';
                                  }
                                  if($row["uon"]==' ' || $row["uon"]==null)
                                  {
                                    $d_date="---";
                                  }
                                  else{
                                    $d_date=$row['uon'];
                                  }
                                  ?>
                                      <tr>
                                        <td><?php echo ++$s_no ;?></td>
                                        <td><?php echo $row["name"];?></td>
                                        <td><?php echo  $row["tax_value_percent"];?></td>
                                        <td><?php echo  $row["con"];?></td>
                                        <td><?php echo  $d_date;?></td>
                                        <td><?php echo  $status;?></td>
                                        <td>
        <a href="#" class="btn btn-primary btn-sm ft-edit-2 user_update" value="" data-toggle="modal" data-target="#edit<?php echo $row["id"];?>"></a> 
        <!-- model to edit category starts here -->
                                        </td></tr>
<div class="modal fade text-left" id="edit<?php echo $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header bg-warning bg-lighten-4">
<h4 class="modal-title text-danger" id="myModalLabel17">Edit Categorys</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/update_categorys.php">
<div class="modal-body">
<label for="name">Category Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
<label for="name">Tax Value</label>
<select name="tax" class="form-control">
    <option><?php echo $row['tax_value_percent']; ?></option>
    <?php 
    $select="SELECT tax_value_percent FROM `tbl_tax_master`";
    $r = mysqli_query($call_config->con, $select);
    if (mysqli_num_rows($r) > 0) {
    while($row2 = mysqli_fetch_assoc($r)) {
    echo '<option>'.$row2['tax_value_percent'].'</option>';
} }
    ?>
</select>
<input type="text" name="id" class="form-control" value="<?php echo $row["id"] ?>" hidden>
<input type="text" name="session" class="form-control" value="<?php echo $_SESSION['id'];?>" hidden>
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Save</button>
</form>
</div>
</div>
</div>
<!-- model to edit category ends here -->
                                        <?php
                                   }
                                  //       $conn->close();
                                       ?>
                                    </tbody>
                            </table>
                        </div>
          </div>
        </div>
       
      </div>
    </div>
<div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-success">
<h4 class="modal-title" id="myModalLabel17">Add Categorys</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/add_categorys.php">
<div class="modal-body">
<label for="name">Category Name</label>
<input type="text" name="name" class="form-control">
<label for="name">Tax Value</label>
<select name="tax" class="form-control">
    <option></option>
    <?php 
    $select="SELECT tax_value_percent FROM `tbl_tax_master`";
    $r = mysqli_query($call_config->con, $select);
    if (mysqli_num_rows($r) > 0) {
    while($row2 = mysqli_fetch_assoc($r)) {
    echo '<option>'.$row2['tax_value_percent'].'</option>';
} }
    ?>
</select>
<input type="text" name="session" class="form-control" value="<?php echo $sess_data_var['sess_adm_id'];?>" hidden>
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Save</button>
</form>
</div>
</div>
</div>