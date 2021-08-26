<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('additionalCSS'); ?>
<!-- Select2 -->
<link rel="stylesheet" href="/assets/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Blood Stock</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/blood-stock">Blood Stock</a></li>
                        <li class="breadcrumb-item active">Add New Blood Stock</li>
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
                    <form action="/adminbloodstock/save" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="bloodType">Blood Type</label>
                                <select name="bloodType" id="bloodType" class="form-control <?= ($validation->hasError('bloodType')) ? 'is-invalid' : ''; ?>">
                                    <option value="">--Choose Blood Type--</option>
                                    <?php foreach ($bloodGroup as $bg) : ?>
                                        <?php
                                        if ($bg['id'] == old('bloodType')) {
                                            $select = 'selected';
                                        } else {
                                            $select = '';
                                        }
                                        ?>
                                        <option value="<?= $bg['id']; ?>" <?= $select; ?>><?= $bg['blood_group']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bloodType'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bloodDonor">Blood Donor</label>
                                <select name="bloodDonor" id="bloodDonor" class="form-control select2 <?= ($validation->hasError('bloodDonor')) ? 'is-invalid' : ''; ?>">
                                    <option value="">--Select the Donor--</option>
                                    <?php foreach ($bloodDonor as $bd) : ?>
                                        <?php
                                        if ($bd['id'] == old('bloodDonor')) {
                                            $select = 'selected';
                                        } else {
                                            $select = '';
                                        }
                                        ?>
                                        <option value="<?= $bd['id']; ?>" <?= $select; ?>><?= $bd['nik'] . ' | ' . $bd['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bloodDonor'); ?>
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

<?= $this->section('additionalJS'); ?>
<!-- Select2 -->
<script src="/assets/admin/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })
    })
</script>
<?= $this->endSection(); ?>