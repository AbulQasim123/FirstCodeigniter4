<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<div class="" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card-panel grey lighten-5">
                <div class="card-content white-text">
                    <span class="card-title black-text">Profile</span>
                    <div class="divider"></div>
                    <h3 class="black-text">Hi, <?= $user['name'] ?></h3>
                    <p class="black-text">Email: <?= $user['email'] ?></p>
                    <p class="black-text">Phone No: <?= $user['phone_no'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>