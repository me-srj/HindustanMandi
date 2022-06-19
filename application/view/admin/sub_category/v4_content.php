<div class="header bg-primary pb-6"> 
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4"> 
            <div class="col-lg-3 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Sub-Category List</h6>
            </div>
            <div class="col-lg-9 col-5 text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">ADD SUB CATEGORYS</button>
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
                                            <th>Sub Category</th>
                                            <th>Category</th>
                                            <th>Creation Details</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                                      <tbody>
                                       <?php 
                                       
  $sql="SELECT * FROM `tbl_sub_category_master` ";
                                        $s_no=0;
                                        $result = mysqli_query($call_config->con,$sql);
                                        // Associative array
while( $row=mysqli_fetch_assoc($result))
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
                                        <?php
$cat= $call_config->get_where("tbl_category_master",$row['category_id']);
                                        ?>
                                        <td><?php echo  $cat["name"];?></td>
                                        <td>&nbsp;Created On: <?php echo  $row["con"];?><br>Updated On: <?php echo  $d_date;?></td>
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
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/edit_sub_categorys.php">
<div class="modal-body">
  <label for="name">Categorys</label>
  <select name="category" class="form-control">
    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
    <optgroup>
    <?php 
    $select="SELECT * FROM `tbl_category_master`";
    $r = mysqli_query($call_config->con, $select);
    if (mysqli_num_rows($r) > 0) {
    while($row2 = mysqli_fetch_assoc($r)) {
    echo '<option value="'.$row2['id'].'">'.$row2['name'].'</option>';
} }
    ?>
  </optgroup>
</select>
<label for="sub_category">Sub Category Name</label>
<input type="text" name="sub_category" class="form-control" value="<?php echo $row['name']; ?>">
<input type="text" name="id" class="form-control" value="<?php echo $row["id"] ?>" hidden>
<input type="text" name="session" class="form-control" value="<?php echo $_SESSION['sess_adm_id'];?>" hidden>
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
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/add_sub_categorys.php">
<div class="modal-body">
  <label for="name">Categorys</label>
  <select name="category" class="form-control">
    <option>--Select--</option>
    <?php 
    $select2="SELECT * FROM `tbl_category_master`";
    $r2 = mysqli_query($call_config->con, $select2);
    if (mysqli_num_rows($r2) > 0) {
    while($row3 = mysqli_fetch_assoc($r2)) {
    echo '<option value="'.$row3['id'].'">'.$row3['name'].'</option>';
} }
    ?>
</select>
<label for="name">Sub Category Name</label>
<input type="text" name="sub_category" class="form-control">
<input type="text" name="session" class="form-control" value="<?php echo $_SESSION['sess_adm_id'];?>" hidden>
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Save</button>
</form>
</div>
</div>
</div>