
<?php
session_start();
require 'conexao.php';
if (isset($_POST['create_usuario'])) {
	$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
	$rota = mysqli_real_escape_string($conexao, trim($_POST['rota']));
	$celular = mysqli_real_escape_string($conexao, trim($_POST['celular']));
	$senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) : '';
	$sql = "INSERT INTO usuario (nome, rota, celular, senha) VALUES ('$nome', '$rota', '$celular', '$senha')";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Usuário criado com sucesso';
		header('Location: index.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Usuário não foi criado';
		header('Location: index.php');
		exit;
	}
}
if (isset($_POST['update_usuario'])) {
	$usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);
	$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
	$rota = mysqli_real_escape_string($conexao, trim($_POST['rota']));
	$celular = mysqli_real_escape_string($conexao, trim($_POST['celular']));
	$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
	$sql = "UPDATE usuario SET nome = '$nome', rota = '$rota', celular = '$celular'";
	if (!empty($senha)) {
		$sql .= ", senha='" . password_hash($senha, PASSWORD_DEFAULT) . "'";
	}
	$sql .= " WHERE id = '$usuario_id'";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Usuário atualizado com sucesso';
		header('Location: index.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Usuário não foi atualizado';
		header('Location: index.php');
		exit;
	}
}
if (isset($_POST['delete_usuario'])) {
	$usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);
	$sql = "DELETE FROM usuario WHERE id = '$usuario_id'";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Usuário deletado com sucesso';
		header('Location: index.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Usuário não foi deletado';
		header('Location: index.php');
		exit;
	}
}
?>