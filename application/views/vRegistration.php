<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form method="POST" action="<?= base_url(); ?>cRegistration">
            <h1>Create Account</h1>
            <input type="text" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>" style="font-size: 12px">
            <input type="text" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>" style="font-size: 12px">
            <?= form_error('email', '<small style="font-size:12px">', '</small>'); ?>
            <input type="password" id="password1" name="password1" placeholder="Password" style="font-size: 12px">
            <?= form_error('password1', '<small style="font-size:12px">', '</small>'); ?>
            <input type="password" id="password2" name="password2" placeholder="Repeat Password" style="font-size: 12px">
            <button>Sign Up</button>
            <p class="smalltextp">Already have an account?<a href="<?= base_url(); ?>" class="smalltexts"> Login</a></p>
        </form>
    </div>
</div>