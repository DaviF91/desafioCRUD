// seleciona todos os botões "Editar"
const editButtons = document.querySelectorAll(".edit");

// adiciona um listener de clique a cada botão "Editar"
editButtons.forEach(button => {
  button.addEventListener("click", () => {
    const id = button.dataset.id;
    
    // envia uma requisição para obter as informações do cliente a ser editado
    fetch(`model/read.php?id=${id}`)
      .then(response => response.json())
      .then(data => {
        // preenche o formulário com as informações do cliente
        document.querySelector("#nome").value = data.nome;
        document.querySelector("#sobrenome").value = data.sobrenome;
        document.querySelector("#email").value = data.email;
        document.querySelector("#idade").value = data.idade;

        // atualiza o formulário para usar a ação de edição
        const form = document.querySelector("form");
        form.action = `model/update.php?id=${id}`;
        form.querySelector("button[type=submit]").textContent = "Editar";
      })
      .catch(error => {
        console.error(error);
      });
  });
});

$(document).ready(function() {
  // Listener de evento para o botão "Editar"
  $('table').on('click', '.edit', function() {
    // Obtém o ID do cliente a partir do atributo data-id na linha da tabela
    var id = $(this).closest('tr').data('id');

    // Preenche o formulário com as informações do cliente
    $.ajax({
      url: 'model/read.php',
      type: 'POST',
      data: { id: id },
      dataType: 'json',
      success: function(data) {
        $('#id_cliente').val(data.id);
        $('#nome').val(data.nome);
        $('#sobrenome').val(data.sobrenome);
        $('#email').val(data.email);
        $('#idade').val(data.idade);
      },
      error: function(textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  });
});