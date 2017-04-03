
            <aside class="right-side">                
                <section class="content-header">
                    <h1>
                        Gallery Photos
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <a href="<?php echo base_url(); ?>panel/galeri/add" class="btn btn-primary">Add Gallery Photos</a>
                <br />
                <br />
					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Gallery Photos</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Album</th>
                                                <th>Desc</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $no = 1;
                                            foreach ($galeri as $g) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo character_limiter($g['title_img'], 20) ?></td>
                                                        <td> <a href="<?=site_url(); ?>file/galeri/<?php echo $g['image_url'] ?>" target="_blank"><span class="label label-success">Lihat Gambar</span></a></td>
                                                        <td><?php echo character_limiter($g['id_album'], 40) ?></td>
                                                        <td><?php echo character_limiter($g['description'], 40) ?></td>
                                                        <td><?php echo $g['kategori']; ?></td>
                                                        <td><span class="label label-danger"><?php echo $g['status']; ?></span></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/galeri/edit')?>/<?=$g['id']?>">
                                                                <span class="label label-success">Edit</span>
                                                            </a>
                                                            <a onclick="return confirm('Are You Sure  ?')" href="<?=site_url('panel/galeri/del')?>/<?=$g['id']?>">
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