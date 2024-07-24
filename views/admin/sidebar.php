 <?php 
    $mod = isset($_GET['mod']) ? $_GET['mod'] : '';
 ?>
 
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/views/admin/index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Hotel Admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php echo $mod == '' ? 'active' : '' ?>">
    <a class="nav-link" href="/views/admin/index.php?mod=">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?php echo $mod == 'hotel' ? 'active' : '' ?>">
<a class="nav-link" href="/views/admin/hotel/index.php?mod=hotel?mod=hotel">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Hotel</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>


</ul>