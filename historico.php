<!-- PHP para aparecer o nome, email e as iniciais no dropdown-->
<?php
session_start();
if (!isset($_SESSION["nome"])) {
    header("Location: ../loginPage.html");
    exit();
}
$nome = $_SESSION["nome"];
$email = $_SESSION["email"];
$inicial = strtoupper(substr($nome, 0, 1));
?>

<!-- HTML do site (estrutura)-->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Seek - Histórico</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/styleHistoricomain.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" /> 
    <script src="Scripts/jsHistorico.js"></script>
    <link rel = "icon" href = "images/Icone sem fundo.png">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="#" class="logo">Local Seek</a>
            
            <nav>
                <ul class="nav-menu" id="navMenu">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="suggestionPage.php" >Sugestões de Viagens</a></li>
                    <li><a href="#" class="active">Histórico de Viagens</a></li>
                </ul>
            </nav>

            <button class="mobile-menu-btn" id="mobileMenuBtn" onclick="toggleMobileMenu()">
                ☰
            </button>

            <!-- Profile Dropdown -->
            <div class="profile-dropdown">
                <button class="profile-trigger" id="profileTrigger" onclick="toggleProfileDropdown()">
                    <div class="profile-avatar" id="profileAvatar">
                        <div class="status-indicator"></div>
                        <?= $inicial ?>
                    </div>
                </button>

                <div class="dropdown-menu" id="profileDropdown">
                    <div class="dropdown-header">
                        <div class="dropdown-user-info">
                            <div class="dropdown-avatar" id="dropdownAvatar"><?= $inicial ?></div>
                            <div class="dropdown-user-details">
                                <h3 id="dropdownName"><?= htmlspecialchars($nome) ?></h3>
                                <p id="dropdownEmail"><?= htmlspecialchars($email) ?></p>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="dropdown-item" onclick="showFeature('perfil')">
                        <span class="dropdown-icon"><span class="material-symbols-outlined">person</span></span>
                        Perfil
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item" onclick="showFeature('feedback')">
                        <span class="dropdown-icon"><span class="material-symbols-outlined">feedback</span></span>
                        Enviar Feedback
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item danger" onclick="logout()">
                        <span class="dropdown-icon"><span class="material-symbols-outlined">logout</span></span>
                        Sair
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="welcome-section">
            <h1 class="welcome-title">destino visualizado ainda</h1>
            <p class="welcome-description">
                Comece explorando destinos para vê-los aparecer aqui
            </p>
            <a href="suggestionPage.php" class="explore-btn">
                Explorar destinos
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <h3>Local Seek</h3>
                <p>Descubra destinos incríveis personalizados para suas preferências de viagem.</p>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Local Seek. Todos os direitos reservados.</p>
                <div class="footer-bottom-links">
                    <a href="home.php">Home</a>
                    <a href="suggestionPage.php">Destinos</a>
                    <a href="#">Histórico</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>