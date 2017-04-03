
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Welcome Administrator
                        <small>Dashboard</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
					<div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                       <?=$jml_artikel ?>
                                    </h3>
                                    <p>
                                      Content
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion-paper-airplane"></i>
                                </div>
                                <a href="<?php echo base_url();?>panel/artikel" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                       <?=$jml_halaman ?>
                                    </h3>
                                    <p>
                                        Pages
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion-clipboard"></i>
                                </div>
                                <a href="<?php echo base_url();?>panel/pages" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                          <?=$jml_galeri ?>
                                    </h3>
                                    <p>
                                      Gallery Photos
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion-image"></i>
                                </div>
                                <a href="<?php echo base_url();?>panel/galeri" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						
						<div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?=$jml_pesan ?>
                                    </h3>
                                    <p>
                                      Contact Us
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion-email"></i>
                                </div>
                                <a href="<?php echo base_url();?>panel/contact" class="small-box-footer">
                                    View <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						
						
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->