
            <aside class="right-side">                
                <section class="content-header">
                    <h1>
                        Setting Menu Website
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <a href="<?php echo base_url(); ?>panel/menu/add" class="btn btn-primary">Add Menu</a>
                <br />
                <br />
					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Pengaturan Menu</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No.</th>
                                            <th>Menu Name</th>
                                            <th>Url / Slug</th>
                                            <th>Sub Menu</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                            foreach ($menu as $m) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo character_limiter($m['menu_name'], 20) ?></td>
                                                        <td><?php echo character_limiter($m['content_id'], 40) ?></td>
                                                        <td><?php echo character_limiter($m['parent_id'], 40) ?></td>
                                                        <td><?php echo character_limiter($m['status'], 40) ?></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/menu/edit')?>/<?=$m['menu_id']?>">
                                                                <span class="label label-success">Edit</span>
                                                            </a>
                                                            <a onclick="return confirm('Are You Sure ?')" href="<?=site_url('panel/menu/del')?>/<?=$m['menu_id']?>">
                                                                <span class="label label-danger">Hapus</span>
                                                            </a>
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