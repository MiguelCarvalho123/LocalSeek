// Elementos
const menuToggle = document.getElementById('menuToggle');
const offcanvas = document.getElementById('offcanvas');
const overlay = document.getElementById('overlay');
const closeBtn = document.getElementById('closeBtn');
const loginModal = document.getElementById('loginModal');
const signupModal = document.getElementById('signupModal');
const modalCloselog = document.getElementById('modalClose-log');
const modalClosesig = document.getElementById('modalClose-sig');
const loginBtn = document.getElementById('loginBtn');
const signupBtn = document.getElementById('signupBtn');
const loginForm = document.getElementById('loginForm');
const btnMainpage = document.getElementById('mainPageButton')


window.addEventListener('DOMContentLoaded', () => {
    loginModal.classList.remove('show');
    signupModal.classList.remove('show');
    document.body.style.overflow = 'auto';
});

// Abrir offcanvas
menuToggle.addEventListener('click', () => {
    menuToggle.classList.add('active');
    offcanvas.classList.add('show');
    overlay.classList.add('show');
    document.body.style.overflow = 'hidden';
});

// Fechar offcanvas
function closeOffcanvas() {
    menuToggle.classList.remove('active');
    offcanvas.classList.remove('show');
    overlay.classList.remove('show');
    document.body.style.overflow = 'auto';
}

closeBtn.addEventListener('click', closeOffcanvas);
overlay.addEventListener('click', closeOffcanvas);

// Fechar com ESC (OffCanvas)
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && offcanvas.classList.contains('show')) {
        closeOffcanvas();
    }
});

// Fechar com ESC (Modal Login e Signup)
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeLoginModal();
        closeSignupModal();
    }
});

// Botão de Login
loginBtn.addEventListener('click', () => {
    loginModal.classList.add('show');
    document.body.style.overflow = 'hidden';
});

// Botão de Signup
signupBtn.addEventListener('click', () => {
    signupModal.classList.add('show');
    document.body.style.overflow = 'hidden';
});

// Botão do Meio da Página
btnMainpage.addEventListener('click', () => {
    loginModal.classList.add('show');
    document.body.style.overflow = 'hidden';
});

// Modal de Login - Close
function closeLoginModal() {
    loginModal.classList.remove('show');
    document.body.style.overflow = 'auto';
    overlay.classList.remove('show');
}

modalCloselog.addEventListener('click', closeLoginModal);

loginModal.addEventListener('click', (e) => {
    if (e.target === loginModal) {
        closeLoginModal();
    }
});

// Modal de Signup - Close
function closeSignupModal() {
    signupModal.classList.remove('show');
    document.body.style.overflow = 'auto';
    overlay.classList.remove('show');
}

modalClosesig.addEventListener('click', closeSignupModal);

signupModal.addEventListener('click', (e) => {
    if (e.target === signupModal) {
        closeSignupModal();
    }
});

// Fechar modal com ESC
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        if (loginModal.classList.contains('show')) closeLoginModal();
        if (signupModal.classList.contains('show')) closeSignupModal();
        if (offcanvas.classList.contains('show')) closeOffcanvas();
    }
});

// Form de Login
loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Login funcionaria aqui!');
    closeLoginModal();
});
// Validação de senha em tempo real
document.getElementById('password').addEventListener('input', function () {
    const password = this.value;
    const strengthBar = document.getElementById('passwordStrengthBar');

    let strength = 0;

    // Verificar critérios de força da senha
    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;

    // Aplicar classes baseadas na força
    strengthBar.className = 'password-strength-bar';
    if (strength <= 2) {
        strengthBar.classList.add('weak');
    } else if (strength <= 4) {
        strengthBar.classList.add('medium');
    } else {
        strengthBar.classList.add('strong');
    }
});

// Validação de confirmação de senha
document.getElementById('confirmPassword').addEventListener('input', function () {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;

    if (password !== confirmPassword) {
        this.style.borderColor = '#e74c3c';
    } else {
        this.style.borderColor = '#4ECDC4';
    }
});

// Validação do formulário
document.getElementById('signupForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const terms = document.getElementById('terms').checked;

    // Validações
    if (password !== confirmPassword) {
        alert('As senhas não coincidem!');
        return;
    }

    if (password.length < 8) {
        alert('A senha deve ter pelo menos 8 caracteres!');
        return;
    }

    if (!terms) {
        alert('Você deve aceitar os termos de uso!');
        return;
    }

    // Aqui você faria a requisição para o servidor
    alert('Cadastro realizado com sucesso!');
    closeSignupModal();
});

// Link para login
document.getElementById('loginLink').addEventListener('click', function (e) {
    e.preventDefault();
    closeSignupModal();
    loginModal.classList.add('show'); // Abre o Modal de Login
    document.body.style.overflow = 'hidden'; // Evita scroll no fundo
});

//Link do Modal Login para o Signup
document.getElementById('createAccountLink').addEventListener('click', function (e) {
    e.preventDefault();
    closeLoginModal(); // Fecha o login
    signupModal.classList.add('show'); // Abre o cadastro
    document.body.style.overflow = 'hidden'; // Evita scroll no fundo
});

//Botão Login OffCanvas
document.getElementById('loginOffcanvas').addEventListener('click', function (e) {
    e.preventDefault();
    closeOffcanvas();
    loginModal.classList.add('show'); // Abre o Modal de Login
    document.body.style.overflow = 'hidden'; // Evita scroll no fundo
});

// Botão Google
document.getElementById('googleLogin').addEventListener('click', () => {
    alert('Login com Google funcionaria aqui!');
});
