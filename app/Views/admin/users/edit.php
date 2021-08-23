<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/users">Users Data</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                    <form action="/adminusers/update" method="post">
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?= $users['id']; ?>">
                            <input type="hidden" name="oldUsername" value="<?= $users['username']; ?>">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Enter username" value="<?= (old('username')) ? old($username) : $users['username']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" placeholder="Enter full name" value="<?= (old('name')) ? old('name') : $users['nama']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Enter email" value="<?= (old('email')) ? old('email') : $users['email']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role">Select Role</label>
                                <select name="role" id="role" class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>">
                                    <option value="">--Role User--</option>
                                    <?php foreach ($roles as $r) : ?>
                                        <?php
                                        if (old('role')) {
                                            if (old('role') == $r['id']) {
                                                $select = 'selected';
                                            } else {
                                                $select = '';
                                            }
                                        } else {
                                            if ($users['id_role'] == $r['id']) {
                                                $select = 'selected';
                                            } else {
                                                $select = '';
                                            }
                                        }
                                        ?>
                                        <option value="<?= $r['id']; ?>" <?= $select; ?>><?= $r['role']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('role'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthPlace">Birth Place</label>
                                <input type="text" name="birthPlace" id="birthPlace" class="form-control <?= ($validation->hasError('birthPlace')) ? 'is-invalid' : ''; ?>" placeholder="Enter birth place" value="<?= (old('birthPlace')) ? old('birthPlace') : $users['tempat_lahir']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('birthPlace'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthDay">Day of Birth</label>
                                <input type="date" name="birthDay" id="birthDay" class="form-control <?= ($validation->hasError('birthDay')) ? 'is-invalid' : ''; ?>" value="<?= (old('birthDay')) ? old('birthDay') : $users['tanggal_lahir']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('birthDay'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button class="btn btn-success float-right" type="submit">Update</button>
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