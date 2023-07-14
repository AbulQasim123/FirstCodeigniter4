<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<style>
    /* Custom CSS for the navigation panel */
    .navigation-panel {
        background-color: #f1f1f1;
        /* height: calc(100vh - 64px); */
        height: 100vh;
        /* Adjust the height based on your header height */
        overflow-y: auto;
        padding: 10px;
    }

    .navigation-panel ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .navigation-panel li {
        margin-bottom: 4px;
    }

    .navigation-panel a {
        display: block;
        padding: 8px;
        text-decoration: none;
        color: #333;
        transition: background-color 0.3s ease;
    }

    .navigation-panel a:hover {
        background-color: #ddd;
    }

    .row .col {
        padding: 0 0rem;
    }

    nav.navbar-fixed {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 9999;
    }
</style>
<!-- Header -->
<header class="blue lighten-1">
    <nav class="navbar-fixed">
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Logo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
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
    <li><a href="sass.html">Home</a></li>
    <li><a href="badges.html">About</a></li>
    <li><a href="collapsible.html">Contact Us</a></li>
    <li><a href="mobile.html">More</a></li>
</ul>

<div class="row">
    <div class="col s3">
        <!-- Grey navigation panel -->
        <div class="navigation-panel">
            <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
            </ul>
        </div>
    </div>

    <div class="col s9">
        <div style="padding: 1rem;">
            <h1>Welcome to the Teal Page Content</h1>
            <p>This is the content area of the page. You can add your content here.</p>
        </div>
    </div>
</div>


<?= $this->endSection() ?>