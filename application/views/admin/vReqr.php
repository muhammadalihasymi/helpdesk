<!-- BEGIN HERE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() ?>assets/24.png" type="image/png">
    <title>
        <?php echo $tittle; ?>
    </title>
    <link href="<?= base_url(''); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(''); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(''); ?>assets/css/admin.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <style>
        .vertical-menu {
            width: 200px;
        }

        .vertical-menu a {
            background-color: #eee;
            color: black;
            display: block;
            padding: 12px;
            text-decoration: none;
        }

        .vertical-menu a:hover {
            background-color: #ccc;
        }

        .vertical-menu a.active {
            background-color: #4CAF50;
            color: white;
        }

        input,
        select {
            margin-left: 20px
        }
    </style>
</head>

<body id="page-top">
    <div class="wrapper">
        <div class="navbar">
            <ul class="menu">
                <a href="<?= base_url('cAdmin'); ?>"><img src="<?php echo base_url('assets/img/24admin.png'); ?>"></a>
                <li>
                    <a href="<?= base_url('cAdmin'); ?>">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-warehouse"></i></span>
                        <span class="title">Inventory</span>
                        <span class="arrow">
                            <i class="fas fa-sort-down"></i>
                        </span>
                    </a>
                    <ul class="acordion-menu am1">
                        <li><a href="<?= base_url('cItemh'); ?>">Hardware Item</a></li>
                        <li><a href="<?= base_url('cItems'); ?>">Software Item</a></li>
                        <li><a href="<?= base_url('cInv_hard'); ?>">Inventory Hardware</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#">
                        <span class="icon"><i class="fas fa-tasks"></i></span>
                        <span class="title">Request</span>
                        <span class="arrow">
                            <i class="fas fa-sort-down"></i>
                        </span>
                    </a>
                    <ul class="acordion-menu am2">
                        <li><a href=<?= base_url('cUserreqs'); ?>>Request Software</a></li>
                        <li><a href="<?= base_url('cUserreqh'); ?>">Request Hardware</a></li>
                        <li><a href="<?= base_url('cUserreqn'); ?>">Request Network</a></li>
                        <li><a href="<?= base_url('cUserreqo'); ?>">Request Office</a></li>
                        <li><a href="<?= base_url('cUserreqr'); ?>">Request Repairing</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('cAdminuser'); ?>">
                        <span class="icon"><i class="fas fa-user"></i></span>
                        <span class="title">User Data</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="wrapper2" style="z-index: 99">
        <nav class="navbar navbar-expand navbar-light topbar static-top" style="z-index: 99">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-3 ">
                            <?= $user['name']; ?>
                        </span>
                        <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/profile/') . $user['image']; ?>">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item">
                            <i class="text-gray-400"></i>
                            <div class="col-md-4" style="max-width: 250px;">
                                <img src="<?php echo base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['name']; ?></h5>
                                    <p class="card-text"><?= $user['email'] ?></p>
                                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="<?= base_url('cAdminedit'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Setting
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('cLogin/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <h2 style=" padding-left: 30px; transform: translateY(-60px); font-weight: bold; color: rgb(0, 128, 192)">Request Repairing</h2>

        <!-- CONTENT HERE -->
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="container table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">User</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Repair Request</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center; width: 210px">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($net->result() as $m) : ?>
                            <tr>
                                <td><?php echo $m->user ?></td>
                                <td><?php echo $m->email ?></td>
                                <td><?php echo $m->exp ?></td>
                                <td><?php echo $m->status ?></td>
                                <td>
                                    <a style=" margin-left: 10px ;padding-left: 20px; padding-right: 20px" href="<?php base_url() ?>cUserreqr/edit/<?php echo $m->id; ?>" class="btn btn-success ">edit</a>
                                    <a style="margin-left: 10px" href="<?php base_url() ?>cUserreqr/hapus/<?php echo $m->id; ?>" class="btn btn-danger " onclick="return confirm('Apakah Anda yakin menghapus data?')">delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href=" <?= base_url('cLogin/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>


<script src="<?= base_url(''); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(''); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="<?= base_url(''); ?>assets/js/sb-admin-2.min.js"></script>

<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/demo/datatables-demo.js') ?>"></script>
<script>
    $(document).ready(function() {
        $(".navbar ul.menu li a").click(function() {
            $(".navbar ul.menu li").removeClass("open");
            $(this).parent().addClass("open");
        });
    });
    setTimeout(function(){
            location.reload();
        }, 10000);
</script>

</html>