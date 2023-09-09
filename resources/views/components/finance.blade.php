<html lang="en">
<head>
   @include('layouts.header')
</head>
<body>
   
   {{-- <h1>Finance</h1> --}}

       <!-- Navbar -->
       <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
             <li class="nav-item">
                 <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </ul>
 
         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">
             <!-- Navbar Search -->
             <li class="nav-item">
                 <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                     <i class="fas fa-search"></i>
                 </a>
                 <div class="navbar-search-block">
                     <form class="form-inline">
                         <div class="input-group input-group-sm">
                             <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                 aria-label="Search">
                             <div class="input-group-append">
                                 <button class="btn btn-navbar" type="submit">
                                     <i class="fas fa-search"></i>
                                 </button>
                                 <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                     <i class="fas fa-times"></i>
                                 </button>
                             </div>
                         </div>
                     </form>
                 </div>
             </li>
 
 
 
             <li class="nav-item">
                 <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                     <i class="fas fa-expand-arrows-alt"></i>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                     role="button">
                     <i class="fas fa-th-large"></i>
                 </a>
             </li>
         </ul>
     </nav>
     <!-- /.navbar -->
 
     <!-- Main Sidebar Container -->
     <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <a href="#" class="brand-link">
             <img src="https://assets.jalantikus.com/assets/cache/55/55/apps/2020/11/06/logo-kasir-pintar-free-4b5ed.png" alt="Kasir Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
             <span class="brand-text font-weight-light">{{session('user')->jabatan}}</span>
         </a>
 
         <!-- Sidebar -->
         <div class="sidebar">
             <!-- Sidebar user panel (optional) -->
             <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="font-size: 1.2em;">
                 <div class="info">
                     <a href="#" class="d-block">{{session('user')->nama}}</a>
                 </div>
             </div>
 
             <!-- Sidebar Menu -->
             <nav class="mt-2">
                 <ul class="nav nav-pills nav-sidebar flex-column h-100" data-widget="treeview" role="menu"
                     data-accordion="false">
                     <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                     <li class="nav-item menu-open">
                         <a href="#" class="nav-link active">
                             <i class="fas fa-solid fa-list-check"></i>
                             <p>
                                 Reimbursement
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/dasboard-finance" class="nav-link active">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>List</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a href="{{url("/logout")}}" class="nav-link">
                             <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                             <p>Log Out</p>
                         </a>
                     </li>
                 </ul>
             </nav>
             <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
     </aside>
   
   @yield('content')

   @include('layouts.footer')
</body>
</html>