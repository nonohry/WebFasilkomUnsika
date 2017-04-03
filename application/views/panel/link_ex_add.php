
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
                                                echo "Add Eksternal Link";
                                            }
                                            else {
                                                echo "Edit  Eksternal Link";
                                            }
                                        ?>
                                    </h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo site_url('panel/link_ex/save');?>" enctype="multipart/form-data" method="POST">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Link</label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <input type="hidden" name="status" value="<?=$status ?>" />
                                            <input type="text" required="" class="form-control" name="nama_link" value="<?=$nama_link ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Url Link</label>
                                            <input type="text" required="" class="form-control" name="url_link" value="<?=$url_link ?>">
                                            <span> Ex : http://cs.unsika.ac.id </span>
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