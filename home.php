<!-- PHP para aparecer o nome, email e as iniciais no dropdown-->
<?php
session_start();
if (!isset($_SESSION["nome"])) {
    header("Location: loginPage.html");
    exit();
}
$nome = $_SESSION["nome"];
$email = $_SESSION["email"];
$inicial = strtoupper(substr($nome, 0, 1));
?>

<!-- HTML do home -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Seek - Descubra Destinos Únicos</title>
   <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/styleSuggestionPage.css">
    <link rel="stylesheet" href="CSS/styleHistoricomain.css">
    <link rel="stylesheet" href="CSS/styleHome.css">
    <script src="Scripts/jsSuggestion.js"></script>
    <script src="Scripts/jsHistorico.js"></script>
    <link rel = "icon" href = "images/Icone sem fundo.png">

</head>
<body>
    <!-- Header - NavBar -->
    <header class="header">
        <div class="header-container">
            <a href="#" class="logo">Local Seek</a>

            <nav>
                <ul class="nav-menu" id="navMenu">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="suggestionPage.php">Sugestões de Viagens</a></li>
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

                    <a href="PHP/logout.php" class="dropdown-item danger">
                        <span class="dropdown-icon"><span class="material-symbols-outlined">logout</span></span>
                        Sair
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Conteudo Principal -->
    <div class="home-container">
        <!-- Hero Section -->
        <section class="home-hero-section">
            <h1 class="home-welcome-title">Seja Bem-vindo, <span class="home-brand-name"><?= htmlspecialchars($nome) ?>!</span></h1>
            <p class="home-hero-description">
                O <strong>Local Seek</strong> é sua plataforma inteligente para descobrir destinos únicos.
            </p>
            <div class="home-header-actions">
                <a href="suggestionPage.php" class="home-btn-primary">Explorar Destinos</a>
                <a href="historico.php" class="home-btn-secondary">Ver Histórico</a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="home-features" id="home-features">
            <h2 class="home-section-title">O que você pode fazer</h2>
            <div class="home-features-grid">
                <div class="home-feature-card">
                    <div class="home-feature-icon"><span class="material-symbols-outlined">location_on</span></div>
                    <h3 class="home-feature-title">Sugestões Personalizadas</h3>
                    <p class="home-feature-description">Baseadas no seu perfil de preferências e histórico de viagens anteriores.</p>
                </div>
                <div class="home-feature-card">
                    <div class="home-feature-icon"><span class="material-symbols-outlined">search</span></div>
                    <h3 class="home-feature-title">Filtros Inteligentes</h3>
                    <p class="home-feature-description">Clima, paisagem e mais filtros avançados para encontrar seu destino ideal.</p>
                </div>
                <div class="home-feature-card">
                    <div class="home-feature-icon"><span class="material-symbols-outlined">history_2</span></div>
                    <h3 class="home-feature-title">Histórico Completo</h3>
                    <p class="home-feature-description">Nunca perca suas descobertas e acompanhe suas jornadas de exploração.</p>
                </div>
            </div>
        </section>

        <!-- Highlight Section -->
        <section class="home-highlight">
            <h2 class="home-section-title">Destaque do Dia</h2>
            <div class="home-highlight-card">
                <div class="home-highlight-image"></div>
                <div class="home-highlight-content">
                    <span class="home-highlight-location">Brasil</span>
                    <h3 class="home-highlight-title">São Paulo</h3>
                    <p class="home-highlight-description">
                        Arranha-céus imponentes e uma vida cultural vibrante, perfeitos para exploradores urbanos e amantes da diversidade.
                    </p>
                    <a href="#" class="home-btn-primary">Ver mais detalhes</a>
                </div>
            </div>
        </section>

        <!-- Recommendations Section -->
        <section class="home-recommendations" id="home-recommendations">
            <h2 class="home-section-title">Destinos Recomendados Recentes</h2>
            <div class="home-recommendations-grid">
                <div class="home-destination-card">
                    <div class="home-destination-image barcelona"></div>
                    <span class="home-country-tag spain">Bahia</span>
                    <div class="home-destination-content">
                        <h3 class="home-destination-title">Salvador</h3>
                        <p class="home-destination-description">
                            berço da cultura afro-brasileira, carnaval e Pelourinho.
                        </p>
                        <a href="#" class="home-btn-primary">Ver mais</a>
                    </div>
                </div>
                <div class="home-destination-card">
                    <div class="home-destination-image amazon"></div>
                    <span class="home-country-tag brazil">Paraná</span>
                    <div class="home-destination-content">
                        <h3 class="home-destination-title">Foz do Iguaçu</h3>
                        <p class="home-destination-description">
                            cataratas impressionantes e natureza exuberante.
                        </p>
                        <a href="#" class="home-btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
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