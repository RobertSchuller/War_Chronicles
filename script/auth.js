document.addEventListener('DOMContentLoaded', function() {
    const loginToggle = document.getElementById('loginToggle');
    const registerToggle = document.getElementById('registerToggle');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const loginError = document.getElementById('loginError');
    const registerError = document.getElementById('registerError');
    const passwordInput = document.getElementById('registerPassword');
    const passwordStrength = document.getElementById('passwordStrength');

    function switchForm(toShow, toHide) {
        toHide.classList.remove('active');
        toHide.style.opacity = 0;
        setTimeout(() => {
            toHide.style.display = 'none';
            toShow.style.display = 'block';
            setTimeout(() => {
                toShow.style.opacity = 1;
                toShow.classList.add('active');
            }, 50);
        }, 500);
    }   

    loginToggle.addEventListener('click', function() {
        loginToggle.classList.add('active');
        registerToggle.classList.remove('active');
        switchForm(loginForm, registerForm);
        if (loginError) loginError.textContent = ''; // Clear error messages
        if (registerError) registerError.textContent = '';
    });

    registerToggle.addEventListener('click', function() {
        registerToggle.classList.add('active');
        loginToggle.classList.remove('active');
        switchForm(registerForm, loginForm);
        if (loginError) loginError.textContent = ''; // Clear error messages
        if (registerError) registerError.textContent = '';
    });

    passwordInput.addEventListener('input', function() {
        const value = passwordInput.value;
        const strength = getPasswordStrength(value);
        updatePasswordStrengthIndicator(strength);
    });

    function getPasswordStrength(password) {
        let strength = 0;
        if (password.length >= 8) strength += 1;
        if (/[a-z]/.test(password)) strength += 1;
        if (/[A-Z]/.test(password)) strength += 1;
        if (/[0-9]/.test(password)) strength += 1;
        if (/[\W]/.test(password)) strength += 1;
        return strength;
    }

    function updatePasswordStrengthIndicator(strength) {
        passwordStrength.textContent = '';
        passwordStrength.classList.remove('weak', 'medium', 'strong');
        if (strength === 1 || strength === 2) {
            passwordStrength.textContent = 'Weak';
            passwordStrength.classList.add('weak');
        } else if (strength === 3 || strength === 4) {
            passwordStrength.textContent = 'Medium';
            passwordStrength.classList.add('medium');
        } else if (strength === 5) {
            passwordStrength.textContent = 'Strong';
            passwordStrength.classList.add('strong');
        }
    }
});
