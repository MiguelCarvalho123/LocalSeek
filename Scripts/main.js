// Elementos do loginPage
// Função voltar para a tela inicial
function goBack() {
    console.log('Voltando para a página inicial...');
    // Em uma aplicação real, você usaria: window.history.back() ou redirecionaria
}

function handleLogin(event) {
    event.preventDefault();

    const loginBtn = document.getElementById('loginBtn');
    const errorMessage = document.getElementById('errorMessage');

    // Remove mensagem de erro anterior
    errorMessage.classList.remove('show');

    // Adiciona estado de loading
    loginBtn.classList.add('loading');
    loginBtn.textContent = 'Entrando...';

    // Simula requisição de login
    setTimeout(() => {
        const formData = new FormData(event.target);
        const email = formData.get('email');
        const password = formData.get('password');

        // Simula validação (em uma app real, isso seria feito no servidor)
        if (email === 'demo@localseek.com' && password === 'demo123') {
            console.log('Login realizado com sucesso!');
            alert('Login realizado com sucesso! Redirecionando para o dashboard...');
            // Redirecionaria para o dashboard
        } else {
            // Mostra erro
            errorMessage.classList.add('show');
        }

        // Remove estado de loading
        loginBtn.classList.remove('loading');
        loginBtn.textContent = 'Entrar';
    }, 2000);
}

function loginDirecionadoPerfil() {
    window.location.href = "historico.html";
}

function forgotPassword() {
    console.log('Redirecionando para recuperação de senha...');
    alert('Funcionalidade de recuperação de senha seria implementada aqui.');
    // Em uma aplicação real, redirecionaria para página de recuperação
}

function showSignup() {
    window.location.href = "teste-cadastro.html"
    // Em uma aplicação real, redirecionaria para a página de cadastro
}

// Adiciona feedback visual nos inputs
document.querySelectorAll('.form-input').forEach(input => {
    input.addEventListener('blur', function () {
        if (this.value.trim() !== '') {
            this.style.borderColor = '#10b981';
        } else {
            this.style.borderColor = '#e2e8f0';
        }
    });

    input.addEventListener('focus', function () {
        // Remove mensagem de erro quando usuário começar a digitar
        document.getElementById('errorMessage').classList.remove('show');
    });
});

// Demo credentials hint
console.log('💡 Dica: Use demo@localseek.com / demo123 para testar o login');

//Elementos signupPage
//Função sobre a Senha
function handleSubmit(event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const password = formData.get('password');
    const confirmPassword = formData.get('confirmPassword');

    if (password !== confirmPassword) {
        alert('As senhas não coincidem. Por favor, verifique e tente novamente.');
        return;
    }else{
    // Simula criação da conta
    console.log('Conta criada com sucesso!');
    alert('Conta criada com sucesso! Redirecionando...');

    // Em uma aplicação real, você faria uma requisição para o servidor
    // e redirecionaria para a próxima página
    function showLogin() {
    window.location.href = "loginPage.html";
    // Em uma aplicação real, redirecionaria para a página de login
        }
    }
}

function checkPasswordStrength(password) {
    const strengthIndicator = document.getElementById('passwordStrength');
    const strengthFill = document.getElementById('passwordStrengthFill');

    if (password.length === 0) {
        strengthIndicator.classList.remove('show');
        return;
    }

    strengthIndicator.classList.add('show');

    let strength = 0;

    // Critérios de força da senha
    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;

    // Remove classes anteriores
    strengthFill.className = 'password-strength-fill';

    if (strength <= 2) {
        strengthFill.classList.add('strength-weak');
    } else if (strength <= 4) {
        strengthFill.classList.add('strength-medium');
    } else {
        strengthFill.classList.add('strength-strong');
    }
}

function checkPasswordMatch() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const confirmInput = document.getElementById('confirmPassword');

    if (confirmPassword.length === 0) {
        confirmInput.style.borderColor = '#e2e8f0';
        return;
    }

    if (password === confirmPassword) {
        confirmInput.style.borderColor = '#10b981';
    } else {
        confirmInput.style.borderColor = '#ef4444';
    }
}

// Adiciona feedback visual nos inputs
document.querySelectorAll('.form-input').forEach(input => {
    input.addEventListener('blur', function () {
        if (this.value.trim() !== '') {
            this.style.borderColor = '#10b981';
        } else {
            this.style.borderColor = '#e2e8f0';
        }
    });
});