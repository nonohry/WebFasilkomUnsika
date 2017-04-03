
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Welcome Administrator
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <a href="<?php echo base_url(); ?>panel/download/new" class="btn btn-primary">Add File Download</a>
                <br />
                <br />
					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manajemen Download</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No.</th>
                                            <th>Name File</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                            foreach ($download as $k) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo character_limiter($k['judul_file'], 20) ?></td>
                                                        <td><a href="<?php echo base_url();?>file/download/<?php echo character_limiter($k['file'], 20) ?>" target="_blank"><?php echo character_limiter($k['file'], 20) ?></a></td>
                                                        <td><?php echo character_limiter($k['status'], 30) ?></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/download/edit')?>/<?=$k['id']?>"><span class="label label-success">Edit</span></a>
                                                            <a onclick="return confirm('Are You Sure ?')" href="<?=site_url('panel/download/del/')?>/<?=$k['id']?>"><span class="label label-danger">Hapus</span></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->