<?= $this->extend('layouts/usermaster') ?>
<?= $this->section('login-register') ?>

<div class="" style="margin-top:20px;">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card grey lighten-5">
                <div class="card-content">
                    <span class="card-title black-text">Register</span>
                    <!-- <div class="divider"></div> -->
                    <form class="" action="<?= base_url('register') ?>" method="post">
                        <div class="input-field">
                            <input type="text" name="name" id="name" value="<?= set_value('name'); ?>">
                            <label for="name">Name</label>
                            <?php if (isset($validation) && $validation->hasError('name')) : ?>
                                <p class="red-text"><?= $validation->getError('name') ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="email" name="email" id="email" value="<?= set_value('email'); ?>">
                            <label for="email">Email</label>
                            <?php if (isset($validation) && $validation->hasError('email')) : ?>
                                <p class="red-text"><?= $validation->getError('email') ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="text" name="phone_no" id="phone_no" value="<?= set_value('phone_no'); ?>">
                            <label for="phone_no">Phone No</label>
                            <?php if (isset($validation) && $validation->hasError('phone_no')) : ?>
                                <p class="red-text"><?= $validation->getError('phone_no') ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" id="password" value="<?= set_value('password'); ?>">
                            <label for="password">Password</label>
                            <?php if (isset($validation) && $validation->hasError('password')) : ?>
                                <p class="red-text"><?= $validation->getError('password') ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password_confirm" id="password_confirm">
                            <label for="password_confirm">Confirm Password</label>
                            <?php if (isset($validation) && $validation->hasError('password_confirm')) : ?>
                                <p class="red-text"><?= $validation->getError('password_confirm') ?></p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn waves-effect waves-light">Register</button>
                        <a href="<?= base_url('login') ?>" class="btn waves-effect blue-grey darken-1">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>