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
                <div class="btn-group btn-request">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                        Request Catalog
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg-left">
                        <a class="dropdown-item" type="button" href="<?php echo base_url(); ?>cUserreqs/tambah/">Software</a>
                        <a class="dropdown-item" type="button" href="<?php echo base_url(); ?>cUserreqh/tambah/">Hardware</a>
                        <a class="dropdown-item" type="button" href="<?php echo base_url(); ?>cUserreqn/tambah/">Network</a>
                        <a class="dropdown-item" type="button" href="<?php echo base_url(); ?>cUserreqo/tambah/">Office</a>
                    </div>
                </div>

                <!-- MIDDLE AREA -->
                <div class="txt-mid">
                    <h2>Welcome to Helpdesk Area</h2>
                    <p>you can request your problem or claim for a repair here</p>
                </div>
                <div class="btn-middle" style="z-index: 2">
                    <a href="<?php echo base_url(); ?>cUserreqr/tambah/"><button type=" button" class="btn btn-outline-danger btn-repair">Repair</button></a>
                    <a href="<?php echo base_url(); ?>cUserreqh/tambah/"><button type=" button" class="btn btn-outline-warning btn-hard">Hardware</button></a>
                </div>

                <!-- POPUP -->
                <!-- <div class="req-popup" 
                    style="font-size: 15px;
                    background: white;
                    width: 150px;
                    text-align: center;
                    padding: 10px;
                    border-radius: 20px;
                    position: fixed;
                    top: 90%; left: 3%; z-index: 5">
                    <a href="#"> Request History</a>
                </div> -->

                <div id="refresh" class="req-history" style="opacity: 1; transform: translate(10%, 29rem); ">
                    <!-- <a href="#" style="
                        position: absolute;
                        font-size: 30px;
                        right: 10px; top: 10px;">
                        <i class="fas fa-times-circle"></i>
                    </a> -->
                    
                    <h2 style="font-size: 20px; font-weight: bold; color: black; padding-bottom: 10px">Request History</h2>
                    <table id="isitabel">
                        <tbody>
                            <?php foreach ($hard->result() as $m) : ?>
                                <tr>
                                    <h2 style="font-size: 15px;">Your request of <?php echo $m->item ?> is <?php echo $m->status ?></h2>
                                </tr>
                            <?php endforeach; ?>
                            <?php foreach ($soft->result() as $m) : ?>
                                <tr>
                                    <h2 style="font-size: 15px;">Your request of <?php echo $m->soft ?> is <?php echo $m->status ?></h2>
                                </tr>
                            <?php endforeach; ?>
                            <?php foreach ($net->result() as $m) : ?>
                                <tr>
                                    <h2 style="font-size: 15px;">Your request of <?php echo $m->exp ?> is <?php echo $m->status ?></h2>
                                </tr>
                            <?php endforeach; ?>
                            <?php foreach ($off->result() as $m) : ?>
                                <tr>
                                    <h2 style="font-size: 15px;">Your request of <?php echo $m->exp ?> is <?php echo $m->status ?></h2>
                                </tr>
                            <?php endforeach; ?>
                            <?php foreach ($rep->result() as $m) : ?>
                                <tr>
                                    <h2 style="font-size: 15px;">Your request of <?php echo $m->exp ?> is <?php echo $m->status ?></h2>
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


    
    <script>
        $('.background').mousemove(function(e){
            var moveX = (e.pageX * -1/80);
            var moveY = (e.pageY * -1/15);
            $(this).css('background-position', moveX + 'px ' + moveY + 'px')
        });
        setTimeout(function(){
            location.reload();
        }, 20000);

    //    setInterval(function(){
    //        $('#refresh').load('vIndex.php');
    //    }, 3000);
    </script>