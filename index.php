<?php
session_start();
include("includes/conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $sql = $conn->query("SELECT * FROM fotografos WHERE email='$email' AND senha='$senha'");
    if ($sql->num_rows > 0) {
        $user = $sql->fetch_assoc();
        $_SESSION["fotografo_id"] = $user["id"];
        header("Location: admin/painel.php");
        exit;
    } else { echo "Login inválido"; }
}
?>
<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>
<button type="submit">Entrar</button>
</form>