<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<?php if (session()->has('success')) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.toast({
                html: '<?= session('success') ?>',
                classes: 'green lighten-1'
            });
        });
    </script>
<?php endif; ?>
<?php if (session()->has('error')) : ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.toast({
                html: '<?= session('error') ?>',
                classes: 'grey lighten-1, white-text'
            });
        });
    </script>
<?php endif; ?>

<div class="content-area">
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col">
                    <div class="card-title">Multiple Image & File</div>
                </div>
            </div>
        </div>
        <div class="card-action" style="margin-top: -35px;">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a class="blue-text" href="#image">Image</a></li>
                        <li class="tab col s3"><a class="blue-text" href="#file">File </a></li>
                    </ul>
                </div>
                <div id="image" class="col s12">
                    <form action="<?= route_to('multi.image') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col s12 m6 l6 x6">
                                <h5>Upload Images</h5>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Images</span>
                                        <input type="file" name="image[]" id="image" multiple >
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload Images">
                                    </div>
                                    <span class="red-text" id="image_error"></span>
                                </div>
                            </div>
                            <div class="col s12 m6 l6 x6" style="margin-top: 68px;">
                                <button type="submit" class="btn waves-effect waves-light upload_doc">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="file" class="col s12">
                    <form action="<?= route_to('multi.file') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col s12 m6 l6 x6">
                                <h5>Upload Files</h5>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Files</span>
                                        <input type="file" name="file[]" id="file" multiple>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload Files" required>
                                    </div>
                                    <span class="red-text" id="file_error"></span>
                                </div>
                            </div>
                            <div class="col  m6 l6 x6" style="margin-top: 68px;">
                                <button type="submit" class="btn waves-effect waves-light upload_doc">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>