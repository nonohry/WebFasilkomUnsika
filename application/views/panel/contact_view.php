
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Detail Hubungui Kami
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fullname : </label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <td><p><?=$fullname ;?></p></td>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email : </label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <td><p><?=$email ;?></p></td>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website : </label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <td><p><?=$website ;?></p></td>
                                        </div>

                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Message : </label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <td><p><?=$message ;?></p></td>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Time : </label>
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <td><p style="text-align:justify;"><?=$time ;?></p></td>
                                        </div>

                                        <br />
                                        <a href="#repmessage" class="btn btn-primary btn-lg" data-toggle="modal" class="btn btn-primary">Balas Pesan</a>

                            </div>
                        </div>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <div class="modal fade" id="repmessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Balas Pesan Masuk</h4>
      </div>
      <div class="modal-body">
            <form role="form" action="<?php echo site_url('panel/contact/replay');?>" enctype="multipart/form-data" method="POST">
                <div class="box-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Isikan Subjek Email</label>
                    <div class='box-body pad'>
                         <input type="hidden" required="" class="form-control" name="email" value="<?=$email ;?>"  />
                       <input type="text" required="" class="form-control" name="subjek" placeholder="Masukan Subjek Email" />
                    </div>  
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Isikan Pesan Balasan</label>
                    <div class='box-body pad'>
                        <textarea id="editor1" name="messagerep" rows="5" cols="30"></textarea>  
                    </div>  
                </div>
                    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>