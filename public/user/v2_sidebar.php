<!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand"  href="<?= $call_config->base_url()?>application/view/user/dashboard/">
        <img style="width: 20px;" class="mt--2 ml-5" src="<?= $call_config->base_url() ?>app-assets/om.png">&nbsp;Home</a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div> 
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <?php
$category=$call_config->get_all("SELECT * FROM `tbl_category_master`");
foreach ($category as $key) {
?>
            <li class="nav-item">
<a class="nav-link" href="#category<?= $key['id'] ?>" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="category<?= $key['id'] ?>">
                <span class="nav-link-text"><?= $key['name'] ?></span>
              </a>
              <div class="collapse" style="background-color: rgb(238, 239, 246);" id="category<?= $key['id'] ?>">
                <ul class="nav nav-sm flex-column">
<?php
$sub_cat=$call_config->get_all("SELECT * FROM `tbl_sub_category_master` WHERE `category_id`='".$key['id']."'");
foreach ($sub_cat as $sub) {
  ?>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/user/dashboard/search_by_cat.php?id=<?= base64_encode($sub['id'])  ?>" class="nav-link">
                      <span class="sidenav-normal"><?= $sub['name'] ?> </span>
                    </a>
                  </li>
  <?php
}
?>
                </ul> 
              </div>
            </li>

<?php
}
            ?>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
<ul class="navbar-nav">
  <li class="nav-item">
    <a href="#" class="nav-link text-warning" data-toggle="modal" data-target="#help_modal"  role="button" aria-expanded="true" aria-controls="navbar-dashboards">
<i class="fas fa-info-circle"></i>
                <span class="nav-link-text text-muted">Help!</span>
                    </a>
  </li>
  <li class="nav-item">
    <a href="<?= $call_config->base_url() ?>application/view/user/about_us/" class="nav-link text-info" aria-expanded="true" aria-controls="navbar-dashboards">
<i class="far fa-address-card"></i>
                <span class="nav-link-text text-muted">About Us</span>
                    </a>
  </li>
</ul>
        </div>
      </div>
    </div>
  </nav>
