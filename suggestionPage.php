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
    <title>Local Seek - Sugestões Personalizadas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/styleSuggestionPage.css">
    <link rel="stylesheet" href="CSS/styleHistoricomain.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" /> 
    <script src="Scripts/jsSuggestion.js"></script>
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
                    <li><a href="#" class="active">Sugestões de Viagens</a></li>
                    <li><a href="historico.php">Histórico de Viagens</a></li>
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

    <!-- Conteúdo Principal -->
    <main class="main-content">
        <section class="hero-section">
            <h1 class="hero-title">Sugestões Personalizadas</h1>
            <p class="hero-description">
                Baseadas no seu perfil e preferências, selecionamos os destinos perfeitos para você
            </p>
        </section>
        
        <!-- Filtros -->
        <section class="filters-section">
            <div class="filters-header">
                <i class="fas fa-filter filters-icon"></i>
                <div>
                    <h2 class="filters-title">Personalizar Sugestões</h2>
                    <p class="filters-subtitle">Ajuste suas preferências para receber sugestões ainda mais precisas</p>
                </div>
            </div>

            <div class="filters-grid">
                <div class="filter-group">
                    <label class="filter-label">
                        <i class="fas fa-dollar-sign"></i>
                        Orçamento
                    </label>
                    <select class="filter-select">
                        <option>Selecione</option>
                        <option>Até R$ 2.000</option>
                        <option>R$ 2.000 - R$ 5.000</option>
                        <option>R$ 5.000 - R$ 10.000</option>
                        <option>Acima de R$ 10.000</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">
                        <img id = "weather" src = "images/weather.png">
                        Clima
                    </label>
                    <select class="filter-select">
                        <option>Selecione</option>
                        <option>1-3 dias</option>
                        <option>4-7 dias</option>
                        <option>8-14 dias</option>
                        <option>Mais de 14 dias</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">
                        <img id = "weather" src = "images/landscape.png">
                        Paisagem
                    </label>
                    <select class="filter-select">
                        <option>Selecione</option>
                        <option>Aventura</option>
                        <option>Romance</option>
                        <option>Relax</option>
                        <option>Cultura</option>
                        <option>Família</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">
                        <i class="fas fa-users"></i>
                        Popularidade
                    </label>
                    <select class="filter-select">
                        <option>Selecione</option>
                        <option>Solo</option>
                        <option>Casal</option>
                        <option>Família</option>
                        <option>Amigos</option>
                    </select>
                </div>
            </div>

            <!-- Button Filters -->
            <button class="generate-btn">
                <i class="fas fa-magic"></i>
                Gerar Novas Sugestões
            </button>
        </section>

        <!-- Content - Tirar do Comentário depois da API pronta
        <section class="suggestions-section">
            <h2 class="section-title">Suas Sugestões Personalizadas</h2> -->

            <!-- Cards Suggestions-->
        </section>
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
                    <a href="#">Destinos</a>
                    <a href="historico.php">Histórico</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>