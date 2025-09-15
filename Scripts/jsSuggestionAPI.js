const backendUrl = "http://localhost:3000";

async function sugerirDestino() {
  const paisagem = document.getElementById("preferencia").value;
  const climaFiltro = document.getElementById("clima").value;
  const popularidade = document.getElementById("popularidade").value;
  const orcamento = document.getElementById("orcamento").value;

  try {
    const params = new URLSearchParams({ paisagem, clima: climaFiltro, popularidade, orcamento });
    const response = await fetch(`${backendUrl}/places?${params.toString()}`);
    const data = await response.json();

    const container = document.getElementById("sugestao");
    container.innerHTML = ""; // limpa cards antigos

    if (!data.results || data.results.length === 0) {
      container.innerHTML = "<p>Nenhum destino encontrado.</p>";
      return;
    }

    // Cria um card para cada destino
    for (const destino of data.results) {
      const card = document.createElement("div");
      card.className = "card";

      card.innerHTML = `
        <img src="${destino.imagem || ''}" alt="Imagem do destino">
        <h2>${destino.name}</h2>
        <p class="info">Carregando clima...</p>
        <p class="info">Popularidade: ${destino.popularidade}/5 ⭐</p>
        <p class="info">Orçamento máximo: R$${destino.valor} (${destino.orcamento})</p>
        <p>${destino.descricao}</p>
      `;

      container.appendChild(card);

      // Busca clima real para cada card
      (async () => {
        try {
          const weatherRes = await fetch(`${backendUrl}/weather?city=${encodeURIComponent(destino.name)}`);
          const climaData = await weatherRes.json();
          const climaElem = card.querySelector(".info");

          if (climaData.cod == 200) {
            climaElem.innerText = `Clima: ${climaData.weather[0].description} 🌦️ | Temp: ${climaData.main.temp}°C`;
          } else {
            climaElem.innerText = "Clima: não disponível";
          }
        } catch {
          const climaElem = card.querySelector(".info");
          climaElem.innerText = "Clima: não disponível";
        }
      })();
    }

  } catch (error) {
    console.error(error);
    const container = document.getElementById("sugestao");
    container.innerHTML = "<p>Erro ao buscar destinos.</p>";
  }
}