<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<div class="" style="margin-top: 10px;">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card-panel grey lighten-5">
                <div class="card-content white-text">
                <span class="card-title black-text"><?=  session()->get('role') ?> Dashboard</span>
                    <div class="divider"></div>
                    <h5 class="black-text">Hi, <?=  session()->get('name') ?></h5>
                    <h5><a href="<?= route_to('auth.logout') ?>">Logout</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>