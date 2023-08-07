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
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    
</script>
<?= $this->endSection() ?>