<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Po</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url(); ?>assets/css/app.min.css">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url(); ?>assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?=base_url(); ?>assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  
</head>



<body>
<!-- In your view file (e.g., your view for the admin dashboard) -->
<div class="flash-messages" style="position: fixed; bottom: 10px; right: 10px; z-index: 1000;">
    <?php if (session()->has('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session('error') ?>
        </div>
    <?php endif; ?>
</div>

  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="<?=base_url(); ?>#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="<?=base_url(); ?>#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="<?=base_url(); ?>#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="<?=base_url(); ?>#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="<?=base_url(); ?>#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="<?=base_url(); ?>assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> <a href="<?=base_url(); ?>#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="<?=base_url(); ?>assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span>
                  </span>
                </a> <a href="<?=base_url(); ?>#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="<?=base_url(); ?>assets/img/users/user-5.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                      Ryan</span> <span class="time messege-text">Your payment invoice is
                      generated.</span> <span class="time">12 Min Ago</span>
                  </span>
                </a> <a href="<?=base_url(); ?>#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="<?=base_url(); ?>assets/img/users/user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                      Smith</span> <span class="time messege-text">hii John, I have upload
                      doc
                      related to task.</span> <span class="time">30
                      Min Ago</span>
                  </span>
                </a> <a href="<?=base_url(); ?>#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="<?=base_url(); ?>assets/img/users/user-3.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                      Joshi</span> <span class="time messege-text">Please do as specify.
                      Let me
                      know if you have any query.</span> <span class="time">1
                      Days Ago</span>
                  </span>
                </a> <a href="<?=base_url(); ?>#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="<?=base_url(); ?>assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Client Requirements</span>
                    <span class="time">2 Days Ago</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="<?=base_url(); ?>#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="<?=base_url(); ?>#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="<?=base_url(); ?>#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="<?=base_url(); ?>#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now! <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="<?=base_url(); ?>#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                  </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                      Sugiharto</b> are now friends <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="<?=base_url(); ?>#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                      class="fas
												fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                    moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="<?=base_url(); ?>#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it! <span class="time">17 Hours Ago</span>
                  </span>
                </a> <a href="<?=base_url(); ?>#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Otika
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="<?=base_url(); ?>#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="<?=base_url(); ?>#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?=base_url(); ?>assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="<?=base_url(); ?>profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="<?=base_url(); ?>timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="<?=base_url(); ?>#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?=base_url(); ?>logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=base_url(); ?>index.html"> <img alt="image" src="<?=base_url(); ?>assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Otika</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="<?=base_url(); ?>admin_dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Master</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>tax">Add Tax</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>vendor_type">Add Vendor Type</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>menu">Add menu</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>add-item">Add Item</a></li>

                


              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>User</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>user">Add User</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>user-list">User List</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Vendor</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>add-vendor">Add Vendor</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>vendor-list">Vendor List</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Email</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>email-inbox.html">Inbox</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>email-compose.html">Compose</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>email-read.html">read</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>PO</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>create_po">Request PO</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>user-list">User List</a></li>
              </ul>
            </li>
            <!-- <li class="menu-header">UI Elements</li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Basic
                  Components</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>alert.html">Alert</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>badge.html">Badge</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>breadcrumb.html">Breadcrumb</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>buttons.html">Buttons</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>collapse.html">Collapse</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>dropdown.html">Dropdown</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>checkbox-and-radio.html">Checkbox &amp; Radios</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>list-group.html">List Group</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>media-object.html">Media Object</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>navbar.html">Navbar</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>pagination.html">Pagination</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>popover.html">Popover</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>progress.html">Progress</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>tooltip.html">Tooltip</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>flags.html">Flag</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>typography.html">Typography</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-bag"></i><span>Advanced</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>avatar.html">Avatar</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>card.html">Card</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>modal.html">Modal</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>sweet-alert.html">Sweet Alert</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>toastr.html">Toastr</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>empty-state.html">Empty State</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>multiple-upload.html">Multiple Upload</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>pricing.html">Pricing</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>tabs.html">Tab</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="<?=base_url(); ?>blank.html"><i data-feather="file"></i><span>Blank Page</span></a></li>
            <li class="menu-header">Otika</li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Forms</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>basic-form.html">Basic Form</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>forms-advanced-form.html">Advanced Form</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>forms-editor.html">Editor</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>forms-validation.html">Validation</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>form-wizard.html">Form Wizard</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Tables</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>basic-table.html">Basic Tables</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>advance-table.html">Advanced Table</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>datatables.html">Datatable</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>export-table.html">Export Table</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>editable-table.html">Editable Table</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="pie-chart"></i><span>Charts</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>chart-amchart.html">amChart</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>chart-apexchart.html">apexchart</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>chart-echart.html">eChart</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>chart-chartjs.html">Chartjs</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>chart-sparkline.html">Sparkline</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>chart-morris.html">Morris</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="feather"></i><span>Icons</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>icon-font-awesome.html">Font Awesome</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>icon-material.html">Material Design</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>icon-ionicons.html">Ion Icons</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>icon-feather.html">Feather Icons</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>icon-weather-icon.html">Weather Icon</a></li>
              </ul>
            </li>
            <li class="menu-header">Media</li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Gallery</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>light-gallery.html">Light Gallery</a></li>
                <li><a href="<?=base_url(); ?>gallery1.html">Gallery 2</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i><span>Sliders</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url(); ?>carousel.html">Bootstrap Carousel.html</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>owl-carousel.html">Owl Carousel</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="<?=base_url(); ?>timeline.html"><i data-feather="sliders"></i><span>Timeline</span></a></li>
            <li class="menu-header">Maps</li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i><span>Google
                  Maps</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url(); ?>gmaps-advanced-route.html">Advanced Route</a></li>
                <li><a href="<?=base_url(); ?>gmaps-draggable-marker.html">Draggable Marker</a></li>
                <li><a href="<?=base_url(); ?>gmaps-geocoding.html">Geocoding</a></li>
                <li><a href="<?=base_url(); ?>gmaps-geolocation.html">Geolocation</a></li>
                <li><a href="<?=base_url(); ?>gmaps-marker.html">Marker</a></li>
                <li><a href="<?=base_url(); ?>gmaps-multiple-marker.html">Multiple Marker</a></li>
                <li><a href="<?=base_url(); ?>gmaps-route.html">Route</a></li>
                <li><a href="<?=base_url(); ?>gmaps-simple.html">Simple</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="<?=base_url(); ?>vector-map.html"><i data-feather="map-pin"></i><span>Vector
                  Map</span></a></li>
            <li class="menu-header">Pages</li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="user-check"></i><span>Auth</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url(); ?>auth-login.html">Login</a></li>
                <li><a href="<?=base_url(); ?>auth-register.html">Register</a></li>
                <li><a href="<?=base_url(); ?>auth-forgot-password.html">Forgot Password</a></li>
                <li><a href="<?=base_url(); ?>auth-reset-password.html">Reset Password</a></li>
                <li><a href="<?=base_url(); ?>subscribe.html">Subscribe</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="alert-triangle"></i><span>Errors</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>errors-503.html">503</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>errors-403.html">403</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>errors-404.html">404</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>errors-500.html">500</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Other
                  Pages</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url(); ?>create-post.html">Create Post</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>posts.html">Posts</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>profile.html">Profile</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>contact.html">Contact</a></li>
                <li><a class="nav-link" href="<?=base_url(); ?>invoice.html">Invoice</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?=base_url(); ?>#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="chevrons-down"></i><span>Multilevel</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url(); ?>#">Menu 1</a></li>
                <li class="dropdown">
                  <a href="<?=base_url(); ?>#" class="has-dropdown">Menu 2</a>
                  <ul class="dropdown-menu">
                    <li><a href="<?=base_url(); ?>#">Child Menu 1</a></li>
                    <li class="dropdown">
                      <a href="<?=base_url(); ?>#" class="has-dropdown">Child Menu 2</a>
                      <ul class="dropdown-menu">
                        <li><a href="<?=base_url(); ?>#">Child Menu 1</a></li>
                        <li><a href="<?=base_url(); ?>#">Child Menu 2</a></li>
                      </ul>
                    </li>
                    <li><a href="<?=base_url(); ?>#"> Child Menu 3</a></li>
                  </ul>
                </li>
              </ul>
            </li> -->
          </ul>
        </aside>
      </div>
      