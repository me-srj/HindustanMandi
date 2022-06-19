    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Vendors</h5>
                      <?php
$sql="SELECT COUNT(*) as sum FROM `tbl_supplier_master`";
$res=$call_config->get($sql);
                       ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $res['sum']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap"><a href="<?php echo $call_config->base_url() ?>application/view/admin/vendors/">View all</a></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Active Vendors</h5>
                       <?php
$sql="SELECT COUNT(*) as sum FROM `tbl_supplier_master` WHERE `status`='1'";
$res=$call_config->get($sql);
                       ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $res['sum']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Team Members</h5>
                      <?php
$sql="SELECT COUNT(*) as sum FROM `tbl_admin_team_master`";
$res=$call_config->get($sql);
                       ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $res['sum']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                    <span class="text-nowrap">View all</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Active Team</h5>
 <?php
$sql="SELECT COUNT(*) as sum FROM `tbl_admin_team_master` WHERE `status`='1'";
$res=$call_config->get($sql);
                       ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $res['sum']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"></span>
                  </p>
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Recent Registerd Vendors(<?php echo date("M-Y"); ?>)</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo $call_config->base_url(); ?>application/view/admin/Vendors/" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Vendor name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact No.</th>
                    <th scope="col">Registration Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                 $month=date("Y-m");
$sql="SELECT * FROM `tbl_supplier_master` where `c_on` LIKE '%".$month."%'";
$result=$call_config->get_all($sql);
      foreach ($result as $key) {
echo "<tr><th scope='row'>".$key['name']."</th><td>".$key['email']."</td><td>".$key['mobile']."</td><td>";
if ($key['status']=="1") {
  echo '<i class="fas fa-arrow-up text-success mr-3"></i> registered';
}
else{
echo '                      <i class="fas fa-arrow-down text-warning mr-3"></i> pending';
}
                      
echo       "</td></tr>";
      }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Active Vendors</h3>
                </div>
                <div class="col text-right">
                  <a href="<?php echo $call_config->base_url(); ?>application/view/admin/Vendors/" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                 $month=date("Y-m");
$sql="SELECT * FROM `tbl_supplier_master` where `c_on` LIKE '%".$month."%'";
$result=$call_config->get_all($sql);
      foreach ($result as $key) {
echo "<tr><th scope='row'>".$key['name']."</th><td>".$key['email']."</td><td><span class='btn btn-sm btn-success'>active</span></td></tr>";
      }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>