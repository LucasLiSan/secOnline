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
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="_assets/_css/infostudent.css">
            <title>Prontuário Digital - Informação do aluno</title>
            <script src="_assets/_js/infostudent.js" defer></script>
        </head>
        <body>
            <div class="video-bg">
                <video width="320" height="240" autoplay loop muted>
                 <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">
               Your browser does not support the video tag.
               </video>
            </div>
            <div class="user_img">
                <img src="../db_imgs/_profile.pictures/bento_profile.jpg" height="100" width="100" alt="profile">
            </div>
            <div class="user_details">
                <h5>INFORMAÇÕES DO ALUNO</h5>
                <span>BENTO</span>
                <span>R.A.: 123.456.789-0</span>
                <p>Maternal 2-C Integral</p>
                <a href="../index/index.html">INÍCIO</a>
                <hr>
            </div>
            <article class="tabs content--flow">
                <aside class="sidebar">
                    <nav role="tablist" class="tab__navigation">
                        <button role="tab" aria-selected="true" class="tab__button" id="1">
                            <span class="icon__for--tab">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="text__for--tab">Geral</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="2">
                            <span class="icon__for--tab">
                                <i class="fas fa-id-card"></i>
                            </span>
                            <span class="text__for--tab">Documentos</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="3">
                            <span class="icon__for--tab">
                                <i class="fas fa-phone"></i>
                            </span>
                            <span class="text__for--tab">Contatos</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="4">
                            <span class="icon__for--tab">
                                <i class="fas fa-clipboard"></i>
                            </span>
                            <span class="text__for--tab">Autorizações</span>
                        </button>
                        <button role="tab" aria-selected="false" class="tab__button" id="5">
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
                                                <input type="text" id="name" name="name">
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
                                                    <input type="date" name="birth" id="birth">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="age">Idade</label>
                                                    <input type="text" name="age" id="age">
                                                </div>
                                                <div class="input_wrap">
                                                    <label>Sexo</label>
                                                    <ul>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="gender" value="male" class="input_radio">
                                                                <span>Masculino</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label class="radio_wrap">
                                                                <input type="radio" name="gender" value="female" class="input_radio">
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
                                                        <option value="1" title="Branca">Branca</option>
                                                        <option value="2" title="Preta">Preta</option>
                                                        <option value="4" title="Amarela">Amarela</option>
                                                        <option value="3" title="Parda">Parda</option>
                                                        <option value="5" title="Indigena">Indigena</option>
                                                        <option value="6" title="NÃO DECLARADA">NÃO DECLARADA</option>
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
                                                <div class="input_wrap">
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
                                                <div class="input_wrap">
                                                    <label for="deficienciaTipo">Deficiência</label>
                                                    <input type="text" id="nameTwins" name="deficienciaTipo">
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
                                                <div class="input_wrap">
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
                                                <div class="input_wrap">
                                                    <label for="deficienciaTipo">Alergias</label>
                                                    <input type="text" id="nameTwins" name="deficienciaTipo">
                                                </div>
                                            </div>
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
                                                <div class="input_wrap">
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
                                                <div class="input_wrap">
                                                    <label for="deficienciaTipo">Deficiência</label>
                                                    <input type="text" id="nameTwins" name="deficienciaTipo">
                                                </div>
                                            </div>
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
                                                <div class="input_wrap">
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
                                                <div class="input_wrap">
                                                    <label for="deficienciaTipo">Deficiência</label>
                                                    <input type="text" id="nameTwins" name="deficienciaTipo">
                                                </div>
                                            </div>
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
                                                <div class="input_wrap">
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
                                                <div class="input_wrap">
                                                    <label for="deficienciaTipo">Deficiência</label>
                                                    <input type="text" id="nameTwins" name="deficienciaTipo">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" aria-labelledby="2" hidden>
                            <h1 class="title">DOCUMENTOS</h1>
                            <span class="span-tag"><i class="fas fa-id-card"></i></span>
                            <p class="text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi iste nemo debitis porro quisquam incidunt tempora vero et tempore ipsa exercitationem esse officiis eum molestiae facilis impedit cum, voluptas architecto.
                            </p>
                        </div>
                        <div role="tabpanel" aria-labelledby="3" hidden>
                            <h1 class="title">CONTATOS</h1>
                            <span class="span-tag"><i class="fas fa-phone"></i></span>
                            <p class="text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi iste nemo debitis porro quisquam incidunt.
                            </p>
                        </div>
                        <div role="tabpanel" aria-labelledby="4" hidden>
                            <h1 class="title">AUTORIZAÇÕES</h1>
                            <span class="span-tag"><i class="fas fa-clipboard"></i></span>
                            <p class="text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </p>
                        </div>
                        <div role="tabpanel" aria-labelledby="5" hidden>
                            <h1 class="title">MATRÍCULAS ANTERIORES</h1>
                            <span class="span-tag"><i class="fas fa-school"></i></span>
                            <p class="text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi iste nemo debitis porro quisquam incidunt tempora vero et tempore ipsa.
                            </p>
                        </div>
                    </div>
                </main>
            </article>
            <footer></footer>
        </body>
    </html>