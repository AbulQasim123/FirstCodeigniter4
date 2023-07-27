$(document).ready(function () {
  // Add new post using Ajax
  $("#add_post_form").submit(function (e) {
    e.preventDefault();
    var formData = new FormData($('#add_post_form')[0]);
    $.ajax({
      url: "http://localhost:2025/serverside/add-post",
      method: "POST",
      data: formData,
      processData: false,
			cache: false,
      contentType: false,
			dataType: "json",
      success: function (response) {
				if (response.error) {
					$('#post_title_error').text(response.messages.post_title);
					$('#post_category_error').text(response.messages.post_category);
					$('#post_body_error').text(response.messages.post_body);
					$('#post_image_error').text(response.messages.file);
				}else{					
					$('#add_post_form')[0].reset();
					$('.modal').modal('close');
					M.toast({ html: response.messages, classes: 'blue' });	
				}
				fetchAllPosts();
      },
      error: function (xhr, status, error) {
        console.log("Error:", error);
      },
    });
  });


	// edit post ajax request
	$(document).delegate('.edit_post_btn', 'click', function(e) {
		e.preventDefault();
		const id = $(this).attr('id');
		$.ajax({
			url: "http://localhost:2025/serverside/edit-post/" +id,
			method: 'get',
			success: function(response) {
				// console.log(response);
				$("#edit_post_id").val(response.message.id);
				$("#edit_old_image").val(response.message.post_image);
				$("#edit_post_title").val(response.message.post_title);
				$("#edit_post_category").val(response.message.post_category);
				$("#edit_post_body").val(response.message.post_body);
				$("#old_image_preview").html('<img src="http://localhost:2025/assets/images/' + response.message.post_image + '" class="card-image" width="100" height="50">');
			}
		});
	});


	// update post ajax request
	$("#edit_post_form").submit(function(e) {
		e.preventDefault();
		var formData = new FormData($('#edit_post_form')[0]);
			$.ajax({
				url: "http://localhost:2025/serverside/update-post",
				method: 'post',
				data: formData,
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function(response) {
					if (response.error) {
						$('#edit_post_title_error').text(response.messages.edit_post_title);
						$('#edit_post_category_error').text(response.messages.edit_post_category);
						$('#edit_post_body_error').text(response.messages.edit_post_body);
						$('#edit_post_image_error').text(response.messages.file);
					}else{					
						$('#edit_post_form')[0].reset();
						$('.modal').modal('close');
						M.toast({ html: response.message, classes: 'blue' });	
					}
					// fetchAllPosts();
				}
			});
	});


	// delete post ajax request
	$(document).delegate('.delete_post_btn', 'click', function() {
		const id = $(this).attr('id');
		$('#delete_post_form').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: "http://localhost:2025/serverside/delete-post/" +id,
				method: 'get',
				success: function(response) {
					console.log(response);
					$('#delete_post_form')[0].reset();
					$('.modal').modal('close');
					M.toast({ html: response.message, classes: 'blue' });	
					fetchAllPosts();
				}
			});
		});
	});

	// fetch all posts ajax request
	fetchAllPosts();
	function fetchAllPosts() { 
		$.ajax({
			type: "get",
			url: "http://localhost:2025/serverside/fetch-all-post",
			success: function (response) {
				$('#show_posts').html(response.message);
			}
		});
	}
});
