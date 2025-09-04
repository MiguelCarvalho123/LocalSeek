// Elementos do Sugestão ------------------------------<
// Funcionalidade para os filtros
document.querySelector('.generate-btn').addEventListener('click', function () {
    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Gerando...';

    setTimeout(() => {
        this.innerHTML = '<i class="fas fa-magic"></i> Gerar Novas Sugestões';
        // Aqui você poderia adicionar lógica para gerar novas sugestões
    }, 2000);
});

// Funcionalidade para os botões explorar
document.querySelectorAll('.explore-btn').forEach(button => {
    button.addEventListener('click', function () {
        alert('Redirecionando para detalhes do destino...');
    });
});

// Efeito hover nos cards
document.querySelectorAll('.suggestion-card').forEach(card => {
    card.addEventListener('mouseenter', function () {
        this.style.transform = 'translateY(-10px) scale(1.02)';
    });

    card.addEventListener('mouseleave', function () {
        this.style.transform = 'translateY(0) scale(1)';
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const nome = localStorage.getItem("nomeUsuario") || "Usuário";
    const email = localStorage.getItem("emailUsuario") || "email@exemplo.com";

    // atualizar na navbar
    document.getElementById("profileName").textContent = nome;
    document.getElementById("profileEmail").textContent = email;

    // atualizar no dropdown
    document.getElementById("dropdownName").textContent = nome;
    document.getElementById("dropdownEmail").textContent = email;

    // avatar inicial (primeira letra do nome)
    const inicial = nome.charAt(0).toUpperCase();
    document.getElementById("dropdownAvatar").textContent = inicial;
});