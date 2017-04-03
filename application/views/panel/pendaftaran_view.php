<aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Detail Data Pendaftaran Diklat
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Detail Data Pendaftaran Diklat Dari <u><?=$nama_lengkap; ?></u></h3>
                                </div>
                                    <table style="padding:10px;margin-left:20px;margin-bottom:10px">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <input type="hidden" name="kode" value="<?=$kode ?>" />
                                            <tr style="padding:10px;">
                                                <td style="width:275px;line-height:30px;"><b>Nama Lengkap</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$nama_lengkap ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Jenis Kelamin</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$jenis_kelamin ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Tempat Lahir</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$tempat_lahir ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Tanggal Lahir</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$tanggal_lahir ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Agama</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$agama ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Pendidikan Terakhir</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$pend_terakhir ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Nama Instansi / Perusahaan</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$nama_instansi ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Jabatan</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$jabatan ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Alamat Instansi / Perusahaan</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$alamat_instansi ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Biaya dibayarkan Oleh</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$biaya_diklat ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Telpon Kantor</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$telp_kantor ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Email</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$email ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Alamat Rumah</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$alamat_rumah ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>Telpon Rumah</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$telp_rumah ;?></b></td>
                                            </tr>

                                            <tr style="padding:10px;line-height:30px;">
                                                <td style="width:275px;"><b>No. Handphone</b></td>
                                                <td> : </td>
                                                <td style="width:580px;padding-left: 50px;"><b><?=$hp ;?></b></td>
                                            </tr>

                                        </div>

                                    </div>
                                    </table>

                                    <a style="margin-left:20px;" onclick="window.print();" href="javascript:void(0)">
                                        <span class="label label-success">Cetak Data</span>
                                    </a>
                                    <br />
                                    <br />
                        </div>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->