 <!-- Sidebar -->
 <ul class="navbar-nav  sidebar sidebar-light accordion text-dark " id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">RESORT ADMIN </sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ $data == 'dashboard' ? 'active' : '' }}">
         <a class="nav-link" href="dashboard">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard {{ $data }}</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Interface
     </div>

     <!-- Nav Item - Staff -->
     <li class="nav-item  {{ $data == 'staff' ? 'active' : '' }}">
         <a class="nav-link" href="staff">
             <i class="fas fa-fw fa-table"></i>
             <span>Staff</span></a>
     </li>

     <!-- Nav Item - Attendance -->
     <li class="nav-item">
         <a class="nav-link" href="attendance">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Attendance</span></a>
     </li>

     <!-- Nav Item - Reservations -->
     <li class="nav-item">
         <a class="nav-link" href="profit">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Profit</span></a>
     </li>



     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Cottage </span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">

                 <a class="collapse-item" href="cottage_details">Cottage Details</a>
                 <a class="collapse-item" href="add_cottage">Add Cottage</a>
             </div>
         </div>
     </li>



     <!-- Nav Item - Utilities Collapse Menu --> `
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
             aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Entrance</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">

                 <a class="collapse-item" href="entrance_details">Details</a>
                 <a class="collapse-item" href="add_entrance">Add Entrance Fee</a>

             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">



     <!-- Nav Item - Pages Collapse Menu
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
    </div>
</li> -->





     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>



 </ul>
 <!-- End of Sidebar -->
