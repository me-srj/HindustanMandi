<!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Message</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
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
                                            <th>Header Text</th>
                                            <th>Body Text</th>
                                            <th>Designation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                                      <tbody>
                                     <?php
                                     $i=1;
$row=mysqli_query($call_config->con,"SELECT * FROM `tbl_message_master`");
while( $key=mysqli_fetch_assoc($row))
{
 ?>
 <tr>
  <td><?= $i++; ?></td>
  <td><?= $key['head'] ?></td>
  <td><?= $key['body'] ?></td>
  <td><?= $key['designation'] ?></td>
  <td><a class="btn btn-danger btn-sm" href="<?php echo $call_config->base_url() ?>application/modal/admin/delete_message.php?id=<?= $key['id'] ?>">Delete</a></td>
  </tr>
 <?php
}

                                     ?>

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
<h4 class="modal-title" id="myModalLabel17">Add Message</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/admin/add_message.php">
<div class="modal-body">
<label for="tax">Header Text</label>
<input type="text" name="head" placeholder="Enter Header Text" class="form-control">
<label>Body Text</label>
<textarea class="form-control" name="body" placeholder="Enter Body Text"></textarea>
<label>Designation</label>
<input type="text" name="designation" class="form-control" placeholder="Enter Designation">
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