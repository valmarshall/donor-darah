<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Blood Needer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/roles">Blood Needer</a></li>
                        <li class="breadcrumb-item active">Add New Blood Needer</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-8">
                <!-- Default box -->
                <div class="card shadow card-outline card-primary">
                    <form action="/adminbloodneeder/save" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nik">Identification Number (NIK)</label>
                                <input type="text" name="nik" id="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" placeholder="Enter your identification number" value="<?= old('nik'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" placeholder="Enter your name" value="<?= old('name'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthPlace">Place of Birth</label>
                                <input type="text" name="birthPlace" id="birthPlace" class="form-control <?= ($validation->hasError('birthPlace')) ? 'is-invalid' : ''; ?>" placeholder="Enter your birth place" value="<?= old('birthPlace'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('birthPlace'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthDay">Day of Birth</label>
                                <input type="date" name="birthDay" id="birthDay" class="form-control <?= ($validation->hasError('birthDay')) ? 'is-invalid' : ''; ?>" value="<?= old('birthDay'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('birthDay'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bloodGroup">Blood Type</label>
                                <select name="bloodGroup" id="bloodGroup" class="form-control <?= ($validation->hasError('bloodGroup')) ? 'is-invalid' : ''; ?>">
                                    <option value="">--Choose your blood type--</option>
                                    <?php foreach ($bloodGroup as $bg) : ?>
                                        <?php
                                        $select = '';
                                        if ($bg['id'] == old('bloodGroup')) {
                                            $select = 'selected';
                                        }
                                        ?>
                                        <option value="<?= $bg['id']; ?>" <?= $select; ?>><?= $bg['blood_group']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bloodGroup'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="3" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" placeholder="Enter your address"><?= old('address'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('address'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="district">District</label>
                                    <input type="text" name="district" id="district" class="form-control <?= ($validation->hasError('district')) ? 'is-invalid' : ''; ?>" placeholder="Enter your district" value="<?= old('district'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('district'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control <?= ($validation->hasError('city')) ? 'is-invalid' : ''; ?>" placeholder="Enter your city" value="<?= old('city'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('city'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="province">Province</label>
                                    <input type="text" name="province" id="province" class="form-control <?= ($validation->hasError('province')) ? 'is-invalid' : ''; ?>" placeholder="Enter your province" value="<?= old('province'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('province'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" class="form-control <?= ($validation->hasError('country')) ? 'is-invalid' : ''; ?>" placeholder="Enter your country" value="<?= old('country'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('country'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>">
                                    <option value="">--Choose Gender--</option>
                                    <option value="Laki-laki" <?= (old('gender') == 'Laki-laki') ? 'selected' : ''; ?>>Man</option>
                                    <option value="Perempuan" <?= (old('gender') == 'Perempuan') ? 'selected' : ''; ?>>Woman</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gender'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="religion">Religion</label>
                                <input type="text" name="religion" id="religion" class="form-control" placeholder="Enter your religion">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button class="btn btn-primary float-right" type="submit">Save</button>
                        </div>
                    </form>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>