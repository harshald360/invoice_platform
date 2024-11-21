<div class="wrapper">

	<!-- Preloader -->
	<div class="preloader flex-column justify-content-center align-items-center">
		<img class="animation__shake" src="<?= base_url('public'); ?>/dist/img/65ba488626025cff82f091336fbf94bb.gif" alt="<?= $_ENV['PROJECT_NAME']; ?>" height="300" width="300">
	</div>

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>      
			<li class="nav-item" style="margin: auto;" >
                <h5 class="mb-0"><span><strong>Welcome, <span><?= session()->has('isCustLoggedIn') ? session()->get('cust_name') : session()->get('name'); ?></strong></span></h5>
            </li>
		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">

			<!-- Profile Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="far fa-user fa-lg" ></i> <i class="fas fa-arrow-down"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<span class="dropdown-item dropdown-header">
					<div class="image">
			          <img src="<?= base_url('public'); ?>/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image" style="width: 30%;padding: .2rem;">
			        </div>
			        <br>
					<b><?= session()->get('name'); ?></b><br> ( <?= session()->get('email'); ?> ) </span>
					<div class="dropdown-divider"></div>
					<a href="<?= site_url($panel.'/users/edit/'.session()->get('id')); ?>" class="dropdown-item">
						<i class="fas fa-user mr-2"></i> Profile Details
					</a>
					<div class="dropdown-divider"></div>
					<div class="dropdown-divider"></div>
					<a href="<?= site_url($panel.'/logout') ?>" class="dropdown-item">
						<i class="fas fa-sign-out-alt mr-2"></i> Logout
					</a>
				</div>
			</li>			
		</ul>
	</nav>
  <!-- /.navbar -->