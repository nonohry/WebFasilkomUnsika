
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="main-slideshow">
                    <div class="flexslider">
                        <ul class="slides">
                        <?php foreach ($slider_ar as $s): ?>
                            <li>
                                <img src="<?php echo base_url(); ?>file/blog/<?=$s['img_header']?>" />
                                <div class="slider-caption">
                                    <h2><a href="<?php echo base_url(); ?>content/<?=$s['category']?>/<?=$s['slug']?>"><?=$s['title']?></a></h2>
                                    <p><?php echo character_limiter(strip_tags($s['content']), 80) ?></p>
                                </div>
                            </li>
                        <?php endforeach ?>
                        </ul> <!-- /.slides -->
                    </div> <!-- /.flexslider -->
                </div> <!-- /.main-slideshow -->
            </div> <!-- /.col-md-12 -->
            
            <div class="col-md-4">
                <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title"><i class="fa fa-tags"></i> Berita Terbaru</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">

                            <?php foreach ($berita_baru as $s): ?>
                                <div class="blog-list-post clearfix">
                                    <div class="blog-list-thumb">
                                        <a href="<?php echo base_url(); ?>content/<?=$s['category']?>/<?=$s['slug']?>">
                                            <img src="<?php echo base_url(); ?>file/blog/<?=$s['img_header']?>" alt="<?=$s['title']?>" />
                                        </a>
                                    </div>
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title">
                                            <a href="<?php echo base_url(); ?>content/<?=$s['category']?>/<?=$s['slug']?>"><?=$s['title']?></a>
                                        </h5>
                                        <?php
                                            $tanggal        = $s['date'];
                                            $namahari       = date('D',strtotime($tanggal));

                                            if ($namahari == "Sunday") $namahari = "Minggu";
                                                else if ($namahari == "Mon") $namahari = "Senin";
                                                else if ($namahari == "Tue") $namahari = "Selasa";
                                                else if ($namahari == "Wed") $namahari = "Rabu";
                                                else if ($namahari == "Thu") $namahari = "Kamis";
                                                else if ($namahari == "Fri") $namahari = "Jumat";
                                                else if ($namahari == "Sat") $namahari = "Sabtu";
                                        ?>
                                        <p class="blog-list-meta small-text"><span><a href="#"><?=$namahari ?>, <?=$tanggal ?></a></span></p>
                                    </div>
                                </div> 
                            <?php endforeach ?>

                            </div> <!-- /.widget-inner -->
                        </div> <!-- /.widget-main -->
            </div> <!-- /.col-md-4 -->
        </div>
    </div>


    <div class="container">
        <div class="row">
            
            <div class="col-md-8">
                
                 <div class="row">
                    <div class="col-md-12">
                        <div class="widget-item">
                            <a href="http://ak.cs.unsika.ac.id" class="btn btn-info btn-large"><i class="fa fa-bookmark-o"></i> Student Access</a>
                            <a href="https://classroom.google.com" class="btn btn-info btn-large"><i class="fa fa-bookmark-o"></i> eLearning Access</a>
                            <a href="http://www.unsika.ac.id/unsikamail/" class="btn btn-info btn-large"><i class="fa fa-envelope"></i> Mail Access</a>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    
                    <!-- Show Latest Blog News -->
                    <div class="col-md-6">
                        <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title"><i class="fa fa-tags"></i> Berita Kampus</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">

                            <?php foreach ($berita_kampus as $b): ?>
                                <div class="blog-list-post clearfix">
                                    <div class="blog-list-thumb">
                                        <a href="<?php echo base_url(); ?>content/<?=$b['category']?>/<?=$b['slug']?>">
                                            <img src="<?php echo base_url(); ?>file/blog/<?=$b['img_header']?>" alt="" />
                                        </a>
                                    </div>
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title">
                                            <a href="<?php echo base_url(); ?>content/<?=$b['category']?>/<?=$b['slug']?>"><?=$b['title']?></a>
                                        </h5>
                                        <?php
                                            $tanggal        = $b['date'];
                                            $namahari       = date('D',strtotime($tanggal));

                                            if ($namahari == "Sunday") $namahari = "Minggu";
                                                else if ($namahari == "Mon") $namahari = "Senin";
                                                else if ($namahari == "Tue") $namahari = "Selasa";
                                                else if ($namahari == "Wed") $namahari = "Rabu";
                                                else if ($namahari == "Thu") $namahari = "Kamis";
                                                else if ($namahari == "Fri") $namahari = "Jumat";
                                                else if ($namahari == "Sat") $namahari = "Sabtu";
                                        ?>
                                        <p class="blog-list-meta small-text"><span><a href="#"><?=$namahari ?>, <?=$b['date']?> </a></span></p>
                                    </div>
                                </div>
                            <?php endforeach ?>

                            </div> <!-- /.widget-inner -->
                        </div> <!-- /.widget-main -->
                    </div> <!-- /col-md-6 -->
                    
                    <!-- Show Latest Events List -->
                    <div class="col-md-6">
                        <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title"><i class="fa fa-bookmark"></i> Pengumuman</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">

                            <?php foreach ($pengumuman as $p): ?>
                            <?php
                                        $tanggal        = $b['date'];
                                        $namabulan      = date('M',strtotime($tanggal));                            ?>
                                
                                <div class="event-small-list clearfix">
                                    <div class="calendar-small">
                                        <span class="s-month"><?=$namabulan ?></span>
                                        <span class="s-date"><?php echo substr($p['date'],8,2) ?></span>
                                    </div>
                                    <div class="event-small-details">
                                        <h5 class="event-small-title">
                                             <a href="<?php echo base_url(); ?>content/<?=$p['category']?>/<?=$p['slug']?>"><?=$p['title']?></a>
                                        </h5>
                                        <p class="event-small-meta small-text"><?=$p['time']?> WIB</p>
                                    </div>
                                </div>
                            <?php endforeach ?>

                            </div> 
                        </div> 
                    </div> 
          
                    <div class="col-md-6">
                        <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title"><i class="fa fa-tag"></i> Download</h4>
                            </div>
                            <div class="widget-inner">

                                <?php foreach ($download as $d): ?>
                                <?php
                                    $tanggal        = $d['tanggal'];
                                    $namahari       = date('D',strtotime($tanggal));

                                    if ($namahari == "Sunday") $namahari = "Minggu";
                                        else if ($namahari == "Mon") $namahari = "Senin";
                                        else if ($namahari == "Tue") $namahari = "Selasa";
                                        else if ($namahari == "Wed") $namahari = "Rabu";
                                        else if ($namahari == "Thu") $namahari = "Kamis";
                                        else if ($namahari == "Fri") $namahari = "Jumat";
                                        else if ($namahari == "Sat") $namahari = "Sabtu";
                                ?>
                                <div class="blog-list-post clearfix">
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a target="_blank" href="<?php echo base_url();?>file/download/<?=$d['file']?>"><i class="fa fa-tag"></i><?=$d['judul_file']?></a></h5>
                                        <p class="blog-list-meta small-text"><span><a href="#"><?= $namahari ?>, <?=$tanggal ?> </a></span></p>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                
                            </div> 
                        </div>
                    </div> 
          
                    <div class="col-md-6">
                        <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title"><i class="fa fa-map-marker"></i> Peta Lokasi</h4>
                            </div> 
                            <div class="widget-inner">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5507729148394!2d107.30427351476962!3d-6.322580795424315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977ccc01437db%3A0x2d9bc8b5af7fb18f!2sFasilkom+Unsika!5e0!3m2!1sen!2sid!4v1491064891596" width="320" height="275" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div> 
                        </div>
                    </div>
                    
                </div>
                
            </div>
      
      
      
            <div class="col-md-4">
      
                        <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title"><i class="fa fa-tags"></i> Eksternal Link</h4>
                            </div> 
                            <div class="widget-inner">

                                <?php foreach ($link_ex as $l): ?>
                                <div class="blog-list-post clearfix">
                                    <div class="blog-list-details">
                                        <h5 class="blog-list-title"><a target="_blank" href="<?=$l['url']?>">
                                            <i class="fa fa-tags"></i> <?=$l['nama_link']?></a></h5>
                                    </div>
                                </div> 
                                    
                                <?php endforeach ?>

                            </div> 
                        </div>

                <div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title"><i class="fa fa-picture-o"></i> Galeri Foto</h4>
                    </div>
                    <div class="widget-inner">
                        <div class="gallery-small-thumbs clearfix">

                        <?php foreach ($galeri as $g): ?>
                            <div class="thumb-small-gallery">
                                <a class="fancybox" rel="gallery1" href="<?=site_url(); ?>file/galeri/<?=$g['image_url']?>" title="<?=$g['title_img']?>">
                                    <img src="<?=site_url(); ?>file/galeri/<?=$g['image_url']?>" alt="">
                                </a>
                            </div>
                        <?php endforeach ?>

                        </div> <!-- /.galler-small-thumbs -->
                    </div> <!-- /.widget-inner -->
                </div>

               <div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title"><i class="fa fa-tags"></i> SNMPTN 2017</h4>
                    </div>
                    <div class="widget-inner">
                        <img src="<?php echo base_url();?>assets/themes/home/images/snmptn.jpg" width="320" height="155" />
                    </div> 
                </div>

            </div>
      
      
      
        </div>
    
</div>


