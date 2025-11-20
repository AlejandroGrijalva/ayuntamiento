const chatBtn = document.getElementById('chatBtn');
const chatModal = document.getElementById('chatModal');
const chatBody = document.getElementById('chatBody');
const chatInput = document.getElementById('chatInput');
const sendBtn = document.getElementById('sendBtn');

chatBtn.addEventListener('click', () => {
    const open = getComputedStyle(chatModal).display === 'flex';
    chatModal.style.display = open ? 'none' : 'flex';
    chatModal.setAttribute('aria-hidden', open ? 'true' : 'false');
});

function appendUser(text) {
    const d = document.createElement('div');
    d.className = 'msg user';
    d.textContent = text;
    chatBody.appendChild(d);
    chatBody.scrollTop = chatBody.scrollHeight;
}

function appendBot(text) {
    const d = document.createElement('div');
    d.className = 'msg bot';
    d.textContent = text;
    chatBody.appendChild(d);
    chatBody.scrollTop = chatBody.scrollHeight;
}

// Mock responses (ui-only)
sendBtn.addEventListener('click', () => {
    const q = chatInput.value.trim();
    if (!q) return;
    appendUser(q);
    chatInput.value = '';
    // simple mocked replies
    setTimeout(() => {
        if (q.toLowerCase().includes('licencia')) {
            appendBot('Para una licencia comercial necesitas: identificación, comprobante de domicilio, pago de derechos y llenar la solicitud. Consulta la convocatoria.');
        } else if (q.toLowerCase().includes('acta')) {
            appendBot('Puedes solicitar acta de nacimiento en la sección de trámites. Requiere identificación y pago.');
        } else {
            appendBot('Buen punto. En este prototipo la respuesta es simulada. En el sistema real la IA buscaría en reglamentos y actas municipales.');
        }
    }, 700);
});

chatInput.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') sendBtn.click();
});


//Button
const menu = document.querySelector(".nav");
document.querySelector(".toggle-menu").addEventListener("click", () => menu.classList.toggle("show-menu"));