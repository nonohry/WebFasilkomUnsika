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
