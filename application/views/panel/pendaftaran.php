
            <aside class="right-side">                
                <section class="content-header">
                    <h1>
                        Data Pendaftaran Diklat
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <br />
                <br />
					<div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Pendaftaran Diklat</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Instansi</th>
                                            <th>Jabatan</th>
                                            <th>Alamat Instansi</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                            foreach ($pendaftaran as $a) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $a['nama_lengkap'] ?></td>
                                                        <td><?php echo character_limiter($a['nama_instansi'], 60) ?></td>
                                                        <td><?php echo $a['jabatan']; ?></td>
                                                        <td><?php echo character_limiter($a['alamat_instansi'], 60) ?></td>
                                                        <td><?php echo $a['email']; ?></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/pendaftaran/view')?>/<?=$a['id']?>">
                                                                <span class="label label-success">Edit</span>
                                                            </a>
                                                            <a onclick="return confirm('Apa Anda Yakin ?')" href="<?=site_url('panel/pendaftaran/del')?>/<?=$a['id']?>">
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