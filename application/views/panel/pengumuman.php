
            <aside class="right-side">                
                <section class="content-header">
                    <h1>
                        Pengumuman - pengumuman
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <a href="<?php echo base_url(); ?>panel/pengumuman/add" class="btn btn-primary">Tambah Pengumuman</a>
                <br />
                <br />
					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Pengumuman </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Url / Slug</th>
                                            <th>Date</th>
                                            <th>Author</th>
                                            <th>Content</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                            foreach ($pengumuman as $a) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo character_limiter($a['title'], 20) ?></td>
                                                        <td><?php echo character_limiter($a['slug'], 40) ?></td>
                                                        <td><?php echo $a['date']; ?></td>
                                                        <td><?php echo $a['author']; ?></td>
                                                        <td><a href="../pengumuman/<?=$a['id'] ?>-<?=$a['slug']?>" target="_blank">
                                                        <span class="label label-danger">View pengumuman</span></a></td>
                                                        <td><?php echo character_limiter($a['status'], 40) ?></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/pengumuman/edit')?>/<?=$a['id']?>">
                                                                <span class="label label-success">Edit</span>
                                                            </a>
                                                            <a onclick="return confirm('Apa Anda Yakin ?')" href="<?=site_url('panel/pengumuman/del')?>/<?=$a['id']?>">
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