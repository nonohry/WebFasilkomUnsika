
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
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        <?php
                                            if($stat == 'new'){
                                                echo "Add Pages";
                                            }
                                            else {
                                                echo "Edit Pages";
                                            }
                                        ?>
                                    </h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo site_url('panel/pages/save');?>" enctype="multipart/form-data" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title Pages</label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                             <input type="hidden" name="stat" value="<?=$stat ?>" />
                                            <input type="text" required="" class="form-control" name="judul" value="<?=$judul ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Content Pages</label>
                                            <div class='box-body pad'>
                                                <textarea id="editor1" name="content" rows="10" cols="80"><?=$content ?>
                                                </textarea>  
                                            </div>  
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status    </label>
                                            <select name="status">
                                                <option value="1"> Publish</option>
                                                <option value="2"> Draft</option>
                                            </select> 
                                        </div>
                                       

                                    </div>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">
                                            <?php
                                            if($stat == 'new'){
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
        </div>