<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<!-- <link rel='stylesheet' type='text/css' href='style.css'> -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
                        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                        crossorigin="anonymous">
		</script>
		<title>Quick DOC</title>
	</head>
	<body>
    <h1>Quick Doc</h1>
    <h3>What is this?</h3>
    <p>This is ajax code from postman, used to call an api on localhost:8000,
    from a client on localhost:8181.</p>
    <p>CORS Middleware was added to the lumen api to allow this.</p>

    <div id="res">
    </div>
		<script>
   
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost:8000/teachers",
  "method": "GET"
  
  
}
$.ajax(settings).done(function (response) {
            
            let teachers = response.data;
            let html = '';
            for(let i =0; i < teachers.length; i++){
                html += `
                <p>`+teachers[i].name+`</p>
                `;
            }            
            $('#res').html(html);
            });
		$(document).ready(function(){
			//console.log('jquery is ready.');
             
           
		});
		 
		</script>
	</body>
</html>