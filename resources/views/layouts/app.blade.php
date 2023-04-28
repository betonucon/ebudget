
<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{url_plug()}}/assets/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="{{url_plug()}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="{{url_plug()}}/assets/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
  <link href="{{url_plug()}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="{{url_plug()}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" />


  <link href="{{url_plug()}}/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{url_plug()}}/assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="{{url_plug()}}/assets/css/style.css" rel="stylesheet" />
  <link href="{{url_plug()}}/assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="{{url_plug()}}/assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="{{url_plug()}}/assets/css/dark-theme.css" rel="stylesheet" />
  <link href="{{url_plug()}}/assets/css/light-theme.css" rel="stylesheet" />
  <link href="{{url_plug()}}/assets/css/semi-dark.css" rel="stylesheet" />
  <link href="{{url_plug()}}/assets/css/header-colors.css" rel="stylesheet" />
  <link href="{{url_plug()}}/picker/css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="{{url_plug()}}/picker/css/bootstrap-datepicker3.min.css" rel="stylesheet" />

  <title>Onedash - Bootstrap 5 Admin Template</title>
  <style>
    table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td {
        text-align: left;
        font-size: 12px;
        font-family: sans-serif;
    }
    .col-form-label {
        padding-top: calc(0.375rem + 1px);
        padding-bottom: calc(0.375rem + 1px);
        margin-bottom: 0;
        text-align: right;
        font-size: inherit;
        line-height: 1.5;
    }
    .nav-danger.nav-tabs .nav-link.active {
      color: #76696a !important;
      background: #f3f3ff;
      border: #f3f3ff solid 1px !important;
    }
    .btn-group-sm>.btn, .btn-sm {
        padding: 2px 5px  !important;
        font-size: .875rem  !important;
        border-radius: 0.2rem  !important;
    }
    table.table-bordered.dataTable td {
        border-left-width: 0;
        font-size: 13px;
        padding: 2px 10px !important;
    }
    .btn i {
      vertical-align: middle  !important;
      font-size: 1.rem  !important;
      margin-top: 0em  !important;
      margin-bottom: 0em  !important;
      margin-left: 0px  !important;
  }
    div.dataTables_wrapper div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        width: 88% !important;
        text-align: left;
    }
    .nav-primary.nav-tabs .nav-link.active {
        color: #484a4c;
        border-color: #fff;
        background: #fff;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: 0.5em;
        display: inline-block;
        width: 86% !important;
    }
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1055;
        display: none;
        width: 100%;
        background: #11111278;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
        outline: 0;
    }
    html.semi-dark .sidebar-wrapper .sidebar-header img {
        filter: initial;
    }
    html.semi-dark .sidebar-wrapper, html.semi-dark .sidebar-wrapper .sidebar-header {
        background-color: #fdfeff;
    }
    .simplebar-content-wrapper {
      background:#0d0d5e;
    }
    .modal-body {
        background: #f0f0ff;
        position: relative;
        flex: 1 1 auto;
        padding: 1rem;
    }
    .table>:not(:last-child)>:last-child>* {
        padding: 0.5rem 0.5rem !important;
        border-bottom-color: #b3b3b9;
    }
    .table>:not(caption)>*>* {
        padding: 0.3rem 0.5rem !important;
    }
    .loadnya {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1070;
			top: 0;
			left: 0;
			background-color: rgb(0,0,0);
			background-color: rgb(243 230 230 / 81%);
			overflow-x: hidden;
			transition: transform .9s;
		}
		.loadnya-content {
			position: relative;
			top: 25%;
			width: 100%;
			text-align: center;
			margin-top: 30px;
			color:#fff;
			font-size:20px;
		}
  </style>
</head>

<body>

  <div id="loadnya" class="loadnya">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="loadnya-content">
         
              <img src="{{url_plug()}}/img/logo.png" style="width:10%">
          
        </div>
	</div>
  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    <header class="top-header">        
      <nav class="navbar navbar-expand gap-3">
        <div class="mobile-toggle-icon fs-3">
            <i class="bi bi-list"></i>
          </div>
          <form class="searchbar">
              <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
              <input class="form-control" type="text" placeholder="Type here to search">
              <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
          </form>
          <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item search-toggle-icon">
                <a class="nav-link" href="#">
                  <div class="">
                    <i class="bi bi-search"></i>
                  </div>
                </a>
            </li>
            <li class="nav-item dropdown dropdown-user-setting">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="user-setting d-flex align-items-center">
                  <img src="{{url_plug()}}/assets/images/avatars/avatar-1.png" class="user-img" alt="">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <img src="{{url_plug()}}/assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="54" height="54">
                        <div class="ms-3">
                          <h6 class="mb-0 dropdown-user-name">Jhon Deo</h6>
                          <small class="mb-0 dropdown-user-designation text-secondary">HR Manager</small>
                        </div>
                     </div>
                   </a>
                 </li>
                 <li><hr class="dropdown-divider"></li>
                 <li>
                    <a class="dropdown-item" href="pages-user-profile.html">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-person-fill"></i></div>
                         <div class="ms-3"><span>Profile</span></div>
                       </div>
                     </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-gear-fill"></i></div>
                         <div class="ms-3"><span>Setting</span></div>
                       </div>
                     </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index2.html">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-speedometer"></i></div>
                         <div class="ms-3"><span>Dashboard</span></div>
                       </div>
                     </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-piggy-bank-fill"></i></div>
                         <div class="ms-3"><span>Earnings</span></div>
                       </div>
                     </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-cloud-arrow-down-fill"></i></div>
                         <div class="ms-3"><span>Downloads</span></div>
                       </div>
                     </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('keycloak.logout') }}">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-lock-fill"></i></div>
                         <div class="ms-3"><span>Logout</span></div>
                       </div>
                     </a>
                  </li>
              </ul>
            </li>
            <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="projects">
                  <i class="bi bi-grid-3x3-gap-fill"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                 <div class="row row-cols-3 gx-2">
                    <div class="col">
                      <a href="ecommerce-orders.html">
                       <div class="apps p-2 radius-10 text-center">
                          <div class="apps-icon-box mb-1 text-white bg-gradient-purple">
                            <i class="bi bi-basket2-fill"></i>
                          </div>
                          <p class="mb-0 apps-name">Orders</p>
                       </div>
                      </a>
                    </div>
                    <div class="col">
                      <a href="javascript:;">
                      <div class="apps p-2 radius-10 text-center">
                         <div class="apps-icon-box mb-1 text-white bg-gradient-info">
                          <i class="bi bi-people-fill"></i>
                         </div>
                         <p class="mb-0 apps-name">Users</p>
                      </div>
                    </a>
                   </div>
                   <div class="col">
                    <a href="ecommerce-products-grid.html">
                    <div class="apps p-2 radius-10 text-center">
                       <div class="apps-icon-box mb-1 text-white bg-gradient-success">
                        <i class="bi bi-trophy-fill"></i>
                       </div>
                       <p class="mb-0 apps-name">Products</p>
                    </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="component-media-object.html">
                    <div class="apps p-2 radius-10 text-center">
                       <div class="apps-icon-box mb-1 text-white bg-gradient-danger">
                        <i class="bi bi-collection-play-fill"></i>
                       </div>
                       <p class="mb-0 apps-name">Media</p>
                    </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="pages-user-profile.html">
                    <div class="apps p-2 radius-10 text-center">
                       <div class="apps-icon-box mb-1 text-white bg-gradient-warning">
                        <i class="bi bi-person-circle"></i>
                       </div>
                       <p class="mb-0 apps-name">Account</p>
                     </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="javascript:;">
                    <div class="apps p-2 radius-10 text-center">
                       <div class="apps-icon-box mb-1 text-white bg-gradient-voilet">
                        <i class="bi bi-file-earmark-text-fill"></i>
                       </div>
                       <p class="mb-0 apps-name">Docs</p>
                    </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="ecommerce-orders-detail.html">
                    <div class="apps p-2 radius-10 text-center">
                       <div class="apps-icon-box mb-1 text-white bg-gradient-branding">
                        <i class="bi bi-credit-card-fill"></i>
                       </div>
                       <p class="mb-0 apps-name">Payment</p>
                    </div>
                    </a>
                  </div>
                  <div class="col">
                    <a href="javascript:;">
                    <div class="apps p-2 radius-10 text-center">
                       <div class="apps-icon-box mb-1 text-white bg-gradient-desert">
                        <i class="bi bi-calendar-check-fill"></i>
                       </div>
                       <p class="mb-0 apps-name">Events</p>
                    </div>
                  </a>
                  </div>
                  <div class="col">
                    <a href="javascript:;">
                    <div class="apps p-2 radius-10 text-center">
                       <div class="apps-icon-box mb-1 text-white bg-gradient-amour">
                        <i class="bi bi-book-half"></i>
                       </div>
                       <p class="mb-0 apps-name">Story</p>
                      </div>
                    </a>
                  </div>
                 </div><!--end row-->
              </div>
            </li>
            <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="messages">
                  <span class="notify-badge">5</span>
                  <i class="bi bi-chat-right-fill"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end p-0">
                <div class="p-2 border-bottom m-2">
                    <h5 class="h5 mb-0">Messages</h5>
                </div>
               <div class="header-message-list p-2">
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <img src="{{url_plug()}}/assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="50" height="50">
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span class="msg-time float-end text-secondary">1 m</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard chunk of lorem...</small>
                        </div>
                     </div>
                   </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                       <img src="{{url_plug()}}/assets/images/avatars/avatar-2.png" alt="" class="rounded-circle" width="50" height="50">
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span class="msg-time float-end text-secondary">7 m</span></h6>
                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many desktop publishing</small>
                       </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                       <img src="{{url_plug()}}/assets/images/avatars/avatar-3.png" alt="" class="rounded-circle" width="50" height="50">
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span class="msg-time float-end text-secondary">2 h</span></h6>
                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making this the first true</small>
                       </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                       <img src="{{url_plug()}}/assets/images/avatars/avatar-4.png" alt="" class="rounded-circle" width="50" height="50">
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">Peter Costanzo <span class="msg-time float-end text-secondary">3 h</span></h6>
                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">It was popularised in the 1960</small>
                       </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                       <img src="{{url_plug()}}/assets/images/avatars/avatar-5.png" alt="" class="rounded-circle" width="50" height="50">
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">Thomas Wheeler <span class="msg-time float-end text-secondary">1 d</span></h6>
                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">If you are going to use a passage</small>
                       </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                       <img src="{{url_plug()}}/assets/images/avatars/avatar-6.png" alt="" class="rounded-circle" width="50" height="50">
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">Johnny Seitz <span class="msg-time float-end text-secondary">2 w</span></h6>
                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">All the Lorem Ipsum generators</small>
                       </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                       <img src="{{url_plug()}}/assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="50" height="50">
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span class="msg-time float-end text-secondary">1 m</span></h6>
                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard chunk of lorem...</small>
                       </div>
                    </div>
                  </a>
                 <a class="dropdown-item" href="#">
                   <div class="d-flex align-items-center">
                      <img src="{{url_plug()}}/assets/images/avatars/avatar-2.png" alt="" class="rounded-circle" width="50" height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span class="msg-time float-end text-secondary">7 m</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many desktop publishing</small>
                      </div>
                   </div>
                 </a>
                 <a class="dropdown-item" href="#">
                   <div class="d-flex align-items-center">
                      <img src="{{url_plug()}}/assets/images/avatars/avatar-3.png" alt="" class="rounded-circle" width="50" height="50">
                      <div class="ms-3 flex-grow-1">
                        <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span class="msg-time float-end text-secondary">2 h</span></h6>
                        <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making this the first true</small>
                      </div>
                   </div>
                 </a>
              </div>
              <div class="p-2">
                <div><hr class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <div class="text-center">View All Messages</div>
                  </a>
              </div>
             </div>
            </li>
            <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="notifications">
                  <span class="notify-badge">8</span>
                  <i class="bi bi-bell-fill"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end p-0">
                <div class="p-2 border-bottom m-2">
                    <h5 class="h5 mb-0">Notifications</h5>
                </div>
                <div class="header-notifications-list p-2">
                    <a class="dropdown-item" href="#">
                      <div class="d-flex align-items-center">
                         <div class="notification-box bg-light-primary text-primary"><i class="bi bi-basket2-fill"></i></div>
                         <div class="ms-3 flex-grow-1">
                           <h6 class="mb-0 dropdown-msg-user">New Orders <span class="msg-time float-end text-secondary">1 m</span></h6>
                           <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">You have recived new orders</small>
                         </div>
                      </div>
                    </a>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-purple text-purple"><i class="bi bi-people-fill"></i></div>
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">New Customers <span class="msg-time float-end text-secondary">7 m</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5 new user registered</small>
                        </div>
                     </div>
                   </a>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-success text-success"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">24 PDF File <span class="msg-time float-end text-secondary">2 h</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The pdf files generated</small>
                        </div>
                     </div>
                   </a>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-orange text-orange"><i class="bi bi-collection-play-fill"></i></div>
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">Time Response  <span class="msg-time float-end text-secondary">3 h</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5.1 min avarage time response</small>
                        </div>
                     </div>
                   </a>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-info text-info"><i class="bi bi-cursor-fill"></i></div>
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">New Product Approved  <span class="msg-time float-end text-secondary">1 d</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Your new product has approved</small>
                        </div>
                     </div>
                   </a>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-pink text-pink"><i class="bi bi-gift-fill"></i></div>
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">New Comments <span class="msg-time float-end text-secondary">2 w</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New customer comments recived</small>
                        </div>
                     </div>
                   </a>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-warning text-warning"><i class="bi bi-droplet-fill"></i></div>
                        <div class="ms-3 flex-grow-1">
                          <h6 class="mb-0 dropdown-msg-user">New 24 authors<span class="msg-time float-end text-secondary">1 m</span></h6>
                          <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">24 new authors joined last week</small>
                        </div>
                     </div>
                   </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-primary text-primary"><i class="bi bi-mic-fill"></i></div>
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">Your item is shipped <span class="msg-time float-end text-secondary">7 m</span></h6>
                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Successfully shipped your item</small>
                       </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-success text-success"><i class="bi bi-lightbulb-fill"></i></div>
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">Defense Alerts <span class="msg-time float-end text-secondary">2 h</span></h6>
                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">45% less alerts last 4 weeks</small>
                       </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-info text-info"><i class="bi bi-bookmark-heart-fill"></i></div>
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">4 New Sign Up <span class="msg-time float-end text-secondary">2 w</span></h6>
                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New 4 user registartions</small>
                       </div>
                    </div>
                  </a>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                      <div class="notification-box bg-light-bronze text-bronze"><i class="bi bi-briefcase-fill"></i></div>
                       <div class="ms-3 flex-grow-1">
                         <h6 class="mb-0 dropdown-msg-user">All Documents Uploaded <span class="msg-time float-end text-secondary">1 mo</span></h6>
                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Sussessfully uploaded all files</small>
                       </div>
                    </div>
                  </a>
               </div>
               <div class="p-2">
                 <div><hr class="dropdown-divider"></div>
                   <a class="dropdown-item" href="#">
                     <div class="text-center">View All Notifications</div>
                   </a>
               </div>
              </div>
            </li>
            </ul>
            </div>
      </nav>
    </header>
     <!--end top header-->

       <!--start sidebar -->
       <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <div>
              <img src="{{url_plug()}}/img/logo.png" style="width:100%" alt="logo icon">
            </div>
            
            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
          </div>
          <!--navigation-->
          @include('layouts.side')
          <!--end navigation-->
       </aside>
       <!--end sidebar -->

       <!--start content-->
            @yield('content')
       <!--end page main-->


       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        
        <div class="modal fade" id="modal-notifikasi" tabindex="-1" aria-hidden="true" style="background: #17171885;">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-info">
              <div class="modal-header">
                <h5 class="modal-title text-white">Notifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-black" style="background:#fff">
                  <div id="notifikasi"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
       <!--end switcher-->

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="{{url_plug()}}/assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="{{url_plug()}}/assets/js/jquery.min.js"></script>
  <script src="{{url_plug()}}/assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="{{url_plug()}}/assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="{{url_plug()}}/assets/plugins/input-tags/js/tagsinput.js"></script>
  <script src="{{url_plug()}}/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="{{url_plug()}}/assets/js/pace.min.js"></script>
  <script src="{{url_plug()}}/assets/js/app.js"></script>
  <script src="{{url_plug()}}/picker/js/bootstrap-datepicker.js"></script>
  <script src="{{url_plug()}}/picker/js/bootstrap-datepicker.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  @stack('ajax')
  @stack('datatable')
  <script>
    function load(){
			document.getElementById("loadnya").style.width = "100%";
		}
		function close_load(){
			document.getElementById("loadnya").style.width = "0%";
		}
		$(document).ready(function() {
			
			load();
		});
		
		window.setTimeout(function () {
			document.getElementById("loadnya").style.width = "0%";
		}, 500);
    
  </script>
  
  
</body>

</html>