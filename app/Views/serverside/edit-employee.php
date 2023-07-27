<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<div class="">
    <div class="content-area">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s10">
                        <div class="card-title">Edit Employee</div>
                    </div>
                    <div class="col s2 right-align">
                        <a href="<?= base_url('dashboard') ?>" class="btn-floating waves-effect waves-light green"><i class="small material-icons">arrow_back</i></a>
                    </div>
                </div>
            </div>
            <div class="card-action" style="margin-top: -35px;">
                <form action="<?= base_url('serverside/edit-employee/' . $employee['id']) ?>" method="POST">
                    <div class="row">
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <input type="text" name="name" id="name" value="<?= $employee['name'] ?>">
                                <label for="name">Name</label>
                                <?php if (isset($validation) && $validation->hasError('name')) : ?>
                                    <p class="red-text"><?= $validation->getError('name') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <input type="email" name="email" id="email" value="<?= $employee['email'] ?>">
                                <label for="email">Email</label>
                                <?php if (isset($validation) && $validation->hasError('email')) : ?>
                                    <p class="red-text"><?= $validation->getError('email') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <select id="gender" name="gender">
                                    <option value="" disabled selected>Choose your gender</option>
                                    <option value="Male" <?= ($employee['gender'] == 'Male') ? 'selected': '' ?>>Male</option>
                                    <option value="Female" <?= ($employee['gender'] == 'Female') ? 'selected': '' ?>>Female</option>
                                    <option value="Other" <?= ($employee['gender'] == 'Other') ? 'selected' : '' ?>>Other</option>
                                </select>
                                <label for="gender">Gender</label>
                                <?php if (isset($validation) && $validation->hasError('gender')) : ?>
                                    <p class="red-text"><?= $validation->getError('gender') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <input type="text" name="date_of_birth" id="date_of_birth" class="datepicker" value="<?= $employee['date_of_birth'] ?>">
                                <label for="date_of_birth">Date of Birth</label>
                                <?php if (isset($validation) && $validation->hasError('date_of_birth')) : ?>
                                    <p class="red-text"><?= $validation->getError('date_of_birth') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <input type="text" name="mobile_no" id="mobile_no" value="<?= $employee['mobile_no'] ?>">
                                <label for="mobile_no">Mobile No</label>
                                <?php if (isset($validation) && $validation->hasError('mobile_no')) : ?>
                                    <p class="red-text"><?= $validation->getError('mobile_no') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <select name="designation" id="designation">
                                    <option value="" disabled selected>Choose your Designation</option>
                                    <option value="Designer" <?= ($employee['designation'] == 'Designer') ? 'selected' : '' ?>>Designer</option>
                                    <option value="Manager" <?= ($employee['designation'] == 'Manager') ? 'selected' : '' ?>>Manager</option>
                                    <option value="Web developers" <?= ($employee['designation'] == 'Web developers') ? 'selected' : '' ?>>Web Dev's</option>
                                    <option value="Marketing" <?= ($employee['designation'] == 'Designer') ? 'Marketing' : '' ?>>Marketing</option>
                                    <option value="Software developers" <?= ($employee['designation'] == 'Software developers') ? 'selected' : '' ?>>Softwere Dev's</option>
                                    <option value="Full-Stack developers" <?= ($employee['designation'] == 'Full-Stack developers') ? 'selected' : '' ?>>Full-Stack Dev</option>
                                    <option value="Android developers" <?= ($employee['designation'] == 'Android developers') ? 'selected' : '' ?>>Android Dev's</option>
                                    <option value="HR" <?= ($employee['designation'] == 'Designer') ? 'HR' : '' ?>>HR</option>
                                </select>
                                <label for="designation">Designation</label>
                                <?php if (isset($validation) && $validation->hasError('designation')) : ?>
                                    <p class="red-text"><?= $validation->getError('designation') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <textarea name="address" id="address" class="materialize-textarea" data-length="100"><?= $employee['address'] ?></textarea>
                                <label for="address">Address</label>
                                <?php if (isset($validation) && $validation->hasError('address')) : ?>
                                    <p class="red-text"><?= $validation->getError('address') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn waves-effect waves-light">Update</button>
                    <a href="<?= base_url('dashboard') ?>" class="btn waves-effect blue-grey darken-1">Cancil</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>