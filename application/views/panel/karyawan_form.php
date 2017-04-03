
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
                                                echo "Tambah Data Dosen";
                                            }
                                            else {
                                                echo "Edit Data Dosen";
                                            }
                                        ?>
                                    </h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo site_url('panel/karyawan/save');?>" enctype="multipart/form-data" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Dosen</label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <input type="hidden" name="status" value="<?=$status ?>" />
                                            <input type="text" required="" class="form-control" name="nama_dosen" value="<?=$nama_dosen ?>" placeholder="Masukan Nama Dosen">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIDN</label>
                                            <input type="text" class="form-control" name="nidn" value="<?=$nidn ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Foto Dosen</label>
                                            <input  class="form-control" type="file" name="foto" required >
                                            <p class="help-block">*Format Gambar JPG/PNG <br /> * Kosongkan Jika Foto Tidak Di Ganti </p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Curiculum Vitae</label>
                                            <input  class="form-control" type="file" name="cv" required >
                                            <p class="help-block">*Format CV Pdf/ Doc / Docx </p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status Mengajar</label>
                                            <select  class="form-control" name="status_mengajar">
                                                <option value="aktif"> Aktif </option>
                                                <option value="studi lanjut  s3"> Studi Lanjut SIII </option>
                                                <option value="tidakaktif"> Tidak  Aktif </option>
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