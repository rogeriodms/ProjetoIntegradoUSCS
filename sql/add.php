<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$cnpj = mysqli_real_escape_string($mysqli, $_POST['cnpj']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);
	$telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
		
	// checking empty fields
	if(empty($name) || empty($cnpj) || empty($endereco) || empty($telefone) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($cnpj)) {
			echo "<font color='red'>Cnpj field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($telefone)) {
			echo "<font color='red'>Telefone field is empty.</font><br/>";
		}
		if(empty($endereco)) {
			echo "<font color='red'>Endereco field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,cnpj,email,endereco,telefone) VALUES('$name','$cnpj','$email','$endereco','$telefone')");
		
		//display success message

		header('Location: ../index.php');
	}
}
?>
</body>
</html>
