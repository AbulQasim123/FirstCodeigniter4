<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<div class="">
    <div class="content-area">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col">
                        <div class="card-title">Multi Auth Login</div>
                    </div>
                </div>
            </div>
            <div class="card-action" style="margin-top: -35px;">
                <form action="<?= route_to('multi.auth.login') ?>" method="post">
                    <div class="row">
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <input type="email" name="email" id="email" value="<?= set_value('email') ?>">
                                <label for="email">Email</label>
                                <?php if (isset($validation) && $validation->hasError('email')) : ?>
                                    <p class="red-text"><?= $validation->getError('email') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <input type="password" name="password" id="password" value="<?= set_value('password') ?>">
                                <label for="password">Password</label>
                                <?php if (isset($validation) && $validation->hasError('password')) : ?>
                                    <p class="red-text"><?= $validation->getError('password') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3" style="margin-top: 23px;">
                            <button type="submit" class="btn waves-effect waves-light">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>