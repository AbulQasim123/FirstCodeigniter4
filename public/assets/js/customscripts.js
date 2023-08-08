$(document).ready(function () {
  // Here are our Custom Functions for displaying Form Errors Messages
  function clearErrorMessages() {
    // Add Post Form Clear Messages
   $("#post_title_error").text("");
   $("#post_category_error").text("");
   $("#post_body_error").text("");
   $("#post_image_error").text("");

   // Edit Post Form Clear Messages
   $("#edit_post_title_error").text("");
   $("#edit_post_category_error").text("");
   $("#edit_post_body_error").text("");
   $("#edit_post_image_error").text("");

   // About Image uploading Clear Messages
   $("#name_error").text("");
   $("#email_error").text("");
   $("#mobile_error").text("");
   $("#image_error").text("");
 }
  // Add new post using Ajax
  var base_url = "http://localhost:2025/";
  $("#add_post_form").submit(function (e) {
    e.preventDefault();
    clearErrorMessages();
    var formData = new FormData($("#add_post_form")[0]);
    $.ajax({
      url: base_url + "serverside/add-post",
      method: "POST",
      data: formData,
      processData: false,
      cache: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
        if (response.error) {
          $("#post_title_error").text(response.messages.post_title);
          $("#post_category_error").text(response.messages.post_category);
          $("#post_body_error").text(response.messages.post_body);
          $("#post_image_error").text(response.messages.file);
        } else {
          $("#add_post_form")[0].reset();
          $(".modal").modal("close");
          M.toast({ html: response.messages, classes: "blue" });
        }
        fetchAllPosts();
      },
      error: function (xhr, status, error) {
        console.log("Error:", error);
      },
    });
  });

  // edit post ajax request

  $(document).delegate(".edit_post_btn", "click", function (e) {
    e.preventDefault();
    const id = $(this).attr("id");
    $.ajax({
      url: base_url + "serverside/edit-post/" + id,
      method: "get",
      success: function (response) {
        // console.log(response);
        $("#edit_post_id").val(response.message.id);
        $("#edit_old_image").val(response.message.post_image);
        $("#edit_post_title").val(response.message.post_title);
        $("#edit_post_category").val(response.message.post_category);
        $("#edit_post_body").val(response.message.post_body);
        $("#old_image_preview").html(
          '<img src="' +
            base_url +
            "assets/images/" +
            response.message.post_image +
            '" class="card-image" width="100" height="50">'
        );
      },
    });
  });

  // update post ajax request
  $("#edit_post_form").submit(function (e) {
    e.preventDefault();
    clearErrorMessages();
    var formData = new FormData($("#edit_post_form")[0]);
    $.ajax({
      url: base_url + "serverside/update-post",
      method: "post",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        if (response.error) {
          $("#edit_post_title_error").text(response.messages.edit_post_title);
          $("#edit_post_category_error").text(
            response.messages.edit_post_category
          );
          $("#edit_post_body_error").text(response.messages.edit_post_body);
          $("#edit_post_image_error").text(response.messages.file);
        } else {
          $("#edit_post_form")[0].reset();
          $(".modal").modal("close");
          M.toast({ html: response.message, classes: "blue" });
        }
        fetchAllPosts();
      },
    });
  });

  // delete post ajax request
  $(document).delegate(".delete_post_btn", "click", function () {
    const id = $(this).attr("id");
    $("#delete_post_form").submit(function (e) {
      e.preventDefault();
      $.ajax({
        url: base_url + "serverside/delete-post/" + id,
        method: "get",
        success: function (response) {
          console.log(response);
          $("#delete_post_form")[0].reset();
          $(".modal").modal("close");
          M.toast({ html: response.message, classes: "blue" });
          fetchAllPosts();
        },
      });
    });
  });

  // detail post ajax request
  $(document).delegate(".detail_post", "click", function (e) {
    e.preventDefault();
    const id = $(this).attr("id");
    $.ajax({
      url: base_url + "serverside/detail-post/" + id,
      method: "get",
      dataType: "json",
      success: function (response) {
        $("#detail_post_image").attr(
          "src",
          base_url + "assets/images/" + response.message.post_image
        );
        $("#detail_post_title").text(response.message.post_title);
        $("#detail_post_category").text(response.message.post_category);
        $("#detail_post_body").text(response.message.post_body);
        $("#detail_post_created").text(response.message.created_at);
      },
    });
  });

  // fetch all posts ajax request
  fetchAllPosts();
  function fetchAllPosts() {
    $.ajax({
      type: "get",
      url: base_url + "serverside/fetch-all-post",
      success: function (response) {
        $("#show_posts").html(response.message);
      },
    });
  }

  // load Employee data
  $("#load_table").DataTable({
    processing: true,
    serverside: true,
    lengthChange: true,
    order: [],
    ajax: {
      url: base_url + "load-employee",
      type: "GET",
    },
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { data: "name" },
      { data: "email" },
      { data: "gender" },
      { data: "date_of_birth" },
      { data: "mobile_no" },
      { data: "designation" },
      { data: "address" },
      { data: "actions" },
    ],
  });

  // Here are About Image uploading
  $("#form_submit").on("submit", function (e) {
    e.preventDefault();
    clearErrorMessages();
    var formData = new FormData(this);
    $.ajax({
      url: base_url + "serverside/img-uploads",
      type: "POST",
      cache: false,
      data: formData,
      processData: false,
      contentType: false,
      dataType: "JSON",
      success: function (response) {
        if (response.success == false) {
          $("#name_error").text(response.messages.name);
          $("#email_error").text(response.messages.email);
          $("#mobile_error").text(response.messages.mobile);
          $("#image_error").text(response.messages.image);
        } else {
          $("#form_submit")[0].reset();
          Swal.fire("Saved", "", "success");
        }
      },
    });
  });
});
