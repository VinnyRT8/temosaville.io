<?php
if (isset($_POST['g-recaptcha-response'])) {
    $secretKey = '6LezXWQqAAAAANjIdSQqgUjMUkz0esByqItps-wf';
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
    
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);
    
    if (intval($responseKeys["success"]) !== 1) {
        echo "Verificação falhou. Tente novamente.";
    } else {
        // Redirecionar para a página de conteúdo real após a verificação
        header("Location: conteudo.html");
        exit();
    }
}
?>
