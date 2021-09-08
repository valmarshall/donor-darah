<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Hospital</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/hospital">Hospital</a></li>
                        <li class="breadcrumb-item active">Edit Hospital</li>
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
                    <form action="/adminhospital/update" method="post">
                        <div class="card-body">
                            <input type="hidden" name="slug" value="<?= $hospital['slug']; ?>">
                            <input type="hidden" name="id" value="<?= $hospital['id']; ?>">
                            <div class="form-group">
                                <label for="hospital">Hospital Name</label>
                                <input type="text" name="hospital" id="hospital" class="form-control <?= ($validation->hasError('hospital')) ? 'is-invalid' : ''; ?>" placeholder="Enter hospital name" value="<?= (old('hospital')) ? old('hospital') : $hospital['hospital']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('hospital'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="3" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" placeholder="Enter hospital address"><?= (old('address')) ? old('hospital') : $hospital['address']; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('address'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="map">Embeded Map</label>
                                <a data-toggle="tooltip" data-placement="top" title="Choose the location, share -> embed map, click copy html">
                                    <span class="badge">
                                        <i class="fas fa-question-circle"></i>
                                    </span>
                                </a>
                                <textarea name="map" id="map" cols="30" rows="3" class="form-control" placeholder="Enter embeded map"><?= $hospital['map']; ?></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button class="btn btn-success float-right" type="submit">Save</button>
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

<?= $this->section('additionalJS'); ?>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection(); ?>