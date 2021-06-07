<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form method="POST" action="<?= base_url(); ?>cLogin">
            <h1>Login</h1>
            <?= $this->session->flashdata('message'); ?>
            <input type="text" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>" style="font-size: 12px">
            <?= form_error('email', '<small style="font-size:12px">', '</small>'); ?>
            <input type="password" id="password" name="password" placeholder="Password" style="font-size: 12px">
            <?= form_error('password', '<small style="font-size:12px">', '</small>'); ?>
            <button>Sign In</button>
            <a href="<?= base_url(); ?>cForgotpwd" class="smalltexts">Forgot Your Password?</a>
            <p class="smalltext">Don't have an account?<a href="<?= base_url(); ?>cRegistration" class="smalltexts"> Sign Up</a></p>
        </form>
    </div>
</div>