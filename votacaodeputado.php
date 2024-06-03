<?php

// Caminho para o arquivo CSV
$arquivoCSVDeputadoFederal = 'candidatos_DeputadoFederal.csv';

$textoInformativo = "Votacao ainda não encerrada!";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $textoInformativo = "Votacao encerrada!";

  // Função para ler um arquivo CSV e retornar os dados como um array
  function lerCSV($arquivoCSVDeputadoFederal)
  {
    $dados = [];
    if (($handle = fopen($arquivoCSVDeputadoFederal, "r")) !== FALSE) {
      while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $dados[] = $row;
      }
      fclose($handle);
    }
    return $dados;
  }

  // Função para ordenar as linhas de um array CSV com base na última coluna
  function ordenarPorUltimaColuna($dados)
  {
    // Função de comparação personalizada para usar com usort
    usort($dados, function ($a, $b) {
      return $b[count($b) - 1] <=> $a[count($a) - 1];
    });
    return $dados;
  }

  // Função para escrever os dados ordenados de volta para o arquivo CSV original
  function escreverCSV($arquivoCSVDeputadoFederal, $dados)
  {
    if (($handle = fopen($arquivoCSVDeputadoFederal, "w")) !== FALSE) {
      foreach ($dados as $row) {
        fputcsv($handle, $row);
      }
      fclose($handle);
    }
  }

  // Ler os dados do arquivo CSV
  $dados = lerCSV($arquivoCSVDeputadoFederal);

  // Ordenar as linhas com base na última coluna
  $dadosOrdenados = ordenarPorUltimaColuna($dados);

  // Escrever os dados ordenados de volta para o mesmo arquivo CSV
  escreverCSV($arquivoCSVDeputadoFederal, $dadosOrdenados);

  // Criar variáveis para cada item do CSV
  foreach ($dados as $i => $linha) {
    foreach ($linha as $j => $item) {
      ${"L{$i}C{$j}"} = $item;
      echo "Variável L{$i}C{$j}: ${"L{$i}C{$j}"}\n";
    }
  }


  // Ler os dados do arquivo CSV
  $dados = lerCSV($arquivoCSVDeputadoFederal);

  // Ordenar as linhas com base na última coluna
  $dadosOrdenados = ordenarPorUltimaColuna($dados);

  // Escrever os dados ordenados de volta para o mesmo arquivo CSV
  escreverCSV($arquivoCSVDeputadoFederal, $dadosOrdenados);





  $totalVotos = $L0C5 + $L1C5 + $L2C5;
  echo "$totalVotos";

  $percentualPrimeiroLugar = ($L0C5 / $totalVotos) * 100;
  $percentualSegundoLugar = ($L1C5 / $totalVotos) * 100;
  $percentualTerceiroLugar = ($L2C5 / $totalVotos) * 100;
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
                <a class="dropdown-item" href="resultadoPresidente.php">Resultado para Presidente<span class="sr-only">(atual)</span></a>
                <a class="dropdown-item" href="resultadoSenador.php">Resultado para Senador</a>
                <a class="dropdown-item" href="resultadoDeputadoFederal.php">Resultado para Deputado Federal</a>
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
              <li class="breadcrumb-item" aria-current="page">Resultados da Eleição</li>
              <li class="breadcrumb-item active" aria-current="page">Resultado para Presidente</li>
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
          <h2>Resultado para Deputado Federal</h2>
          <br>

          <form action="resultadoDeputadoFederal.php" method="post" enctype="multipart/form-data" class="border border-dark rounded-lg p-3">

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
              <div class="col-sm-4"></div>
              <button type="submit" class="btn btn-primary col-sm-4">Resultado para Deputado Federal</button>
              <div class="col-sm-4"></div>


            </div>

            <ul class="list list-group">
              <li class="list list-group-item">

                <div class="row mb-4">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-6">
                    <h3>Primeiro Lugar:</h3>
                  </div>
                  <div class="col-sm-3"></div>
                </div>
                <div class="row mb-4">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-2">
                    <?php echo '<img src="' . $L0C4 . '" class="img-fluid img card-img img-thumbnail ">' ?>
                  </div>
                  <p class="col-sm-3">
                    Candidato: <?php echo "<strong>$L0C0</strong>"; ?> <br>
                    Número: <?php echo "$L0C1"; ?> <br>
                    Partido: <?php echo "$L0C2"; ?> <br>
                    Votos: <?php echo "$L0C5"; ?> votos válidos.<br>
                    Percentual de Votos: <?php echo "$percentualPrimeiroLugar"; ?>%<br>
                    <strong>CANDIDATO ELEITO</strong>
                  </p>
                  <div class="col-sm-2">
                  <img src="IMAGENS/candidatoEleito.png" class="img-fluid img card-img img-thumbnail " alt="">
                </div>
                </div>
                

              </li>
              <li class="list list-group-item">

                <div class="row mb-4">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-6">
                    <h3>Segundo Lugar:</h3>
                  </div>
                  <div class="col-sm-3"></div>
                </div>
                <div class="row mb-4">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-2">
                    <?php echo '<img src="' . $L1C4 . '" class="img-fluid img card-img img-thumbnail ">' ?>
                  </div>
                  <p class="col-sm-3">
                    Candidato: <?php echo "<strong>$L1C0</strong>"; ?> <br>
                    Número: <?php echo "$L1C1"; ?> <br>
                    Partido: <?php echo "$L1C2"; ?> <br>
                    Votos: <?php echo "$L1C5"; ?> votos válidos.<br>
                    Percentual de Votos: <?php echo "$percentualSegundoLugar"; ?>%<br>
                    <strong>CANDIDATO NÃO ELEITO</strong>
                  </p>
                  <div class="col-sm-2">
                  <img src="IMAGENS/candidatoPerdedor.png" class="img-fluid img card-img img-thumbnail " alt="">
                </div>
                </div>
                

              </li>
              <li class="list list-group-item">

                <div class="row mb-4">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-6">
                    <h3>Terceiro Lugar:</h3>
                  </div>
                  <div class="col-sm-3"></div>
                </div>
                <div class="row mb-4">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-2">
                    <?php echo '<img src="' . $L2C4 . '" class="img-fluid img card-img img-thumbnail ">' ?>
                  </div>
                  <p class="col-sm-3">
                    Candidato: <?php echo "<strong>$L1C0</strong>"; ?> <br>
                    Número: <?php echo "$L2C1"; ?> <br>
                    Partido: <?php echo "$2"; ?> <br>
                    Votos: <?php echo "$L2C5"; ?> votos válidos.<br>
                    Percentual de Votos: <?php echo "$percentualTerceiroLugar"; ?>%<br>
                    <strong>CANDIDATO NÃO ELEITO</strong>
                  </p>
                  <div class="col-sm-2">
                  <img src="IMAGENS/candidatoPerdedor.png" class="img-fluid img card-img img-thumbnail " alt="">
                </div>
                </div>
                

              </li>
            </ul>


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
