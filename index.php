<?php
//including the database connection file
include_once("./sql/config.php");
//INICIAR SESS�O
session_start();
//VERIFICA SESS�O
if (isset($_SESSION['nome'])){
	//LEITURA
	$nome = $_SESSION['nome'];
	//ATRIBUI��O
	$_SESSION['nome'] = "usu�rio";
}
//DESTROI SESS�O
session_destroy();

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Projeto integrado</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="sql/css/util.css">
	<link rel="stylesheet" type="text/css" href="sql/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<h1 class="table100-head" style="color: aliceblue; padding-left: 5ex; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 300%;">Projeto integrado Rogerio e Murilo</h1>
					<br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit" onclick="window.location.href='sql/add.html';">Cadastrar</button>
                            
						</div>
						</a>
					</div>

					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Nome da Empresa</th>
								<th class="column2">CNPJ</th><br>
								<th class="column3">E-mail</th>
								<th class="column4">Endereço</th>
								<th class="column5">Telefone</th>
								<th class="column6">Edit</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
							while($res = mysqli_fetch_array($result)) { 		
								echo "<tr>";
								echo "<td class='column1'>".$res['name']."</td>";
								echo "<td class='column2'>".$res['cnpj']."</td>";
								echo "<td class='column3'>".$res['email']."</td>";	
								echo "<td class='column4'>".$res['endereco']."</td>";
								echo "<td class='column5'>".$res['telefone']."</td>";
								echo "<td class='column6'><a href=\"sql/edit.php?id=$res[id]\">Edit</a> | <a href=\"./sql/delete.php?id=$res[id]\" onClick=\"return confirm('Você ira excluir o cadastro, tem certeza?')\">Delete</a></td>";		
							}
							?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>