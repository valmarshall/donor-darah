<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="banner-slider" style="background-image: url('/assets/uploads/banner_search.jpg')">
    <div class="bg"></div>
    <div class="bannder-table">
        <div class="banner-text">
            <h1>Blood Type</h1>
        </div>
    </div>
</div>

<div class="donner-page-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>All Results for &rarr; Blood Type: <?= $bloodGroup['blood_group']; ?></h3>
            </div>
            <?php $i = 0; ?>
            <?php foreach ($bloodNeeder as $bn) : ?>
                <?php if ($bn['id_blood_group'] == $bloodGroup['id']) : ?>
                    <?php if ($bn['status'] == 2) : ?>
                        <?php ++$i; ?>
                        <div class="col-md-3 col-sm-4 col-xs-12 blood-list">
                            <div class="donner-item">
                                <div class="donner-list">
                                    <div class="donner-info">
                                        <h2><a href="/donor-needed/<?= $bn['nik']; ?>"><?= $bn['nama']; ?></a></h2>
                                        <p><?= $bn['nik']; ?></p>
                                        <div class="donner-link">
                                            <a href="/donor-needed/<?= $bn['nik']; ?>">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($i == 0) : ?>
                        <div class="error" style="font-size:20px;margin-top:20px;padding:0 15px;">Sorry! No Donor Needed.</div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>