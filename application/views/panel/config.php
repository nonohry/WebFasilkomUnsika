
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Setting Website
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
                                    <h3 class="box-title">Setting Website</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Actiom</th>
                                        </tr>
                                        <?php
                                        $no = 1;
                                            foreach ($config as $c) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo character_limiter($c['title'], 20) ?></td>
                                                        <td>
                                                            <a href="<?=site_url('panel/setting/edit')?>/<?=$c['id_config']?>"><span class="label label-success">Edit</span></a>
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