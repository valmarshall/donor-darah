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
                    <h1>Users Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card shadow">
            <div class="card-header">
                <a href="/admin/users/add" class="btn btn-primary rounded-pill">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Add New User
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

                <table id="userTable" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($users as $u) : ?>
                            <td><?= $i++; ?></td>
                            <td>
                                <img src="/assets/uploads/admin-user/<?= $u['image']; ?>" alt="profil <?= $u['username']; ?>" width="150px">
                            </td>
                            <td>
                                <?= $u['name']; ?>
                                <br>
                                <span class="badge badge-secondary"><?= $u['username']; ?></span>
                            </td>
                            <td><?= $u['email']; ?></td>
                            <td>
                                <?php $birthDate = strtotime($u['tanggal_lahir']) ?>
                                <?= date('d F Y', $birthDate); ?>
                            </td>
                            <td>
                                <a href="/admin/users/<?= $u['username']; ?>" class="btn btn-sm btn-info rounded-circle" data-toggle="tooltip" data-placement="left" title="Detail User">
                                    <span><i class="fas fa-info-circle"></i></span>
                                </a>
                                <a href="/admin/users/edit/<?= $u['username']; ?>" class="btn btn-sm btn-success rounded-circle" data-toggle="tooltip" data-placement="top" title="Edit User">
                                    <span><i class="far fa-edit"></i></span>
                                </a>
                                <form action="/admin/users/<?= $u['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger rounded-circle" data-toggle="tooltip" data-placement="right" title="Delete User" onclick="confirm('Are you sure you want to delete this?')">
                                        <span><i class="fas fa-trash-alt"></i></span>
                                    </button>
                                </form>
                            </td>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
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
        $('#userTable').DataTable();
    });

    // Tooltip activation
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?= $this->endSection(); ?>