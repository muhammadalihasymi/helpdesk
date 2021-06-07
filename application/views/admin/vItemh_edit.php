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
                <li class="active">
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
                <li>
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

    <div class="wrapper2">
        <nav class="navbar navbar-expand navbar-light topbar static-top">
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
        <h2 style=" text-align: center ; margin-bottom: 50px; font-weight: bold; color: rgb(0, 128, 192)">Edit Hardware Item</h2>

        <!-- CONTENT HERE -->
        <div class="col-lg-8" style="margin: auto">
            <?= $this->session->flashdata('message'); ?>
            <div class="container">
                <?php foreach ($item as $m) : ?>
                    <form action="<?php echo base_url() . 'cItemh/update'; ?>" method="post">
                        <table style="margin:20px auto;">
                            <tr>
                                <td>Item</td>
                                <td><input class="form-control" type="text" name="item" value="<?php echo $m->item ?>"></td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 10px">
                                    <input class="form-control" type="hidden" name="id" value="<?php echo $m->id ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Save Changes" class="btn btn-info"></td>
                            </tr>
                        </table>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>

        <a href="<?= base_url('cItemh'); ?>">
            <a style="
                    position: absolute;
                    bottom: 20px;
                    right: 50px" href="<?= base_url('cItemh'); ?>">Back to Hardware Item</a>
            <span style="
                position: absolute;
                bottom: 20px;
                right: 20px" class="icon"><i class="fas fa-sign-out-alt"></i></span>
        </a>
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


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(''); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(''); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(''); ?>assets/js/sb-admin-2.min.js"></script>

<script>
    $(document).ready(function() {
        $(".navbar ul.menu li a").click(function() {
            $(".navbar ul.menu li").removeClass("open");
            $(this).parent().addClass("open");
        });
    })
</script>

</html>