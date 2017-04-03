
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Welcome Administrator
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <a href="<?php echo base_url(); ?>panel/link_ex/new" class="btn btn-primary">Add Eksternal Link</a>
                <br />
                <br />
					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manajemen Eksternal Link</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Link</th>
                                            <th>Url</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                            foreach ($link_ex as $k) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $k['nama_link']?></td>
                                                        <td><a href="<?php echo $k['url']?>" target="_blank"><?php echo $k['nama_link']?></a></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/link_ex/edit/')?>/<?=$k['id']?>"><span class="label label-success">Edit</span></a>
                                                            <a onclick="return confirm('Are You Sure ?')" href="<?=site_url('panel/link_ex/del/')?>/<?=$k['id']?>"><span class="label label-danger">Hapus</span></a>
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