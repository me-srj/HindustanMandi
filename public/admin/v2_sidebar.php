<!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand"  href="<?= $call_config->base_url()?>application/view/admin/dashboard/">
                <i class="ni ni-shop text-primary"></i>&nbsp;Hindustan Mandi</a>
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
            <li class="nav-item">
              <a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-circle-08 text-primary"></i>
                <span class="nav-link-text">Profile</span>
              </a>
              <div class="collapse" id="navbar-dashboards">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/edit_profile/" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal">Edit Profile </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/edit_password/" class="nav-link">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal"> Password </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-app text-green"></i>
                <span class="nav-link-text">Products</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/product/new.php" class="nav-link">
                      <span class="sidenav-mini-icon"> N </span>
                      <span class="sidenav-normal"> New Product </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/product/" class="nav-link">
                      <span class="sidenav-mini-icon"> L </span>
                      <span class="sidenav-normal"> List All </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#customers" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-delivery-fast text-orange"></i>
                <span class="nav-link-text">Customers/Orders</span>
              </a>
              <div class="collapse" id="customers">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/customers/" class="nav-link">
                      <span class="sidenav-mini-icon"> C </span>
                      <span class="sidenav-normal"> Customers </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/message_orders/" class="nav-link">
                      <span class="sidenav-mini-icon"> M </span>
                      <span class="sidenav-normal"> Message Orders </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/image_orders/" class="nav-link">
                      <span class="sidenav-mini-icon"> I </span>
                      <span class="sidenav-normal"> Image Orders </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/new_orders/" class="nav-link">
                      <span class="sidenav-mini-icon"> N </span>
                      <span class="sidenav-normal"> New Orders </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/in_process_order/" class="nav-link">
                      <span class="sidenav-mini-icon"> I </span>
                      <span class="sidenav-normal"> In Process Orders </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/old_orders/" class="nav-link">
                      <span class="sidenav-mini-icon"> O </span>
                      <span class="sidenav-normal"> Delivered Orders </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
                <li class="nav-item">
              <a class="nav-link" href="<?= $call_config->base_url()?>application/view/admin/bulk_sms/" >
                <i class="ni ni-app text-green"></i>
                <span class="nav-link-text">Bulk SMS</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                <i class="ni ni-ui-04 text-info"></i>
                <span class="nav-link-text">Manage</span>
              </a>
              <div class="collapse" id="navbar-components">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/category/" class="nav-link">
                      <span class="sidenav-mini-icon"> C </span>
                      <span class="sidenav-normal"> Category </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/sub_category/" class="nav-link">
                      <span class="sidenav-mini-icon"> S </span>
                      <span class="sidenav-normal"> Sub-Category </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/units/" class="nav-link">
                      <span class="sidenav-mini-icon"> U </span>
                      <span class="sidenav-normal"> Unit </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/tax_layers/" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Tax </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/banner/" class="nav-link">
                      <span class="sidenav-mini-icon"> B </span>
                      <span class="sidenav-normal"> Banner </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/message/" class="nav-link">
                      <span class="sidenav-mini-icon"> M </span>
                      <span class="sidenav-normal"> Message </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/offers/" class="nav-link">
                      <span class="sidenav-mini-icon"> O </span>
                      <span class="sidenav-normal"> Offers </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= $call_config->base_url()?>application/view/admin/flat_off/" class="nav-link">
                      <span class="sidenav-mini-icon"> F </span>
                      <span class="sidenav-normal"> Flat Offers </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
        </div>
      </div>
    </div>
  </nav>