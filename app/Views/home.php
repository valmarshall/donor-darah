<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<!--Slider-Area Start-->
<div class="slider-area">
    <div class="slider-item" style="background-image: url('/assets/uploads/banner_search.jpg')">
        <div class="bg-3" style="opacity:0.6;"></div>
        <div class="container">
            <div class="row">
                <div class="slider-text">
                    <h1>SEARCH A DONOR IN YOUR AREA</h1>
                </div>
                <div class="searchbox">

                    <form action="#" method="post">

                        <div class="col-md-3 col-sm-6">
                            <input autocomplete="off" type="text" name="country" class="form-control" placeholder="Country Name">
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <input autocomplete="off" type="text" name="city" class="form-control" placeholder="City Name">
                        </div>

                        <div class="col-md-3 col-sm-6">

                            <select data-placeholder="Choose Blood Group" class="chosen-select form-control" name="blood_group_id">
                                <option></option>
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <input type="submit" value="Search Donor" name="form_search">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Slider-Area End-->

<!-- Blood Group -->
<div class="blood-gallery bg-gray">
    <div class="container">
        <div class="row">
            <div class="headline">
                <h2>Blood Groups</h2>
                <div class="headline-icon" style="background-image: url(/assets/main/img/blood.png)"></div>
            </div>
            <?php foreach ($bloodGroup as $bg) : ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="blood-item">
                        <a href="/blood-group/<?= $bg['slug']; ?>"><?= $bg['blood_group']; ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- end Blood Group -->

<!-- end content -->

<!-- footer -->
<?= $this->endSection(); ?>