
            <aside class="right-side">                
                <section class="content-header">
                    <h1>
                        Hubungi Kami
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Hubungi Kami</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Message</th>
                                            <th>Time</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $no = 1;
                                            foreach ($kontak as $k) {?>

                                                <?php
                                                    $tanggal        = $k['date'];
                                                    $namahari       = date('D',strtotime($tanggal));

                                                    if ($namahari == "Sunday") $namahari = "Minggu";
                                                        else if ($namahari == "Mon") $namahari = "Senin";
                                                        else if ($namahari == "Tue") $namahari = "Selasa";
                                                        else if ($namahari == "Wed") $namahari = "Rabu";
                                                        else if ($namahari == "Thu") $namahari = "Kamis";
                                                        else if ($namahari == "Fri") $namahari = "Jumat";
                                                        else if ($namahari == "Sat") $namahari = "Sabtu";
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo character_limiter($k['fullname'], 20) ?></td>
                                                        <td><?php echo character_limiter($k['email'], 20) ?></td>
                                                        <td><?php echo character_limiter($k['website'], 30) ?></td>
                                                        <td><?php echo character_limiter($k['message'], 20) ?></td>
                                                        <td><?php echo $namahari ?>, <?php echo $tanggal ?></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/contact/view')?>/<?=$k['id']?>"><span class="label label-success">View</span></a>
                                                            <a onclick="return confirm('Are You Sure ?')" href="<?=site_url('panel/contact/del/')?>/<?=$k['id']?>"><span class="label label-danger">Hapus</span></a>
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
