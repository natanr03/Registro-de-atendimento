async function carregar_marcas(valor){
    if(valor.length >= 1){
        //console.log("Pesquisar: " + valor);
        
      const dados = await fetch('search.php?marca=' + valor)
      const resposta = await dados.json();
     // console.log(resposta)

      var html = "<ul class='list-group position-fixed'>";

      if(resposta['erro']){
        html += "<li class='list-group-item disable'>"+ resposta['msg'] + "</li>";
      } else {
          for(i = 0; i < resposta['dados'].length; i++){
                html += "<li class='list-group-item list-group-item-action' onclick='get_id_usuario(" + JSON.stringify(resposta['dados'][i].CAM_FABRN) + ")'>" + resposta['dados'][i].CAM_FABRN + "</li>";
            }
       }

      html += "</ul>";

      document.getElementById('resultado_pesquisa').innerHTML=html;
    }
}
function get_id_usuario(marca) {
  
  //console.log("marca selecionada: " + marca);

  document.getElementById("marca").value = marca;

}

const fechar = document.getElementById('marca');

document.addEventListener('click', function (event) {
  const validar_clique = fechar.contains(event.target);
  if (!validar_clique) {
      document.getElementById('resultado_pesquisa').innerHTML = '';
  }
});





