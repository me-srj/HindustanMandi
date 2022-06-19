<!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Banner</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Banner</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div> 
<!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Banner</h3>
              <p class="text-sm mb-0">
              </p>
              <div class="float-right">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">ADD</button>
                    </div>
            </div>

            <div class="table-responsive py-4">
              <table class="table table-striped table-bordered file-export">
                               <thead>
                                        <tr>
                                          <th>S.No.</th>
                                            <th>Keyword</th>
                                            <th>View</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                                      <tbody>
                                       <?php 
                                       
                                   $sql="SELECT * FROM `tbl_banner_master`";
                                   $i=1;
$resultb = mysqli_query($call_config->con,$sql);
while( $row=mysqli_fetch_assoc($resultb))
                                        {
                                      ?>
                                      <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?php echo $row['keyword'] ?></td>
                                        <td><a class="btn btn-info btn-sm" target="_blank" href="<?= $call_config->base_url().$row['image']?>"><b> View</b></a></td>
                                        <td>
                                          <?php
if($row['type']=='0')
                                      {
                                        $status='<span class="badge badge-success">Product</span>';
                                      }
                                      else
                                  {
                                      $status='<span class="badge badge-info">Sub-Category</span>';
                                  }
                                  echo $status;

                                          ?>
                                        </td>
                                        <td>
                                          <a class="btn btn-danger btn-sm" href="<?php echo $call_config->base_url().'application/modal/admin/delete_banner.php?id='.$row['id'] ?>">Delete</a>
                                        </td></tr>
<?php } ?>

                                   </tbody>
                            </table>
            </div>
          </div>
          <!-- START ADD MODAL -->
<!-- Modal -->
<div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header btn-success">
<h4 class="modal-title" id="myModalLabel17">Add Banner</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url() ?>application/modal/admin/add_banner.php">
<div class="modal-body">
<label>Type</label>
<select class="form-control" onchange="show_appropriate(this.value)" name="type">
  <option value="" selected="" disabled="">--Choose--</option>
  <option value="1">Sub-Category</option>
  <option value="0">Product</option>
</select>
<label for="tax">Keyword</label>
<input style="display: none;" type="text" placeholder="Enter The Keyword to be searched" id="keyword" name="keyword" class="form-control">
<select style="display: none;" class="form-control" id="keyword_select" name="keyword_select">
  <?php
$result=mysqli_query($call_config->con,"SELECT * FROM `tbl_sub_category_master`");
while( $key=mysqli_fetch_assoc($result)) {
  echo "<option value='".$key['id']."'>".$key['name']."</option>";
}
  ?>
</select>
<label>Baner</label>
<input type="file" name="image" required class="form-control">
</div>
<div class="modal-footer">
<button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="submit">Save</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- END ADD MODAL -->
<script type="text/javascript">
  function show_appropriate(argument) {
 // alert(argument);
   if (argument=='1') 
   {
    $("#keyword_select").show();
    $("#keyword").hide();
   }
   else
   {
        $("#keyword_select").hide();
    $("#keyword").show();
   }
  }
</script>