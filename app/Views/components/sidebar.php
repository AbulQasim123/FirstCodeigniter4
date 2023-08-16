<div id="navbar">
    <ul>
        <li>Hello, <?= session()->get('name') ?></li>
    </ul>
    <ul>
        <li><a href="<?= base_url('dashboard') ?>" class="nav-links">Dashboard</a></li>
        <li><a href="<?= base_url('serverside/add-post') ?>" class="nav-links">Ajax</a></li>
        <li><a href="<?= route_to('img.uploads') ?>" class="nav-links">Image uploads</a></li>
        <li><a href="<?= route_to('charts.integration') ?>" class="nav-links">Charts Integration</a></li>
        <li><a href="<?= route_to('multi.auth.login') ?>" class="nav-links">Multi Role Login</a></li>
        <li><a href="<?= route_to('multi.image') ?>" class="nav-links">Multi Image & File</a></li>
        <li><a href="<?= base_url('profile') ?>" class="nav-links">Profile</a></li>
    </ul>
</div>
