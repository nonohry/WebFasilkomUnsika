
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
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        <?php
                                            if($stat == 'new'){
                                                echo "Add Content Website";
                                            }
                                            else {
                                                echo "Edit Content Website";
                                            }
                                        ?>
                                    </h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo site_url('panel/artikel/save');?>" enctype="multipart/form-data" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title Content</label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                             <input type="hidden" name="stat" value="<?=$stat ?>" />
                                            <input type="text" required="" class="form-control" name="judul" value="<?=$judul ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Image Header Content</label>
                                            <input type="file" name="foto" required="">
											<!-- input type="file" name="foto" required="" -->
                                            <p class="help-block">* Image Type Must JPG/PNG</p>
                                            <?php
                                                if($stat == 'new'){
                                                  
                                                }
                                                else {
                                                    ?>
                                                         <img width="400px" height="300px" src="<?=site_url() ?>file/blog/<?=$image ?>">
                                                    <?php
                                                }
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Content</label>
                                            <div class='box-body pad'>
                                                <textarea id="editor1" name="content" rows="10" cols="80"><?=$content ?>
                                                </textarea>  
                                            </div>  
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category    </label>
                                            <select name="kategori"  class="form-control">
                                                <option value="news"> News</option>
                                                <option value="pengumuman"> Pengumuman</option>
                                                <option value="kampus"> Kampus</option>       
                                                <option value="elearning"> E-Learning</option>                                 
                                                <option value="lain-lain"> Lain-lain</option>
                                            </select> 
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status    </label>
                                            <select name="status"  class="form-control">
                                                <option value="1"> Publish</option>
                                                <option value="0"> Draft</option>
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
        </div><!-- ./wrapper -->
        