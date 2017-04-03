
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
                                            if($stat == 'new'){
                                                echo "Tambah Menu Website";
                                            }
                                            else {
                                                echo "Edit Menu Website";
                                            }
                                        ?>
                                    </h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo site_url('panel/menu/save');?>" enctype="multipart/form-data" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Menu Name</label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                             <input type="hidden" name="stat" value="<?=$stat ?>" />
                                            <input type="text" required="" class="form-control" name="menu_name" value="<?=$menu_name ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Parent</label>
                                            <select class="form-control" name="parent_id">
                                                <option value="0"> Root</option>
                                                <?php foreach($menu->result() as $menu): ?> 
                                                    <option value="<?php echo $menu->menu_id; ?>"><?php echo $menu->menu_name; ?></option>
                                                <?php endforeach;?>  
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Type</label>
                                            <select class="form-control" name="view_type">
                                                <option value="1"> Url</option> 
                                                <option value="2"> Aricle</option>
                                                <option value="3"> Category</option>
                                                <option value="4"> Page</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Content Url</label>
                                            <input type="text" class="form-control" name="content_id" value="<?=$content_id ?>" placeholder="Kosongi atau Isikan Tanda # Bila Menu Utama" />
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label><br />
                                            <input type="radio" required=""  name="status" value="1" checked /> Publish &nbsp; &nbsp;
                                            <input type="radio" required=""  name="status" value="0"  /> Draft
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