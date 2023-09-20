<!--
Adapted code from "Developer Profile Card using HTML and CSS - Coding Torque" (https://codingtorque.com/developer-profile-card-using-html-and-css/)
and "Glassmorphic Dashboard using HTML, CSS and JavaScript - Coding Torque". (https://codingtorque.com/glassmorphic-dashboard-using-html-css-and-javascript/)
Written by: 
 - Coding Torque - https://www.instagram.com/codingtorque/
 - Piyush Patil - https://twitter.com/PiyushPatil1243
 - @TurkAysenur - https://codepen.io/TurkAysenur (https://codepen.io/TurkAysenur/pen/ZEpxeYm)
 - @code.scientist  - https://www.instagram.com/code.scientist/
 - @codingknights - https://www.instagram.com/codingknights/
 - @Taluska - https://codepen.io/Taluska (https://codepen.io/Taluska/pen/ZExJabE?editors=0010)
 - @ratul16 - https://codepen.io/ratul16 (https://codepen.io/ratul16/pen/XWBBrxN?editors=1100)
-->

<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="_assets/_css/documents.css">
            <title>Prontuário Digital - Documentos</title>
        </head>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";

            // Create connection
            $conn = new mysqli($servername, $username, $password, 'pgdatabase');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "Connected successfully";

            $rm = htmlspecialchars($_GET['rm']);

            $dadosBasic = "SELECT nomeAluno, raAluno, dgRaAluno, dataNascAluno, sexoAluno, inepAluno, cidadeNascAluno, UFNascAluno, paisNascAluno, nacionalidade, racaCorAluno, sexoAluno, filiacao1Aluno, filiacao2Aluno FROM infoBasicaAlunos WHERE rm='$rm'";
            $resultBasic = $conn->query($dadosBasic);

            $dadosSala = "SELECT turma, periodo, situacao FROM matricula WHERE rm='$rm'";
            $resultSala = $conn->query($dadosSala);

            if ($resultBasic->num_rows > 0 && $resultSala->num_rows > 0) {

                $dadosAluno = $resultBasic->fetch_assoc();
                $dadosMatricula = $resultSala->fetch_assoc();

                $nomeAluno = $dadosAluno["nomeAluno"]; $raAluno = $dadosAluno["raAluno"]; $dgRaAluno = $dadosAluno["dgRaAluno"]; $turma = $dadosMatricula["turma"]; $periodo = $dadosMatricula["periodo"];
            }

            $dirRoot = "../db_imgs";
            $caminhoFolder = $dirRoot . "/" . $rm . " - " . $nomeAluno;
            $fichaMatric = $rm . ".FichaMatricula";
            $fichaAproveit = $rm . ".FichaAproveit";
            $fichaAproveitInfant = $rm . ".FichaAproveitInfant";
            $cartVacina = $rm . ".CarteiraVacin";
            $certNasc = $rm . ".CertidaoNasc";
            $cardSuS = $rm . ".SUS";
            $DocResp = $rm . ".DocResp";
            $comprResid = $rm . ".ComprovResidenc";
            $consTutelar = $rm . ".ConselhoTutelar";
            $decTransf = $rm . ".DecTransf";
            $reqMatric = $rm . ".ReqMatric";
            $reqTransf = $rm . ".ReqTransf";
            $orientConsTutelar = $rm . ".CartaDeOrientacaoConsTutelar";
            $orientMP = $rm . ".CartaDeOrientacaoMP";
            $decVaga = $rm . ".DecVaga";
            $uniforme = $rm . ".Uniforme";
            $normas = $rm . ".Normas";
            $ciencia = $rm . ".Ciencia";
            $cross = $rm . ".CROSS";
            $enderecos = $rm . ".Endereco";
            $contatos = $rm . ".Contatos";
            $autSaida = $rm .".Saida";
            $projetos = $rm . ".AutProjet";
            $imagem = $rm . ".AutUsoImg";
            $laudos = $rm . ".laudos";
            $infosAdd = $rm . ".Info";
            $decComparecimento = $rm . ".DecComp";
            $atestado = $rm . ".Atestado";
            $autoPasseio = $rm . ".AutPasseio";
            $reciboUniform = $rm . ".RecibUniforme";
            $reciboKitEscolar = $rm . ".RecibKitEscolar";
            $historico = $rm . ".Historico";
            
            //TRANSFERENCIA
            $padraoDecTransf = '*' . $decTransf . '*';
            $padraoReqTransf = '*' . $reqTransf . '*';
            $btnDecTrans = glob($caminhoFolder . '/' . $padraoDecTransf);
            $btnReqTrans = glob($caminhoFolder . '/' . $padraoReqTransf);
            //MATRICULA
            $padraoFichaMatric = '*' . $fichaMatric . '*';
            $padraoReqMatric = '*' . $reqMatric . '*';
            $btnFichaMatric = glob($caminhoFolder . '/' . $padraoFichaMatric);
            $btnReqMatric = glob($caminhoFolder . '/' . $padraoReqMatric);
            //DOCUMENTOS
            $padraoCartVacina = '*' . $cartVacina . '*';
            $padraoCertNasc = '*' . $certNasc . '*';
            $padraoCardSus = '*' . $cardSuS . '*';
            $padraoDocResp = '*' . $DocResp . '*';
            $padraoComprResid = '*' . $comprResid . '*';
            $padraoCross = '*' . $cross . '*';
            $btnCartVacina = glob($caminhoFolder . '/' . $padraoCartVacina);
            $btnCertNasc = glob($caminhoFolder . '/' . $padraoCertNasc);
            $btnCardSus = glob($caminhoFolder . '/' . $padraoCardSus);
            $btnDocResp = glob($caminhoFolder . '/' . $padraoDocResp);
            $btnComprResid = glob($caminhoFolder . '/' . $padraoComprResid);
            $btnCross = glob($caminhoFolder . '/' . $padraoCross);
            //FICHA DE APROVEITAMENTO
            $padraoFichaAproveit = '*' . $fichaAproveit . '*';
            $btnFichaAproveit = glob($caminhoFolder . '/' . $padraoFichaAproveit);
            //HISTÓRICO
            $padraoHistorico = '*' . $historico . '*';
            $btnHistorico = glob($caminhoFolder . '/' . $padraoHistorico);
            //CONTATOS-SAÍDA
            $padraoContatos = '*' . $contatos . '*';
            $padraoSaida = '*' . $autSaida . '*';
            $btnContatos = glob($caminhoFolder . '/' . $padraoContatos);
            $btnSaida = glob($caminhoFolder . '/' . $padraoSaida);
            //AUTORIZAÇÕES
            $padraoProjetos = '*' . $projetos . '*';
            $padraoImagem = '*' . $imagem . '*';
            $padraoPasseio = '*' . $autoPasseio . '*';
            $btnPasseio = glob($caminhoFolder . '/' . $padraoPasseio);
            $btnProjetos = glob($caminhoFolder . '/' . $padraoProjetos);
            $btnImagem = glob($caminhoFolder . '/' . $padraoImagem);
            //NORMAS
            $padraoNormas = '*' . $normas . '*';
            $btnNormas = glob($caminhoFolder . '/' . $padraoNormas);
            //ATESTADOS
            $padraoAtestados = '*' . $atestado . '*';
            $btnAtestados = glob($caminhoFolder . '/' . $padraoAtestados);
            //LAUDOS
            $padraoLaudos = '*' . $laudos . '*';
            $btnLaudos = glob($caminhoFolder . '/' . $padraoLaudos);
            //UNIFORME
            $padraoUniform = '*' . $uniforme . '*';
            $padraoReciboUniform = '*' . $reciboUniform . '*';
            $btnUniforme = glob($caminhoFolder . '/' . $padraoUniform);
            $btnReciboUniforme = glob($caminhoFolder . '/' . $padraoReciboUniform);
            //INFO ADICIONAL
            $padraoInfoAdd = '*' . $infosAdd . '*';
            $btnInfoAdd = glob($caminhoFolder . '/' . $padraoInfoAdd);
            //KIT ESCOLAR
            $padraoKitEscolar = '*' . $ciencia . '*';
            $btnKitEscolar = glob($caminhoFolder . '/' . $padraoKitEscolar);
            //OUTROS
            $padraoorientConsTutelar = '*' . $orientConsTutelar . '*';
            $padraoorientMP = '*' . $orientMP . '*';
            $padraoConsTutelar = '*' . $consTutelar . '*';
            $padraoComparecimento = '*' . $decComparecimento . '*';
            $btnOrientConsTutelar = glob($caminhoFolder . '/' . $padraoorientConsTutelar);
            $btnOrientMP = glob($caminhoFolder . '/' . $padraoorientMP);
            $btnConselhoTutelar = glob($caminhoFolder . '/' . $padraoConsTutelar);
            $btnComparecimento = glob($caminhoFolder . '/' . $padraoComparecimento);

        ?>
        <body>
            <div class="video-bg">
                <video width="320" height="240" autoplay loop muted>
                    <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="user_img">
                <img src="../db_imgs/_profile.pictures/profilePic.<?php echo $rm ?>.jpg" height="100" width="100" alt="profile">
            </div>
            <div class="user_details">
                <h5>DOCUMENTOS DO ALUNO</h5>
                <span><?php echo $nomeAluno; ?></span>
                <span>R.A.: <?php echo $raAluno; ?>-<?php echo $dgRaAluno; ?></span>
                <p><?php echo $turma; ?> <?php echo $periodo; ?></p>
                <a href="../index/index.php<?php echo "?rm=".$rm ?>" title="Voltar para a pagina inicial.">INÍCIO</a>
                <hr>
            </div>
            <article class="tabs content--flow">
                <aside class="sidebar">
                    <nav role="tablist" class="tab__navigation">
                        <?php
                            if (is_dir($caminhoFolder)) {
                                $encontrouCorresp = false;
                                if (!empty($btnFichaMatric) || !empty($btnReqMatric)){
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="true" class="tab__button" id="1">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-pencil-alt"></i>
                                            </span>
                                            <span class="text__for--tab">Matrícula</span>
                                        </button>';
                                }
                                if (!empty($btnCartVacina) || !empty($btnCertNasc) || !empty($btnCardSus) || !empty($btnDocResp) || !empty($btnComprResid) || !empty($btnCross)){
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="6">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-file"></i>
                                            </span>
                                            <span class="text__for--tab">Documentos</span>
                                        </button>';
                                }
                                if (!empty($btnFichaAproveit)){
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="12">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-file"></i>
                                            </span>
                                            <span class="text__for--tab">Ficha de aproveitamento</span>
                                        </button>';
                                }
                                if (!empty($btnHistorico)){
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="13">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-file"></i>
                                            </span>
                                            <span class="text__for--tab">Histórico escolar</span>
                                        </button>';
                                }
                                if (!empty($btnContatos) || !empty($btnSaida)){
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="10">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-file"></i>
                                            </span>
                                            <span class="text__for--tab">Contatos e Aut. de Saída</span>
                                        </button>';
                                }
                                if (!empty($btnDecTrans) || !empty($btnReqTrans)) {
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="7">
                                            <span class="icon__for--tab">
                                                <i class="fas fa-share-square"></i>
                                            </span>
                                            <span class="text__for--tab">Trasferências</span>
                                        </button>';
                                }
                                if (!empty($btnNormas)) {
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="8">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-clipboard-check"></i>
                                            </span>
                                            <span class="text__for--tab">Normas</span>
                                        </button>';
                                }
                                if (!empty($btnProjetos) || !empty($btnImagem) || !empty($btnPasseio)) {
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="2">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-clipboard-check"></i>
                                            </span>
                                            <span class="text__for--tab">Autorizações</span>
                                        </button>';
                                }
                                if (!empty($btnAtestados)) {
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="3">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-plus-square"></i>
                                            </span>
                                            <span class="text__for--tab">Atestados</span>
                                        </button>';
                                }
                                if (!empty($btnLaudos)) {
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="4">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-clipboard"></i>
                                            </span>
                                            <span class="text__for--tab">Laudos</span>
                                        </button>';
                                }
                                if (!empty($btnUniforme) || !empty($btnReciboUniforme)) {
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="9">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-tag"></i>
                                            </span>
                                            <span class="text__for--tab">Uniforme</span>
                                        </button>';
                                }
                                if (!empty($btnInfoAdd)) {
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="11">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-tag"></i>
                                            </span>
                                            <span class="text__for--tab">Infos Adicionais</span>
                                        </button>';
                                }
                                if (!empty($btnKitEscolar)) {
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="14">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-tag"></i>
                                            </span>
                                            <span class="text__for--tab">Kit escolar</span>
                                        </button>';
                                }
                                if (!empty($btnOrientConsTutelar) || !empty($btnOrientMP) || !empty($btnConselhoTutelar) || !empty($btnComparecimento)) {
                                    $encontrouCorresp = true;
                                    echo '<button role="tab" aria-selected="false" class="tab__button" id="5">
                                            <span class="icon__for--tab">
                                            <i class="fas fa-tag"></i>
                                            </span>
                                            <span class="text__for--tab">Outros</span>
                                        </button>';
                                }
                                if (!$encontrouCorresp) {}
                            } else {
                                echo 'A pasta correspondente ao "id" não foi encontrada.';
                            }
                        ?>                      
                    </nav>
                </aside>
                <main class="content__area">
                    <div class="tab__content">
                        <div role="tabpanel" aria-labelledby="1"> <!--MATRICULA-->
                            <div class="container">
                                <div class="gallery">
                                    <?php
                                        if (is_dir($caminhoFolder)) {
                                            $files = scandir($caminhoFolder);
                                            $encontrouCorresp = false;

                                            foreach($files as $file) {
                                                if(strpos($file, $fichaMatric) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Ficha de matrícula">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Ficha de matrícula</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                else if(strpos($file, $reqMatric) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Requerimento de matrícula">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Requerimento de matrícula</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                else if(strpos($file, $decVaga) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Declaração de vaga">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Declaração de vaga</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            if (!$encontrouCorresp) {
                                                echo'<div class="card" style="display: block;">';
                                                echo '</div>';
                                            }
                                        } else { echo 'A pasta correspondente ao "id" não foi encontrada.';} 
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="6" hidden> <!--DOCUMENTOS-->
                            <div class="container">
                                <div class="gallery">
                                    <?php
                                        if (is_dir($caminhoFolder)) {
                                            $files = scandir($caminhoFolder);
                                            $encontrouCorresp = false;

                                            foreach($files as $file) {
                                                if(strpos($file, $cartVacina) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Carteira de vacinação">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Carteira de vacinação</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                else if(strpos($file, $certNasc) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Certidão de nascimento">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Certidão de nascimento</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                else if(strpos($file, $cardSuS) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Cartão do SUS">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Cartão do SUS</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                else if(strpos($file, $DocResp) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Documento do responsável">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Documento do responsável</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                else if(strpos($file, $comprResid) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Comprovante de residência">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Comprovante de residência</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                else if(strpos($file, $cross) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="SUS">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">SUS</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            if (!$encontrouCorresp) {
                                                echo'<div class="card" style="display: block;">';
                                                echo '</div>';
                                            }
                                        } else { echo 'A pasta correspondente ao "id" não foi encontrada.';}
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="12" hidden> <!--FICHA DE APROVEITAMENTO-->
                            <div class="container">
                                <div class="gallery">
                                    <?php
                                        if (is_dir($caminhoFolder)) {
                                            $files = scandir($caminhoFolder);
                                            $encontrouCorresp = false;

                                            foreach($files as $file) {
                                                if(strpos($file, $fichaAproveit) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Ficha de aproveitamento">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Ficha de aproveitamento</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            if (!$encontrouCorresp) {
                                                echo'<div class="card" style="display: block;">';
                                                echo '</div>';
                                            }
                                        } else { echo 'A pasta correspondente ao "id" não foi encontrada.';}
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="13" hidden> <!--HISTÓRICO-->
                            <div class="container">
                                <div class="gallery">
                                    <?php
                                        if (is_dir($caminhoFolder)) {
                                            $files = scandir($caminhoFolder);
                                            $encontrouCorresp = false;

                                            foreach($files as $file) {
                                                if(strpos($file, $historico) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Histórico escolar">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Histórico escolar</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            if (!$encontrouCorresp) {
                                                echo'<div class="card" style="display: block;">';
                                                echo '</div>';
                                            }
                                        } else { echo 'A pasta correspondente ao "id" não foi encontrada.';}
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="10" hidden> <!--CONTATOS E SAÍDA-->
                            <div class="container">
                                <div class="gallery">
                                    <?php
                                        if (is_dir($caminhoFolder)) {
                                            $files = scandir($caminhoFolder);
                                            $encontrouCorresp = false;

                                            foreach($files as $file) {
                                                if(strpos($file, $contatos) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Autorização de saída e contatos">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Autorização de saída e contatos</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            foreach($files as $file) {
                                                if(strpos($file, $autSaida) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Autorização de saída e contatos">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Autorização de saída e contatos</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            if (!$encontrouCorresp) {
                                                echo'<div class="card" style="display: block;">';
                                                echo '</div>';
                                            }
                                        } else { echo 'A pasta correspondente ao "id" não foi encontrada.';}
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="7" hidden><!--TRANSFERENCIAS-->
                            <div class="container">
                                <div class="gallery">
                                    <?php
                                        if (is_dir($caminhoFolder)) {
                                            $files = scandir($caminhoFolder);
                                            $encontrouCorresp = false;

                                            foreach($files as $file) {
                                                if(strpos($file, $decTransf) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Declaração de transferência">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Declaração de transferência</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                else if(strpos($file, $reqTransf) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Requerimento de transferência">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Requerimento de transferência</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            if (!$encontrouCorresp) {
                                                echo'<div class="card" style="display: block;">';
                                                echo '</div>';
                                            }
                                        } else { echo 'A pasta correspondente ao "id" não foi encontrada.';} 
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="2" hidden><!--AUTORIZAÇÕES-->
                            <div class="container">
                                <div class="gallery">
                                    <?php
                                        if (is_dir($caminhoFolder)) {
                                            $files = scandir($caminhoFolder);
                                            $encontrouCorresp = false;

                                            foreach($files as $file) {
                                                if(strpos($file, $projetos) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Autorização Projetos">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Autorização Projetos</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                else if(strpos($file, $imagem) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Autorização uso de imagem">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Autorização uso de imagem</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                                else if(strpos($file, $autoPasseio) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Autorização passeio">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Autorização passeio</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            if (!$encontrouCorresp) {
                                                echo'<div class="card" style="display: block;">';
                                                echo '</div>';
                                            }
                                        } else { echo 'A pasta correspondente ao "id" não foi encontrada.';} 
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="8" hidden><!--NORMAS-->
                            <div class="container">
                                <div class="gallery">
                                    <?php
                                        if (is_dir($caminhoFolder)) {
                                            $files = scandir($caminhoFolder);
                                            $encontrouCorresp = false;

                                            foreach($files as $file) {
                                                if(strpos($file, $normas) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Normas">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Normas</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            if (!$encontrouCorresp) {
                                                echo'<div class="card" style="display: block;">';
                                                echo '</div>';
                                            }
                                        } else { echo 'A pasta correspondente ao "id" não foi encontrada.';} 
                                    ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="3" hidden><!--ATESTADOS-->
                            <div class="container">
                                <div class="gallery">
                                    <?php
                                        if (is_dir($caminhoFolder)) {
                                            $files = scandir($caminhoFolder);
                                            $encontrouCorresp = false;

                                            foreach($files as $file) {
                                                if(strpos($file, $atestado) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Atestado médico">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Atestado médico</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            if (!$encontrouCorresp) {
                                                echo'<div class="card" style="display: block;">';
                                                echo '</div>';
                                            }
                                        } else { echo 'A pasta correspondente ao "id" não foi encontrada.';} 
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="4" hidden><!--LAUDOS-->
                            <div class="container">
                                <div class="gallery">
                                    <?php
                                        if (is_dir($caminhoFolder)) {
                                            $files = scandir($caminhoFolder);
                                            $encontrouCorresp = false;

                                            foreach($files as $file) {
                                                if(strpos($file, $laudos) !== false) {
                                                    $encontrouCorresp = true;
                                                    $caminhoImg = $caminhoFolder. "/" . $file;
                                                    echo'<div class="card">';
                                                    echo '<img class="myImg" src="' . $caminhoImg . '" alt="Laudo">';
                                                    echo '<div class="info">';
                                                    echo '<h4 class="title">Laudo</h4>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                }
                                            }
                                            if (!$encontrouCorresp) {
                                                echo'<div class="card" style="display: block;">';
                                                echo '</div>';
                                            }
                                        } else { echo 'A pasta correspondente ao "id" não foi encontrada.';}
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="9" hidden><!--UNIFORME-->
                            <div class="container">
                                <div class="gallery">
                                <?php
                                    if (is_dir($caminhoFolder)) {
                                        $files = scandir($caminhoFolder);
                                        $encontrouCorresp = false;

                                        foreach($files as $file) {
                                            if(strpos($file, $uniforme) !== false) {
                                                $encontrouCorresp = true;
                                                $caminhoImg = $caminhoFolder. "/" . $file;
                                                echo'<div class="card">';
                                                echo '<img class="myImg" src="' . $caminhoImg . '" alt="Medidas do uniforme">';
                                                echo '<div class="info">';
                                                echo '<h4 class="title">Medidas do uniforme</h4>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            else if(strpos($file, $reciboUniform) !== false) {
                                                $encontrouCorresp = true;
                                                $caminhoImg = $caminhoFolder. "/" . $file;
                                                echo'<div class="card">';
                                                echo '<img class="myImg" src="' . $caminhoImg . '" alt="Recibo do uniforme">';
                                                echo '<div class="info">';
                                                echo '<h4 class="title">Recibo do uniforme</h4>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        }
                                        if (!$encontrouCorresp) {
                                            echo'<div class="card" style="display: block;">';
                                            echo '</div>';
                                        }
                                    } else { echo 'A pasta correspondente ao "id" não foi encontrada.';}
                                ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="11" hidden><!--INFO ADICIONAL-->
                            <div class="container">
                                <div class="gallery">
                                <?php
                                    if (is_dir($caminhoFolder)) {
                                        $files = scandir($caminhoFolder);
                                        $encontrouCorresp = false;

                                        foreach($files as $file) {
                                            if(strpos($file, $infosAdd) !== false) {
                                                $encontrouCorresp = true;
                                                $caminhoImg = $caminhoFolder. "/" . $file;
                                                echo'<div class="card">';
                                                echo '<img class="myImg" src="' . $caminhoImg . '" alt="Informações adicionais">';
                                                echo '<div class="info">';
                                                echo '<h4 class="title">Informações adicionais</h4>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        }
                                        if (!$encontrouCorresp) {
                                            echo'<div class="card" style="display: block;">';
                                            echo '</div>';
                                        }
                                    } else { echo 'A pasta correspondente ao "id" não foi encontrada.';}
                                ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="14" hidden><!--KIT ESCOLAR-->
                            <div class="container">
                                <div class="gallery">
                                <?php
                                    if (is_dir($caminhoFolder)) {
                                        $files = scandir($caminhoFolder);
                                        $encontrouCorresp = false;

                                        foreach($files as $file) {
                                            if(strpos($file, $ciencia) !== false) {
                                                $encontrouCorresp = true;
                                                $caminhoImg = $caminhoFolder. "/" . $file;
                                                echo'<div class="card">';
                                                echo '<img class="myImg" src="' . $caminhoImg . '" alt="Kit escolar">';
                                                echo '<div class="info">';
                                                echo '<h4 class="title">Kit escolar</h4>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        }
                                        if (!$encontrouCorresp) {
                                            echo'<div class="card" style="display: block;">';
                                            echo '</div>';
                                        }
                                    } else { echo 'A pasta correspondente ao "id" não foi encontrada.';}
                                ?> 
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="5" hidden><!--OUTROS-->
                            <div class="container">
                                <div class="gallery">
                                <?php
                                    if (is_dir($caminhoFolder)) {
                                        $files = scandir($caminhoFolder);
                                        $encontrouCorresp = false;

                                        foreach($files as $file) {
                                            if(strpos($file, $consTutelar) !== false) {
                                                $encontrouCorresp = true;
                                                $caminhoImg = $caminhoFolder. "/" . $file;
                                                echo'<div class="card">';
                                                echo '<img class="myImg" src="' . $caminhoImg . '" alt="Conselho tutelar">';
                                                echo '<div class="info">';
                                                echo '<h4 class="title">Conselho tutelar</h4>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            else if(strpos($file, $orientConsTutelar) !== false) {
                                                $encontrouCorresp = true;
                                                $caminhoImg = $caminhoFolder. "/" . $file;
                                                echo'<div class="card">';
                                                echo '<img class="myImg" src="' . $caminhoImg . '" alt="Conselho tutelar">';
                                                echo '<div class="info">';
                                                echo '<h4 class="title">Conselho tutelar</h4>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            else if(strpos($file, $orientMP) !== false) {
                                                $encontrouCorresp = true;
                                                $caminhoImg = $caminhoFolder. "/" . $file;
                                                echo'<div class="card">';
                                                echo '<img class="myImg" src="' . $caminhoImg . '" alt="Ministério Público">';
                                                echo '<div class="info">';
                                                echo '<h4 class="title">Ministério Público</h4>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            else if(strpos($file, $decComparecimento) !== false) {
                                                $encontrouCorresp = true;
                                                $caminhoImg = $caminhoFolder. "/" . $file;
                                                echo'<div class="card">';
                                                echo '<img class="myImg" src="' . $caminhoImg . '" alt="Declaração de comparecimento">';
                                                echo '<div class="info">';
                                                echo '<h4 class="title">Declaração de comparecimento</h4>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                        }
                                        if (!$encontrouCorresp) {
                                            echo'<div class="card" style="display: block;">';
                                            echo '</div>';
                                        }
                                    } else { echo 'A pasta correspondente ao "id" não foi encontrada.';}
                                ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </article>
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
            <script src="_assets/_js/docs.js" defer></script>
            <footer></footer>
        </body>
    </html>