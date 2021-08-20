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
                    <h1>Roles Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Roles Data</li>
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
                <a href="/admin/roles/add" class="btn btn-primary rounded-pill">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Add New Role
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
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($roles as $r) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td>
                                    <?= $r['role']; ?>
                                </td>
                                <td>
                                    <a href="/admin/roles/<?= $r['slug']; ?>" class="btn btn-sm btn-info rounded-circle" data-toggle="tooltip" data-placement="left" title="Detail User">
                                        <span><i class="fas fa-info-circle"></i></span>
                                    </a>
                                    <a href="/admin/roles/edit/<?= $r['slug']; ?>" class="btn btn-sm btn-success rounded-circle" data-toggle="tooltip" data-placement="top" title="Edit User">
                                        <span><i class="far fa-edit"></i></span>
                                    </a>
                                    <form action="/admin/roles/<?= $r['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger rounded-circle" data-toggle="tooltip" data-placement="right" title="Delete User" onclick="confirm('Are you sure you want to delete this?')">
                                            <span><i class="fas fa-trash-alt"></i></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
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

    // Tooltip activation
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection(); ?>