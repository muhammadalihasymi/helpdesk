<!-- BEGIN HERE -->
<div id="content-wrapper" class="flex-column">

<!-- DROPDOWN USER ACCOUNT -->
<div id="content" class="content">
    <nav class="navbar navbar-expand navbar-light topbar static-top userbody" style="z-index: 5">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-4 d-none d-lg-inline small">
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
                    <a class="dropdown-item" href="<?= base_url('cUseredit'); ?>">
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

    <!-- LOGO 24HELPDESK -->
    <nav>
    <div class="logo">
        <a href="<?= base_url('cUser'); ?>"><img src="<?php echo base_url('assets/img/24helpdesk.png'); ?>"></a>
    </div>
    </nav>


    <!-- MAIN PAGE -->
    <div class="background">
        <?= $this->session->flashdata('message'); ?>

        <!-- MIDDLE AREA -->
        <div class="row">
            <div class="col">
                <div class="col-lg-6" style="margin-top: 10%; margin-left: 25%">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="container" style="background: #fff; padding: 50px; border-radius: 20px;">
                    <h2 style="text-align: center; padding-bottom: 30px; font-weight: bold">Request Hardware Item</h2>
                        <form action="<?php echo base_url() . 'cUserreqh/tambah_aksi'; ?>" method="post">
                            <table style="margin:20px auto;">
                                <tr>
                                    <td><input class="form-control" type="hidden" name="user" value="<?= $user['name']; ?>"></td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" type="hidden" name="email" value="<?= $user['email']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Item</td>
                                    <td style="padding-bottom: 10px; padding-left: 20px">
                                        <select class="form-control" name="item">
                                            <?php
                                            foreach ($data->result() as $j) { //result() berguna untuk mengubah query menjadi data
                                                echo "<option value=" . $j->item . ">" . $j->item . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description  </td>
                                    <td style="padding-bottom: 10px; padding-left: 20px">
                                        <textarea class="form-control" rows="4" cols="50%" name="exp" placeholder="Enter a description"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="padding-bottom: 50px; padding-left: 20px">
                                        <input type="submit" value="Submit your Request" class="btn btn-primary">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="form-control" type="hidden" name="process" value="On Process"></td>
                                </tr>
                            </table>
                        </form>
                        
                        <!-- RETURN HOME -->
                        <a href="<?= base_url('cUser'); ?>">
                            <a style="
                                position: absolute;
                                bottom: 20px;
                                right: 60px"
                            href="<?= base_url('cUser'); ?>">Back to Home</a>
                            <span style="
                            position: absolute;
                            bottom: 20px;
                            right: 30px" class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        </a>
                    </div>
                </div>
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



<script>
$('.background').mousemove(function(e){
    var moveX = (e.pageX * -1/80);
    var moveY = (e.pageY * -1/15);
    $(this).css('background-position', moveX + 'px ' + moveY + 'px')
})
</script>