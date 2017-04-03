<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/admin/img/fav.png">
        <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/admin/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <header class="header">
            <a href="<?php site_url('panel/home') ?>" class="logo">
				<b>Fasilkom CMS</b>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
                            <a href="<?php echo base_url(); ?>" target="_blank">
                                <i class="glyphicon glyphicon-eye-open"></i>
                                <span>View Website</span>
                            </a>
					</li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Administrator<i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?=$avatar ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?=$user ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url(); ?>panel/user" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url(); ?>panel/logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                         <a href="<?php echo base_url(); ?>panel/user" class="btn btn-default btn-flat">
                            <img src="<?=$avatar ?>" style="width: 175px;height: 100px;" alt="User Image" /></a>
                        </div>
                        <div class="pull-left info">
                            <p>WELCOME  <?=$user ?></p>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo base_url();?>panel/home">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="<?php echo base_url();?>panel/menu">
                                <i class="fa fa-crop"></i> <span>Menu</span>
                            </a>
                        </li>
                       
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>Content</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li> 
								<a href="<?php echo base_url();?>panel/artikel">
                                		<i class="fa fa-crop"></i> <span>All Content</span> 
										<small class="badge pull-right bg-red">All</small>
                           		</a>
                        		</li>
								<li> 
								<a href="<?php echo base_url();?>panel/artikel/add">
                                		<i class="fa fa-crop"></i> <span>Buat Baru</span> 
										<small class="badge pull-right bg-green">New</small>
                           		</a>
                        		</li>
                            </ul>
                        </li>
						
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>Pages</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li> 
								<a href="<?php echo base_url();?>panel/pages">
                                		<i class="fa fa-crop"></i> <span>All Pages</span> 
										<small class="badge pull-right bg-red">All</small>
                           		</a>
                        		</li>
								<li> 
								<a href="<?php echo base_url();?>panel/pages/add">
                                		<i class="fa fa-crop"></i> <span>Create New</span> 
										<small class="badge pull-right bg-green">New</small>
                           		</a>
                        		</li>
                            </ul>
                        </li>
						
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>Galeri Foto</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li> 
								<a href="<?php echo base_url();?>panel/album">
                                		<i class="fa fa-crop"></i> <span>Album Foto Foto</span> 
										<small class="badge pull-right bg-red">All</small>
                           		</a>
                        		</li>
                                <li> 
                                <a href="<?php echo base_url();?>panel/galeri">
                                        <i class="fa fa-crop"></i> <span>All Galeri Foto</span> 
                                        <small class="badge pull-right bg-red">All</small>
                                </a>
                                </li>
                            </ul>
                        </li>

                        <li class="active">
                            <a href="<?php echo base_url();?>panel/karyawan">
                                <i class="fa fa-tags"></i> <span>Data Dosen</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="<?php echo base_url();?>panel/download">
                                <i class="fa fa-tags"></i> <span>Download</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="<?php echo base_url();?>panel/link_ex">
                                <i class="fa fa-tags"></i> <span>Link Eksternal</span>
                            </a>
                        </li>

						
						<li class="active">
                            <a href="<?php echo base_url();?>panel/setting">
                                <i class="fa fa-gear"></i> <span>Setting</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="<?php echo base_url();?>panel/contact">
                                <i class="fa fa-envelope-o"></i> <span>Contact</span>
                            </a>
                        </li>
						
                    </ul>
                </section>
            </aside>
