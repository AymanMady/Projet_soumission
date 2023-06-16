<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
		}
		
		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			max-width: 500px;
			margin: 0 auto;
		}
		
		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		
		input[type="text"], input[type="number"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border-radius: 3px;
			border: 1px solid #ccc;
			box-sizing: border-box;
			font-size: 16px;
            background-color: antiquewhite;
		}
		
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			font-size: 16px;
		}
		
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<form action="create.php" method="POST">
		<label for="numero">nom :</label>
		<input type="text" id="numero" name="nom" required>

		<label for="nom">email :</label>
		<input type="email" id="nom" name="email" required>


		<input type="submit" value="Envoyer" name="tou">
	</form>
</body>
</html>





