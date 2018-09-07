<?php 
echo(__FILE__);

?>
<h1>lumen_app_1</h1>
<p>API Tutorial with teachers, courses, students.</p>


<script>
var form = new FormData();
form.append("article_name", "jojojos");
form.append("article_description", "very interesada.");

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost:8000/teachers",
  "method": "GET",
  "headers": {
    "cache-control": "no-cache",
    "postman-token": "7c5c8c4d-d8fe-f234-f29c-5f4d326cf9c3"
  },
  "processData": false,
  "contentType": false,
  "mimeType": "multipart/form-data",
  "data": form
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
</script>