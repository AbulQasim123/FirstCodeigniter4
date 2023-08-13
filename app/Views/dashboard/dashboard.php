<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<?php if (session()->has('success')) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.toast({
                html: '<?= session('success') ?>'
            });
        });
    </script>
<?php endif; ?>

<div class="">
    <div class="content-area">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s10">
                        <div class="card-title">Dashboard</div>
                    </div>
                    <div class="col s2 right-align">
                        <a href="<?= base_url('serverside/add-employee') ?>" class="btn-floating waves-effect waves-light grenn"><i class="small material-icons">add</i></a>
                    </div>
                </div>
            </div>
            <div class="card-action">

                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a class="blue-text" href="#datatable">DataTable</a></li>
                            <li class="tab col s3"><a class="blue-text" href="#datatable_excel">DataTable Excel </a></li>
                        </ul>
                    </div>
                    <div class="char-container">
                        <div id="datatable" class="col s12">
                            <h5>DataTable</h5>
                            <table class="highlight responsive-table" id="load_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>Mobile</th>
                                        <th>Designation</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div id="datatable_excel" class="col s12">
                            <h5>DataTable Excel</h5>
                            <table class="highlight responsive-table" id="data_table_excel">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Designation</th>
                                        <th>Gender</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($datatables) > 0) {
                                        $count = 1;
                                        foreach ($datatables as $datatable) {
                                    ?>
                                            <tr>
                                                <td><?= $count++ ?></td>
                                                <td><?= $datatable['name'] ?></td>
                                                <td><?= $datatable['email'] ?></td>
                                                <td><?= $datatable['mobile'] ?></td>
                                                <td><?= $datatable['designation'] ?></td>
                                                <td><?= $datatable['gender'] ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
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