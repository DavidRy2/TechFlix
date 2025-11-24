// =============================
//  Função para carregar lista do localStorage
// =============================
function carregarClientes() {
    return JSON.parse(localStorage.getItem("clientes")) || [];
}

// =============================
//  Função para salvar lista no localStorage
// =============================
function salvarClientes(clientes) {
    localStorage.setItem("clientes", JSON.stringify(clientes));
}

// =============================
//  FORMULÁRIO – Página: agendamento.html
// =============================
const form = document.getElementById("form-agendar");

if (form) {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        // Carregar lista existente
        const clientes = carregarClientes();

        // Coletar dados
        const nome = document.getElementById("nome").value;
        const email = document.getElementById("email").value;
        const mensagem = document.getElementById("mensagem").value;

        // Criar objeto
        const cliente = {
            nome,
            email,
            mensagem,
            data: new Date().toLocaleString()
        };

        // Adicionar ao array
        clientes.push(cliente);

        // Salvar no localStorage
        salvarClientes(clientes);

        // Limpar formulário
        form.reset();

        alert("Agendamento enviado com sucesso!");
    });
}



// =============================
//  TABELA – Página: agegametnos.html
// =============================
const tabela = document.querySelector("#tabela-clientes tbody");

if (tabela) {
    atualizarTabela();
}

function atualizarTabela() {
    const clientes = carregarClientes();
    tabela.innerHTML = "";

    clientes.forEach(cliente => {
        const tr = document.createElement("tr");

        tr.innerHTML = `
            <td>${cliente.nome}</td>
            <td>${cliente.email}</td>
            <td>${cliente.mensagem}</td>
            <td>${cliente.data}</td>
            <td><button class="btn btn-success btn-sm">Entrar em contato</button></td>
        `;

        tabela.appendChild(tr);
    });
}
