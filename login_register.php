<?php
// login_register.php
require_once 'config.php';

// Processar Registro
if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    // Validações básicas
    $errors = [];
    
    if (strlen($password) < 6) {
        $errors[] = "A senha deve ter pelo menos 6 caracteres";
    }
    
    // Verificar se email já existe
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $errors[] = "Este email já está cadastrado";
    }
    
    if (empty($errors)) {
        // Hash da senha
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Inserir usuário
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        
        if ($stmt->execute([$name, $email, $hashed_password, $role])) {
            $_SESSION['success'] = "Cadastro realizado com sucesso! Faça login.";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Erro ao cadastrar. Tente novamente.";
        }
    } else {
        $_SESSION['errors'] = $errors;
    }
    
    header("Location: index.php");
    exit();
}

// Processar Login
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Buscar usuário
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        // Login bem-sucedido
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['logged_in'] = true;
        
        $_SESSION['success'] = "Login realizado com sucesso!";
        
        // Redirecionar baseado no role
        if ($user['role'] == 'admin') {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();
    } else {
        $_SESSION['error'] = "Email ou senha inválidos";
        header("Location: index.php");
        exit();
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>