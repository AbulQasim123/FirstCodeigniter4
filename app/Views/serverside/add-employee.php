<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<div class="">
    <div class="content-area">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s10">
                        <div class="card-title">Add Employee</div>
                    </div>
                    <div class="col s2 right-align">
                        <a href="<?= base_url('dashboard') ?>" class="btn-floating waves-effect waves-light green"><i class="small material-icons">arrow_back</i></a>
                    </div>
                </div>
            </div>
            <div class="card-action" style="margin-top: -35px;">
                <form action="<?= base_url('serverside/add-employee') ?>" method="POST">
                    <div class="row">
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <input type="text" name="name" id="name" value="<?= set_value('name') ?>">
                                <label for="name">Name</label>
                                <?php if (isset($validation) && $validation->hasError('name')) : ?>
                                    <p class="red-text"><?= $validation->getError('name') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <input type="email" name="email" id="email" value="<?= set_value('email') ?>">
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
                                    <option value="Male" <?= set_select('gender','Male', set_value('gender') === 'Male') ?>>Male</option>
                                    <option value="Female" <?= set_select('gender','Female', set_value('gender') === 'Female') ?>>Female</option>
                                    <option value="Other" <?= set_select('gender','Other', set_value('gender') === 'Other') ?>>Other</option>
                                </select>
                                <label for="gender">Gender</label>
                                <?php if (isset($validation) && $validation->hasError('gender')) : ?>
                                    <p class="red-text"><?= $validation->getError('gender') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <input type="text" name="date_of_birth" id="date_of_birth" class="datepicker" value="<?= set_value('date_of_birth') ?>">
                                <label for="date_of_birth">Date of Birth</label>
                                <?php if (isset($validation) && $validation->hasError('date_of_birth')) : ?>
                                    <p class="red-text"><?= $validation->getError('date_of_birth') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <input type="text" name="mobile_no" id="mobile_no" value="<?= set_value('mobile_no') ?>">
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
                                    <option value="Designer" <?= set_select('designation', 'Designer', set_value('designation') === 'Designation') ?>>Designer</option>
                                    <option value="Manager" <?= set_select('designation', 'Manager', set_value('designation') === 'Manager') ?>>Manager</option>
                                    <option value="Web developers" <?= set_select('designation', 'Web developers', set_value('designation') === '>Web Dev\'s') ?>>Web Dev's</option>
                                    <option value="Marketing" <?= set_select('designation', 'Marketing', set_value('designation') === 'Marketing') ?>>Marketing</option>
                                    <option value="Software developers" <?= set_select('designation', 'Designer', set_value('designation') === 'Softwere Dev\'s') ?>>Softwere Dev's</option>
                                    <option value="Full-Stack developers" <?= set_select('designation', 'Full-Stack developers', set_value('designation') === 'Full-Stack Dev\'s') ?>>Full-Stack Dev's</option>
                                    <option value="Android developers" <?= set_select('designation', 'Android developers', set_value('designation') === 'Android Dev\'s') ?>>Android Dev's</option>
                                    <option value="HR" <?= set_select('designation', 'HR', set_value('designation') === 'HR') ?>>HR</option>
                                </select>
                                <label for="designation">Designation</label>
                                <?php if (isset($validation) && $validation->hasError('designation')) : ?>
                                    <p class="red-text"><?= $validation->getError('designation') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6 l4 xl3">
                            <div class="input-field">
                                <textarea name="address" id="address" class="materialize-textarea" data-length="100"></textarea>
                                <label for="address">Address</label>
                                <?php if (isset($validation) && $validation->hasError('address')) : ?>
                                    <p class="red-text"><?= $validation->getError('address') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn waves-effect waves-light">Save</button>
                    <a href="<?= base_url('dashboard') ?>" class="btn waves-effect blue-grey darken-1">Cancil</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>