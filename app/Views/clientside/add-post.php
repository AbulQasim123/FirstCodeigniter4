<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>

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
			<div class="row" id="show_posts" style="margin-top: -6px;">
				<h4 class="center-align dark-text">Posts Loading..</h4>
			</div>
		</div>
	</div>
</div>


<!-- add new post modal start -->
<div id="add_post_modal" class="modal modal-fixed-footer">
	<form id="add_post_form" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Add Post</h5>
			<div class="divider"></div>
			<div class="row">
				<div class="col s12 m6 l6 xl6">
					<div class="input-field">
						<input type="text" name="post_title" id="post_title">
						<label for="post_title">Post Title</label>
						<span id="post_title_error" class="red-text"></span>
					</div>
				</div>
				<div class="col s12 m6 l6 xl6">
					<div class="input-field">
						<input type="text" name="post_category" id="post_category">
						<label for="post_category">Post Category</label>
						<span id="post_category_error" class="red-text"></span>
					</div>
				</div>
				<div class="col s12 m6 l6 xl6">
					<div class="input-field">
						<textarea name="post_body" id="post_body" class="materialize-textarea" data-length="150"></textarea>
						<label for="post_body">Post body</label>
						<span id="post_body_error" class="red-text"></span>
					</div>
				</div>
				<div class="col s12 m6 l6 xl6">
					<div class="file-field input-field">
						<div class="btn">
							<span>Image</span>
							<input type="file" name="post_image" id="post_image">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload file">
						</div>
						<span id="post_image_error" class="red-text"></span>
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
<!-- add new post modal end -->


<!-- edit post modal start -->
<div id="edit_post_modal" class="modal modal-fixed-footer">
	<form id="edit_post_form" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Edit Post</h5>
			<div class="divider"></div>
			<div class="row">
				<input type="hidden" name="edit_post_id" id="edit_post_id">
				<input type="hidden" name="edit_old_image" id="edit_old_image">
				<div class="col s12 m6 l6 xl6">
					<div class="input-field">
						<input type="text" name="edit_post_title" id="edit_post_title">
						<label for="edit_post_title">Post Title</label>
						<span id="edit_post_title_error" class="red-text"></span>
					</div>
				</div>
				<div class="col s12 m6 l6 xl6">
					<div class="input-field">
						<input type="text" name="edit_post_category" id="edit_post_category">
						<label for="edit_post_category">Post Category</label>
						<span id="edit_post_category_error" class="red-text"></span>
					</div>
				</div>
				<div class="col s12 m6 l6 xl6">
					<div class="input-field">
						<textarea name="edit_post_body" id="edit_post_body" class="materialize-textarea" data-length="150"></textarea>
						<label for="edit_post_body">Post body</label>
						<span id="edit_post_body_error" class="red-text"></span>
					</div>
				</div>
				<div class="col s12 m6 l6 xl6">
					<div class="file-field input-field">
						<div class="btn">
							<span>Image</span>
							<input type="file" name="edit_post_image" id="edit_post_image">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload file">
						</div>
						<span id="edit_post_image_error" class="red-text"></span>
						<div id="old_image_preview"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn waves-effect waves-light" id="add_post_btn">Update</button>
			<a href="javascript:;" class="modal-close btn waves-effect blue-grey darken-3">Cancil</a>
		</div>
	</form>
</div>
<!-- edit post modal end -->

<!-- delete post modal start -->
<div id="delete_post_modal" class="modal">
	<form id="delete_post_form">
		<div class="modal-content">
			<h5 class="center-align">Are you sure you want to delete?</h5>
		</div>
		<div class="modal-footer">
			<div class="center-align" style="margin-top: -10px">
				<button type="submit" class="btn waves-effect waves-light" id="add_post_btn">Agree</button>
				<a href="javascript:;" class="modal-close btn waves-effect blue-grey darken-3">Disagree</a>
			</div>
		</div>
	</form>
</div>
<!-- delete post modal end -->


<!-- detail post modal start -->
<div id="detail_post_modal" class="modal" style="max-height: 100%;">
	<div class="modal-content">
		<h5>Detail Post</h5>
		<div class="divider"></div>
		<div class="row">
			<img src="" id="detail_post_image" style="padding: 10px; width: 100%; height: 200px;">
			<h3 id="detail_post_title"></h3>
			<h5 id="detail_post_category"></h5>
			<p id="detail_post_body"></p>
			<p id="detail_post_created" style="font-style: italic;"></p>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-close waves-effect waves-green btn-flat">ok</a>
	</div>
</div>
<!-- detail post modal end -->
          
<?= $this->endSection() ?>