<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registro de Atendimento</title>
</head>

<body>
    <div class="container">
    <h1>Registro de Atendimento</h1>
  <p>Por favor, preencha todos os campos deste formulário</p>
  
       <form class="row g-3" method="POST" action="registra.php">

       <fieldset>
            <div class="col-12">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" required />
            </div>

            <div class="col-12">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" id="telefone" required />
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required />
            </div>

            <div class="col-12">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="Marca" class="form-control" id="marca" placeholder="Digite a fabricante do caminhão" onkeyup="carregar_marcas(this.value)" required />
                <span id="resultado_pesquisa"></span>
            </div>

            <div class="col-12">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Digite o modelo do caminhão" onkeyup="carregar_modelos(this.value)" required />
                <span id="resultado_modelo"></span>
            </div>

            <input type="hidden" name="id_modelo" class="form-control" id="id_modelo">


            <div class="col-12">
                <label for="peca" class="form-label">Peça</label>
                <input type="text" name="peca" class="form-control" id="peca" onkeyup="carregar_usuarios(this.value)" required/>
                <span id="resultado_pesquisa"></span>
            </div>

            <input type="hidden" name="cod_peca" class="form-control" id="cod_peca">

            <div class="col-12">
                <label for="vendedor" class="form-label">Vendedor</label>
                <input type="text" name="vendedor" class="form-control" id="vendedor" onkeyup="carregar_usuarios(this.value)" required />
                <span id="resultado_pesquisa"></span>
            </div>

            <div class="col-12">
                <label for="Marca" class="form-label">Observação</label>
                <input type="text" name="Marca" class="form-control" id="Marca" required />
            </div>

       </fieldset>

            <div class="col-12">
                <button type="submit" class="btn btn-success">Registrar</button>
            </div>
            <?php
            var_dump($marca)
            ?>
        </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="registro.js"></script>
    <script src="teste.js"> </script>
</body>

</html>