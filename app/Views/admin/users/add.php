<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/users">Users Data</a></li>
                        <li class="breadcrumb-item active">Add New User</li>
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
                    <form action="/adminusers/save" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Enter username" value="<?= old('username'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" placeholder="Enter full name" value="<?= old('name'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Enter email" value="<?= old('email'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role">Select Role</label>
                                <select name="role" id="role" class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>">
                                    <option value="">--Role User--</option>
                                    <?php foreach ($roles as $r) : ?>
                                        <option value="<?= $r['id']; ?>" <?= (old('role') == $r['id']) ? 'selected' : ''; ?>><?= $r['role']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('role'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthPlace">Birth Place</label>
                                <input type="text" name="birthPlace" id="birthPlace" class="form-control <?= ($validation->hasError('birthPlace')) ? 'is-invalid' : ''; ?>" placeholder="Enter birth place" value="<?= old('birthPlace'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('birthPlace'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthDay">Day of Birth</label>
                                <input type="date" name="birthDay" id="birthDay <?= ($validation->hasError('birthDay')) ? 'is-invalid' : ''; ?>" class="form-control" value="<?= old('birthDay'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('birthDay'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Enter password" value="<?= old('password'); ?>">
                                <span><small class="text-muted">*if it leave empty, it will use default password, your birth day (yyyymmdd)</small></span>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rePassword">Confirm Password</label>
                                <input type="password" name="rePassword" id="rePassword" class="form-control <?= ($validation->hasError('rePassword')) ? 'is-invalid' : ''; ?>" placeholder="Enter confirm password" value="<?= old('rePassword'); ?>">
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