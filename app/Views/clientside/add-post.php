<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<div class="">
	<div class="content-area">
		<div class="card">
			<div class="card-content">
				<div class="row">
					<div class="col s10">
						<div class="card-title">All Post</div>
					</div>
					<div class="col s2 right-align">
						<a class="btn-floating waves-effect waves-light green modal-trigger" href="#add_post_modal"><i class="small material-icons">add</i></a>
					</div>
				</div>
			</div>
			<div class="card-action" style="margin-top: -35px;">

			</div>
		</div>
	</div>
</div>

<div id="add_post_modal" class="modal modal-fixed-footer">
	<form method="POST" id="add_post_form" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Add Post</h5>
			<div class="divider"></div>
			<div class="row">
				<div class="col s12 m6 l6 xl6">
					<div class="input-field">
						<input type="text" name="post_title" id="post_title">
						<label for="post_title">Post Title</label>
					</div>
				</div>
				<div class="col s12 m6 l6 xl6">
					<div class="input-field">
						<input type="text" name="post_category" id="post_category">
						<label for="post_category">Post Category</label>
					</div>
				</div>
				<div class="col s12 m6 l6 xl6">
					<div class="input-field">
						<textarea name="post_body" id="post_body" class="materialize-textarea" data-length="150"></textarea>
						<label for="post_body">Post body</label>
					</div>
				</div>
				<div class="col s12 m6 l6 xl6">
					<div class="file-field input-field">
						<div class="btn">
							<span>Image</span>
							<input type="file" name="file" id="post_image">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload file">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn waves-effect waves-light" id="add_post_btn">Post</button>
			<a href="javascript:;" class="modal-close btn waves-effect blue-grey darken-3">Cancil</a>
		</div>
	</form>
</div>

<?= $this->endSection() ?>