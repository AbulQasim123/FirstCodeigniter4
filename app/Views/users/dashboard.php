<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<!-- Header -->
<nav class="red lighten-3">
    <div class="">
        <a href="#!" class="brand-logo">
            <img src="<?= base_url('assets/images/ci.png') ?>" alt="">
        </a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a class="black-text" href="">Home</a></li>
            <li><a class="black-text" href="">About</a></li>
            <li><a class="black-text" href="">Contact Us</a></li>
            <li><a class="black-text" href="<?= base_url('profile') ?>">Profile</a></li>
            <li><a class="black-text" href="<?= base_url('logout') ?>">Logout</a></li>
        </ul>
    </div>
</nav>


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
        <div id="navbar">
            <ul>
                <li>Hello, <?= session()->get('name') ?></li>
            </ul>
            <ul>
                <li><a href="#Use-css" class="nav-links">Use Css</a></li>
                <li><a href="#Module" class="nav-links">Module</a></li>
                <li><a href="#solvingcommoncss-problem" class="nav-links">Common Css</a></li>
                <li><a href="#Seealso" class="nav-links">See Also</a></li>
            </ul>
        </div>
    </div>

    
    <div class="col s10">
        <div class="">
            <div class="content-area">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title" style="margin-top: -10px; margin-bottom: -10px;">Dashboard</span>
                        <!-- <div class="divider"></div> -->
                        <!-- <h4>Hello</h4> -->
                    </div>
                    <div class="card-action">
                        <div style="margin-top: -10px;">
                            <table class="highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Item Name</th>
                                        <th>Item Price</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Alvin</td>
                                        <td>Eclair</td>
                                        <td>$0.87</td>
                                    </tr>
                                    <tr>
                                        <td>Alan</td>
                                        <td>Jellybean</td>
                                        <td>$3.76</td>
                                    </tr>
                                    <tr>
                                        <td>Jonathan</td>
                                        <td>Lollipop</td>
                                        <td>$7.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>