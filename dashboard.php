<?php
// dashboard.php
require_once 'config.php';

// Verificar se está logado
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Plant</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard-container {
            padding: 100px 20px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .welcome-card {
            background: #f8f8f8;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .logout-btn {
            background: #e68600;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background: #b73739;
        }
    </style>
</head>
<body>
    <section id="topnav">
        <a class="active" href="index.php"><img src="https://i.imgur.com/7I8qh4p.png" width="40px">Plant</a>
        <a href="dashboard.php">DASHBOARD</a>
        <a href="?logout=1" class="logout-btn">SAIR</a>
    </section>

    <div class="dashboard-container">
        <div class="welcome-card">
            <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
            <p>Email: <?php echo htmlspecialchars($_SESSION['user_email'] ?? 'Não disponível'); ?></p>
            <p>Tipo de usuário: <?php echo $_SESSION['user_role']; ?></p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            <div class="card">
                <img src="https://cdn.pixabay.com/photo/2023/06/13/20/53/sunflower-8061822_1280.png" style="width:100%; border-radius: 10px 10px 0 0;">
                <div class="container">
                    <h4>Minhas Plantas</h4>
                    <p>Gerencie suas plantas</p>
                </div>
            </div>
            
            <div class="card">
                <img src="https://cdn.pixabay.com/photo/2020/09/14/15/10/birch-tree-5571242_1280.png" style="width:100%; border-radius: 10px 10px 0 0;">
                <div class="container">
                    <h4>Calendário</h4>
                    <p>Agenda de cuidados</p>
                </div>
            </div>
            
            <div class="card">
                <img src="https://cdn.pixabay.com/photo/2024/01/04/09/34/plant-8486960_1280.png" style="width:100%; border-radius: 10px 10px 0 0;">
                <div class="container">
                    <h4>Chatbot</h4>
                    <p>Tire dúvidas sobre plantas</p>
                </div>
            </div>
        </div>
    </div>

    <section id="footer">
        <p style="color: beige">Autor: Matheus Candido</p>
        <a href="mailto:matteocandidosenna@gmail.com" style="color: beige">matteocandidosenna@gmail.com</a>
        <p style="color: beige">"Longa é a arte, tão breve a vida, querida..."</p>
    </section>
</body>
</html>