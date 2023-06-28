<!--
Adapted code from "Developer Profile Card using HTML and CSS - Coding Torque" (https://codingtorque.com/developer-profile-card-using-html-and-css/),
"Glassmorphic Dashboard using HTML, CSS and JavaScript - Coding Torque" (https://codingtorque.com/glassmorphic-dashboard-using-html-css-and-javascript/)
and "Starwars Product Card Using HTML And CSS" (https://codingtorque.com/starwars-product-card-using-html-css/).
Written by: 
 - Coding Torque - https://www.instagram.com/codingtorque/
 - Piyush Patil - https://twitter.com/PiyushPatil1243
 - @TurkAysenur - https://codepen.io/TurkAysenur
 - @code.scientist  - https://www.instagram.com/code.scientist/
 - @codingknights - https://www.instagram.com/codingknights/
 - @prvnbist - https://codepen.io/prvnbist
-->

<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
                integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
                crossorigin="anonymous" />
            <link rel="stylesheet" href="_assets/_css/grades.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="_assets/_js/grades.js" type="text/javascript"></script>
            <title>Prontuário Digital - Boletim</title>
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
            $dados = "SELECT nome, ra, ra_dg, turma, periodo FROM alunos WHERE rm='$rm'";
            $result = $conn->query($dados);
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
                <h5>RENDIMENTO DO ALUNO</h5>
                <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<span>".$row['nome']."</span>";
                        echo "<span>"."R.A.: ".$row['ra']."-".$row['ra_dg']."</span>";
                        echo "<p>".$row['turma']." ".$row['periodo']."</p>";
                    }
                ?>
                <a href="../index/index.php<?php echo "?rm=".$rm ?>">INÍCIO</a>
                <hr>
            </div>
            <div class="card">
                <div class="left">
                    <img class="wordmark" src="../db_imgs/_pictures/back_grades.png" alt="nome-ue">
                </div>
                <div class="right"><img id="bim-choice" class="bimestre" src="../db_imgs/_pictures/bim4.png" alt="bimestres">
                    <div class="boletim">
                        <h1>BOLETIM - 2023</h1>
                        <h2>BENTO DE OLIVEIRA LIMA SANTANA</h2>
                        <div class="details">
                            <div class="notas">
                                <p class="bim1">1º</p>
                                <p class="bim2">2º</p>
                                <p class="bim3">3º</p>
                                <p class="bim4">4º</p>
                                <h4>L.O.E.</h4>
                                <p class="bim1">10</p>
                                <p class="bim2">10</p>
                                <p class="bim3">10</p>
                                <p class="bim4">10</p>
                                <h4>MATEMÁTICA</h4>
                                <p class="bim1">10</p>
                                <p class="bim2">10</p>
                                <p class="bim3">10</p>
                                <p class="bim4">10</p>
                                <h4>EDUC. FÍSICA</h4>
                                <p class="bim1">10</p>
                                <p class="bim2">10</p>
                                <p class="bim3">10</p>
                                <p class="bim4">10</p>
                                <h4>ARTES</h4>
                                <p class="bim1">10</p>
                                <p class="bim2">10</p>
                                <p class="bim3">10</p>
                                <p class="bim4">10</p>
                                <h4>GEOGRAFIA</h4>
                                <p class="bim1">10</p>
                                <p class="bim2">10</p>
                                <p class="bim3">10</p>
                                <p class="bim4">10</p>
                                <h4>HISTÓRIA</h4>
                                <p class="bim1">10</p>
                                <p class="bim2">10</p>
                                <p class="bim3">10</p>
                                <p class="bim4">10</p>
                                <h4>CIÊNCIAS</h4>
                                <p class="bim1">10</p>
                                <p class="bim2">10</p>
                                <p class="bim3">10</p>
                                <p class="bim4">10</p>
                            </div>
                            <div class="frequencia">
                                <h3>100%</h3>
                                <h4>FREQUÊNCIA</h4>
                            </div>
                        </div>
                        <button>GERAR</button>
                    </div>
                </div>
            </div>
        </body>
    </html>
