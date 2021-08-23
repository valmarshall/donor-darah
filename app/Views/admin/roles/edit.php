<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/roles">Roles Data</a></li>
                        <li class="breadcrumb-item active">Edit Role</li>
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
                    <form action="/adminroles/update" method="post">
                        <div class="card-body">
                            <input type="hidden" name="idRole" value="<?= $roles['id']; ?>">
                            <input type="hidden" name="oldRole" value="<?= $roles['role']; ?>">
                            <div class="form-group">
                                <label for="role">Role Name</label>
                                <input type="text" name="role" id="role" class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" placeholder="Enter role name" value="<?= (old('role')) ? old('role') : $roles['role']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('role'); ?>
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