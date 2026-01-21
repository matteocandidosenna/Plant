const modalLogin = document.getElementById('modalLogin');
const modalRegister = document.getElementById('modalRegister');

const btnLogin = document.getElementById('button-login');
const botaoReg = document.getElementById('reg');
const botaoLog = document.getElementById('log');

const closeButtons = document.querySelectorAll('.close');

// abrir modal inicial
btnLogin.addEventListener('click', () => {
    modalLogin.classList.add('active');
});

// trocar Login → Register
botaoReg.addEventListener('click', (e) => {
    e.preventDefault();
    modalLogin.classList.remove('active');
    modalRegister.classList.add('active');
});

// trocar Register → Login
botaoLog.addEventListener('click', (e) => {
    e.preventDefault();
    modalRegister.classList.remove('active');
    modalLogin.classList.add('active');
});

// fechar pelo X (modal pai)
closeButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        btn.closest('.modal').classList.remove('active');
    });
});

// fechar clicando fora
window.addEventListener('click', (e) => {
    if (e.target.classList.contains('modal')) {
        e.target.classList.remove('active');
    }
});
