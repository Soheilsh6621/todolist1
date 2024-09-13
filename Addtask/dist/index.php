<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Add task</title>
  <href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body>
	<div class="content-wrapper">
		<div class="background background-left"></div>
		<div class="background background-right"></div>
		<div class="sing-up-panel active">
			<form method="post" action="/7task/back-end.php/Add-task.php">
				<h1>create your task</h1>
				<div class="input">
					<input type="text" required id="name" name="title">
					<div class="bar"></div>
					<label>title</label>
				</div>
				<div class="input">
					<input type="text" required id="mail" name="description">
					<div class="bar"></div>
					<label>description</label>
				</div>
				
				<div class="button-wrapper">
					
					<button class="sing-up" type="submit" name="Add task">Add task</button>
				</div>
			</form>
		</div>
		
		<div class="floating-content"></div>
	</div>
</body>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
