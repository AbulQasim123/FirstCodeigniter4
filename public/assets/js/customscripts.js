$(document).ready(function () {
  // Add new post using Ajax
  $("#add_post_form").submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    $.ajax({
      url: "http://localhost:2025/serverside/add-post",
      method: "POST",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response);
      },
      error: function (xhr, status, error) {
        if (xhr.responseJOSN && xhr.responseJOSN.error) {
          var errorMsg = xhr.responseJOSN.messages;
          $.each(errorMsg, function (fieldName, message) {
            var errorMessage =
            	'<span class="error-message">' + message + "</span>";
					$('[data-field="' + fieldName + '"]').after(errorMessage);
          });
        }
      },
    });
  });
});
