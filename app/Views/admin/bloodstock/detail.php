<?= $this->extend('admin/layouts/template'); ?>

<?= $this->section('additionalCSS'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Blood Stock</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/blood-stock">Blood Stock</a></li>
                        <li class="breadcrumb-item active">Detail Blood Stock</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow card-outline card-info">
                        <div class="card-header">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <strong>Blood Type :</strong>
                                            </div>
                                            <div class="col-md-7">
                                                <?= $bloodGroup['blood_group']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    Donor
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table id="detailStockTable" class="table table-hover" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Donor</th>
                                                            <th>Donor Time</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($bloodStock as $bs) : ?>
                                                            <tr>
                                                                <td><?= $i++; ?></td>
                                                                <?php foreach ($bloodDonor as $bd) : ?>
                                                                    <?php if ($bd['id'] == $bs['id_donor']) : ?>
                                                                        <td>
                                                                            <?= $bd['nama']; ?><br>
                                                                            <span class="badge badge-secondary"><?= $bd['nik']; ?></span>
                                                                        </td>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                                <td><?= date('d-m-Y H:s', strtotime($bs['created_at'])); ?></td>
                                                                <td>
                                                                    <button class="btn btn-sm btn-info rounded-pill" data-toggle="modal" data-target="#modalDonor<?= $bs['id_donor']; ?>">
                                                                        <span><i class="fas fa-info-circle"></i></span> See Donor Detail
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Donor</th>
                                                            <th>Donor Time</th>
                                                            <th></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Donor -->
<?php foreach ($bloodDonor as $bd) : ?>
    <div class="modal fade" id="modalDonor<?= $bd['id']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Donor Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <center>
                                <img src="/assets/uploads/blood-donor/<?= $bd['image']; ?>" alt="<?= $bd['nama'] . "'s Profile Picture"; ?>" class="img-thumbnail" width="250px">
                            </center>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Identification Number (NIK)</strong>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-7">
                            <?= $bd['nik']; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Full Name</strong>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-7">
                            <?= $bd['nama']; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Birth Day</strong>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-7">
                            <?= $bd['tempat_lahir'] . ', ' . date('d F Y', strtotime($bd['tanggal_lahir'])); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Phone Number</strong>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-7">
                            <?= $bd['nohp']; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Address</strong>
                        </div>
                        <div class="col-lg-1">:</div>
                        <div class="col-lg-7">
                            <?= $bd['alamat']; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>
<?= $this->endSection(); ?>

<?= $this->section('additionalJS'); ?>
<!-- DataTables  & Plugins -->
<script src="/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="/assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    // DataTable activation
    $(document).ready(function() {
        $('#detailStockTable').DataTable();
    });

    // Tooltip activation
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection(); ?>