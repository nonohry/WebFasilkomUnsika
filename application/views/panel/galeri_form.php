
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Welcome Administrator
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
                                                echo "Add Gallery Photo";
                                            }
                                            else {
                                                echo "Edit Gallery Photo";
                                            }
                                        ?>
                                    </h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo site_url('panel/galeri/save');?>" enctype="multipart/form-data" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <input type="hidden" name="status" value="<?=$status ?>" />
                                            <input type="text" required="" class="form-control" name="judul" value="<?=$judul ?>" placeholder="Masukan Judul Gambar">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pilih Album</label>
                                            <select name="album" class="form-control" required="">
                                                <option> -- Pilih Album Foto -- </option>
                                                <?php
                                                    foreach ($album as $a) {?>
                                                        <option value="<?=$a['id']?>"><?=$a['nama_album']?></option>
                                                    <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File Images</label>
                                            <input type="file" name="foto" required="" >
                                            <p class="help-block">*Format Gambar JPG/PNG <br /> * Ukuran Gambar Harus (570px) x (570px) </p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                           <input type="text" required="" class="form-control" name="deskripsi" value="<?=$judul ?>" placeholder="Masukan Judul Gambar">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kategori </label>
                                            <select name="kategori"  class="form-control">
                                                <option value="1"> Gallery Photo</option>
                                                <option value="2"> Portofolio</option>
                                                <option value="3"> Other</option>
                                            </select> 
                                        </div>

                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Status </label>
                                            <select name="statuspub"  class="form-control">
                                                <option value="1"> Publish</option>
                                                <option value="0"> Draft</option>
                                            </select> 
                                        </div>

                                    </div>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">
                                            <?php
                                            if($status == 'baru'){
                                                echo "Save";
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