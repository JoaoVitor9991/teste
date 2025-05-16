<?php
// Incluir o arquivo de conexão
// require_once '../conexao.php';
require_once __DIR__ . "/conexao.php";
// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form-type']) && $_POST['form-type'] === 'cadastro') {
    // Capturar os dados do formulário
    // $nome = trim($_POST['name']);
    // $email = trim($_POST['email']);
    // $telefone = trim($_POST['phone']);
    // $senha = trim($_POST['password']);
    // $confirmar_senha = trim($_POST['confirm-password']);
    // var_dump($_POST);

    $sql = "SELECT * FROM usuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se há resultados
    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    echo json_encode($usuarios);

    // // Validar os dados
    // $erros = [];

    // // Verificar se as senhas coincidem
    // if ($senha !== $confirmar_senha) {
    //     $erros[] = "As senhas não coincidem.";
    // }

    // // Verificar se o email já está cadastrado
    // $sql = "SELECT id FROM usuarios WHERE email = ?";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("s", $email);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // if ($result->num_rows > 0) {
    //     $erros[] = "Este email já está cadastrado.";
    // }
    // $stmt->close();

    // // Verificar o reCAPTCHA
    // $recaptcha_secret = "SUA_CHAVE_SECRETA_AQUI"; // Substitua pela sua chave secreta do reCAPTCHA
    // $recaptcha_response = $_POST['g-recaptcha-response'];
    // $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
    // $recaptcha_data = [
    //     'secret' => $recaptcha_secret,
    //     'response' => $recaptcha_response,
    //     'remoteip' => $_SERVER['REMOTE_ADDR']
    // ];
    // $recaptcha_options = [
    //     'http' => [
    //         'method' => 'POST',
    //         'content' => http_build_query($recaptcha_data)
    //     ]
    // ];
    // $recaptcha_context = stream_context_create($recaptcha_options);
    // $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
    // $recaptcha_json = json_decode($recaptcha_result, true);

    // if (!$recaptcha_json['success']) {
    //     $erros[] = "Falha na verificação do reCAPTCHA.";
    // }

    // // Se não houver erros, prosseguir com o cadastro
    // if (empty($erros)) {
    //     // Criptografar a senha
    //     $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    //     // Inserir os dados no banco (definindo is_admin como 0 para usuários comuns)
    //     $sql = "INSERT INTO usuarios (nome, email, telefone, senha, is_admin) VALUES (?, ?, ?, ?, 0)";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bind_param("ssss", $nome, $email, $telefone, $senha_hash);

    //     if ($stmt->execute()) {
    //         // Redirecionar para a página de login com mensagem de sucesso
    //         header("Location: ../login.html?success=Cadastro realizado com sucesso! Faça login.");
    //         exit();
    //     } else {
    //         $erros[] = "Erro ao realizar o cadastro: " . $conn->error;
    //     }
    //     $stmt->close();
    // }

    // // Se houver erros, redirecionar de volta ao formulário com os erros
    // if (!empty($erros)) {
    //     $erro_msg = urlencode(implode(" | ", $erros));
    //     header("Location: ../cadastro.html?error=$erro_msg");
    //     exit();
    // }
}

$conn->close();
