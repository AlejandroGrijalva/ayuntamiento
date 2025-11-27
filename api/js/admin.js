// sesiones-admin.php
// Variables para el reconocimiento de voz
let reconocimientoVoz = null
let estaGrabando = false
let textoTranscrito = ""

// Verificar compatibilidad al cargar la página
document.addEventListener("DOMContentLoaded", function () {
  const btnGrabar = document.getElementById("btnGrabar")
  const infoVoz = document.getElementById("infoVoz")

  if (!verificarCompatibilidadVoz()) {
    btnGrabar.disabled = true
    btnGrabar.title = "Navegador no compatible con reconocimiento de voz"
    infoVoz.innerHTML =
      '<p style="color: red;"><strong>Error:</strong> Tu navegador no soporta reconocimiento de voz. Usa Chrome o Edge.</p>'
  }
})

function verificarCompatibilidadVoz() {
  return "webkitSpeechRecognition" in window || "SpeechRecognition" in window
}

function abrirModal() {
  document.getElementById("modalSesion").style.display = "block"
  document.getElementById("resumenStatus").textContent = ""
  detenerGrabacion()
  textoTranscrito = "" // Resetear texto transcrito
}

function cerrarModal() {
  document.getElementById("modalSesion").style.display = "none"
  detenerGrabacion()
}

function escucharSesion(id) {
  alert("Playing audio for session " + id)
}

function iniciarGrabacion() {
  const estado = document.getElementById("estadoGrabacion")
  const textarea = document.getElementById("acta")
  const btnGrabar = document.getElementById("btnGrabar")
  const btnDetener = document.getElementById("btnDetener")

  // Resetear texto transcrito si es una nueva grabación
  if (!estaGrabando) {
    textoTranscrito = textarea.value || ""
  }

  if (!verificarCompatibilidadVoz()) {
    estado.textContent = "Error: Navegador no compatible"
    estado.style.color = "red"
    return
  }

  const SpeechRecognition =
    window.SpeechRecognition || window.webkitSpeechRecognition

  try {
    reconocimientoVoz = new SpeechRecognition()
  } catch (error) {
    estado.textContent = "Error al crear reconocimiento: " + error.message
    estado.style.color = "red"
    return
  }

  // Configurar el reconocimiento
  reconocimientoVoz.continuous = true
  reconocimientoVoz.interimResults = true
  reconocimientoVoz.lang = "es-ES" // Español
  reconocimientoVoz.maxAlternatives = 1

  reconocimientoVoz.onstart = function () {
    estaGrabando = true
    estado.textContent = "🎤 Grabando... Habla ahora"
    estado.style.color = "green"
    btnGrabar.disabled = true
    btnDetener.disabled = false
  }

  reconocimientoVoz.onresult = function (event) {
    let textoIntermedio = ""

    for (let i = event.resultIndex; i < event.results.length; i++) {
      const transcript = event.results[i][0].transcript

      if (event.results[i].isFinal) {
        textoTranscrito += transcript + " "
      } else {
        textoIntermedio += transcript
      }
    }

    // Actualizar el textarea con el texto transcrito
    textarea.value = textoTranscrito + textoIntermedio

    // Auto-scroll al final del textarea
    textarea.scrollTop = textarea.scrollHeight
  }

  reconocimientoVoz.onerror = function (event) {
    console.error("Error en reconocimiento de voz:", event.error)

    let mensajeError = "Error: "
    switch (event.error) {
      case "network":
        mensajeError += "Problema de red. Verifica tu conexión a internet."
        break
      case "not-allowed":
        mensajeError += "Permiso de micrófono denegado."
        break
      case "service-not-allowed":
        mensajeError += "Servicio de reconocimiento no disponible."
        break
      default:
        mensajeError += event.error
    }

    estado.textContent = mensajeError
    estado.style.color = "red"
    estaGrabando = false
    btnGrabar.disabled = false
    btnDetener.disabled = true
  }

  reconocimientoVoz.onend = function () {
    if (estaGrabando) {
      // Si aún está grabando, reiniciar el reconocimiento automáticamente
      try {
        reconocimientoVoz.start()
      } catch (error) {
        estado.textContent = "Error al reiniciar grabación: " + error.message
        estado.style.color = "red"
        estaGrabando = false
        btnGrabar.disabled = false
        btnDetener.disabled = true
      }
    } else {
      btnGrabar.disabled = false
      btnDetener.disabled = true
    }
  }

  // Solicitar permiso de micrófono primero
  if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices
      .getUserMedia({
        audio: true,
      })
      .then(function (stream) {
        // Permiso concedido, iniciar reconocimiento
        try {
          reconocimientoVoz.start()
          estado.textContent = "Solicitando permiso de micrófono..."
          estado.style.color = "blue"
        } catch (error) {
          estado.textContent = "Error al iniciar: " + error.message
          estado.style.color = "red"
        }
      })
      .catch(function (error) {
        estado.textContent = "Permiso de micrófono denegado: " + error.message
        estado.style.color = "red"
        btnGrabar.disabled = false
        btnDetener.disabled = true
      })
  } else {
    // Navegador antiguo, intentar directamente
    try {
      reconocimientoVoz.start()
      estado.textContent = "Iniciando reconocimiento..."
      estado.style.color = "blue"
    } catch (error) {
      estado.textContent = "Error al iniciar: " + error.message
      estado.style.color = "red"
      btnGrabar.disabled = false
      btnDetener.disabled = true
    }
  }
}

function detenerGrabacion() {
  if (reconocimientoVoz && estaGrabando) {
    try {
      reconocimientoVoz.stop()
      estaGrabando = false
      document.getElementById("estadoGrabacion").textContent =
        "Grabación detenida"
      document.getElementById("estadoGrabacion").style.color = "gray"
      document.getElementById("btnGrabar").disabled = false
      document.getElementById("btnDetener").disabled = true
    } catch (error) {
      console.error("Error al detener:", error)
    }
  }
}

// Cerrar modal si se hace clic fuera
window.onclick = function (event) {
  var modal = document.getElementById("modalSesion")
  if (event.target == modal) {
    window.location.href = "sesiones-admin.php"
  }
}

// Si hay sesión para editar, abrir el modal automáticamente
