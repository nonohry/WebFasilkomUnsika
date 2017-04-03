
<aside class="right-side">                
<section class="content-header">
<h1>
Album Foto
</h1>
</section>

<!-- Main content -->
<section class="content">
<a href="<?php echo base_url(); ?>panel/album/add" class="btn btn-primary">Add Album Photo</a>
<br />
<br />
<div class="row">
<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Album Photo</h3>                                    
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Album</th>
                        <th>Sampul Album</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $no = 1;
                    foreach ($album as $a) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo character_limiter($a['nama_album'], 20) ?></td>
                                <td><a href="<?=site_url(); ?>file/album/<?php echo $a['sampul_album'] ?>" target="_blank">
                                <span class="label label-success">Lihat Gambar</span></a></td>
                                <td>
                                    <a href="<?=site_url('panel/album/edit')?>/<?=$a['id']?>">
                                        <span class="label label-success">Edit</span>
                                    </a>
                                    <a onclick="return confirm('Are You Sure  ?')" href="<?=site_url('panel/album/del')?>/<?=$a['id']?>">
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