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
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blood Needer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Blood Needer</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Alert Box -->
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> <?= session()->getFlashdata('message'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Default box -->
        <div class="card shadow">
            <div class="card-header">
                <a href="/admin/blood-needer/add" class="btn btn-primary rounded-pill">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Add New Blood Needer
                </a>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <table id="roleTable" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Place and Day of Birth</th>
                            <th>Gender</th>
                            <th>Blood Type</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($bloodNeeder as $bn) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td>
                                    <?= $bn['nama']; ?>
                                    <br>
                                    <span class="badge badge-secondary"><?= $bn['nik']; ?></span>
                                </td>
                                <td><?= $bn['tempat_lahir'] . ', ' . date('d F Y', strtotime($bn['tanggal_lahir'])); ?></td>
                                <td><?= $bn['jenis_kelamin']; ?></td>
                                <td>
                                    <?php foreach ($bloodGroup as $bg) : ?>
                                        <?php if ($bg['id'] == $bn['id_blood_group']) : ?>
                                            <?= $bg['blood_group']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($bn['status'] == 0) {
                                        $status = 'Need Donor';
                                        $badge = 'danger';
                                    } elseif ($bn['status'] == 1) {
                                        $status = 'Already Donored';
                                        $badge = 'success';
                                    } else {
                                        $status = 'Looking for Donor';
                                        $badge = 'warning';
                                    }
                                    ?>
                                    <a href="#modalBN<?= $bn['id']; ?>" class="badge badge-<?= $badge; ?>" data-toggle="modal"><?= $status; ?></a>
                                </td>
                                <td>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Place and Day of Birth</th>
                            <th>Gender</th>
                            <th>Blood Type</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php foreach ($bloodNeeder as $bn) : ?>
    <div class="modal fade" id="modalBN<?= $bn['id']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if ($bn['status'] == 0 || $bn['status'] == 2) : ?>
                        <?php
                        $rowBS = 0;
                        foreach ($bloodStock as $bs) {
                            if ($bs['status'] == 0) {
                                if ($bn['id_blood_group'] == $bs['id_blood_group']) {
                                    $rowBS++;
                                }
                            }
                        }
                        ?>
                        <table id="bloodStock<?= $bn['id']; ?>" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Donor Name</th>
                                    <th>Time Donored</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0 ?>
                                <?php foreach ($bloodStock as $bs) : ?>
                                    <?php if ($bs['status'] == 0) : ?>
                                        <?php if ($bn['id_blood_group'] == $bs['id_blood_group']) : ?>
                                            <tr>
                                                <td><?= ++$i; ?></td>
                                                <td>
                                                    <?php foreach ($bloodDonor as $bd) : ?>
                                                        <?php if ($bd['id'] == $bs['id_donor']) : ?>
                                                            <?= $bd['nama']; ?>
                                                            <br>
                                                            <span class="badge badge-secondary"><?= $bd['nik']; ?></span>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td><?= date('d-m-Y H:i', strtotime($bs['created_at'])); ?></td>
                                                <td>
                                                    <form action="/adminbloodneeder/changestatus/use" method="post">
                                                        <input type="hidden" name="idStock" value="<?= $bs['id']; ?>">
                                                        <input type="hidden" name="idNeeder" value="<?= $bn['id']; ?>">
                                                        <input type="hidden" name="idDonor" value="<?= $bs['id_donor']; ?>">
                                                        <button type="submit" class="btn btn-sm btn-success rounded-pill">Use</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Donor Name</th>
                                    <th>Time Donored</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    <?php elseif ($bn['status'] == 1) : ?>
                        <h4>Donored By :</h4>
                        <?php foreach ($bloodDonor as $bd) : ?>
                            <?php if ($bd['id'] == $bn['donored_by']) : ?>
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <center>
                                            <img src="/assets/uploads/blood-donor/<?= $bd['image']; ?>" alt="<?= $bd['nama'] . "'s Profile Picture"; ?>" class="img-thumbnail" width="150px">
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
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <?php if ($bn['status'] == 1) : ?>
                        <form action="/adminbloodneeder/changestatus/cancel" method="post">
                            <input type="hidden" name="idNeeder" value="<?= $bn['id']; ?>">
                            <button type="submit" class="btn btn-warning">Cancel Donation</button>
                        </form>
                    <?php elseif ($bn['status'] == 0) : ?>
                        <?php if ($rowBS == 0) : ?>
                            <form action="/adminbloodneeder/changestatus/find" method="post">
                                <input type="hidden" name="idNeeder" value="<?= $bn['id']; ?>">
                                <button type="submit" class="btn btn-info">Find Donor</button>
                            </form>
                        <?php endif; ?>
                    <?php else : ?>
                        <span class="badge badge-warning">Looking for donor</span>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>
<?= $this->endSection() ?>

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
        $('#roleTable').DataTable();
    });

    <?php foreach ($bloodNeeder as $bn) : ?>
        $(document).ready(function() {
            $('#bloodStock<?= $bn['id']; ?>').DataTable();
        });
    <?php endforeach; ?>

    // Tooltip activation
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection(); ?>