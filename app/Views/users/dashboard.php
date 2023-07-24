<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<!-- Header -->
<header class="blue lighten-1">
    <nav class="navbar-fixed">
        <div class="nav-wrapper">
            <a href="javascript:;" class="brand-logo">
                <img src="<?= base_url('assets/images/ci.png') ?>" alt="Logo">
            </a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?= site_url('logout') ?>">Logout</a></li>
                <li><a href="sass.html">Home</a></li>
                <li><a href="badges.html">About</a></li>
                <li><a href="collapsible.html">Contact Us</a></li>
                <li><a href="mobile.html">More</a></li>
            </ul>
        </div>
    </nav>
</header>

<!-- Mobile Navigation -->
<ul class="sidenav" id="mobile-demo">
    <li><a href="#" class="right"><i class="material-icons">close</i></a></li>
    <li><a href="">Home</a></li>
    <li><a href="">About</a></li>
    <li><a href="">Contact Us</a></li>
    <li><a href=<?= site_url('profile') ?>">More</a></li>
    <li><a href="<?= site_url('logout') ?>">Logout</a></li>
</ul>

<div class="row">
    <div class="col s2">
        <!-- Grey navigation panel -->
        <div id="navbar" class="navigation-panel">
            <ul>
                <li><a href="#">Physices</a></li>
                <li><a href="#">Chemistry</a></li>
                <li><a href="#">Math</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
    </div>

    
    <div class="col s10">
        <div style="padding: 1rem;">
            <h1 id="heading">Welcome to the Teal Page Content</h1>
            <p>This is the content area of the page. You can add your content here.</p>
        </div>
    </div>
</div>


<?= $this->endSection() ?>