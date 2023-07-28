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

            $dadosAdicionais ="SELECT quilombola, gemeo, nomeGemeo, bolsaFamilia, nascidoExterior, usoIMG, projetoMomComDeus, deficiencia, tDeficiencia, deficienciaLaudo, alergia, tAlergia, alergiaLaudo, doencaCronica, tDoencaCronica, doencaCronicaLaudo, restriAlimentar, tRestriAlimentar, restriAlimentarLaudo, educFisica, educFisicaLaudo, altura, peso FROM infoAdicionalAlunos WHERE rm='$rm'";
            $resultAdicional = $conn->query($dadosAdicionais);

            $dadosEndContSaid = "SELECT endAlunoRua,endAlunoNum,endAlunoBairro,endAlunoComplemento,endAlunoPontRef,endAlunoCidade,endAlunoUF,endAlunoZona,transporteEscolar,endAlunoGeo,distanciaEscola,telFixoAluno_1,PropTelFixoAluno_1,telFixoAluno_2,PropTelFixoAluno_2,telFixoAluno_3,PropTelFixoAluno_3,celAluno_1,PropCelAluno_1,WhatsCelAluno_1,celAluno_2,PropCelAluno_2,WhatsCelAluno_2,celAluno_3,PropCelAluno_3,WhatsCelAluno_3,celAluno_4,PropCelAluno_4,WhatsCelAluno_4,celAluno_5,PropCelAluno_5,WhatsCelAluno_5,celAluno_6,PropCelAluno_6,WhatsCelAluno_6,celAluno_7,PropCelAluno_7,WhatsCelAluno_7,celAluno_8,PropCelAluno_8,WhatsCelAluno_8,celAluno_9,PropCelAluno_9,WhatsCelAluno_9,celAluno_10,PropCelAluno_10,WhatsCelAluno_10,irSolo,pessoaAutoriz_1,pessoaAutoriz_2,pessoaAutoriz_3,pessoaAutoriz_4,pessoaAutoriz_5,pessoaAutoriz_6,pessoaAutoriz_7,pessoaAutoriz_8,pessoaAutoriz_9,pessoaAutoriz_10 FROM enderecoContatoSaidaAluno WHERE rm='$rm'";
            $resultEndContSaid = $conn->query($dadosEndContSaid);

            if ($resultBasic->num_rows > 0 && $resultSala->num_rows > 0) {

                $dadosAluno = $resultBasic->fetch_assoc();
                $dadosMatricula = $resultSala->fetch_assoc();
                $dadosAdicionalAluno = $resultAdicional->fetch_assoc();
                $dadosEnderecoAluno = $resultEndContSaid->fetch_assoc();
            
                $nomeAluno = $dadosAluno["nomeAluno"];
                $raAluno = $dadosAluno["raAluno"];
                $dgRaAluno = $dadosAluno["dgRaAluno"];
                $dataNascAluno = $dadosAluno["dataNascAluno"];
                $sexoAluno = $dadosAluno["sexoAluno"];
                $racaCorAluno = $dadosAluno["racaCorAluno"];
                $turma = $dadosMatricula["turma"];
                $periodo = $dadosMatricula["periodo"];

            } else {
                echo "Nenhum resultado encontrado.";
            }
            
            $dataNasc = new DateTime($dataNascAluno);
            $dataAtual = new DateTime();
            $diferenca = $dataNasc->diff($dataAtual);
            $idade = $diferenca->y;

            if ($sexoAluno === 'MASCULINO') {
                $masc = 'checked';
                $fem = '';
            } elseif ($sexoAluno === 'FEMININO') {
                $masc = '';
                $fem = 'checked';
            } else {
                $masc = '';
                $fem = '';
            }

            if ($racaCorAluno === 'AMARELA') {
                $amarelo = 'selected';
                $branco = '';
                $indio = '';
                $pardo = '';
                $preto = '';
                $ndecl = '';
            } elseif ($racaCorAluno === 'BRANCA') {
                $amarelo = '';
                $branco = 'selected';
                $indio = '';
                $pardo = '';
                $preto = '';
                $ndecl = '';
            } elseif ($racaCorAluno === 'INDIGENA') {
                $amarelo = '';
                $branco = '';
                $indio = 'selected';
                $pardo = '';
                $preto = '';
                $ndecl = '';
            } elseif ($racaCorAluno === 'PARDA') {
                $amarelo = '';
                $branco = '';
                $indio = '';
                $pardo = 'selected';
                $preto = '';
                $ndecl = '';
            } elseif ($racaCorAluno === 'PRETA') {
                $amarelo = '';
                $branco = '';
                $indio = '';
                $pardo = '';
                $preto = 'selected';
                $ndecl = '';
            } elseif ($racaCorAluno === 'NAO DECLARADA') {
                $amarelo = '';
                $branco = '';
                $indio = '';
                $pardo = '';
                $preto = '';
                $ndecl = 'selected';
            } else {
                $amarelo = '';
                $branco = '';
                $indio = '';
                $pardo = '';
                $preto = '';
                $ndecl = '';
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
                                                        <option value="1" title="Branca" <?php echo $branco; ?>>Branca</option>
                                                        <option value="2" title="Preta" <?php echo $preto; ?>>Preta</option>
                                                        <option value="4" title="Amarela" <?php echo $amarelo; ?>>Amarela</option>
                                                        <option value="3" title="Parda" <?php echo $pardo; ?>>Parda</option>
                                                        <option value="5" title="Indigena" <?php echo $indio; ?>>Indigena</option>
                                                        <option value="6" title="NÃO DECLARADA" <?php echo $ndecl; ?>>NÃO DECLARADA</option>
                                                    </select>
                                                </div>
                                                <div class="input_wrap">
                                                    <label>Quilombola</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="quilombo" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="quilombo" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="TipoSanguineo">Sangue</label>
                                                    <select id="TipoSanguineo" name="TipoSanguineo" class="form-control">
                                                            <option value="" title="SELECIONE..." selected="selected">SELECIONE...</option>
                                                            <option value="A+" title="A+">A+</option>
                                                            <option value="A-" title="A-">A-</option>
                                                            <option value="B+" title="B+">B+</option>
                                                            <option value="B-" title="B-">B-</option>
                                                            <option value="AB+" title="AB+">AB+</option>
                                                            <option value="AB-" title="AB-">AB-</option>
                                                            <option value="O+" title="O+">O+</option>
                                                            <option value="O-" title="O-">O-</option>
                                                            <option value="NAO" title="NÃO INFORMADA">NÃO INFORMADA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="city">Cidade</label>
                                                    <input type="text" id="city">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="uf">UF</label>
                                                    <select id="uf" name="uf">
                                                        <option value="">SELECIONE...</option>
                                                        <option value="AC">Acre</option>
                                                        <option value="AL">Alagoas</option>
                                                        <option value="AP">Amapá</option>
                                                        <option value="AM">Amazonas</option>
                                                        <option value="BA">Bahia</option>
                                                        <option value="CE">Ceará</option>
                                                        <option value="DF">Distrito Federal</option>
                                                        <option value="ES">Espírito Santo</option>
                                                        <option value="GO">Goiás</option>
                                                        <option value="MA">Maranhão</option>
                                                        <option value="MT">Mato Grosso</option>
                                                        <option value="MS">Mato Grosso do Sul</option>
                                                        <option value="MG">Minas Gerais</option>
                                                        <option value="PA">Pará</option>
                                                        <option value="PB">Paraíba</option>
                                                        <option value="PR">Paraná</option>
                                                        <option value="PE">Pernambuco</option>
                                                        <option value="PI">Piauí</option>
                                                        <option value="RJ">Rio de Janeiro</option>
                                                        <option value="RN">Rio Grande do Norte</option>
                                                        <option value="RS">Rio Grande do Sul</option>
                                                        <option value="RO">Rondônia</option>
                                                        <option value="RR">Roraima</option>
                                                        <option value="SC">Santa Catarina</option>
                                                        <option value="SP">São Paulo</option>
                                                        <option value="SE">Sergipe</option>
                                                        <option value="TO">Tocantins</option>
                                                        <option value="EX">Estrangeiro</option>
                                                    </select>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="country">País</label>
                                                    <select name="paises" id="country">
                                                        <option value="" selected>SELECIONE...</option>
                                                        <option value="Brasil">Brasil</option>
                                                        <option value="Afeganistão">Afeganistão</option>
                                                        <option value="África do Sul">África do Sul</option>
                                                        <option value="Albânia">Albânia</option>
                                                        <option value="Alemanha">Alemanha</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antilhas Holandesas">Antilhas Holandesas</option>
                                                        <option value="Antárctida">Antárctida</option>
                                                        <option value="Antígua e Barbuda">Antígua e Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Argélia">Argélia</option>
                                                        <option value="Armênia">Armênia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Arábia Saudita">Arábia Saudita</option>
                                                        <option value="Austrália">Austrália</option>
                                                        <option value="Áustria">Áustria</option>
                                                        <option value="Azerbaijão">Azerbaijão</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrein">Bahrein</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benim">Benim</option>
                                                        <option value="Bermudas">Bermudas</option>
                                                        <option value="Bielorrússia">Bielorrússia</option>
                                                        <option value="Bolívia">Bolívia</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Brunei">Brunei</option>
                                                        <option value="Bulgária">Bulgária</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Butão">Butão</option>
                                                        <option value="Bélgica">Bélgica</option>
                                                        <option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
                                                        <option value="Cabo Verde">Cabo Verde</option>
                                                        <option value="Camarões">Camarões</option>
                                                        <option value="Camboja">Camboja</option>
                                                        <option value="Canadá">Canadá</option>
                                                        <option value="Catar">Catar</option>
                                                        <option value="Cazaquistão">Cazaquistão</option>
                                                        <option value="Chade">Chade</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Chipre">Chipre</option>
                                                        <option value="Colômbia">Colômbia</option>
                                                        <option value="Comores">Comores</option>
                                                        <option value="Coreia do Norte">Coreia do Norte</option>
                                                        <option value="Coreia do Sul">Coreia do Sul</option>
                                                        <option value="Costa do Marfim">Costa do Marfim</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Croácia">Croácia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Dinamarca">Dinamarca</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Egito">Egito</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
                                                        <option value="Equador">Equador</option>
                                                        <option value="Eritreia">Eritreia</option>
                                                        <option value="Escócia">Escócia</option>
                                                        <option value="Eslováquia">Eslováquia</option>
                                                        <option value="Eslovênia">Eslovênia</option>
                                                        <option value="Espanha">Espanha</option>
                                                        <option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
                                                        <option value="Estados Unidos">Estados Unidos</option>
                                                        <option value="Estônia">Estônia</option>
                                                        <option value="Etiópia">Etiópia</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Filipinas">Filipinas</option>
                                                        <option value="Finlândia">Finlândia</option>
                                                        <option value="França">França</option>
                                                        <option value="Gabão">Gabão</option>
                                                        <option value="Gana">Gana</option>
                                                        <option value="Geórgia">Geórgia</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Granada">Granada</option>
                                                        <option value="Gronelândia">Gronelândia</option>
                                                        <option value="Grécia">Grécia</option>
                                                        <option value="Guadalupe">Guadalupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guernesei">Guernesei</option>
                                                        <option value="Guiana">Guiana</option>
                                                        <option value="Guiana Francesa">Guiana Francesa</option>
                                                        <option value="Guiné">Guiné</option>
                                                        <option value="Guiné Equatorial">Guiné Equatorial</option>
                                                        <option value="Guiné-Bissau">Guiné-Bissau</option>
                                                        <option value="Gâmbia">Gâmbia</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungria">Hungria</option>
                                                        <option value="Ilha Bouvet">Ilha Bouvet</option>
                                                        <option value="Ilha de Man">Ilha de Man</option>
                                                        <option value="Ilha do Natal">Ilha do Natal</option>
                                                        <option value="Ilha Heard e Ilhas McDonald">Ilha Heard e Ilhas McDonald</option>
                                                        <option value="Ilha Norfolk">Ilha Norfolk</option>
                                                        <option value="Ilhas Cayman">Ilhas Cayman</option>
                                                        <option value="Ilhas Cocos (Keeling)">Ilhas Cocos (Keeling)</option>
                                                        <option value="Ilhas Cook">Ilhas Cook</option>
                                                        <option value="Ilhas Feroé">Ilhas Feroé</option>
                                                        <option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
                                                        <option value="Ilhas Malvinas">Ilhas Malvinas</option>
                                                        <option value="Ilhas Marshall">Ilhas Marshall</option>
                                                        <option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
                                                        <option value="Ilhas Salomão">Ilhas Salomão</option>
                                                        <option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
                                                        <option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
                                                        <option value="Ilhas Åland">Ilhas Åland</option>
                                                        <option value="Indonésia">Indonésia</option>
                                                        <option value="Inglaterra">Inglaterra</option>
                                                        <option value="Índia">Índia</option>
                                                        <option value="Iraque">Iraque</option>
                                                        <option value="Irlanda do Norte">Irlanda do Norte</option>
                                                        <option value="Irlanda">Irlanda</option>
                                                        <option value="Irã">Irã</option>
                                                        <option value="Islândia">Islândia</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Itália">Itália</option>
                                                        <option value="Iêmen">Iêmen</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japão">Japão</option>
                                                        <option value="Jersey">Jersey</option>
                                                        <option value="Jordânia">Jordânia</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Laos">Laos</option>
                                                        <option value="Lesoto">Lesoto</option>
                                                        <option value="Letônia">Letônia</option>
                                                        <option value="Libéria">Libéria</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lituânia">Lituânia</option>
                                                        <option value="Luxemburgo">Luxemburgo</option>
                                                        <option value="Líbano">Líbano</option>
                                                        <option value="Líbia">Líbia</option>
                                                        <option value="Macau">Macau</option>
                                                        <option value="Macedônia">Macedônia</option>
                                                        <option value="Madagáscar">Madagáscar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Maldivas">Maldivas</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Malásia">Malásia</option>
                                                        <option value="Marianas Setentrionais">Marianas Setentrionais</option>
                                                        <option value="Marrocos">Marrocos</option>
                                                        <option value="Martinica">Martinica</option>
                                                        <option value="Mauritânia">Mauritânia</option>
                                                        <option value="Maurícia">Maurícia</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Moldávia">Moldávia</option>
                                                        <option value="Mongólia">Mongólia</option>
                                                        <option value="Montenegro">Montenegro</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Moçambique">Moçambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="México">México</option>
                                                        <option value="Mônaco">Mônaco</option>
                                                        <option value="Namíbia">Namíbia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Nicarágua">Nicarágua</option>
                                                        <option value="Nigéria">Nigéria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Noruega">Noruega</option>
                                                        <option value="Nova Caledônia">Nova Caledônia</option>
                                                        <option value="Nova Zelândia">Nova Zelândia</option>
                                                        <option value="Níger">Níger</option>
                                                        <option value="Omã">Omã</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestina">Palestina</option>
                                                        <option value="Panamá">Panamá</option>
                                                        <option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
                                                        <option value="Paquistão">Paquistão</option>
                                                        <option value="Paraguai">Paraguai</option>
                                                        <option value="País de Gales">País de Gales</option>
                                                        <option value="Países Baixos">Países Baixos</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Polinésia Francesa">Polinésia Francesa</option>
                                                        <option value="Polônia">Polônia</option>
                                                        <option value="Porto Rico">Porto Rico</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Quirguistão">Quirguistão</option>
                                                        <option value="Quênia">Quênia</option>
                                                        <option value="Reino Unido">Reino Unido</option>
                                                        <option value="República Centro-Africana">República Centro-Africana</option>
                                                        <option value="República Checa">República Checa</option>
                                                        <option value="República Democrática do Congo">República Democrática do Congo</option>
                                                        <option value="República do Congo">República do Congo</option>
                                                        <option value="República Dominicana">República Dominicana</option>
                                                        <option value="Reunião">Reunião</option>
                                                        <option value="Romênia">Romênia</option>
                                                        <option value="Ruanda">Ruanda</option>
                                                        <option value="Rússia">Rússia</option>
                                                        <option value="Saara Ocidental">Saara Ocidental</option>
                                                        <option value="Saint Martin">Saint Martin</option>
                                                        <option value="Saint-Barthélemy">Saint-Barthélemy</option>
                                                        <option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
                                                        <option value="Samoa Americana">Samoa Americana</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="Santa Helena, Ascensão e Tristão da Cunha">Santa Helena, Ascensão e Tristão da Cunha</option>
                                                        <option value="Santa Lúcia">Santa Lúcia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Serra Leoa">Serra Leoa</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Singapura">Singapura</option>
                                                        <option value="Somália">Somália</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Suazilândia">Suazilândia</option>
                                                        <option value="Sudão">Sudão</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Suécia">Suécia</option>
                                                        <option value="Suíça">Suíça</option>
                                                        <option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
                                                        <option value="São Cristóvão e Nevis">São Cristóvão e Nevis</option>
                                                        <option value="São Marino">São Marino</option>
                                                        <option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
                                                        <option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
                                                        <option value="Sérvia">Sérvia</option>
                                                        <option value="Síria">Síria</option>
                                                        <option value="Tadjiquistão">Tadjiquistão</option>
                                                        <option value="Tailândia">Tailândia</option>
                                                        <option value="Taiwan">Taiwan</option>
                                                        <option value="Tanzânia">Tanzânia</option>
                                                        <option value="Terras Austrais e Antárticas Francesas">Terras Austrais e Antárticas Francesas</option>
                                                        <option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
                                                        <option value="Timor-Leste">Timor-Leste</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Toquelau">Toquelau</option>
                                                        <option value="Trinidad e Tobago">Trinidad e Tobago</option>
                                                        <option value="Tunísia">Tunísia</option>
                                                        <option value="Turcas e Caicos">Turcas e Caicos</option>
                                                        <option value="Turquemenistão">Turquemenistão</option>
                                                        <option value="Turquia">Turquia</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Ucrânia">Ucrânia</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Uruguai">Uruguai</option>
                                                        <option value="Uzbequistão">Uzbequistão</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Vaticano">Vaticano</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vietname">Vietname</option>
                                                        <option value="Wallis e Futuna">Wallis e Futuna</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                        <option value="Zâmbia">Zâmbia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input_wrap">
                                                <label for="nameFili_1">Filiação 1</label>
                                                <input type="text" id="nameFili_1" name="nameFili_1">
                                            </div>
                                            <div class="input_wrap">
                                                <label for="nameFili_2">Filiação 2</label>
                                                <input type="text" id="nameFili_2" name="nameFili_2">
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
                                                                <input type="radio" name="twins" value="sim" class="input_radio">
                                                                <span>Sim</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="twins" value="nao" class="input_radio">
                                                                <span>Não</span>
                                                            </label>
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <div class="input_wrap" style="display: none;">
                                                    <label for="nameTwins">Nome do gêmeo</label>
                                                    <input type="text" id="nameTwins" name="nameTwins" style="width: 346px;">
                                                </div>
                                            </div>
                                            <div class="input_wrap">
                                                <label>Transporte escolar</label>
                                                <ul>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="transport" value="sim" class="input_radio">
                                                            <span>Sim</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="transport" value="nao" class="input_radio">
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
                                                            <input type="radio" name="bolsaF" value="sim" class="input_radio">
                                                            <span>Sim</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="radio_wrap">
                                                            <input type="radio" name="bolsaF" value="nao" class="input_radio">
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
                                                        <input type="ra" id="numRa">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="ra">DIG.</label>
                                                        <input type="ra_dg" id="DgRa" style="width:40px;">
                                                    </div>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="inep">INEP</label>
                                                    <input type="inep" id="numInep">
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="sus">SUS</label>
                                                    <input type="sus" id="numSus">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="nCross">CROSS</label>
                                                    <input type="nCross" id="numCross">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="nis">NIS</label>
                                                    <input type="nis" id="numNis">
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="rg">R.G.</label>
                                                        <input type="rg" id="numRg">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="rg_dg">DIG.</label>
                                                        <input type="rg_dg" id="DgRg" style="width:40px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="rg_Exp">Expedição</label>
                                                        <input type="rg_Exp" id="RGOrg" style="width:110px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin: 0 16px 0 16px;">
                                                        <label for="rg_orgExp">Orgão</label>
                                                        <input type="rg_orgExp" id="RGExpOrg" style="width:88px;">
                                                    </div>
                                                    <div class="input_wrap">
                                                        <label for="rg_org_uf">UF</label>
                                                        <select id="RGExpOrgUF" name="rg_org_uf" style="height: 37px; width: 64px; border-radius: 3px;">
                                                            <option value="">SELECIONE...</option>
                                                            <option value="AC">AC</option>
                                                            <option value="AL">AL</option>
                                                            <option value="AP">AP</option>
                                                            <option value="AM">AM</option>
                                                            <option value="BA">BA</option>
                                                            <option value="CE">CE</option>
                                                            <option value="DF">DF</option>
                                                            <option value="ES">ES</option>
                                                            <option value="GO">GO</option>
                                                            <option value="MA">MA</option>
                                                            <option value="MT">MT</option>
                                                            <option value="MS">MS</option>
                                                            <option value="MG">MG</option>
                                                            <option value="PA">PA</option>
                                                            <option value="PB">PB</option>
                                                            <option value="PR">PR</option>
                                                            <option value="PE">PE</option>
                                                            <option value="PI">PI</option>
                                                            <option value="RJ">RJ</option>
                                                            <option value="RN">RN</option>
                                                            <option value="RS">RS</option>
                                                            <option value="RO">RO</option>
                                                            <option value="RR">RR</option>
                                                            <option value="SC">SC</option>
                                                            <option value="SP">SP</option>
                                                            <option value="SE">SE</option>
                                                            <option value="TO">TO</option>
                                                            <option value="EX">EX</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="cpf">C.P.F.</label>
                                                        <input type="cpf" id="numCpf">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="cpf_dg">DIG.</label>
                                                        <input type="cpf_dg" id="cpfDg" style="width: 40px;">
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
                                                                    <input type="radio" name="certidNasc" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="certidNasc" value="nao" class="input_radio">
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="certidMatric">Matrícula Certidão</label>
                                                        <input type="text" id="certidMatric" name="certidMatric" style="width: 197px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="cndtregist">Data do registro</label>
                                                        <input type="date" name="cndtregist" id="cnDtRegist" style="height: 37px; width: 139px; border-radius: 3px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp" style="display:none;">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="cnlivro">Livro</label>
                                                        <input type="cnlivro" id="cnLivro" style="width: 116px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="cnfolha">Folha</label>
                                                        <input type="cnfolha" id="cnFolha" style="width: 116px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="cnnum">Número</label>
                                                        <input type="cnnum" id="cnNum" style="width: 116px;">
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
                                                                    <input type="radio" name="ExtNasc" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="ExtNasc" value="nao" class="input_radio">
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px; display:none;">
                                                        <label for="PaisNascExt">País</label>
                                                        <select name="paises" id="country">
                                                            <option value="" selected>SELECIONE...</option>
                                                            <option value="Afeganistão">Afeganistão</option>
                                                            <option value="África do Sul">África do Sul</option>
                                                            <option value="Albânia">Albânia</option>
                                                            <option value="Alemanha">Alemanha</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antilhas Holandesas">Antilhas Holandesas</option>
                                                            <option value="Antárctida">Antárctida</option>
                                                            <option value="Antígua e Barbuda">Antígua e Barbuda</option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Argélia">Argélia</option>
                                                            <option value="Armênia">Armênia</option>
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Arábia Saudita">Arábia Saudita</option>
                                                            <option value="Austrália">Austrália</option>
                                                            <option value="Áustria">Áustria</option>
                                                            <option value="Azerbaijão">Azerbaijão</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bahrein">Bahrein</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Benim">Benim</option>
                                                            <option value="Bermudas">Bermudas</option>
                                                            <option value="Bielorrússia">Bielorrússia</option>
                                                            <option value="Bolívia">Bolívia</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Brunei">Brunei</option>
                                                            <option value="Bulgária">Bulgária</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Butão">Butão</option>
                                                            <option value="Bélgica">Bélgica</option>
                                                            <option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
                                                            <option value="Cabo Verde">Cabo Verde</option>
                                                            <option value="Camarões">Camarões</option>
                                                            <option value="Camboja">Camboja</option>
                                                            <option value="Canadá">Canadá</option>
                                                            <option value="Catar">Catar</option>
                                                            <option value="Cazaquistão">Cazaquistão</option>
                                                            <option value="Chade">Chade</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Chipre">Chipre</option>
                                                            <option value="Colômbia">Colômbia</option>
                                                            <option value="Comores">Comores</option>
                                                            <option value="Coreia do Norte">Coreia do Norte</option>
                                                            <option value="Coreia do Sul">Coreia do Sul</option>
                                                            <option value="Costa do Marfim">Costa do Marfim</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Croácia">Croácia</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Dinamarca">Dinamarca</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Egito">Egito</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
                                                            <option value="Equador">Equador</option>
                                                            <option value="Eritreia">Eritreia</option>
                                                            <option value="Escócia">Escócia</option>
                                                            <option value="Eslováquia">Eslováquia</option>
                                                            <option value="Eslovênia">Eslovênia</option>
                                                            <option value="Espanha">Espanha</option>
                                                            <option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
                                                            <option value="Estados Unidos">Estados Unidos</option>
                                                            <option value="Estônia">Estônia</option>
                                                            <option value="Etiópia">Etiópia</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Filipinas">Filipinas</option>
                                                            <option value="Finlândia">Finlândia</option>
                                                            <option value="França">França</option>
                                                            <option value="Gabão">Gabão</option>
                                                            <option value="Gana">Gana</option>
                                                            <option value="Geórgia">Geórgia</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Granada">Granada</option>
                                                            <option value="Gronelândia">Gronelândia</option>
                                                            <option value="Grécia">Grécia</option>
                                                            <option value="Guadalupe">Guadalupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guernesei">Guernesei</option>
                                                            <option value="Guiana">Guiana</option>
                                                            <option value="Guiana Francesa">Guiana Francesa</option>
                                                            <option value="Guiné">Guiné</option>
                                                            <option value="Guiné Equatorial">Guiné Equatorial</option>
                                                            <option value="Guiné-Bissau">Guiné-Bissau</option>
                                                            <option value="Gâmbia">Gâmbia</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Hungria">Hungria</option>
                                                            <option value="Ilha Bouvet">Ilha Bouvet</option>
                                                            <option value="Ilha de Man">Ilha de Man</option>
                                                            <option value="Ilha do Natal">Ilha do Natal</option>
                                                            <option value="Ilha Heard e Ilhas McDonald">Ilha Heard e Ilhas McDonald</option>
                                                            <option value="Ilha Norfolk">Ilha Norfolk</option>
                                                            <option value="Ilhas Cayman">Ilhas Cayman</option>
                                                            <option value="Ilhas Cocos (Keeling)">Ilhas Cocos (Keeling)</option>
                                                            <option value="Ilhas Cook">Ilhas Cook</option>
                                                            <option value="Ilhas Feroé">Ilhas Feroé</option>
                                                            <option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
                                                            <option value="Ilhas Malvinas">Ilhas Malvinas</option>
                                                            <option value="Ilhas Marshall">Ilhas Marshall</option>
                                                            <option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
                                                            <option value="Ilhas Salomão">Ilhas Salomão</option>
                                                            <option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
                                                            <option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
                                                            <option value="Ilhas Åland">Ilhas Åland</option>
                                                            <option value="Indonésia">Indonésia</option>
                                                            <option value="Inglaterra">Inglaterra</option>
                                                            <option value="Índia">Índia</option>
                                                            <option value="Iraque">Iraque</option>
                                                            <option value="Irlanda do Norte">Irlanda do Norte</option>
                                                            <option value="Irlanda">Irlanda</option>
                                                            <option value="Irã">Irã</option>
                                                            <option value="Islândia">Islândia</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Itália">Itália</option>
                                                            <option value="Iêmen">Iêmen</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japão">Japão</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordânia">Jordânia</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Laos">Laos</option>
                                                            <option value="Lesoto">Lesoto</option>
                                                            <option value="Letônia">Letônia</option>
                                                            <option value="Libéria">Libéria</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lituânia">Lituânia</option>
                                                            <option value="Luxemburgo">Luxemburgo</option>
                                                            <option value="Líbano">Líbano</option>
                                                            <option value="Líbia">Líbia</option>
                                                            <option value="Macau">Macau</option>
                                                            <option value="Macedônia">Macedônia</option>
                                                            <option value="Madagáscar">Madagáscar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Maldivas">Maldivas</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Malásia">Malásia</option>
                                                            <option value="Marianas Setentrionais">Marianas Setentrionais</option>
                                                            <option value="Marrocos">Marrocos</option>
                                                            <option value="Martinica">Martinica</option>
                                                            <option value="Mauritânia">Mauritânia</option>
                                                            <option value="Maurícia">Maurícia</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Moldávia">Moldávia</option>
                                                            <option value="Mongólia">Mongólia</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Moçambique">Moçambique</option>
                                                            <option value="Myanmar">Myanmar</option>
                                                            <option value="México">México</option>
                                                            <option value="Mônaco">Mônaco</option>
                                                            <option value="Namíbia">Namíbia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Nicarágua">Nicarágua</option>
                                                            <option value="Nigéria">Nigéria</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Noruega">Noruega</option>
                                                            <option value="Nova Caledônia">Nova Caledônia</option>
                                                            <option value="Nova Zelândia">Nova Zelândia</option>
                                                            <option value="Níger">Níger</option>
                                                            <option value="Omã">Omã</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Palestina">Palestina</option>
                                                            <option value="Panamá">Panamá</option>
                                                            <option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
                                                            <option value="Paquistão">Paquistão</option>
                                                            <option value="Paraguai">Paraguai</option>
                                                            <option value="País de Gales">País de Gales</option>
                                                            <option value="Países Baixos">Países Baixos</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Pitcairn">Pitcairn</option>
                                                            <option value="Polinésia Francesa">Polinésia Francesa</option>
                                                            <option value="Polônia">Polônia</option>
                                                            <option value="Porto Rico">Porto Rico</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Quirguistão">Quirguistão</option>
                                                            <option value="Quênia">Quênia</option>
                                                            <option value="Reino Unido">Reino Unido</option>
                                                            <option value="República Centro-Africana">República Centro-Africana</option>
                                                            <option value="República Checa">República Checa</option>
                                                            <option value="República Democrática do Congo">República Democrática do Congo</option>
                                                            <option value="República do Congo">República do Congo</option>
                                                            <option value="República Dominicana">República Dominicana</option>
                                                            <option value="Reunião">Reunião</option>
                                                            <option value="Romênia">Romênia</option>
                                                            <option value="Ruanda">Ruanda</option>
                                                            <option value="Rússia">Rússia</option>
                                                            <option value="Saara Ocidental">Saara Ocidental</option>
                                                            <option value="Saint Martin">Saint Martin</option>
                                                            <option value="Saint-Barthélemy">Saint-Barthélemy</option>
                                                            <option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
                                                            <option value="Samoa Americana">Samoa Americana</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="Santa Helena, Ascensão e Tristão da Cunha">Santa Helena, Ascensão e Tristão da Cunha</option>
                                                            <option value="Santa Lúcia">Santa Lúcia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serra Leoa">Serra Leoa</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Singapura">Singapura</option>
                                                            <option value="Somália">Somália</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Suazilândia">Suazilândia</option>
                                                            <option value="Sudão">Sudão</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Suécia">Suécia</option>
                                                            <option value="Suíça">Suíça</option>
                                                            <option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
                                                            <option value="São Cristóvão e Nevis">São Cristóvão e Nevis</option>
                                                            <option value="São Marino">São Marino</option>
                                                            <option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
                                                            <option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
                                                            <option value="Sérvia">Sérvia</option>
                                                            <option value="Síria">Síria</option>
                                                            <option value="Tadjiquistão">Tadjiquistão</option>
                                                            <option value="Tailândia">Tailândia</option>
                                                            <option value="Taiwan">Taiwan</option>
                                                            <option value="Tanzânia">Tanzânia</option>
                                                            <option value="Terras Austrais e Antárticas Francesas">Terras Austrais e Antárticas Francesas</option>
                                                            <option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
                                                            <option value="Timor-Leste">Timor-Leste</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Toquelau">Toquelau</option>
                                                            <option value="Trinidad e Tobago">Trinidad e Tobago</option>
                                                            <option value="Tunísia">Tunísia</option>
                                                            <option value="Turcas e Caicos">Turcas e Caicos</option>
                                                            <option value="Turquemenistão">Turquemenistão</option>
                                                            <option value="Turquia">Turquia</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Ucrânia">Ucrânia</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Uruguai">Uruguai</option>
                                                            <option value="Uzbequistão">Uzbequistão</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Vaticano">Vaticano</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Vietname">Vietname</option>
                                                            <option value="Wallis e Futuna">Wallis e Futuna</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                            <option value="Zâmbia">Zâmbia</option>
                                                        </select>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 48px; display:none;">
                                                        <label for="EnterBr">Data da entrada</label>
                                                        <input type="date" name="EnterBr" id="EnterBr" style="height: 37px; width: 139px; border-radius: 3px;">
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
                                                        <input type="EnderecoRua" id="NomeRua" style="width: 293px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin: 0 16px 0 16px;">
                                                        <label for="EnderecoNum">Nº.</label>
                                                        <input type="EnderecoNum" id="NumCasa" style="width:40px;">
                                                    </div>
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="enderecoBairro">Bairro</label>
                                                    <input type="enderecoBairro" id="BairroCasa">
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="EnderecoCompl">Complemento</label>
                                                        <input type="EnderecoCompl" id="ComplementoCsa" style="width: 293px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="EnderecoPtRef">Ponto de referência</label>
                                                        <input type="EnderecoPtRef" id="Refer" style="width:223px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="city">Cidade</label>
                                                        <input type="text" id="city">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="uf">UF</label>
                                                        <select id="uf" name="uf" style="width:113px;">
                                                            <option value="">SELECIONE...</option>
                                                            <option value="AC">AC</option>
                                                            <option value="AL">AL</option>
                                                            <option value="AP">AP</option>
                                                            <option value="AM">AM</option>
                                                            <option value="BA">BA</option>
                                                            <option value="CE">CE</option>
                                                            <option value="DF">DF</option>
                                                            <option value="ES">ES</option>
                                                            <option value="GO">GO</option>
                                                            <option value="MA">MA</option>
                                                            <option value="MT">MT</option>
                                                            <option value="MS">MS</option>
                                                            <option value="MG">MG</option>
                                                            <option value="PA">PA</option>
                                                            <option value="PB">PB</option>
                                                            <option value="PR">PR</option>
                                                            <option value="PE">PE</option>
                                                            <option value="PI">PI</option>
                                                            <option value="RJ">RJ</option>
                                                            <option value="RN">RN</option>
                                                            <option value="RS">RS</option>
                                                            <option value="RO">RO</option>
                                                            <option value="RR">RR</option>
                                                            <option value="SC">SC</option>
                                                            <option value="SP">SP</option>
                                                            <option value="SE">SE</option>
                                                            <option value="TO">TO</option>
                                                            <option value="EX">EX</option>
                                                        </select>
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Localização</label>
                                                        <ul>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="ExtNasc" value="sim" class="input_radio">
                                                                    <span>Rural</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="ExtNasc" value="nao" class="input_radio">
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
                                                                    <input type="radio" name="Transport" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="Transport" value="nao" class="input_radio">
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                        </ul>  
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="EnderecoGeo">Geolocalização</label>
                                                        <input type="EnderecoGeo" id="GeoCsa" style="width: 193px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="EnderecoDistEsc">Distância da escola</label>
                                                        <input type="EnderecoDistEsc" id="DistEscola" style="width:140px;">
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
                                                        <input type="TelFix1" id="TelFixo1" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="TelFix1Prop">Proprietário</label>
                                                        <input type="TelFix1Prop" id="PropTelFixo1" style="width:255px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="TelFix2">Telone Fixo-2</label>
                                                        <input type="TelFix2" id="TelFixo2" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="TelFix2Prop">Proprietário</label>
                                                        <input type="TelFix2Prop" id="PropTelFixo2" style="width:255px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="TelFix3">Telone Fixo-3</label>
                                                        <input type="TelFix3" id="TelFixo3" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="TelFix3Prop">Proprietário</label>
                                                        <input type="TelFix3Prop" id="PropTelFixo3" style="width:255px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="Cel1">Celular-1</label>
                                                        <input type="Cel1" id="mobile1" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel1Prop">Proprietário</label>
                                                        <input type="Cel1Prop" id="Propmobile1" style="width:255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio">
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
                                                        <input type="Cel2" id="mobile2" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel2Prop">Proprietário</label>
                                                        <input type="Cel2Prop" id="Propmobile2" style="width:255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio">
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
                                                        <input type="Cel3" id="mobile3" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel3Prop">Proprietário</label>
                                                        <input type="Cel3Prop" id="Propmobile3" style="width:255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio">
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
                                                        <input type="Cel4" id="mobile4" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel4Prop">Proprietário</label>
                                                        <input type="Cel4Prop" id="Propmobile4" style="width:255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio">
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
                                                        <input type="Cel5" id="mobile5" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel5Prop">Proprietário</label>
                                                        <input type="Cel5Prop" id="Propmobile5" style="width:255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio">
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
                                                        <input type="Cel6" id="mobile6" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel6Prop">Proprietário</label>
                                                        <input type="Cel6Prop" id="Propmobile6" style="width:255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio">
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
                                                        <input type="Cel7" id="mobile7" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel7Prop">Proprietário</label>
                                                        <input type="Cel7Prop" id="Propmobile7" style="width:255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio">
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
                                                        <input type="Cel8" id="mobile8" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel8Prop">Proprietário</label>
                                                        <input type="Cel8Prop" id="Propmobile8" style="width:255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio">
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
                                                        <input type="Cel9" id="mobile9" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel9Prop">Proprietário</label>
                                                        <input type="Cel9Prop" id="Propmobile9" style="width:255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio">
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
                                                        <input type="Cel10" id="mobile10" style="width: 155px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="Cel10Prop">Proprietário</label>
                                                        <input type="Cel10Prop" id="Propmobile10" style="width:255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label>Whatsapp</label>
                                                        <ul style="width: 100px;">
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="whatsapp" value="nao" class="input_radio">
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
                                                                    <input type="radio" name="irSolo" value="sim" class="input_radio">
                                                                    <span>Sim</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="irSolo" value="nao" class="input_radio">
                                                                    <span>Não</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label class="radio_wrap">
                                                                    <input type="radio" name="irSolo" value="transp" class="input_radio">
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
                                                        <input type="AutorizPessoa1" id="Pessoa1" style="width: 255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="AutorizPessoa2">Pessoa autorizada-2</label>
                                                        <input type="AutorizPessoa2" id="Pessoa2" style="width: 255px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="AutorizPessoa3">Pessoa autorizada-3</label>
                                                        <input type="AutorizPessoa3" id="Pessoa3" style="width: 255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="AutorizPessoa4">Pessoa autorizada-4</label>
                                                        <input type="AutorizPessoa4" id="Pessoa4" style="width: 255px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="AutorizPessoa5">Pessoa autorizada-5</label>
                                                        <input type="AutorizPessoa5" id="Pessoa5" style="width: 255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="AutorizPessoa6">Pessoa autorizada-6</label>
                                                        <input type="AutorizPessoa6" id="Pessoa6" style="width: 255px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="AutorizPessoa7">Pessoa autorizada-7</label>
                                                        <input type="AutorizPessoa7" id="Pessoa7" style="width: 255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="AutorizPessoa8">Pessoa autorizada-8</label>
                                                        <input type="AutorizPessoa8" id="Pessoa8" style="width: 255px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input_grp">
                                                <div class="input_grp_pair">
                                                    <div class="input_wrap">
                                                        <label for="AutorizPessoa9">Pessoa autorizada-9</label>
                                                        <input type="AutorizPessoa9" id="Pessoa9" style="width: 255px;">
                                                    </div>
                                                    <div class="input_wrap" style="margin-left: 16px;">
                                                        <label for="AutorizPessoa10">Pessoa autorizada-10</label>
                                                        <input type="AutorizPessoa10" id="Pessoa10" style="width: 255px;">
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