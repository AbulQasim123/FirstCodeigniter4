<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="" style="margin-top:20px;">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card grey lighten-5">
                <div class="card-content white-text">
                    <span class="card-title black-text">Login</span>
                    <!-- <div class="divider"></div> -->
                    <form class="" action="<?= base_url('login') ?>" method="post">
                        <div class="input-field">
                            <input type="email" name="email" id="email" class="">
                            <label for="email">Email</label>
                            <?php if (isset($validation) && $validation->hasError('email')) : ?>
                                <p class="red-text"><?= $validation->getError('email') ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" id="password" class="autocomplete">
                            <label for="password">Password</label>
                            <?php if (isset($validation) && $validation->hasError('password')) : ?>
                                <p class="red-text"><?= $validation->getError('password') ?></p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn waves-effect waves-light">Login</button>
                        <a href="<?= base_url('register') ?>" class="btn waves-effect blue-grey darken-1">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>