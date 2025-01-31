<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $assunto = htmlspecialchars($_POST["assunto"]);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    // Verifica se o e-mail é válido
    if ($email === false) {
        header("Location: index.php?error=1");
        exit;
    }

    $destinatario = "alinenunes3105@gmail.com"; 

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    $corpo = "Nome: $nome\nEmail: $email\nAssunto: $assunto\n\nMensagem:\n$mensagem";

    // Envia o e-mail e verifica se funcionou
    if (mail($destinatario, $assunto, $corpo, $headers)) {
        header("Location: index.php?success=1");
    } else {
        header("Location: index.php?error=1");
    }
}
?>
