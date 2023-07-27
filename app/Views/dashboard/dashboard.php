<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
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
                <?php if (session()->has('success')) : ?> 
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            M.toast({html: '<?= session('success') ?>'});
                        });
                    </script>
                <?php endif; ?>
                <table class="highlight responsive-table">
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
                        <?php
                        if (count($employees)) {
                            $i = 1;
                            foreach ($employees as $employee) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $employee['name'] ?></td>
                                    <td><?= $employee['email'] ?></td>
                                    <td><?= $employee['gender'] ?></td>
                                    <td><?= $employee['date_of_birth'] ?></td>
                                    <td><?= $employee['mobile_no'] ?></td>
                                    <td><?= $employee['designation'] ?></td>
                                    <td><?= $employee['address'] ?></td>

                                    <td>
                                        <a href="<?= base_url('serverside/edit-employee/' . $employee['id']); ?>" class="btn-floating btn-small waves-effect waves-light pink"><i class="material-icons">edit</i></a>
                                        <a href="<?= base_url('serverside/del-employee/' . $employee['id']); ?>" class="btn-floating btn-small waves-effect waves-light red" onclick="return confirm('Are you sure want to delete?')">
                                            <i class="tiny material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            ?>
                            <tr>
                                <td class="red-text">Not Found</td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>