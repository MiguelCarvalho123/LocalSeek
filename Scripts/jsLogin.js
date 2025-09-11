document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const errorMessage = document.getElementById('errorMessage');

    // ---------- Login ----------
    if (loginForm) {
        loginForm.addEventListener('submit', event => {
            event.preventDefault();
            const formData = new FormData(loginForm);

            fetch('PHP/login.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                if (data.trim() === 'success') {
                    window.location.href = "home.php"; // redireciona após login OK
                } else {
                    errorMessage.style.display = 'block';
                    errorMessage.textContent = data;
                }
            })
            .catch(err => {
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Erro ao tentar login.';
            });
        });
    }

    // ---------- Cadastro ----------
    if (signupForm) {
        signupForm.addEventListener('submit', event => {
            event.preventDefault();
            const formData = new FormData(signupForm);
            const senha = formData.get('senha');
            const confirmSenha = formData.get('confirmSenha');

            if (senha !== confirmSenha) {
                errorMessage.style.display = 'block';
                errorMessage.textContent = '❌ As senhas não coincidem!';
                return;
            }

            fetch('PHP/cadastro.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(data => {
                if (data.trim() === 'success') {
                    alert('✅ Conta criada! Redirecionando para login...');
                    window.location.href = "loginPage.html";
                } else {
                    errorMessage.style.display = 'block';
                    errorMessage.textContent = data;
                }
            })
            .catch(err => {
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Erro ao cadastrar.';
            });
        });
    }

    // ---------- Feedback visual ----------
    document.querySelectorAll('.form-input').forEach(input => {
        input.addEventListener('focus', () => {
            if (errorMessage) errorMessage.style.display = 'none';
        });
    });
});

    // ---------- Confirmação de senha ----------
    function checkPasswordMatch() {
        const senha = document.getElementById('senha').value;
        const confirmSenha = document.getElementById('confirmSenha').value;
        const confirmInput = document.getElementById('confirmSenha');

        if (!confirmSenha) {
            confirmInput.style.borderColor = '#e2e8f0';
            return;
        }

        confirmInput.style.borderColor = (senha === confirmSenha) ? '#10b981' : '#ef4444';
}