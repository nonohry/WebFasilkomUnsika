
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Selamat Datang Administrator
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        <?php
                                            if($status == 'baru'){
                                                echo "Tambah Gambar Slide Landing";
                                            }
                                            else {
                                                echo "Edit Gambar Slide Landing";
                                            }
                                        ?>
                                    </h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo site_url('panel/landing/save');?>" enctype="multipart/form-data" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul</label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <input type="hidden" name="status" value="<?=$status ?>" />
                                            <input type="text" required="" class="form-control" name="judul" value="<?=$judul ?>" placeholder="Masukan Judul Gambar">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File Gambar</label>
                                            <input type="file" name="foto" required="">
                                            <p class="help-block">* Type gambar harus JPG/PNG</p>
                                            <?php
                                                if($status == 'baru'){
                                                    echo "<img src= ''>";
                                                }
                                                else {
                                                    ?>
                                                         <img width="400px" height="300px" src="<?=site_url() ?>file/landing/<?=$image ?>">
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Deskripsi</label>
                                           <input type="text" required="" class="form-control" name="deskripsi" value="<?=$deskripsi ?>" placeholder="Masukan Deskripsi Gambar">
                                        </div>

                                    </div>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">
                                            <?php
                                            if($status == 'baru'){
                                                echo "Simpan";
                                            }
                                            else {
                                                echo "Update";
                                            }
                                        ?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->