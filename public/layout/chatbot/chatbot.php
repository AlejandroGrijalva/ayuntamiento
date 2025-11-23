<link href="https://cdn.jsdelivr.net/npm/@n8n/chat/dist/style.css" rel="stylesheet" />
<link rel="stylesheet" href="./layout/chatbot/chatbot.css">
<script type="module">
    import { createChat } from 'https://cdn.jsdelivr.net/npm/@n8n/chat/dist/chat.bundle.es.js';

    createChat({
        webhookUrl: 'https://alejandrogrijalva.app.n8n.cloud/webhook/0ce13a26-6f14-4871-9ecd-ca7705507692/chat',
        
        // 1. Aquí cambias las burbujas que aparecen al inicio
        initialMessages: [
            "¡Hola! 👋 Bienvenido al portal de Atención Ciudadana.",
            "Soy el asistente virtual del Ayuntamiento. ¿En qué trámite o servicio puedo apoyarte hoy?"
        ],

        // 2. Aquí cambias los textos fijos de la ventana (Título, subtítulo, input)
        i18n: {
            en: { /* Se pone 'en' aunque sea español porque sobrescribe el idioma base */
                title: "Presidencia Municipal", /* El título grande "Hi there!" */
                subtitle: "Estamos aquí para servirte las 24 horas.", /* El texto de abajo */
                footer: "Gobierno Municipal 2024-2027", /* Texto pequeño al pie (opcional) */
                inputPlaceholder: "Escribe tu duda aquí...", /* El texto de la barra de escribir */
            },
        },
    });
</script>


