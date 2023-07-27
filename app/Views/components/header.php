<!-- Header -->
<nav class="red lighten-3">
    <div class="">
        <a href="javascript:;" class="brand-logo">
            <img src="<?= base_url('assets/images/ci.png') ?>" alt="">
        </a>
        <a href="javascript:;" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a class="black-text" href="">Home</a></li>
            <li><a class="black-text" href="">About</a></li>
            <li><a class="black-text" href="">Contact Us</a></li>
            <li><a class="black-text" href="<?= base_url('profile') ?>">Profile</a></li>
            <li>
                <a href="<?php echo base_url('logout'); ?>" class="btn-floating waves-effect waves-light blue lighten-10"><i class="material-icons">exit_to_app</i></a>
            </li>
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a href="#" class="right"><i class="material-icons">close</i></a></li>
    <li><a href="">Home</a></li>
    <li><a href="">About</a></li>
    <li><a href="">Contact Us</a></li>
    <li><a href=<?= site_url('profile') ?>">More</a></li>
    <li><a href="<?= site_url('logout') ?>">Logout</a></li>
</ul>