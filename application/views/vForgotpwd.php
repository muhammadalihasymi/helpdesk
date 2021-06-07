<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form method="POST" action="<?= base_url(); ?>cForgotpwd">
            <h3 style="font-weight: bold; margin-bottom: 15px; color: #6f86d6;">Forgot your password ?</h3>
            <?= $this->session->flashdata('message'); ?>
            <input type="text" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>" style="font-size: 12px">
            <?= form_error('email', '<small style="font-size:12px;	color: red;">', '</small>'); ?>
            <button>Reset Password</button>
            <p>Back to login<a href="<?= base_url(); ?>cLogin" class="smalltexts"> here</a></p>
        </form>
    </div>
</div>