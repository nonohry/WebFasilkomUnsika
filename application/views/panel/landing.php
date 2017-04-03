
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Selamat Datang Administrator
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <a href="<?php echo base_url(); ?>panel/landing/add" class="btn btn-primary">Tambah Gambar</a>
                <br />
                <br />
					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Image Slider Landing Page</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul</th>
                                            <th>Gambar</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                            foreach ($foto as $f) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo character_limiter($f['title'], 20) ?></td>
                                                        <td> <a href="<?=site_url(); ?>file/landing/<?php echo $f['img_url'] ?>" target="_blank"><span class="label label-success">Lihat Gambar</span></a></td>
                                                        <td><?php echo character_limiter($f['description'], 20) ?></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/landing/edit')?>/<?=$f['id']?>"><span class="label label-success">Edit</span></a>
                                                            <a onclick="return confirm('Apa Anda Yakin ?')" href="<?=site_url('panel/landing/del/')?>/<?=$f['id']?>"><span class="label label-danger">Hapus</span></a>
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