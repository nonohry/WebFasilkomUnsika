<!-- Being Page Title -->
<div class="container">
    <div class="page-title clearfix">
        <div class="row">
            <div class="col-md-12">
                <h6><a href="<?php echo base_url(); ?>">Home</a></h6>
                <h6><a href=""><?=$kategori ?></a></h6>
                <h6><span class="page-active"><?=$judul ?></span></h6>
            </div>
        </div>
    </div>
</div>

  <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-post-container">
                            <div class="blog-post-image">
                                <img src="<?php echo base_url(); ?>file/blog/<?=$images ?>" alt="" />
                                <div class="blog-post-meta">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i><?=$date ?></li>
                                        <li><i class="fa fa-user"></i>Administrator</li>
                                    </ul>
                                </div> <!-- /.blog-post-meta -->
                            </div> <!-- /.blog-post-image -->
                            <div class="blog-post-inner">
                                <h3 class="blog-post-title"><?=$judul ?></h3>
                                <hr />
                                
                                <span style="float:right">

                                        <!-- AddThis Button BEGIN -->
                                        <div class="addthis_toolbox addthis_default_style ">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                        <a class="addthis_button_tweet"></a>
                                        <a class="addthis_counter addthis_pill_style"></a>
                                        </div>
                                        <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5359d68b414720e1"></script>
                                        <!-- AddThis Button END -->
                                </span>

                                        <?php
                                            $tanggal        = $date;
                                            $namahari       = date('D',strtotime($tanggal));

                                            if ($namahari == "Sunday") $namahari = "Minggu";
                                                else if ($namahari == "Mon") $namahari = "Senin";
                                                else if ($namahari == "Tue") $namahari = "Selasa";
                                                else if ($namahari == "Wed") $namahari = "Rabu";
                                                else if ($namahari == "Thu") $namahari = "Kamis";
                                                else if ($namahari == "Fri") $namahari = "Jumat";
                                                else if ($namahari == "Sat") $namahari = "Sabtu";
                                        ?>

                                <span style="float:left">
                                   <?=$namahari ?>, <?=$tanggal ?> - <?=$time ?> WIB 
                                </span>
                                    <br />
                                    <br />
                                    <?=$content ?>
                                <hr />

                                <h4 class="widget-title">Share Berita</h4>
                                <br />

                                <span class='st_facebook_hcount' displayText='Facebook'></span>
                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                                <a class="addthis_button_preferred_1"></a>
                                <a class="addthis_button_preferred_2"></a>
                                <a class="addthis_button_preferred_3"></a>
                                <a class="addthis_button_preferred_4"></a>
                                <a class="addthis_button_compact"></a>
                                <a class="addthis_counter addthis_bubble_style"></a>
                                </div>
                                <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5359d68b414720e1"></script>
                                <!-- AddThis Button END -->

                                
                            </div>
                        </div> <!-- /.blog-post-container -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-main comment-form">
                            <div class="widget-main-title">
                                <h4 class="widget-title">Komentari Berita</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">
                                <div class="row">
                                    <div class="col-md-12">
                                       <fb:comments width="710" href="<?php echo base_url();?>content/<?=$kategori?>/<?=$slug?>" numposts="5" colorscheme="light"></fb:comments>
                                    </div>
                                </div>
                            </div> <!-- /.widget-inner -->
                        </div> <!-- /.widget-main -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->

            </div> <!-- /.col-md-8 -->

            <!-- Here begin Sidebar -->
            <div class="col-md-4">
                <?php include 'sidebar.php'; ?>
            </div> <!-- /.col-md-4 -->
    
        </div> <!-- /.row -->
    </div> <!-- /.container -->