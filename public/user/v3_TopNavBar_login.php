
<!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar  navbar-top navbar-expand navbar-dark p-0 bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"  style="height: 4px;width: 25px;"></i>
                  <i class="sidenav-toggler-line"  style="height: 4px;width: 25px;"></i>  
                  <i class="sidenav-toggler-line"  style="height: 4px;width: 25px;"></i>
                </div>
              </div>
            </li> 
            <?php
$countn=$call_config->get("SELECT COUNT(*) as num FROM `tbl_notification_master` WHERE `cid`='".$sess_data_var['sess_user_id']."'");
$notifi=$call_config->get_all("SELECT * FROM `tbl_notification_master` WHERE `cid`='".$sess_data_var['sess_user_id']."'  order by `id` DESC");
              ?>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"><b style="font-size: 10px;"><?= $countn['num'] ?></b></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary"><?= $countn['num'] ?></strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div style="max-height: 400px;overflow-x: auto;" class="list-group list-group-flush">
                  <?php
                  $i=0;
foreach ($notifi as $key) {
  $i++;
 ?>
<a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h6 class="mb-0 text-sm"><?= $key['title'] ?></h6>
                          </div>
                          <div class="text-right text-muted">
                            <small><?php echo date('l dS \o\f F Y',strtotime ($key['con']))?></small>
                          </div>
                        </div>
                        <p class="text-sm mb-0"><?php echo $key['message'] ?></p>
                      </div>
                    </div>
                  </a>
 <?php
}
                  ?>
                </div>
<?php
if ($i!=0) {
?>
<a href="<?= $call_config->base_url() ?>application/modal/user/clear_notification.php" class="dropdown-item text-center text-primary font-weight-bold py-3">Clear all</a>
<?php
}
?>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="<?= $call_config->base_url() ?>application/view/user/cart/">
                <i class="ni ni-cart"><b id="cart_tag" style="font-size: 10px;"></b></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <?php
if ($sess_data_var['sess_user_image']!=null || $sess_data_var['sess_user_image']!="") {
  $image_path= $call_config->base_url().$sess_data_var['sess_user_image'];
}
else
{
$image_path=$call_config->base_url()."app-assets/images/user_image/user.jpg";
}
                        ?>
                    <img alt="Image placeholder" src="<?php echo $image_path ?>">
                  </span> 
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $sess_data_var['sess_user_name'] ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="<?php echo $call_config->base_url() ?>application/view/user/profile/" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="<?php echo $call_config->base_url() ?>application/view/user/orders/" class="dropdown-item">
                  <i class="ni ni-bag-17"></i>
                  <span>Orders</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo $call_config->base_url() ?>session_flush.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->