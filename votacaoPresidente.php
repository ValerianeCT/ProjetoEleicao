<?php

// Caminho para o arquivo CSV
$arquivoCSVPresidente = 'candidatos_presidente.csv';

$textoInformativo = "Vote com consciência!";

// Abre o arquivo para leitura
if (($handle = fopen($arquivoCSVPresidente, 'r')) !== FALSE) {
  // Inicializa um array para armazenar os dados
  $dados = [];

  // Loop através de cada linha do arquivo CSV
  while (($linha = fgetcsv($handle, 1000, ',')) !== FALSE) {
    // Adiciona a linha ao array de dados
    $dados[] = $linha;
  }

  // Fecha o arquivo
  fclose($handle);

  // Percorre cada linha do array de dados
  foreach ($dados as $indice => $linha) {
    // Cria variáveis dinamicamente
    ${"nomeCandidatoVotacaoPresidente$indice"} = $linha[0];
    ${"numeroCandidatoVotacaoPresidente$indice"} = $linha[1];
    ${"partidoCandidatoVotacaoPresidente$indice"} = $linha[2];
    ${"fotoCandidatoVotacaoPresidente$indice"} = $linha[4];

    
  }
} else {
  echo 'Não foi possível abrir o arquivo.';
}

// Função para ler todo o conteúdo do arquivo CSV cadastro_presidente.csv e armazenar em um array
function lerCsv($arquivoCSVPresidente)
{
  $dadosPresidente = [];
  if (($handle = fopen($arquivoCSVPresidente, 'r')) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
      $dadosPresidente[] = $row;
    }
    fclose($handle);
  }
  return $dadosPresidente;
}

// Função para escrever todo o conteúdo de um array de volta para o arquivo CSV
function escreverCsv($arquivoCSVPresidente, $dadosPresidente)
{
  if (($handle = fopen($arquivoCSVPresidente, 'w')) !== FALSE) {
    foreach ($dadosPresidente as $linha) {
      fputcsv($handle, $linha);
    }
    fclose($handle);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Inicializar variáveis
  $numeroCandidatoVotado = 0;
  

  // Capturar e sanitizar dados do formulário se existirem
  if (isset($_POST['numeroCandidatoVotacaoPresidente'])) {
    $numeroCandidatoVotado = htmlspecialchars($_POST['numeroCandidatoVotacaoPresidente']);
  }

  

  if ($numeroCandidatoVotado == $numeroCandidatoVotacaoPresidente0) {
    //Ler o arquivo CSV dos candidadtos a presidente
    $dadosPresidente = lerCsv($arquivoCSVPresidente);

    // Verificar se a posição existe e alterar o dado específico
    $linhaParaAlterar = 0;
    $colunaParaAlterar = 5;

    //Altera o dado dos votos do candidato, adicionando +1
    if (isset($dadosPresidente[$linhaParaAlterar][$colunaParaAlterar])) {
      $dadosPresidente[$linhaParaAlterar][$colunaParaAlterar] = ($dadosPresidente[$linhaParaAlterar][$colunaParaAlterar] + 1);
    }

    escreverCsv($arquivoCSVPresidente, $dadosPresidente);

    $textoInformativo = "Voto registrado com sucesso.";
  }
  elseif ($numeroCandidatoVotado == $numeroCandidatoVotacaoPresidente1) {
    //Ler o arquivo CSV dos candidadtos a presidente
    $dadosPresidente = lerCsv($arquivoCSVPresidente);

    // Verificar se a posição existe e alterar o dado específico
    $linhaParaAlterar = 1;
    $colunaParaAlterar = 5;

    //Altera o dado dos votos do candidato, adicionando +1
    if (isset($dadosPresidente[$linhaParaAlterar][$colunaParaAlterar])) {
      $dadosPresidente[$linhaParaAlterar][$colunaParaAlterar] = ($dadosPresidente[$linhaParaAlterar][$colunaParaAlterar] + 1);
    }

    escreverCsv($arquivoCSVPresidente, $dadosPresidente);

    $textoInformativo = "Voto registrado com sucesso.";
} 
elseif ($numeroCandidatoVotado == $numeroCandidatoVotacaoPresidente2) {
  //Ler o arquivo CSV dos candidadtos a presidente
  $dadosPresidente = lerCsv($arquivoCSVPresidente);

  // Verificar se a posição existe e alterar o dado específico
  $linhaParaAlterar = 2;
  $colunaParaAlterar = 5;

  //Altera o dado dos votos do candidato, adicionando +1
  if (isset($dadosPresidente[$linhaParaAlterar][$colunaParaAlterar])) {
    $dadosPresidente[$linhaParaAlterar][$colunaParaAlterar] = ($dadosPresidente[$linhaParaAlterar][$colunaParaAlterar] + 1);
  }

  escreverCsv($arquivoCSVPresidente, $dadosPresidente);
  $textoInformativo = "Voto registrado com sucesso.";
}
else {
  $textoInformativo = "Voto ainda não registrado ou número do candidato digitado incorretamente.";
}
}

?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto - Eleições On-line</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!--<link rel="stylesheet" href="ESTILO/bootstrap-4.6.2-dist/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="ESTILO/style.css">
</head>



<body>

  <div class="container-fluid border">
    <header class="blog-cabecalho py-3">
      <div class="container-fluid text-center">
        <h1 class="display-2">Eleições On-line</h1>
        <small class="text-muted">
          <h4>Facilitando seu acesso a democracia!</h4>
        </small>
        <br>
      </div>
    </header>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a href="index.php" class="navbar-brand">
        <h2>Eleições On-line</h2>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navegacao" aria-controls="navegacao" aria-expanded="true" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navegacao">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a href="cadastroCandidatos.php" class="nav-link">Configuração da Urna
              <span class="sr-only">(atual)</span>
            </a>
          </li>
          <li class="nav-item active">
            <div class="dropdown">
              <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Processo de Votação
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="votacaoPresidente.php">Votação para Presidente</a>
                <a class="dropdown-item" href="votacaoSenador.php">Votação para Senador</a>
                <a class="dropdown-item" href="votacaoDeputadoFederal.php">Votação para Deputado Federal</a>
              </div>
            </div>
          </li>
          <li class="nav-item active">
            <div class="dropdown">
              <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Resultados da Eleição
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="cores.html">Resultado para Presidente</a>
                <a class="dropdown-item" href="marginpadding.html">Resultado para Senador</a>
                <a class="dropdown-item" href="bordas.html">Resultado para Deputado Federal</a>
              </div>
            </div>
          </li>
        </ul>

      </div>
    </nav>
  </div>

  <main role="main" class="container-fluid">
    <div class="row">

      <aside class="col-sm-3 blog-sidebar border">
        <div class="p-3 mb-3 bg-light rounded">
          <h4 class="font-italic">Você está aqui:</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Eleições On-line</a></li>
              <li class="breadcrumb-item" aria-current="page">Processo de Votação</li>
              <li class="breadcrumb-item active" aria-current="page">Votação para Presidente</li>
            </ol>
          </nav>
        </div>
        <div class="p-3 mb-3 bg-light rounded">
          <h4 class="font-italic">Sobre nós:</h4>
          <p class="mb-0">Somos um time de <strong><em>pessoas legais</em></strong> que gostam de <strong><em>programação</em></strong> e foram <strong><em>obrigadas</em></strong> a programar em PHP para obter nota.</p>
        </div>




      </aside>



      <div class="col-sm-9 blog-main">

        <div class="blog-post text-center">
          <br><br>
          <h2>Votação para Presidente</h2>
          <br>

          <form action="votacaoPresidente.php" method="post" enctype="multipart/form-data" class="border border-dark rounded-lg p-3">

            <div class="row mb-4">
              <div class="col-sm-4"></div>
              <p class="col-sm-4">
                <?php
                echo "$textoInformativo";
                 ?>
              </p>
              <div class="col-sm-4"></div>
            </div>


            <div class="row mb-4">
              <div class="col-sm-1"></div>
              <?php
              echo '<div class="col-sm-2"><img src="' . $fotoCandidatoVotacaoPresidente0 . '" class="img-fluid img card-img img-thumbnail "><br>Candidato: <br> <strong>' . $nomeCandidatoVotacaoPresidente0 . '</strong> <br>Número: ' . $numeroCandidatoVotacaoPresidente0 . ' <br> Partido: ' . $partidoCandidatoVotacaoPresidente0 . '</div>';

              ?>
              <div class="col-sm-2"></div>
              <?php
              echo '<div class="col-sm-2"><img src="' . $fotoCandidatoVotacaoPresidente1 . '" class="img-fluid img card-img img-thumbnail "><br>Candidato: <br> <strong>' . $nomeCandidatoVotacaoPresidente1 . '</strong> <br>Número: ' . $numeroCandidatoVotacaoPresidente1 . ' <br> Partido: ' . $partidoCandidatoVotacaoPresidente1 . '</div>';

              ?>
              <div class="col-sm-2"></div>
              <?php
              echo '<div class="col-sm-2"><img src="' . $fotoCandidatoVotacaoPresidente2 . '" class="img-fluid img card-img img-thumbnail "><br>Candidato: <br> <strong>' . $nomeCandidatoVotacaoPresidente2 . '</strong> <br>Número: ' . $numeroCandidatoVotacaoPresidente2 . ' <br> Partido: ' . $partidoCandidatoVotacaoPresidente2 . '</div>';

              ?>
              <div class="col-sm-1"></div>
            </div>
            <div class="row mb-4">
              <label for="numeroCandidatoVotacaoPresidente" class="col-sm-4 col-form-label">Digite o número do candidato:</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" id="inputNumeroCandidatoVotacaoPresidente" name="numeroCandidatoVotacaoPresidente" placeholder="Número do Candidato">
              </div>


            </div>

            <div class="row mb-4">
              <div class="col-sm-1"></div>
              <button type="submit" class="btn btn-primary col-sm-4">Votar</button>
              <div class="col-sm-2"></div>

              <button type="reset" class="btn btn-warning col-sm-4">Limpar Campos</button>
              <div class="col-sm-1"></div>
            </div>



          </form>


        </div>


      </div>

  </main>

  <footer class="blog-rodape border">
    <p>Template de sistema de eleições on-line construído para a disciplina de Linguagens de Programação Estruturada do curso de Análise e Desenvolvimento de Sistemas da Faculdade Laboro.
    </p>
    <div class="container-fluid border">
      <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-1">
          <img src="IMAGENS/andre.jpg" alt="André" class="img-fluid card-img img-thumbnail ">
          <br>
          André <br> Frazão
        </div>
        <div class="col-sm-1">
          <img src="IMAGENS/MarcosAndre.png" class="img-fluid card-img img-thumbnail ">
          <br>
          Marcos <br> André
        </div>
        <div class="col-sm-1">
          <img src="IMAGENS/RegianeAraujo.png" alt="Regiane Araujo" class="img-fluid card-img img-thumbnail ">
          <br>
          Regiane <br> Araujo
        </div>
        <div class="col-sm-1">
          <img src="IMAGENS/dheurymy.jpg" alt="Rycherd Dheurymy" class="img-fluid card-img img-thumbnail ">
          <br>
          Rycherd <br> Dheurymy
        </div>
        <div class="col-sm-1">
          <img src="IMAGENS/Sandra.png" alt="Sandra" class="img-fluid card-img img-thumbnail ">
          <br>
          Sandra <br> Regina
        </div>
        <div class="col-sm-1">
          <img src="IMAGENS/TarcisioGuedes.png" alt="Tarcisio Guedes" class="img-fluid card-img img-thumbnail ">
          <br>
          Tarcisio <br> Guedes
        </div>
        <div class="col-sm-1">
          <img src="IMAGENS/ValerianeAlmeida.png" alt="Valeriane Almeida" class="img-fluid card-img img-thumbnail ">
          <br>
          Valeriane <br> Almeida
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>
    <p>
      <a href="#">Voltar
        ao topo</a>
    </p>
  </footer>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!--<script src="ESTILO/popper/popper.min.js"></script>
   <script src="ESTILO/jquery/jquery-3.7.1.slim.min.js"></script>
   <script src="ESTILO/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>-->

</html>