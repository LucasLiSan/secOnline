function showHideRow(row) {
  // Encontre o próximo elemento com a classe 'hidden_row' a partir do elemento clicado
  var hiddenRow = $(row).next('.hidden_row');

  // Alternar a exibição desse elemento
  hiddenRow.toggle();
}
