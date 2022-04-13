
async function carregar_modelos(valor){
    if(valor.length >= 1){
        //console.log("Pesquisar: " + valor);
        
      const dados_modelo = await fetch('modelo.php?modelo=' + valor)
      const resposta_modelo = await dados_modelo.json();
     // console.log(resposta)
  
      var html = "<ul class='list-group position-fixed'>";
  
      if(resposta_modelo['erro']){
        html += "<li class='list-group-item disable'>"+ resposta_modelo['msg'] + "</li>";
      } else {
          for(i = 0; i < resposta_modelo['dados_modelo'].length; i++){
                html += "<li class='list-group-item list-group-item-action' onclick='get_modelo(" + JSON.stringify(resposta_modelo['dados_modelo'][i].CAM_MOD) + ")'>" + resposta_modelo['dados_modelo'][i].CAM_MOD+ "</li>";
            }
       }
  
      html += "</ul>";
  
      document.getElementById('resultado_modelo').innerHTML=html;
    }
  }
  function get_modelo(modelo) {
  
  //console.log("marca selecionada: " + marca);
  
  document.getElementById("modelo").value = modelo;
  
  }
  
  const fechar_mod = document.getElementById('modelo');
  
  document.addEventListener('click', function (event) {
  const validar_clique = fechar.contains(event.target);
  if (!validar_clique) {
      document.getElementById('resultado_modelo').innerHTML = '';
  }
  });
  
  
  
  
  
  
  
  
