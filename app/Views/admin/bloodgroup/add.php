<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Blood Group</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/blood-group">Blood Group</a></li>
                        <li class="breadcrumb-item active">Add New Blood Group</li>
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
                    <form action="/adminbloodgroup/save" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="groupName">Group Name</label>
                                <input type="text" name="groupName" id="groupName" class="form-control <?= ($validation->hasError('groupName')) ? 'is-invalid' : ''; ?>" placeholder="Enter group name" value="<?= old('groupName'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('groupName'); ?>
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