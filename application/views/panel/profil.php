
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
                                    <h3 class="box-title">Setting  Administrator Account</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo site_url('panel/user/save');?>" enctype="multipart/form-data" method="POST">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <input type="text" required="" class="form-control" name="nama_lengkap" value="<?=$fullname ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" required="" class="form-control" name="username" value="<?=$username ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" required="" class="form-control" name="password" placeholder="Isikan Password Baru" />
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="email" required="" class="form-control" name="email" value="<?=$email ?>" />
                                        </div>

                                    </div>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->