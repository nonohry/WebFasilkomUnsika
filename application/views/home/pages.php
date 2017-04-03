<!-- Being Page Title -->
<div class="container">
    <div class="page-title clearfix">
        <div class="row">
            <div class="col-md-12">
                <h6><a href="<?php echo base_url(); ?>">Home</a></h6>
                <h6><a href="">Pages</a></h6>
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

                            <div class="blog-post-inner">
                                <h3 class="blog-post-title"><?=$judul ?></h3>
                                <hr />
                                    <?=$content ?>
                                <hr />
                            </div>

                        </div> <!-- /.blog-post-container -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
                
            </div> <!-- /.col-md-8 -->

            <!-- Here begin Sidebar -->
            <div class="col-md-4">
                <?php include 'sidebar.php'; ?>
            </div> <!-- /.col-md-4 -->
    
        </div> <!-- /.row -->
    </div> <!-- /.container -->