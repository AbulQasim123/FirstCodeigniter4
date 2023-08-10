<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

<div class="content-area">
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s10">
                    <div class="card-title">Here are About (Images uploading,Serverside Datatable, Generate Pdf)</div>
                </div>
                <div class="col s2 right-align">
                </div>
            </div>
        </div>
        <div class="card-action" style="margin-top: -35px;">
            <form id="form_submit" enctype="multipart/form-data">
                <div class="row">
                    <div class="col s12 m6 l6 xl6">
                        <div class="input-field">
                            <input type="text" name="name" id="name" value="<?= set_value('name') ?>">
                            <label for="name">Name</label>
                            <span class="red-text" id="name_error"></span> <!-- Changed class and ID -->
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl6">
                        <div class="input-field">
                            <input type="text" name="email" id="email" value="<?= set_value('email') ?>">
                            <label for="email">Email</label>
                            <span class="red-text" id="email_error"></span> <!-- Changed class and ID -->
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl6">
                        <div class="input-field">
                            <input type="text" name="mobile" id="mobile" value="<?= set_value('mobile') ?>">
                            <label for="mobile">Mobile</label>
                            <span class="red-text" id="mobile_error"></span> <!-- Changed class and ID -->
                        </div>
                    </div>
                    <div class="col s12 m6 l6 x6">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Image</span>
                                <input type="file" accept="image/*" name="image" id="image">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload Image">
                            </div>
                            <span class="red-text" id="image_error"></span> <!-- Changed class and ID -->
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn waves-effect waves-light">Save</button>
            </form>
        </div>
    </div>

    <!--  Server Side DataTable  -->
    <div class="right-align" style="margin-bottom: 10px;">
        <a href="<?= route_to('generate.pdf') ?>" class="btn waves-effect waves-light">
            Download PDF
        </a>
    </div>
    <table class="responsive-table striped centered" id="Load_table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Designation</th>
                <th>Gender</th>
                <th>Status</th>
            </tr>
        </thead>
    </table>

</div>
<?= $this->endSection() ?>