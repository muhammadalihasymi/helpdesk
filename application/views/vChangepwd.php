<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form method="POST" action="<?= base_url(); ?>cChangepwd">
            <h3 style="font-weight: bold; margin-bottom: 15px; color: #6f86d6;">Change your password for</h3>
            <h5><?= $this->session->userdata('reset_email');  ?></h5>
            <?= $this->session->flashdata('message'); ?>
            <input type="password" id="password1" name="password1" placeholder="Enter New Password..." style="font-size: 12px">
            <?= form_error('password1', '<small style="font-size:12px;	color: red;">', '</small>'); ?>
            <input type="password" id="password2" name="password2" placeholder="Repeat Password..." style="font-size: 12px">
            <?= form_error('password2', '<small style="font-size:12px;	color: red;">', '</small>'); ?>
            <button>Change Password</button>
        </form>
    </div>
</div>