// seleciona todos os botões "Remover"
const removeButtons = document.querySelectorAll(".remove");

// adiciona um listener de clique a cada botão "Remover"
removeButtons.forEach(button => {
  button.addEventListener("click", () => {
    const id = button.dataset.id;
    fetch(`model/delete.php?id=${id}`)
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // remove a linha da tabela
          const row = button.closest("tr");
          row.parentNode.removeChild(row);
        } else {
          alert(data.message);
        }
      })
      .catch(error => {
        console.error(error);
      });
  });
});