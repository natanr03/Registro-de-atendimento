async function carregar_marcas(valor){
    if(valor.length >= 1){
        console.log("Pesquisar: " + valor);
        
      const dados = await fetch('search.php?marca=' + valor)
      const resposta = await dados.json();
      console.log(resposta)

      var html = "<ul class='list-group position-fixed'>";

      if(resposta['erro']){
        html += "<li class='list-group-item disable'>"+resposta['msg']+"</li>"
      }else{
          for(i = 0; i < resposta['dados'][i].length; i++){
                html += "<li class='list-group-item list-group-item-action'>" +
                resposta['dados'].CAM_FABRN + "</li>"
            }
       }

      html += "</ul>";
      document.getElementById('resultado_pesquisa').innerHTML=html
    }
}
