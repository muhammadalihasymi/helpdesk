<!-- BEGIN HERE -->
<link href="<?= base_url(''); ?>assets/css/admin2.css" rel="stylesheet">

<body id="page-top" class="page-top">
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

    <div class="wrapper">
            <div class="navbar">
                <ul class="menu">
                    <a href="<?= base_url('cUser'); ?>"><img src="<?php echo base_url('assets/img/24helpdesk.png'); ?>"></a>
                    <li>
                        <a href="<?= base_url('cUseredit'); ?>">
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <span class="title">Edit Profile</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url('cUserchangepwd'); ?>">
                            <span class="icon"><i class="fas fa-key"></i></span>
                            <span class="title">Edit Password</span>
                        </a>
                    </li>
                     
                </ul>
            </div>
        </div>

        <div class="wrapper2">
            <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top" style="z-index: 99">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-3 ntop">
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
                                <div class="col-md-4">
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

             <!-- Begin Page Content -->
             <div class="col">
                    <div class="col-lg-8" style="margin: auto">
                    <h2 style="padding-bottom: 30px; text-align: center; font-weight: bold">Edit Password</h2>
                        <?= $this->session->flashdata('message'); ?>

                        <form action="<?= base_url('cUserchangepwd'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password1" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password2" class="col-sm-3 col-form-label">Repeat Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="new_password2" name="new_password2">
                                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            <li>
            <a href="<?= base_url('cAdminedit'); ?>">
                    <a style="
                        position: absolute;
                        bottom: 20px;
                        right: 50px"
                    href="<?= base_url('cUser'); ?>">Back to Home</a>
                    <span style="
                    position: absolute;
                    bottom: 20px;
                    right: 20px" class="icon"><i class="fas fa-sign-out-alt"></i></span>
                </a>
            </li>
        </div>


        <script>
        $('.page-top').mousemove(function(e){
            var moveX = (e.pageX * -1/80);
            var moveY = (e.pageY * -1/15);
            $(this).css('background-position', moveX + 'px ' + moveY + 'px')
        })
    </script>
</body> 