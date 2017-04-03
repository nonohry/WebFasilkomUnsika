<!-- Being Page Title -->
<div class="container">
    <div class="page-title clearfix">
        <div class="row">
            <div class="col-md-12">
               <h6><a href="<?php echo base_url(); ?>">Home</a></h6>
                <h6><span class="page-active">Contact</span></h6>
            </div>
        </div>
    </div>
</div>

<div class="container">
<div class="row">
     <div class="col-md-12">
        <?=$sukses ?>
    </div>
</div>
</div>


 <div class="container">
        <div class="row">

            <div class="col-md-5">

                <div class="contact-map">
                    <div class="contact-heading">
                        <h3>Alamat</h3>
                        <?=$teks_kontak ?>
                    </div>
                    <br />
                    <div class="google-map-canvas" id="map-canvas">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.5507729148394!2d107.30427351476962!3d-6.322580795424315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977ccc01437db%3A0x2d9bc8b5af7fb18f!2sFasilkom+Unsika!5e0!3m2!1sen!2sid!4v1491064891596" width="320" height="275" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div> <!-- /.col-md-5 -->
            
            <div class="col-md-7">
                <div class="contact-page-content">
                    <div class="contact-heading">
                        <h3>Hubungi Kami</h3>
                    </div>

                    <form action="<?=base_url();?>pages/contact-us/send" method="POST">
                    <div class="contact-form clearfix">
                        <p class="full-row">
                            <span class="contact-label">
                                <label>Nama Lengkap:</label>
                                <span class="small-text">* Inputkan Nama Lengkap Anda</span>
                            </span>
                            <input type="text" id="fullname" name="fullname"  required/>
                        </p>
                        <p class="full-row"> 
                            <span class="contact-label">
                                <label>Email :</label>
                                <span class="small-text">* Inputkan Email Anda</span>
                            </span>
                            <input type="text" id="email" name="email" required/>
                        </p>
                        <p class="full-row">
                            <span class="contact-label">
                                <label>Website:</label>
                                <span class="small-text">Inputkan Website Anda Bila Ada</span>
                            </span>
                            <input type="text" id="website" name="website" />
                        </p>
                        <p class="full-row">
                            <span class="contact-label">
                                <label>Pesan :</label>
                                <span class="small-text">*Inputkan Pesan Anda</span>
                            </span>
                            <textarea name="message" id="message" rows="6" required></textarea>
                        </p>
                        <p class="full-row">
                            <input class="mainBtn" type="submit" name="" value="Kirim Pesan" />
                        </p>
                    </div>
                </form>
                </div>
            </div> <!-- /.col-md-7 -->

        </div> <!-- /.row -->
    </div> <!-- /.container -->
