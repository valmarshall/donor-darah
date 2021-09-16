<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="banner-slider" style="background-image: url('/assets/uploads/banner_search.jpg')">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>Donor Needed</h1>
        </div>
    </div>
</div>

<div class="donner-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="donner-leftbar">
                    <div class="donner-profile-item">
                        <div class="donner-leftbar-info">
                            <h2><?= $bloodNeeder['nama']; ?></h2>
                            <h4>Blood Type: <span><?= $bloodGroup['blood_group']; ?></span></h4>
                        </div>
                    </div>
                    <div class="donner-contact-form">
                        <center>
                            <iframe src="<?= $hospital['map']; ?>" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </center>
                        <h3>Contact</h3>
                        <div class="form-row">
                            <h4>Become a donor</h4>
                            <p>Phone Number : <?= ($bloodNeeder['nohp']) ? $bloodNeeder['nohp'] : 'No phone number added'; ?></p>
                            <span class="text-muted">* or you can just come to the hospital</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="donner-description">
                    <div class="donner-description-list">
                        <h3>Details</h3>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width:200px">Identification Number (NIK)</td>
                                <td><?= $bloodNeeder['nik']; ?></td>
                            </tr>
                            <tr>
                                <td>Place of Birth</td>
                                <td><?= $bloodNeeder['tempat_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td>Day of Birth</td>
                                <td><?= $bloodNeeder['tanggal_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?= $bloodNeeder['jenis_kelamin']; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?= $bloodNeeder['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td><?= $bloodNeeder['kecamatan']; ?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><?= $bloodNeeder['kota']; ?></td>
                            </tr>
                            <tr>
                                <td>Province</td>
                                <td><?= $bloodNeeder['provinsi']; ?></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td><?= $bloodNeeder['negara']; ?></td>
                            </tr>
                            <tr>
                                <td>Religion</td>
                                <td><?= $bloodNeeder['agama']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>