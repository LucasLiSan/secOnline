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
-->

<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="_assets/_css/infostudent.css">
            <title>Prontuário Digital - Informação do aluno</title>
            <script src="_assets/_js/infostudent.js" defer></script>
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

            $dadosAdicionais ="SELECT quilombola, gemeo, nomeGemeo, bolsaFamilia, nascidoExterior, usoIMG, projetoMomComDeus, deficiencia, tDeficiencia, deficienciaLaudo, alergia, tAlergia, alergiaLaudo, doencaCronica, tDoencaCronica, doencaCronicaLaudo, restriAlimentar, tRestriAlimentar, restriAlimentarLaudo, educFisica, educFisicaLaudo, altura, peso, tSangue FROM infoAdicionalAlunos WHERE rm='$rm'";
            $resultAdicional = $conn->query($dadosAdicionais);

            $dadosEndContSaid = "SELECT endAlunoRua,endAlunoNum,endAlunoBairro,endAlunoComplemento,endAlunoPontRef,endAlunoCidade,endAlunoUF,endAlunoZona,transporteEscolar,endAlunoGeo,distanciaEscola,telFixoAluno_1,PropTelFixoAluno_1,telFixoAluno_2,PropTelFixoAluno_2,telFixoAluno_3,PropTelFixoAluno_3,celAluno_1,PropCelAluno_1,WhatsCelAluno_1,celAluno_2,PropCelAluno_2,WhatsCelAluno_2,celAluno_3,PropCelAluno_3,WhatsCelAluno_3,celAluno_4,PropCelAluno_4,WhatsCelAluno_4,celAluno_5,PropCelAluno_5,WhatsCelAluno_5,celAluno_6,PropCelAluno_6,WhatsCelAluno_6,celAluno_7,PropCelAluno_7,WhatsCelAluno_7,celAluno_8,PropCelAluno_8,WhatsCelAluno_8,celAluno_9,PropCelAluno_9,WhatsCelAluno_9,celAluno_10,PropCelAluno_10,WhatsCelAluno_10,irSolo,pessoaAutoriz_1,pessoaAutoriz_2,pessoaAutoriz_3,pessoaAutoriz_4,pessoaAutoriz_5,pessoaAutoriz_6,pessoaAutoriz_7,pessoaAutoriz_8,pessoaAutoriz_9,pessoaAutoriz_10 FROM enderecoContatoSaidaAluno WHERE rm='$rm'";
            $resultEndContSaid = $conn->query($dadosEndContSaid);

            $dadosDocsAluno = "SELECT rgAluno, dgRgAluno, expeRgAluno, OrgExpeRgAluno, UfExpeRgAluno, cpfAluno, cpfDgAluno, nis, susAluno, crossAluno, certidNascModel,matricCertidNasc, certidNascLivro, certidNascFolha, certidNascNum, certidNascUfComarca, certidNascDistritoComarca,certidNascMunicComarca, certidNascDataRegist, dataInBrasil FROM documentosAluno WHERE rm='$rm'";
            $resultDocsAlunos = $conn->query($dadosDocsAluno);

            if ($resultBasic->num_rows > 0 && $resultSala->num_rows > 0) {

                $dadosAluno = $resultBasic->fetch_assoc();
                $dadosMatricula = $resultSala->fetch_assoc();
                $dadosAdicionalAluno = $resultAdicional->fetch_assoc();
                $dadosEnderecoAluno = $resultEndContSaid->fetch_assoc();
                $dadosDocumentosAluno = $resultDocsAlunos->fetch_assoc();
            
                $nomeAluno = $dadosAluno["nomeAluno"]; $raAluno = $dadosAluno["raAluno"]; $dgRaAluno = $dadosAluno["dgRaAluno"]; $dataNascAluno = $dadosAluno["dataNascAluno"]; $sexoAluno = $dadosAluno["sexoAluno"]; $racaCorAluno = $dadosAluno["racaCorAluno"]; $inepAluno = $dadosAluno["inepAluno"]; $cidadeNascAluno = $dadosAluno["cidadeNascAluno"]; $UFNascAluno = $dadosAluno["UFNascAluno"]; $paisNascAluno = $dadosAluno["paisNascAluno"]; $nacionalidade = $dadosAluno["nacionalidade"]; $filiacao1Aluno = $dadosAluno["filiacao1Aluno"]; $filiacao2Aluno = $dadosAluno["filiacao2Aluno"];

                $turma = $dadosMatricula["turma"]; $periodo = $dadosMatricula["periodo"]; $situacao = $dadosMatricula["situacao"];

                $quilombola = $dadosAdicionalAluno["quilombola"]; $gemeo = $dadosAdicionalAluno["gemeo"]; $nomeGemeo = $dadosAdicionalAluno["nomeGemeo"]; $bolsaFamilia = $dadosAdicionalAluno["bolsaFamilia"]; $nascidoExterior = $dadosAdicionalAluno["nascidoExterior"]; $usoIMG = $dadosAdicionalAluno["usoIMG"]; $projetoMomComDeus = $dadosAdicionalAluno["projetoMomComDeus"]; $deficiencia = $dadosAdicionalAluno["deficiencia"]; $tDeficiencia = $dadosAdicionalAluno["tDeficiencia"]; $deficienciaLaudo = $dadosAdicionalAluno["deficienciaLaudo"]; $alergia = $dadosAdicionalAluno["alergia"]; $tAlergia = $dadosAdicionalAluno["tAlergia"]; $alergiaLaudo = $dadosAdicionalAluno["alergiaLaudo"]; $doencaCronica = $dadosAdicionalAluno["doencaCronica"]; $tDoencaCronica = $dadosAdicionalAluno["tDoencaCronica"]; $doencaCronicaLaudo = $dadosAdicionalAluno["doencaCronicaLaudo"]; $restriAlimentar = $dadosAdicionalAluno["restriAlimentar"]; $tRestriAlimentar = $dadosAdicionalAluno["tRestriAlimentar"]; $restriAlimentarLaudo = $dadosAdicionalAluno["restriAlimentarLaudo"]; $educFisica = $dadosAdicionalAluno["educFisica"]; $educFisicaLaudo = $dadosAdicionalAluno["educFisicaLaudo"]; $altura = $dadosAdicionalAluno["altura"]; $peso = $dadosAdicionalAluno["peso"]; $tSangue = $dadosAdicionalAluno["tSangue"];

                $endAlunoRua = $dadosEnderecoAluno["endAlunoRua"]; $endAlunoNum = $dadosEnderecoAluno["endAlunoNum"]; $endAlunoBairro = $dadosEnderecoAluno["endAlunoBairro"]; $endAlunoComplemento = $dadosEnderecoAluno["endAlunoComplemento"]; $endAlunoPontRef = $dadosEnderecoAluno["endAlunoPontRef"]; $endAlunoCidade = $dadosEnderecoAluno["endAlunoCidade"]; $endAlunoUF = $dadosEnderecoAluno["endAlunoUF"]; $endAlunoZona = $dadosEnderecoAluno["endAlunoZona"]; $transporteEscolar = $dadosEnderecoAluno["transporteEscolar"]; $endAlunoGeo = $dadosEnderecoAluno["endAlunoGeo"]; $distanciaEscola = $dadosEnderecoAluno["distanciaEscola"]; $telFixoAluno_1  = $dadosEnderecoAluno["telFixoAluno_1"]; $PropTelFixoAluno_1 = $dadosEnderecoAluno["PropTelFixoAluno_1"]; $telFixoAluno_2 = $dadosEnderecoAluno["telFixoAluno_2"]; $PropTelFixoAluno_2 = $dadosEnderecoAluno["PropTelFixoAluno_2"]; $telFixoAluno_3 = $dadosEnderecoAluno["telFixoAluno_3"]; $PropTelFixoAluno_3 = $dadosEnderecoAluno["PropTelFixoAluno_3"]; $celAluno_1 = $dadosEnderecoAluno["celAluno_1"]; $PropCelAluno_1 = $dadosEnderecoAluno["PropCelAluno_1"]; $WhatsCelAluno_1 = $dadosEnderecoAluno["WhatsCelAluno_1"]; $celAluno_2 = $dadosEnderecoAluno["celAluno_2"]; $PropCelAluno_2 = $dadosEnderecoAluno["PropCelAluno_2"]; $WhatsCelAluno_2 = $dadosEnderecoAluno["WhatsCelAluno_2"]; $celAluno_3 = $dadosEnderecoAluno["celAluno_3"]; $PropCelAluno_3 = $dadosEnderecoAluno["PropCelAluno_3"]; $WhatsCelAluno_3 = $dadosEnderecoAluno["WhatsCelAluno_3"]; $celAluno_4 = $dadosEnderecoAluno["celAluno_4"]; $PropCelAluno_4 = $dadosEnderecoAluno["PropCelAluno_4"]; $WhatsCelAluno_4 = $dadosEnderecoAluno["WhatsCelAluno_4"]; $celAluno_5 = $dadosEnderecoAluno["celAluno_5"]; $PropCelAluno_5 = $dadosEnderecoAluno["PropCelAluno_5"]; $WhatsCelAluno_5 = $dadosEnderecoAluno["WhatsCelAluno_5"]; $celAluno_6 = $dadosEnderecoAluno["celAluno_6"]; $PropCelAluno_6 = $dadosEnderecoAluno["PropCelAluno_6"]; $WhatsCelAluno_6 = $dadosEnderecoAluno["WhatsCelAluno_6"]; $celAluno_7 = $dadosEnderecoAluno["celAluno_7"]; $PropCelAluno_7 = $dadosEnderecoAluno["PropCelAluno_7"]; $WhatsCelAluno_7 = $dadosEnderecoAluno["WhatsCelAluno_7"]; $celAluno_8 = $dadosEnderecoAluno["celAluno_8"]; $PropCelAluno_8 = $dadosEnderecoAluno["PropCelAluno_8"]; $WhatsCelAluno_8 = $dadosEnderecoAluno["WhatsCelAluno_8"]; $celAluno_9 = $dadosEnderecoAluno["celAluno_9"]; $PropCelAluno_9 = $dadosEnderecoAluno["PropCelAluno_9"]; $WhatsCelAluno_9 = $dadosEnderecoAluno["WhatsCelAluno_9"]; $celAluno_10 = $dadosEnderecoAluno["celAluno_10"]; $PropCelAluno_10 = $dadosEnderecoAluno["PropCelAluno_10"]; $WhatsCelAluno_10 = $dadosEnderecoAluno["WhatsCelAluno_10"]; $irSolo = $dadosEnderecoAluno["irSolo"]; $pessoaAutoriz_1 = $dadosEnderecoAluno["pessoaAutoriz_1"]; $pessoaAutoriz_2 = $dadosEnderecoAluno["pessoaAutoriz_2"]; $pessoaAutoriz_3 = $dadosEnderecoAluno["pessoaAutoriz_3"]; $pessoaAutoriz_4 = $dadosEnderecoAluno["pessoaAutoriz_4"]; $pessoaAutoriz_5 = $dadosEnderecoAluno["pessoaAutoriz_5"]; $pessoaAutoriz_6 = $dadosEnderecoAluno["pessoaAutoriz_6"]; $pessoaAutoriz_7 = $dadosEnderecoAluno["pessoaAutoriz_7"]; $pessoaAutoriz_8 = $dadosEnderecoAluno["pessoaAutoriz_8"]; $pessoaAutoriz_9 = $dadosEnderecoAluno["pessoaAutoriz_9"]; $pessoaAutoriz_10 = $dadosEnderecoAluno["pessoaAutoriz_10"];

                $rgAluno = $dadosDocumentosAluno["rgAluno"]; $dgRgAluno = $dadosDocumentosAluno["dgRgAluno"]; $expeRgAluno = $dadosDocumentosAluno["expeRgAluno"]; $OrgExpeRgAluno = $dadosDocumentosAluno["OrgExpeRgAluno"]; $UfExpeRgAluno = $dadosDocumentosAluno["UfExpeRgAluno"]; $cpfAluno = $dadosDocumentosAluno["cpfAluno"]; $cpfDgAluno = $dadosDocumentosAluno["cpfDgAluno"]; $nisAluno = $dadosDocumentosAluno["nis"]; $susAluno = $dadosDocumentosAluno["susAluno"]; $crossAluno = $dadosDocumentosAluno["crossAluno"]; $certidNascModel = $dadosDocumentosAluno["certidNascModel"]; $matricCertidNasc = $dadosDocumentosAluno["matricCertidNasc"]; $certidNascLivro = $dadosDocumentosAluno["certidNascLivro"]; $certidNascFolha = $dadosDocumentosAluno["certidNascFolha"]; $certidNascNum = $dadosDocumentosAluno["certidNascNum"]; $certidNascUfComarca = $dadosDocumentosAluno["certidNascUfComarca"]; $certidNascDistritoComarca = $dadosDocumentosAluno["certidNascDistritoComarca"]; $certidNascMunicComarca = $dadosDocumentosAluno["certidNascMunicComarca"]; $certidNascDataRegist = $dadosDocumentosAluno["certidNascDataRegist"]; $dataInBrasil = $dadosDocumentosAluno["dataInBrasil"];

            } else {
                echo "Nenhum resultado encontrado.";
            }
            
            $dataNasc = new DateTime($dataNascAluno);
            $dataAtual = new DateTime();
            $diferenca = $dataNasc->diff($dataAtual);
            $idade = $diferenca->y;

            if ($sexoAluno === 'MASCULINO') {
                $masc = 'checked'; $fem = '';
            } elseif ($sexoAluno === 'FEMININO') {
                $masc = ''; $fem = 'checked';
            } else {
                $masc = ''; $fem = '';
            }

            if ($racaCorAluno === 'AMARELA') {
                $amarelo = 'selected'; $branco = ''; $indio = ''; $pardo = ''; $preto = ''; $ndecl = '';
            } elseif ($racaCorAluno === 'BRANCA') {
                $amarelo = ''; $branco = 'selected'; $indio = ''; $pardo = ''; $preto = ''; $ndecl = '';
            } elseif ($racaCorAluno === 'INDIGENA') {
                $amarelo = ''; $branco = ''; $indio = 'selected'; $pardo = ''; $preto = ''; $ndecl = '';
            } elseif ($racaCorAluno === 'PARDA') {
                $amarelo = ''; $branco = ''; $indio = ''; $pardo = 'selected'; $preto = ''; $ndecl = '';
            } elseif ($racaCorAluno === 'PRETA') {
                $amarelo = ''; $branco = ''; $indio = ''; $pardo = ''; $preto = 'selected'; $ndecl = '';
            } elseif ($racaCorAluno === 'NAO DECLARADA') {
                $amarelo = ''; $branco = ''; $indio = ''; $pardo = ''; $preto = ''; $ndecl = 'selected';
            } else {
                $amarelo = ''; $branco = ''; $indio = ''; $pardo = ''; $preto = ''; $ndecl = '';
            }
            
            if ($quilombola === 'SIM') {
                $quilombSim = 'checked'; $quilombNao = '';
            } elseif ($quilombola === 'NAO') {
                $quilombSim = ''; $quilombNao = 'checked';
            } else {
                $quilombSim = ''; $quilombNao = '';
            }

            if ($tSangue === 'A+') {
                $APositiv = 'selected'; $aNegativ = ''; $BPositiv = ''; $BNegativ = ''; $ABPositiv = ''; $ABNegativ = ''; $OPositiv = ''; $ONegativ = ''; $NInfor = '';
            } elseif ($tSangue === 'A-') {
                $APositiv = ''; $aNegativ = 'selected'; $BPositiv = ''; $BNegativ = ''; $ABPositiv = ''; $ABNegativ = ''; $OPositiv = ''; $ONegativ = ''; $NInfor = '';
            } elseif ($tSangue === 'B-') {
                $APositiv = ''; $aNegativ = ''; $BPositiv = ''; $BNegativ = 'selected'; $ABPositiv = ''; $ABNegativ = ''; $OPositiv = ''; $ONegativ = ''; $NInfor = '';
            } elseif ($tSangue === 'B+') {
                $APositiv = ''; $aNegativ = ''; $BPositiv = 'selected'; $BNegativ = ''; $ABPositiv = ''; $ABNegativ = ''; $OPositiv = ''; $ONegativ = ''; $NInfor = '';
            } elseif ($tSangue === 'AB+') {
                $APositiv = ''; $aNegativ = ''; $BPositiv = ''; $BNegativ = ''; $ABPositiv = 'selected'; $ABNegativ = ''; $OPositiv = ''; $ONegativ = ''; $NInfor = '';
            } elseif ($tSangue === 'AB-') {
                $APositiv = ''; $aNegativ = ''; $BPositiv = ''; $BNegativ = ''; $ABPositiv = ''; $ABNegativ = 'selected'; $OPositiv = ''; $ONegativ = ''; $NInfor = '';
            } elseif ($tSangue === 'O-') {
                $APositiv = ''; $aNegativ = ''; $BPositiv = ''; $BNegativ = ''; $ABPositiv = ''; $ABNegativ = ''; $OPositiv = ''; $ONegativ = 'selected'; $NInfor = '';
            } elseif ($tSangue === 'O+') {
                $APositiv = ''; $aNegativ = ''; $BPositiv = ''; $BNegativ = ''; $ABPositiv = ''; $ABNegativ = ''; $OPositiv = 'selected'; $ONegativ = ''; $NInfor = '';
            } else {
                $APositiv = ''; $aNegativ = ''; $BPositiv = ''; $BNegativ = ''; $ABPositiv = ''; $ABNegativ = ''; $OPositiv = ''; $ONegativ = ''; $NInfor = 'selected';
            }

            if ($gemeo === 'SIM') {
                $gemeoSim = 'checked'; $gemeoNao = ''; $displayGemeo = '';
            } elseif ($gemeo === 'NAO') {
                $gemeoSim = ''; $gemeoNao = 'checked'; $displayGemeo = 'style="display: none;"';
            } else {
                $gemeoSim = ''; $gemeoNao = ''; $displayGemeo = 'style="display: none;"';
            }

            if ($transporteEscolar === 'SIM') {
                $transporteEscolarSim = 'checked'; $transporteEscolarNao = '';
            } elseif ($transporteEscolar === 'NAO') {
                $transporteEscolarSim = ''; $transporteEscolarNao = 'checked';
            } else {
                $transporteEscolarSim = ''; $transporteEscolarNao = '';
            }

            if ($bolsaFamilia === 'SIM') {
                $bfSim = 'checked'; $bfNao = '';
            } elseif ($bolsaFamilia === 'NAO') {
                $bfSim = ''; $bfNao = 'checked';
            } else {
                $bfSim = ''; $bfNao = '';
            }

            if ($certidNascModel === 'SIM') {
                $certidaoSim = 'checked'; $certidaoNao = ''; $displayCertidao = 'style="display: none;"';
            } elseif ($certidNascModel === 'NAO') {
                $certidaoSim = ''; $certidaoNao = 'checked'; $displayCertidao = '';
            } else {
                $certidaoSim = ''; $certidaoNao = ''; $displayCertidao = 'style="display: none;"';
            }

            if ($nascidoExterior === 'SIM') {
                $extNascSim = 'checked'; $extNascNao = ''; $displayExtNasc = ''; $displayDataIn = '';
            } elseif ($nascidoExterior === 'NAO') {
                $extNascSim = ''; $extNascNao = 'checked'; $displayExtNasc = 'style="margin-left: 16px; display:none;"'; $displayDataIn = 'style="margin-left: 48px; display:none;"';
            } else {
                $extNascSim = ''; $extNascNao = ''; $displayExtNasc = 'style="margin-left: 16px; display:none;"'; $displayDataIn = 'style="margin-left: 48px; display:none;"';
            }

            if ($endAlunoZona === 'RURAL') {
                $rural = 'checked'; $urbana = '';
            } elseif ($endAlunoZona === 'URBANA') {
                $rural = ''; $urbana = 'checked';
            } else {
                $rural = ''; $urbana = '';
            }

            if ($WhatsCelAluno_1 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_1 === 'NÃO') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }
            if ($WhatsCelAluno_2 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_2 === 'URBANA') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }
            if ($WhatsCelAluno_3 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_3 === 'NÃO') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }
            if ($WhatsCelAluno_4 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_4 === 'NÃO') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }
            if ($WhatsCelAluno_5 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_5 === 'NÃO') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }
            if ($WhatsCelAluno_6 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_6 === 'NÃO') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }
            if ($WhatsCelAluno_7 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_7 === 'NÃO') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }
            if ($WhatsCelAluno_8 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_8 === 'NÃO') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }
            if ($WhatsCelAluno_9 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_9 === 'NÃO') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }
            if ($WhatsCelAluno_10 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_10 === 'NÃO') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }

            if ($irSolo === 'SIM') {
                $irSoloSim = 'checked'; $irSoloNao = '';
            } elseif ($irSolo === 'NÃO') {
                $irSoloSim = ''; $irSoloNao = 'checked';
            } else {
                $irSoloSim = ''; $irSoloNao = '';
            }

            if ($usoIMG === 'SIM') {
                $imgSim = 'checked'; $imgNao = '';
            } elseif ($usoIMG === 'NÃO') {
                $imgSim = ''; $imgNao = 'checked';
            } else {
                $imgSim = ''; $imgNao = '';
            }

            if ($WhatsCelAluno_10 === 'SIM') {
                $whatSim = 'checked'; $whatNao = '';
            } elseif ($WhatsCelAluno_10 === 'NÃO') {
                $whatSim = ''; $whatNao = 'checked';
            } else {
                $whatSim = ''; $whatNao = '';
            }



            $conn->close();
        ?>
        <body>
            <div class="video-bg">
                <video width="320" height="240" autoplay loop muted>
                    <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">
                    Your browser does not support the video tag.
               </video>
            </div>
            <div class="user_img" title="Bento">
                <img src="../db_imgs/_profile.pictures/profilePic.<?php echo $rm ?>.jpg" height="100" width="100" alt="profile">
            </div>
            <div class="user_details">
                <h5>INFORMAÇÕES DO ALUNO</h5>
                <span><?php echo $nomeAluno; ?></span>
                <span>R.A.: <?php echo $raAluno; ?>-<?php echo $dgRaAluno; ?></span>
                <p><?php echo $turma; ?> <?php echo $periodo; ?></p>
                <a href="../index/index.php<?php echo "?rm=".$rm ?>" title="Voltar para a pagina inicial.">INÍCIO</a>
                <hr>
            </div>
            <article class="tabs content--flow">
                <aside class="sidebar">
                    <nav role="tablist" class="tab__navigation">
                        <button role="tab" aria-selected="true" class="tab__button" id="1" title="Informações rápidas do aluno.">
                            <span class="icon__for--tab">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="text__for--tab">Geral</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="2" title="Documentos do aluno.">
                            <span class="icon__for--tab">
                                <i class="fas fa-id-card"></i>
                            </span>
                            <span class="text__for--tab">Documentos</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="3" title="Endereço do aluno.">
                            <span class="icon__for--tab">
                                <i class="fas fa-map-marked-alt"></i>
                            </span>
                            <span class="text__for--tab">Endereço</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="4" title="Telefones de contato.">
                            <span class="icon__for--tab">
                                <i class="fas fa-phone"></i>
                            </span>
                            <span class="text__for--tab">Contatos</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="5" title="Autorizações de projetos, entradas e saídas e autorizações gerais.">
                            <span class="icon__for--tab">
                                <i class="fas fa-file-signature"></i>
                            </span>
                            <span class="text__for--tab">Autorizações</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="6" title="Tamanho do uniforme utilizado.">
                            <span class="icon__for--tab">
                                <i class="fas fa-tshirt"></i>
                            </span>
                            <span class="text__for--tab">Uniforme</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="7" title="Alergias, restrições alimentares, atendimentos diferenciais.">
                            <span class="icon__for--tab">
                                <i class="fas fa-clipboard"></i>
                            </span>
                            <span class="text__for--tab">Informações adicionais</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="8" title="Histórico escolar do aluno.">
                            <span class="icon__for--tab">
                            <i class="fas fa-graduation-cap"></i>
                            </span>
                            <span class="text__for--tab">Histórico</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="9" title="Escolas anteriormente frequentadas.">
                            <span class="icon__for--tab">
                                <i class="fas fa-school"></i>
                            </span>
                            <span class="text__for--tab">Matrículas</span>
                        </button>
                    </nav>
                </aside>
                <main class="content__area">
                    <div class="tab__content">
                        <div role="tabpanel" aria-labelledby="1">
                            <h1 class="title">GERAL</h1>
                            <span class="span-tag"><i class="fas fa-home"></i></span>
                            <div class="wrapper">
                                <div class="registration_form">
                                    <form>
                                        <div class="form_wrap">
                                            <div class="input_wrap">
                                                <label for="name">Nome</label>
                                                <input type="text" id="name" name="name" value="<?php echo $nomeAluno; ?>" readonly>
                                            </div>
                                            <div class="input_wrap" style="display: none;">
                                                <label for="name">Nome Social</label>
                                                <input type="text" id="nameSocial" name="name">
                                            </div>
                                            <div class="input_wrap" style="display: none;">
                                                <label for="name">Nome Afetivo</label>
                                                <input type="text" id="nameAfetivo" name="name">
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label id="#birth_label" for="birth">Data de nascimento</label>
                                                    <input type="date" name="birth" id="birth" value="<?php echo $dataNascAluno; ?>" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="age">Idade</label>
                                                    <input type="text" name="age" id="age" value="<?php echo $idade; ?>" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label>Sexo</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="gender" value="male" class="input_radio" <?php echo $masc; ?>>
                                                                <span>Masculino</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="gender" value="female" class="input_radio" <?php echo $fem; ?>>
                                                                <span>Feminino</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="DescricaoRacaCor">Raça/Cor</label>
                                                    <select id="DescricaoRacaCor" name="DescricaoRacaCor">
                                                        <option value="">SELECIONE...</option>
                                                        <option value="1" title="Branca" <?php echo $branco; ?>>BRANCA</option>
                                                        <option value="2" title="Preta" <?php echo $preto; ?>>PRETA</option>
                                                        <option value="4" title="Amarela" <?php echo $amarelo; ?>>AMARELA</option>
                                                        <option value="3" title="Parda" <?php echo $pardo; ?>>PARDA</option>
                                                        <option value="5" title="Indigena" <?php echo $indio; ?>>IINDIGENA</option>
                                                        <option value="6" title="NÃO DECLARADA" <?php echo $ndecl; ?>>NÃO DECLARADA</option>
                                                    </select>
                                                </div>
                                                <div class="input_wrap">
                                                    <label>Quilombola</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="quilombo" value="sim" class="input_radio" <?php echo $quilombSim; ?>>
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="quilombo" value="nao" class="input_radio" <?php echo $quilombNao; ?>>
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="TipoSanguineo">Sangue</label>
                                                    <select id="TipoSanguineo" name="TipoSanguineo" class="form-control">
                                                            <option value="" title="SELECIONE..." selected="selected">SELECIONE...</option>
                                                            <option value="A+" title="A+" <?php echo $APositiv; ?>>A+</option>
                                                            <option value="A-" title="A-" <?php echo $aNegativ; ?>>A-</option>
                                                            <option value="B+" title="B+" <?php echo $BPositiv; ?>>B+</option>
                                                            <option value="B-" title="B-" <?php echo $BNegativ; ?>>B-</option>
                                                            <option value="AB+" title="AB+" <?php echo $ABPositiv; ?>>AB+</option>
                                                            <option value="AB-" title="AB-" <?php echo $ABNegativ; ?>>AB-</option>
                                                            <option value="O+" title="O+" <?php echo $OPositiv; ?>>O+</option>
                                                            <option value="O-" title="O-" <?php echo $ONegativ; ?>>O-</option>
                                                            <option value="NAO" title="NÃO INFORMADA" <?php echo $NInfor; ?>>NÃO INFORMADA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="city">Cidade</label>
                                                    <input type="text" id="city" value="<?php echo $cidadeNascAluno; ?>" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="uf">UF</label>
                                                    <input type="text" id="uf" value="<?php echo $UFNascAluno; ?>" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="paises">País</label>
                                                    <input type="paises" id="country" value="<?php echo $paisNascAluno; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="input_wrap">
                                                <label for="nameFili_1">Filiação 1</label>
                                                <input type="text" id="nameFili_1" name="nameFili_1" value="<?php echo $filiacao1Aluno; ?>" readonly>
                                            </div>
                                            <div class="input_wrap">
                                                <label for="nameFili_2">Filiação 2</label>
                                                <input type="text" id="nameFili_2" name="nameFili_2" value="<?php echo $filiacao2Aluno; ?>" readonly>
                                            </div>
                                            <div class="input_wrap" style="display: none;">
                                                <label for="nameResp">Responsável Legal</label>
                                                <input type="text" id="nameResp" name="resp">
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label>Possui gêmeo</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="twins" value="sim" class="input_radio" <?php echo $gemeoSim; ?>>
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="twins" value="nao" class="input_radio" <?php echo $gemeoNao; ?>>
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" <?php echo $displayGemeo; ?>>
                                                    <label for="nameTwins">Nome do gêmeo</label>
                                                    <input type="text" id="nameTwins" name="nameTwins" style="width: 346px;" value="<?php echo $nomeGemeo; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="input_wrap">
                                                <label>Transporte escolar</label>
                                                <ul>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="transport" value="sim" class="input_radio" <?php echo $transporteEscolarSim; ?>>
                                                            <span>Sim</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="transport" value="nao" class="input_radio" <?php echo $transporteEscolarNao; ?>>
                                                            <span>Não</span>
                                                        </label>
                                                    </li>
                                                </ul>  
                                            </div>
                                            <div class="input_wrap">
                                                <label>Bolsa família</label>
                                                <ul>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="bolsaF" value="sim" class="input_radio" <?php echo $bfSim; ?>>
                                                            <span>Sim</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="bolsaF" value="nao" class="input_radio" <?php echo $bfNao; ?>>
                                                            <span>Não</span>
                                                        </label>
                                                    </li>
                                                </ul>  
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="2" hidden>
                            <h1 class="title">DOCUMENTOS</h1>
                            <span class="span-tag"><i class="fas fa-id-card"></i></span>
                            <div class="wrapper">
                                <div class="registration_form">
                                    <form>
                                        <div class="form_wrap">
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="ra">R.A.</label>
                                                        <input type="ra" id="numRa" value="<?php echo $raAluno; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="ra">DIG.</label>
                                                        <input type="ra_dg" id="DgRa" style="width:40px;" value="<?php echo $dgRaAluno; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="inep">INEP</label>
                                                    <input type="inep" id="numInep" value="<?php echo $inepAluno; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="sus">SUS</label>
                                                    <input type="sus" id="numSus" value="<?php echo $susAluno; ?>" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="nCross">CROSS</label>
                                                    <input type="nCross" id="numCross" value="<?php echo $crossAluno; ?>" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="nis">NIS</label>
                                                    <input type="nis" id="numNis" value="<?php echo $nisAluno; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="rg">R.G.</label>
                                                        <input type="rg" id="numRg" value="<?php echo $rgAluno; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="rg_dg">DIG.</label>
                                                        <input type="rg_dg" id="DgRg" style="width:40px;" value="<?php echo $dgRgAluno; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="rg_Exp">Expedição</label>
                                                        <input type="rg_Exp" id="RGOrg" style="width:110px;" value="<?php echo $expeRgAluno; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin: 0 16px 0 16px;">
                                                        <label for="rg_orgExp">Orgão</label>
                                                        <input type="rg_orgExp" id="RGExpOrg" style="width:88px;" value="<?php echo $OrgExpeRgAluno; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap">
                                                        <label for="rg_org_uf">UF</label>
                                                        <input type="text" id="RGExpOrgUF" value="<?php echo $UfExpeRgAluno; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="cpf">C.P.F.</label>
                                                        <input type="cpf" id="numCpf" value="<?php echo $cpfAluno; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="cpf_dg">DIG.</label>
                                                        <input type="cpf_dg" id="cpfDg" style="width: 40px;" value="<?php echo $cpfDgAluno; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label>Modelo novo</label>
                                                        <ul>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="certidNasc" value="sim" class="input_radio" <?php echo $certidaoSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="certidNasc" value="nao" class="input_radio" <?php echo $certidaoNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="certidMatric">Matrícula Certidão</label>
                                                        <input type="text" id="certidMatric" name="certidMatric" style="width: 197px;" value="<?php echo $matricCertidNasc; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="cndtregist">Data do registro</label>
                                                        <input type="date" name="cndtregist" id="cnDtRegist" style="height: 37px; width: 139px; border-radius: 3px;" value="<?php echo $certidNascDataRegist; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp" <?php echo $displayCertidao; ?>>
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="cnlivro">Livro</label>
                                                        <input type="cnlivro" id="cnLivro" style="width: 116px;" value="<?php echo $certidNascLivro; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="cnfolha">Folha</label>
                                                        <input type="cnfolha" id="cnFolha" style="width: 116px;" value="<?php echo $certidNascFolha; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="cnnum">Número</label>
                                                        <input type="cnnum" id="cnNum" style="width: 116px;" value="<?php echo $certidNascNum; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label>Nascido no Exteriror?</label>
                                                        <ul>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="ExtNasc" value="sim" class="input_radio" <?php echo $extNascSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="ExtNasc" value="nao" class="input_radio" <?php echo $extNascNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                    <div class="input_wrap" <?php echo $displayExtNasc; ?>>
                                                        <label for="PaisNascExt">País</label>
                                                        <input type="paises" id="country" value="<?php echo $paisNascAluno; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" <?php echo $displayDataIn; ?>>
                                                        <label for="EnterBr">Data da entrada</label>
                                                        <input type="date" name="EnterBr" id="EnterBr" style="height: 37px; width: 139px; border-radius: 3px;" value="<?php echo $dataInBrasil; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="3" hidden>
                            <h1 class="title">Endereço</h1>
                            <span class="span-tag"><i class="fas fa-map-marked-alt"></i></i></span>
                            <div class="wrapper">
                                <div class="registration_form">
                                    <form>
                                        <div class="form_wrap">
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="EnderecoRua">Rua</label>
                                                        <input type="EnderecoRua" id="NomeRua" style="width: 293px;" value="<?php echo $endAlunoRua; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin: 0 16px 0 16px;">
                                                        <label for="EnderecoNum">Nº.</label>
                                                        <input type="EnderecoNum" id="NumCasa" style="width:40px;" value="<?php echo $endAlunoNum; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="enderecoBairro">Bairro</label>
                                                    <input type="enderecoBairro" id="BairroCasa" value="<?php echo $endAlunoBairro; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="EnderecoCompl">Complemento</label>
                                                        <input type="EnderecoCompl" id="ComplementoCsa" style="width: 293px;" value="<?php echo $endAlunoComplemento; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="EnderecoPtRef">Ponto de referência</label>
                                                        <input type="EnderecoPtRef" id="Refer" style="width:223px;" value="<?php echo $endAlunoPontRef; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="city">Cidade</label>
                                                        <input type="text" id="city" value="<?php echo $endAlunoCidade; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="uf">UF</label>
                                                        <input type="text" id="uf" value="<?php echo $endAlunoUF; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Localização</label>
                                                        <ul>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="ExtNasc" value="sim" class="input_radio" <?php echo $rural; ?>>
                                                                    <span>Rural</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="ExtNasc" value="nao" class="input_radio" <?php echo $urbana; ?>>
                                                                    <span>Urbana</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label>Utiliza transporte?</label>
                                                        <ul>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="Transport" value="sim" class="input_radio" <?php echo $transporteEscolarSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="Transport" value="nao" class="input_radio" <?php echo $transporteEscolarNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="EnderecoGeo">Geolocalização</label>
                                                        <input type="EnderecoGeo" id="GeoCsa" style="width: 193px;" value="<?php echo $endAlunoGeo; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="EnderecoDistEsc">Distância da escola</label>
                                                        <input type="EnderecoDistEsc" id="DistEscola" style="width:140px;" value="<?php echo $distanciaEscola; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="4" hidden>
                            <h1 class="title">CONTATOS</h1>
                            <span class="span-tag"><i class="fas fa-phone"></i></span>
                            <div class="wrapper">
                                <div class="registration_form">
                                    <form>
                                        <div class="form_wrap">
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="TelFix1">Telone Fixo-1</label>
                                                        <input type="TelFix1" id="TelFixo1" style="width: 155px;" value="<?php echo $telFixoAluno_1; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="TelFix1Prop">Proprietário</label>
                                                        <input type="TelFix1Prop" id="PropTelFixo1" style="width:255px;" value="<?php echo $PropTelFixoAluno_1; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="TelFix2">Telone Fixo-2</label>
                                                        <input type="TelFix2" id="TelFixo2" style="width: 155px;" value="<?php echo $telFixoAluno_2; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="TelFix2Prop">Proprietário</label>
                                                        <input type="TelFix2Prop" id="PropTelFixo2" style="width:255px;" value="<?php echo $PropTelFixoAluno_2; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="TelFix3">Telone Fixo-3</label>
                                                        <input type="TelFix3" id="TelFixo3" style="width: 155px;" value="<?php echo $telFixoAluno_3; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="TelFix3Prop">Proprietário</label>
                                                        <input type="TelFix3Prop" id="PropTelFixo3" style="width:255px;" value="<?php echo $PropTelFixoAluno_3; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel1">Celular-1</label>
                                                        <input type="Cel1" id="mobile1" style="width: 155px;" value="<?php echo $celAluno_1; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel1Prop">Proprietário</label>
                                                        <input type="Cel1Prop" id="Propmobile1" style="width:255px;" value="<?php echo $PropCelAluno_1; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio" <?php echo $whatSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio" <?php echo $whatNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel2">Celular-2</label>
                                                        <input type="Cel2" id="mobile2" style="width: 155px;" value="<?php echo $celAluno_2; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel2Prop">Proprietário</label>
                                                        <input type="Cel2Prop" id="Propmobile2" style="width:255px;" value="<?php echo $PropCelAluno_2; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio" <?php echo $whatSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio" <?php echo $whatNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel3">Celular-3</label>
                                                        <input type="Cel3" id="mobile3" style="width: 155px;" value="<?php echo $celAluno_3; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel3Prop">Proprietário</label>
                                                        <input type="Cel3Prop" id="Propmobile3" style="width:255px;" value="<?php echo $PropCelAluno_3; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio" <?php echo $whatSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio" <?php echo $whatNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel4">Celular-4</label>
                                                        <input type="Cel4" id="mobile4" style="width: 155px;" value="<?php echo $celAluno_4; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel4Prop">Proprietário</label>
                                                        <input type="Cel4Prop" id="Propmobile4" style="width:255px;" value="<?php echo $PropCelAluno_4; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio" <?php echo $whatSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio" <?php echo $whatNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel5">Celular-5</label>
                                                        <input type="Cel5" id="mobile5" style="width: 155px;" value="<?php echo $celAluno_5; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel5Prop">Proprietário</label>
                                                        <input type="Cel5Prop" id="Propmobile5" style="width:255px;" value="<?php echo $PropCelAluno_5; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio" <?php echo $whatSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio" <?php echo $whatNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel6">Celular-6</label>
                                                        <input type="Cel6" id="mobile6" style="width: 155px;" value="<?php echo $celAluno_6; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel6Prop">Proprietário</label>
                                                        <input type="Cel6Prop" id="Propmobile6" style="width:255px;" value="<?php echo $PropCelAluno_6; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio" <?php echo $whatSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio" <?php echo $whatNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel7">Celular-7</label>
                                                        <input type="Cel7" id="mobile7" style="width: 155px;" value="<?php echo $celAluno_7; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel7Prop">Proprietário</label>
                                                        <input type="Cel7Prop" id="Propmobile7" style="width:255px;" value="<?php echo $PropCelAluno_7; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio" <?php echo $whatSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio" <?php echo $whatNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel8">Celular-8</label>
                                                        <input type="Cel8" id="mobile8" style="width: 155px;" value="<?php echo $celAluno_8; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel8Prop">Proprietário</label>
                                                        <input type="Cel8Prop" id="Propmobile8" style="width:255px;" value="<?php echo $PropCelAluno_8; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio" <?php echo $whatSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio" <?php echo $whatNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel9">Celular-9</label>
                                                        <input type="Cel9" id="mobile9" style="width: 155px;" value="<?php echo $celAluno_9; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel9Prop">Proprietário</label>
                                                        <input type="Cel9Prop" id="Propmobile9" style="width:255px;" value="<?php echo $PropCelAluno_9; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio" <?php echo $whatSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio" <?php echo $whatNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel10">Celular-10</label>
                                                        <input type="Cel10" id="mobile10" style="width: 155px;" value="<?php echo $celAluno_10; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel10Prop">Proprietário</label>
                                                        <input type="Cel10Prop" id="Propmobile10" style="width:255px;" value="<?php echo $PropCelAluno_10; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio" <?php echo $whatSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio" <?php echo $whatNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="5" hidden>
                            <h1 class="title">AUTORIZAÇÕES</h1>
                            <span class="span-tag"><i class="fas fa-file-signature"></i></span>
                            <div class="wrapper">
                                <div class="registration_form">
                                    <form>
                                        <div class="form_wrap">
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label>A criança pode ir embora sozinha?</label>
                                                        <ul style="width: 265px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="irSolo" value="sim" class="input_radio" <?php echo $irSoloSim; ?>>
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="irSolo" value="nao" class="input_radio" <?php echo $irSoloNao; ?>>
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="irSolo" value="transp" class="input_radio" >
                                                                    <span>Transporte</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Uso de imagem</label>
                                                        <ul style="width: 120px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="usoImg" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="usoImg" value="nao" class="input_radio">
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label>Participar de projetos</label>
                                                        <ul style="width: 185px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="PartProj" value="all" class="input_radio">
                                                                    <span>Todos</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="PartProj" value="none" class="input_radio">
                                                                    <span>Nenhum</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="PartProj" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px; display: none;">
                                                        <label>Projetos</label>
                                                        <ul style="width: 330px; display: flex; flex-wrap: wrap; flex-direction: row; align-content: center;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="checkbox" name="PartProj1" id="project1" value="mDeus" class="input_radio">
                                                                    <span>Momentos com Deus</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="checkbox" name="PartProj2" id="project2" value="Chess" class="input_radio">
                                                                    <span>Xadrez</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="checkbox" name="PartProj3" id="project3" value="Empreend" class="input_radio">
                                                                    <span>Empreender</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="AutorizPessoa1">Pessoa autorizada-1</label>
                                                        <input type="AutorizPessoa1" id="Pessoa1" style="width: 255px;" value="<?php echo $pessoaAutoriz_1; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="AutorizPessoa2">Pessoa autorizada-2</label>
                                                        <input type="AutorizPessoa2" id="Pessoa2" style="width: 255px;" value="<?php echo $pessoaAutoriz_2; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="AutorizPessoa3">Pessoa autorizada-3</label>
                                                        <input type="AutorizPessoa3" id="Pessoa3" style="width: 255px;" value="<?php echo $pessoaAutoriz_3; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="AutorizPessoa4">Pessoa autorizada-4</label>
                                                        <input type="AutorizPessoa4" id="Pessoa4" style="width: 255px;" value="<?php echo $pessoaAutoriz_4; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="AutorizPessoa5">Pessoa autorizada-5</label>
                                                        <input type="AutorizPessoa5" id="Pessoa5" style="width: 255px;" value="<?php echo $pessoaAutoriz_5; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="AutorizPessoa6">Pessoa autorizada-6</label>
                                                        <input type="AutorizPessoa6" id="Pessoa6" style="width: 255px;" value="<?php echo $pessoaAutoriz_6; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="AutorizPessoa7">Pessoa autorizada-7</label>
                                                        <input type="AutorizPessoa7" id="Pessoa7" style="width: 255px;" value="<?php echo $pessoaAutoriz_7; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="AutorizPessoa8">Pessoa autorizada-8</label>
                                                        <input type="AutorizPessoa8" id="Pessoa8" style="width: 255px;" value="<?php echo $pessoaAutoriz_8; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="AutorizPessoa9">Pessoa autorizada-9</label>
                                                        <input type="AutorizPessoa9" id="Pessoa9" style="width: 255px;" value="<?php echo $pessoaAutoriz_9; ?>" readonly>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="AutorizPessoa10">Pessoa autorizada-10</label>
                                                        <input type="AutorizPessoa10" id="Pessoa10" style="width: 255px;" value="<?php echo $pessoaAutoriz_10; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="6" hidden>
                            <h1 class="title">UNIFORME</h1>
                            <span class="span-tag"><i class="fas fa-tshirt"></i></span>
                            <div class="wrapper">
                                <div class="registration_form">
                                    <form>
                                        <div class="form_wrap">
                                            <div class="input_wrap">
                                                <label>Camiseta de mangas curtas</label>
                                                <ul style="width: 440px;">
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCam" value="04" class="input_radio">
                                                            <span>04</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCam" value="06" class="input_radio">
                                                            <span>06</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCam" value="08" class="input_radio">
                                                            <span>08</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCam" value="10" class="input_radio">
                                                            <span>10</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCam" value="12" class="input_radio">
                                                            <span>12</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCam" value="14" class="input_radio">
                                                            <span>14</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCam" value="16" class="input_radio">
                                                            <span>16</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCam" value="P" class="input_radio">
                                                            <span>P</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCam" value="M" class="input_radio">
                                                            <span>M</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCam" value="G" class="input_radio">
                                                            <span>G</span>
                                                        </label>
                                                    </li>
                                                </ul>  
                                            </div>
                                            <div class="input_wrap">
                                                <label>Bermudas unissex</label>
                                                <ul style="width: 440px;">
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniBer" value="04" class="input_radio">
                                                            <span>04</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniBer" value="06" class="input_radio">
                                                            <span>06</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniBer" value="08" class="input_radio">
                                                            <span>08</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniBer" value="10" class="input_radio">
                                                            <span>10</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniBer" value="12" class="input_radio">
                                                            <span>12</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniBer" value="14" class="input_radio">
                                                            <span>14</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniBer" value="16" class="input_radio">
                                                            <span>16</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniBer" value="P" class="input_radio">
                                                            <span>P</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniBer" value="M" class="input_radio">
                                                            <span>M</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniBer" value="G" class="input_radio">
                                                            <span>G</span>
                                                        </label>
                                                    </li>
                                                </ul>  
                                            </div>
                                            <div class="input_wrap">
                                                <label>Jaqueta unissex</label>
                                                <ul style="width: 440px;">
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniJaq" value="04" class="input_radio">
                                                            <span>04</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniJaq" value="06" class="input_radio">
                                                            <span>06</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniJaq" value="08" class="input_radio">
                                                            <span>08</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniJaq" value="10" class="input_radio">
                                                            <span>10</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniJaq" value="12" class="input_radio">
                                                            <span>12</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniJaq" value="14" class="input_radio">
                                                            <span>14</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniJaq" value="16" class="input_radio">
                                                            <span>16</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniJaq" value="P" class="input_radio">
                                                            <span>P</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniJaq" value="M" class="input_radio">
                                                            <span>M</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniJaq" value="G" class="input_radio">
                                                            <span>G</span>
                                                        </label>
                                                    </li>
                                                </ul>  
                                            </div>
                                            <div class="input_wrap">
                                                <label>Calça unissex</label>
                                                <ul style="width: 440px;">
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCalca" value="04" class="input_radio">
                                                            <span>04</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCalca" value="06" class="input_radio">
                                                            <span>06</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCalca" value="08" class="input_radio">
                                                            <span>08</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCalca" value="10" class="input_radio">
                                                            <span>10</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCalca" value="12" class="input_radio">
                                                            <span>12</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCalca" value="14" class="input_radio">
                                                            <span>14</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCalca" value="16" class="input_radio">
                                                            <span>16</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCalca" value="P" class="input_radio">
                                                            <span>P</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCalca" value="M" class="input_radio">
                                                            <span>M</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniCalca" value="G" class="input_radio">
                                                            <span>G</span>
                                                        </label>
                                                    </li>
                                                </ul>  
                                            </div>
                                            <div class="input_wrap">
                                                <label>Meia</label>
                                                <ul style="width: 440px;">
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniMeia" value="BB" class="input_radio">
                                                            <span>BB</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniMeia" value="PP" class="input_radio">
                                                            <span>PP</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniMeia" value="P" class="input_radio">
                                                            <span>P</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniMeia" value="M" class="input_radio">
                                                            <span>M</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniMeia" value="G" class="input_radio">
                                                            <span>G</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniMeia" value="GG" class="input_radio">
                                                            <span>GG</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniMeia" value="XGG" class="input_radio">
                                                            <span>XGG</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="UniMeia" value="ADULTO" class="input_radio">
                                                            <span>ADULTO</span>
                                                        </label>
                                                    </li>
                                                </ul>  
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="7" hidden>
                            <h1 class="title">INFOS ADICIONAIS</h1>
                            <span class="span-tag"><i class="fas fa-clipboard"></i></span>
                            <div class="wrapper">
                                <div class="registration_form">
                                    <form>
                                        <div class="form_wrap">
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label>Deficiência</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="deficiencia" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="deficiencia" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="deficiencia" value="sim" class="input_radio">
                                                                <span>Investig.</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label>Laudo</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="deficienciaLaudo" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="deficienciaLaudo" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label for="deficienciaTipo">Deficiência</label>
                                                    <input type="text" id="deficienciaTipo" name="deficienciaTipo">
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label>Alergias</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="alergia" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="alergia" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="alergia" value="sim" class="input_radio">
                                                                <span>Investig.</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label>Laudo</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="alergiaLaudo" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="alergiaLaudo" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label for="AlergiasTipo">Alergias</label>
                                                    <input type="text" id="AlergiasTipo" name="AlergiasTipo">
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label>Doença crônica</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="cronica" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="cronica" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="cronica" value="sim" class="input_radio">
                                                                <span>Investig.</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label>Laudo</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="dcronicaLaudo" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="cronicaLaudo" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label for="cronicaTipo">Doença crônica</label>
                                                    <input type="text" id="cronicaTipo" name="cronicaTipo">
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label>Restição alimentar</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="restritaliment" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="restritaliment" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="restritaliment" value="sim" class="input_radio">
                                                                <span>Investig.</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label>Laudo</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="restritalimentLaudo" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="restritalimentLaudo" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label for="restritalimentLaudo">Alimentos</label>
                                                    <input type="text" id="restritalimentLaudo" name="restritalimentLaudo">
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label>Educação física</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="educfisic" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="educfisic" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="educfisic" value="sim" class="input_radio">
                                                                <span>Investig.</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label>Laudo</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="educfisicLaudo" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="educfisicLaudo" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label for="educfisicmotivo">Motivo</label>
                                                    <input type="text" id="educfisicmotivo" name="educfisicmotivo">
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="height">Altura</label>
                                                        <input type="text" name="height" id="studentHeight">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="weight">Peso</label>
                                                        <input type="text" name="weight" id="studentWeight">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="8" hidden>
                            <h1 class="title">HISTÓRICO ESCOLAR</h1>
                            <span class="span-tag"><i class="fas fa-graduation-cap"></i></span>
                            <div class="wrapper">
                                <div class="registration_form">
                                    <form>
                                        <div class="form_wrap">
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_wrap">
                                                <h4>2019: 1º ANO - A</h4>
                                            </div>
                                            <div class="input_wrap">
                                                <h2>BASE COMUM CURRICULAR</h2>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">L.O.E.</label>
                                                    <input type="text" id="schoolYearHistLoe1" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesEducF">Educ. F.</label>
                                                    <input type="text" id="schoolYearHistEducF1" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesArt">Artes</label>
                                                    <input type="text" id="schoolYearHistArt1" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesScienc">Ciências</label>
                                                    <input type="text" id="schoolYearHistScienc1" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesHist">Hist.</label>
                                                    <input type="text" id="schoolYearHistHist1" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesGeo">Geo</label>
                                                    <input type="text" id="schoolYearHistGeo1" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesMat">Mat.</label>
                                                    <input type="text" id="schoolYearHistMat1" style="width: 55px;">
                                                </div>
                                            </div>
                                            <div class="input_wrap" style="display: none;">
                                                <h4>PARTE DIVERSIFICADA</h4>
                                            </div>
                                            <div class="input_grp" style="display: none;">
                                                <div class="input_wrap">
                                                    <label for="schoolGradesEng">Inglês</label>
                                                    <input type="text" id="schoolYearHistEng1" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesSpan">Espanhol</label>
                                                    <input type="text" id="schoolYearHistLoe1" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">Informatica</label>
                                                    <input type="text" id="schoolYearHistLoe1" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">Religião</label>
                                                    <input type="text" id="schoolYearHistLoe1" style="width: 55px;">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_wrap">
                                                <h4>2020: 2º ANO - A</h4>
                                            </div>
                                            <div class="input_wrap">
                                                <h2>BASE COMUM CURRICULAR</h2>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">L.O.E.</label>
                                                    <input type="text" id="schoolYearHistLoe2" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesEducF">Educ. F.</label>
                                                    <input type="text" id="schoolYearHistEducF2" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesArt">Artes</label>
                                                    <input type="text" id="schoolYearHistArt2" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesScienc">Ciências</label>
                                                    <input type="text" id="schoolYearHistScienc2" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesHist">Hist.</label>
                                                    <input type="text" id="schoolYearHistHist2" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesGeo">Geo</label>
                                                    <input type="text" id="schoolYearHistGeo2" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesMat">Mat.</label>
                                                    <input type="text" id="schoolYearHistMat2" style="width: 55px;">
                                                </div>
                                            </div>
                                            <div class="input_wrap" style="display: none;">
                                                <h4>PARTE DIVERSIFICADA</h4>
                                            </div>
                                            <div class="input_grp" style="display: none;">
                                                <div class="input_wrap">
                                                    <label for="schoolGradesEng">Inglês</label>
                                                    <input type="text" id="schoolYearHistEng2" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesSpan">Espanhol</label>
                                                    <input type="text" id="schoolYearHistLoe2" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">Informatica</label>
                                                    <input type="text" id="schoolYearHistLoe2" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">Religião</label>
                                                    <input type="text" id="schoolYearHistLoe2" style="width: 55px;">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_wrap">
                                                <h4>2021: 3º ANO - A</h4>
                                            </div>
                                            <div class="input_wrap">
                                                <h2>BASE COMUM CURRICULAR</h2>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">L.O.E.</label>
                                                    <input type="text" id="schoolYearHistLoe3" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesEducF">Educ. F.</label>
                                                    <input type="text" id="schoolYearHistEducF3" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesArt">Artes</label>
                                                    <input type="text" id="schoolYearHistArt3" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesScienc">Ciências</label>
                                                    <input type="text" id="schoolYearHistScienc3" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesHist">Hist.</label>
                                                    <input type="text" id="schoolYearHistHist3" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesGeo">Geo</label>
                                                    <input type="text" id="schoolYearHistGeo3" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesMat">Mat.</label>
                                                    <input type="text" id="schoolYearHistMat3" style="width: 55px;">
                                                </div>
                                            </div>
                                            <div class="input_wrap" style="display: none;">
                                                <h4>PARTE DIVERSIFICADA</h4>
                                            </div>
                                            <div class="input_grp" style="display: none;">
                                                <div class="input_wrap">
                                                    <label for="schoolGradesEng">Inglês</label>
                                                    <input type="text" id="schoolYearHistEng3" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesSpan">Espanhol</label>
                                                    <input type="text" id="schoolYearHistLoe3" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">Informatica</label>
                                                    <input type="text" id="schoolYearHistLoe3" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">Religião</label>
                                                    <input type="text" id="schoolYearHistLoe3" style="width: 55px;">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_wrap">
                                                <h4>2022: 4º ANO - A</h4>
                                            </div>
                                            <div class="input_wrap">
                                                <h2>BASE COMUM CURRICULAR</h2>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">L.O.E.</label>
                                                    <input type="text" id="schoolYearHistLoe4" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesEducF">Educ. F.</label>
                                                    <input type="text" id="schoolYearHistEducF4" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesArt">Artes</label>
                                                    <input type="text" id="schoolYearHistArt4" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesScienc">Ciências</label>
                                                    <input type="text" id="schoolYearHistScienc4" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesHist">Hist.</label>
                                                    <input type="text" id="schoolYearHistHist4" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesGeo">Geo</label>
                                                    <input type="text" id="schoolYearHistGeo4" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesMat">Mat.</label>
                                                    <input type="text" id="schoolYearHistMat4" style="width: 55px;">
                                                </div>
                                            </div>
                                            <div class="input_wrap" style="display: none;">
                                                <h4>PARTE DIVERSIFICADA</h4>
                                            </div>
                                            <div class="input_grp" style="display: none;">
                                                <div class="input_wrap">
                                                    <label for="schoolGradesEng">Inglês</label>
                                                    <input type="text" id="schoolYearHistEng4" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesSpan">Espanhol</label>
                                                    <input type="text" id="schoolYearHistLoe4" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">Informatica</label>
                                                    <input type="text" id="schoolYearHistLoe4" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">Religião</label>
                                                    <input type="text" id="schoolYearHistLoe4" style="width: 55px;">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_wrap">
                                                <h4>2023: 5º ANO - A</h4>
                                            </div>
                                            <div class="input_wrap">
                                                <h2>BASE COMUM CURRICULAR</h2>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">L.O.E.</label>
                                                    <input type="text" id="schoolYearHistLoe5" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesEducF">Educ. F.</label>
                                                    <input type="text" id="schoolYearHistEducF5" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesArt">Artes</label>
                                                    <input type="text" id="schoolYearHistArt5" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesScienc">Ciências</label>
                                                    <input type="text" id="schoolYearHistScienc5" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesHist">Hist.</label>
                                                    <input type="text" id="schoolYearHistHist5" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesGeo">Geo</label>
                                                    <input type="text" id="schoolYearHistGeo5" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesMat">Mat.</label>
                                                    <input type="text" id="schoolYearHistMat5" style="width: 55px;">
                                                </div>
                                            </div>
                                            <div class="input_wrap" style="display: none;">
                                                <h4>PARTE DIVERSIFICADA</h4>
                                            </div>
                                            <div class="input_grp" style="display: none;">
                                                <div class="input_wrap">
                                                    <label for="schoolGradesEng">Inglês</label>
                                                    <input type="text" id="schoolYearHistEng5" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesSpan">Espanhol</label>
                                                    <input type="text" id="schoolYearHistLoe5" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">Informatica</label>
                                                    <input type="text" id="schoolYearHistLoe5" style="width: 55px;">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="schoolGradesLoe">Religião</label>
                                                    <input type="text" id="schoolYearHistLoe5" style="width: 55px;">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="9" hidden>
                            <h1 class="title">MATRÍCULAS ANTERIORES</h1>
                            <span class="span-tag"><i class="fas fa-school"></i></span>
                            <div class="wrapper">
                                <div class="registration_form">
                                    <form>
                                        <div class="form_wrap">
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2013" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Berçário 1-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="INTEGRAL" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2013" readonly>
                                                </div>
                                                <div class="input_wrap" style="text-align: center;">
                                                    <label for="MatricOut">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2013" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2014" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Berçário 2-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="INTEGRAL" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2014" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricOut" style="text-align: center;">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2014" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2015" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Maternal 1-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="INTEGRAL" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2015" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricOut" style="text-align: center;">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2015" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2016" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Maternal 2-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="INTEGRAL" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2016" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricOut" style="text-align: center;">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2016" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2017" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Jardim 1-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Manhã" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2017" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricOut" style="text-align: center;">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2017" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2018" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Jardim 2-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Tarde" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2018" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricOut" style="text-align: center;">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2018" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2019" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="1º Ano-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Manhã" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2019" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricOut" style="text-align: center;">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2019" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2020" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2º Ano-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Manhã" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2020" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricOut" style="text-align: center;">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2020" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2021" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="3º Ano-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Manhã" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2021" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricOut" style="text-align: center;">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2021" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2022" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="4º Ano-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Manhã" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2022" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricOut" style="text-align: center;">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2022" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="input_wrap" style="margin-bottom: 5px;">
                                                <h3>EMEB PROFESSOR FERNANDO SERGIO DE CAMPOS MACHADO</h3>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="MatricYear" style="text-align: center;">Ano</label>
                                                    <input type="text" class="matricValues" style="width: 55px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="2023" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurma" style="text-align: center;">Turma</label>
                                                    <input type="text" class="matricValues" style="width: 100px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="5º Ano-A" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricTurno" style="text-align: center;">Turno</label>
                                                    <input type="text" class="matricValues" style="width: 95px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="Manhã" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricIn" style="text-align: center;">Entrada</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="06/02/2023" readonly>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="MatricOut" style="text-align: center;">Saída</label>
                                                    <input type="text" class="matricValues" style="width: 88px; background-color: transparent; color:white; border-color:transparent; text-align: center;" value="16/12/2023" readonly>
                                                </div>
                                            </div>
                                            <div class="input_grps">
                                                <div class="input_wrap" title="Encerrada" style="display:none;">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-power-off matricFinals" style="color: red;"><span>Encerrada</span></i>
                                                </div>
                                                <div class="input_wrap" title="Em curso">
                                                    <label for="MatricSituac" style="text-align: center;">Situação</label>
                                                    <i class="fas fa-hourglass-half" style="color:yellow"><span>Em curso</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Aprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-check matricFinals" style="color: green;"><span>Aprovado</span></i>
                                                </div>
                                                <div class="input_wrap" style="margin-left: 16px; display:none;" title="Reprovado">
                                                    <label for="MatricRend" style="text-align: center;">Rendimento</label>
                                                    <i class="fas fa-times" style="color: red;"><span>Reprovado</span></i>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </article>
            <footer></footer>
        </body>
    </html>