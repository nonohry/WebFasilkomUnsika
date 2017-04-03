
            <aside class="right-side">                
                <section class="content-header">
                    <h1>
                        Content Website
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <a href="<?php echo base_url(); ?>panel/artikel/add" class="btn btn-primary">Add Content</a>
                <br />
                <br />
					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Content Website</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Title</th>
                                                <th>Url / Slug</th>
                                                <th>Date</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $no = 1;
                                            foreach ($artikel as $a) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo character_limiter($a['title'], 20) ?></td>
                                                        <td><?php echo character_limiter($a['slug'], 40) ?></td>
                                                        <td><?php echo $a['date']; ?></td>
                                                        <td><?php echo character_limiter($a['category'], 40) ?></td>
                                                        <td><?php echo character_limiter($a['status'], 40) ?></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/artikel/edit')?>/<?=$a['id']?>">
                                                                <span class="label label-success">Edit</span>
                                                            </a>
                                                            <a onclick="return confirm('Are You Sure ?')" href="<?=site_url('panel/artikel/del')?>/<?=$a['id']?>">
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
