
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
                                                echo "Tambah File Download";
                                            }
                                            else {
                                                echo "Edit  File Download";
                                            }
                                        ?>
                                    </h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo site_url('panel/download/save');?>" enctype="multipart/form-data" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul</label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <input type="hidden" name="status" value="<?=$status ?>" />
                                            <input type="text" required="" class="form-control" name="judul" value="<?=$judul ?>" placeholder="Masukan Judul Gambar">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File Download</label>
                                            <input type="file" name="file" required="" >
                                            <p class="help-block">* Type Berupa pdf/docx/doc/jpg/png/zip/rar</p>
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