// Caminho do JSON (a partir da pasta admin/)
const url = "../dados/agendamentos.json";

async function carregarAgendamentos() {
    try {
        const resposta = await fetch(url);
        const dados = await resposta.json();

        const tabela = document.getElementById("lista-agendamentos");
        tabela.innerHTML = "";

        if (dados.length === 0) {
            tabela.innerHTML = `<tr>
                                    <td colspan="4" class="text-center">Nenhum agendamento encontrado.</td>
                                </tr>`;
            return;
        }

        dados.forEach((ag) => {
            const linha = `
                <tr>
                    <td>${ag.nome}</td>
                    <td>${ag.email}</td>
                    <td>${ag.mensagem}</td>
                    <td>${ag.data}</td>
                </tr>
            `;
            tabela.innerHTML += linha;
        });

    } catch (erro) {
        console.error("Erro ao carregar agendamentos:", erro);
    }
}

// Carrega automaticamente ao abrir página
carregarAgendamentos();
