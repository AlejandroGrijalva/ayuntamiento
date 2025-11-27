const API_KEY = "AIzaSyAVMP25swoHvfyurDJrOui4s_2oQQFWiuQ"

async function resumir() {
  const texto = document.getElementById("acta").value

  const prompt = `
        Genera un resumen claro, consiso y profecional ya que es para gobierno, no pongas ahi arriba resumen para gobierno ni nada por el estilo, tampoco pongas informacion
        falsa, si no hay nada escrito di que no hay informacion que resumir, el resumen es apartir del texto solo arroja el resumen:

        "${texto}"
    `

  try {
    const respuesta = await fetch(
      "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" +
        API_KEY,
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          contents: [
            {
              role: "user",
              parts: [{ text: prompt }],
            },
          ],
        }),
      }
    )

    const data = await respuesta.json()
    const resumen =
      data.candidates?.[0]?.content?.parts?.[0]?.text || "No hubo respuesta"

    document.getElementById("summary").innerText = resumen
  } catch (error) {
    console.error(error)
    document.getElementById("resultado").innerText = "Error: " + error
  }
}
