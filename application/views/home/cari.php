<!-- Being Page Title -->
<div class="container">
    <div class="page-title clearfix">
        <div class="row">
            <div class="col-md-12">
                 <h6><a href="<?php echo base_url(); ?>">Home</a></h6>
                <h6><span class="page-active">News </span></h6>
            </div>
        </div>
    </div>
</div>

<div class="container">
<div class="row">
     <div class="col-md-12">
        <br /><div class="alert alert-success">
            Anda Mencari Berita Dengan Kueri <strong><?=$t_se ?></strong>. <br /><br /> <b> <?=$kosong ?> </b>
        </div>
    </div>
</div>
</div>


    <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-8">
                <div class="row">

                    <?php foreach ($cari as $g): ?>    
                    <div class="col-md-6 col-sm-6">
                        <div class="blog-grid-item">
                            <div class="blog-grid-thumb">
                                <a href="<?=base_url(); ?>content/<?=$g->category ?>/<?=$g->slug ?>" class="cat-blog"><?=$g->category ?></a>
                                <a title="<?=$g->title?>" href="<?=base_url(); ?>content/<?=$g->category ?>/<?=$g->slug ?>">
                                    <img title="<?=$g->title?>" src="<?php echo base_url();?>file/blog/<?=$g->img_header ?>" alt="">
                                </a>
                            </div>
                            <div class="box-content-inner">
                                <h4 class="blog-grid-title">
                                        <a title="<?=$g->title?>" href="<?=base_url(); ?>content/<?=$g->category ?>/<?=$g->slug ?>"><?=character_limiter($g->title,30) ?></a>
                                </h4>
                                <?php
                                    $tanggal        = $g->date;
                                    $namahari       = date('D',strtotime($tanggal));

                                    if ($namahari == "Sunday") $namahari = "Minggu";
                                        else if ($namahari == "Mon") $namahari = "Senin";
                                        else if ($namahari == "Tue") $namahari = "Selasa";
                                        else if ($namahari == "Wed") $namahari = "Rabu";
                                        else if ($namahari == "Thu") $namahari = "Kamis";
                                        else if ($namahari == "Fri") $namahari = "Jumat";
                                        else if ($namahari == "Sat") $namahari = "Sabtu";
                                ?>
                                <p class="blog-grid-meta small-text"><span><a href="#"><?=$namahari ?>, <?=$g->date?></a></span></p>
                            </div> <!-- /.box-content-inner -->
                        </div> <!-- /.blog-grid-item -->
                    </div> <!-- /.col-md-6 -->
                    <?php endforeach ?>

                </div> <!-- /.row -->

            </div> <!-- /.col-md-8 -->

            <!-- Here begin Sidebar -->
            <div class="col-md-4">
                <?php include 'sidebar.php'; ?>
            </div> <!-- /.col-md-4 -->
    
        </div> <!-- /.row -->
    </div> <!-- /.container -->
