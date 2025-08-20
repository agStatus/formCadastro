//salvar como index.php
<?php 
require_once 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = trim($_POST['name'] ?? '');
	$dob = trim($_POST['dob'] ?? '');
	$phone = trim($_POST['phone'] ?? '');
	$email = trim($_POST['email'] ?? '');
	$city = trim($_POST['city'] ?? '');

	$sql = "INSERT INTO cadastro 
	(name,dob,phone,email,city) values 
	(:name,:dob,:phone,:email,:city)";

	$stmt = $pdo->prepare($sql);
	try{
		$stmt->execute({
			':name' => $name,
			':dob' => $dob,
			':phone' => $phone,
			':email' => $email,
			':city' => $city
		});
	}catch(PDOException $e){
		$errors[] = "Erro ao salvar: " . $e->getMessage();
	}
}

?>