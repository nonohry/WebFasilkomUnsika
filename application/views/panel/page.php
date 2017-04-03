
            <aside class="right-side">                
                <section class="content-header">
                    <h1>
                        Pages Website
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <a href="<?php echo base_url(); ?>panel/pages/add" class="btn btn-primary">Add Pages</a>
                <br />
                <br />
					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Pages </h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Title</th>
                                                <th>Url / Slug</th>
                                                <th>Content</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                        $no = 1;
                                            foreach ($pages as $p) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo character_limiter($p['title'], 20) ?></td>
                                                        <td><?php echo $p['slug']; ?></td>
                                                        <td><a href="../pages/<?=$p['slug']?>" target="_blank"><span class="label label-danger">View Pages</span></a></td>
                                                        <td><?php echo character_limiter($p['status'], 40) ?></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/pages/edit')?>/<?=$p['id']?>">
                                                                <span class="label label-success">Edit</span>
                                                            </a>
                                                            <a onclick="return confirm('Are You Sure ?')" href="<?=site_url('panel/pages/del')?>/<?=$p['id']?>">
                                                                <span class="label label-danger">Hapus</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->