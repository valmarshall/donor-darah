<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Blood Donor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/blood-donor">Blood Donor</a></li>
                        <li class="breadcrumb-item active">Add New Blood Donor</li>
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
                    <form action="/adminblooddonor/save" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nik">Identification Number (NIK)</label>
                                <input type="text" name="nik" id="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" placeholder="Enter your identification number" value="<?= old('nik'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
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
                                <input type="date" name="birthDay" id="birthDay" class="form-control <?= ($validation->hasError('birthDay')) ? 'is-invalid' : ''; ?>" placeholder="Enter your birth day" value="<?= old('birthDay'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('birthDay'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bloodGroup">Choose Your Blood Group</label>
                                <select name="bloodGroup" id="bloodGroup" class="form-control <?= ($validation->hasError('bloodGroup')) ? 'is-invalid' : ''; ?>">
                                    <option value="">---Blood Group---</option>
                                    <?php foreach ($bloodGroup as $bg) : ?>
                                        <option value="<?= $bg['id']; ?>"><?= $bg['blood_group']; ?></option>
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
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control <?= ($validation->hasError('phoneNumber')) ? 'is-invalid' : ''; ?>" placeholder="Enter your phone number" value="<?= old('phoneNumber'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('phoneNumber'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Enter your password">
                                <span><small class="text-muted">*if it leave empty, it will use default password, your birth day (yyyymmdd)</small></span>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rePassword">Confirm Password</label>
                                <input type="password" name="rePassword" id="rePassword" class="form-control <?= ($validation->hasError('rePassword')) ? 'is-invalid' : ''; ?>" placeholder="Confirm your password">
                                <span><small class="text-muted">*if you use default password, you don't have to fill this field</small></span>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('rePassword'); ?>
                                </div>
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