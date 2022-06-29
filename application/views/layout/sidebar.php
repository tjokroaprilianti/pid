<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-white sidebar sidebar-light accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<!-- <i class="fas fa-laugh-wink"></i> -->
			<i class="fas fa-desktop"></i>
		</div>
		<div class="sidebar-brand-text mx-3">PID <sup>V1</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		MENU
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item <?= $this->uri->segment(1) == 'pengajuan' ? 'active' : '' ?>">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-clipboard-list"></i>
			<!-- <i class="fas fa-fw fa-book"></i> -->
			<span>Pengajuan</span>
		</a>
		<div id="collapseTwo" class="collapse <?= $this->uri->segment(1) == 'pengajuan' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item <?= $this->uri->segment(1) == 'pengajuan' && $this->uri->segment(2) == 'kontrak' || $this->uri->segment(2) == 'add_kontrak' ? 'active text-primary' : '' ?>" href="<?= base_url('pengajuan/kontrak') ?>"><i class="far fa-circle"></i> Kontrak</a>
				<a class="collapse-item <?= $this->uri->segment(1) == 'pengajuan' && $this->uri->segment(2) == 'non_kontrak' ? 'active text-primary' : '' ?>" href="<?= base_url('pengajuan/non_kontrak') ?>"><i class="far fa-circle"></i> Non Kontrak</a>
			</div>
		</div>
	</li>

	<?php if ($this->session->userdata('role') == 'Admin') : ?>
		<!-- Nav Item - User -->
		<li class="nav-item <?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('user') ?>">
				<i class="fas fa-fw fa-users-cog"></i>
				<span>User</span></a>
		</li>
	<?php endif; ?>

	<!-- Nav Item - Tables -->
	<li class="nav-item <?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('profile') ?>">
			<i class="fas fa-fw fa-user-tie"></i>
			<span>Profile</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<?php if ($this->session->userdata('role') == 'Admin') : ?>
		<!-- Nav Item - Master -->
		<li class="nav-item <?= $this->uri->segment(1) == 'master' ? 'active' : '' ?>">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
				<i class="fas fa-fw fa-server"></i>
				<!-- <i class="fas fa-fw fa-book"></i> -->
				<span>Master</span>
			</a>
			<div id="collapseMaster" class="collapse <?= $this->uri->segment(1) == 'master' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item <?= $this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'role' ? 'active text-primary' : '' ?>" href="<?= base_url('master/role') ?>"><i class="far fa-circle"></i> Role</a>
					<a class="collapse-item <?= $this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'akses' ? 'active text-primary' : '' ?>" href="<?= base_url('master/akses') ?>"><i class="far fa-circle"></i> Akses</a>
					<a class="collapse-item <?= $this->uri->segment(1) == 'master' && $this->uri->segment(2) == 'unit' ? 'active text-primary' : '' ?>" href="<?= base_url('master/unit') ?>"><i class="far fa-circle"></i> Unit</a>
					<a class="collapse-item <?= $this->uri->segment(2) == 'cost' && $this->uri->segment(3) == 'center' ? 'active text-primary' : '' ?>" href="<?= base_url('master/cost/center') ?>"><i class="far fa-circle"></i> Cost Center</a>
					<a class="collapse-item <?= $this->uri->segment(2) == 'cost' && $this->uri->segment(3) == 'unit' ? 'active text-primary' : '' ?>" href="<?= base_url('master/cost/unit') ?>"><i class="far fa-circle"></i> Cost Unit</a>
				</div>
			</div>
		</li>
	<?php endif; ?>

	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Logout</span></a>
	</li>

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->