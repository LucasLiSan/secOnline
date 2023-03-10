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
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="_assets/_css/infostudent.css">
            <title>Prontuário Digital - Informação do aluno</title>
            <script src="_assets/_js/infostudent.js" defer></script>
            <?php 
                $nome = "Bento de Lima";
                $nasc = "27/05/2019";
                $age = "3";
                $race = "Branco";
                $sex = "Masculino";
                $bloodType = "O+";
                $filiacao_1 = "Karina Dias";
                $filiacao_2 = "Lucas de Lima";
                $nacional = "Brasil";
                $city = "Registro";
                $uf = "SP";
            ?>
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
                <a href="../index/index.php">INÍCIO</a>
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
                                            <div class="input_grp">
                                                <div class="input_wrap">
                                                    <label for="name">Nome</label>
                                                    <input type="text" id="name">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="birth">Data de nascimento</label>
                                                    <input type="date" name="birth" id="birth">
                                                </div>
                                                <div class="input_wrap">
                                                    <label for="age">Idade</label>
                                                    <input type="text" name="age" id="age">
                                                </div>
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
                                            <div class="input_wrap">
                                                <label for="city">Cidade</label>
                                                <input type="text" id="city">
                                            </div>
                                            <div class="input_wrap">
                                                <label for="country">País</label>
                                                <input type="text" id="country">
                                            </div>
                                        </div>
                                    </form>
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