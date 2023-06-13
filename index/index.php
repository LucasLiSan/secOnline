<!--
Adapted code from "Developer Profile Card using HTML and CSS - Coding Torque" (https://codingtorque.com/developer-profile-card-using-html-and-css/)
and "Glassmorphic Dashboard using HTML, CSS and JavaScript - Coding Torque". (https://codingtorque.com/glassmorphic-dashboard-using-html-css-and-javascript/)
Written by: 
 - Coding Torque - https://www.instagram.com/codingtorque/
 - Piyush Patil - https://twitter.com/PiyushPatil1243
 - @TurkAysenur - https://codepen.io/TurkAysenur
 - @code.scientist  - https://www.instagram.com/code.scientist/
 - @codingknights - https://www.instagram.com/codingknights/
-->

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
                integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
                crossorigin="anonymous"
            />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="_assets/_css/index.css"/>
            <script src="https://kit.fontawesome.com/aeb0f33aae.js" crossorigin="anonymous"></script>
            <title>Prontuário Digital</title>
        </head>
        <?php 
            $rm = htmlspecialchars($_GET["rm"]);
        ?>
        <body>
            <div class="video-bg">
                <video width="320" height="240" autoplay loop muted>
                 <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">
               Your browser does not support the video tag.
               </video>
            </div>
            <div class="profile_card">
                <div class="user_img">
                    <img src="../db_imgs/_profile.pictures/bento_profile.jpg" height="100" width="100" alt="profile">
                </div>
                <div class="user_details">
                    <h5>PRONTUÁRIO DIGITAL</h5>
                    <span><?php echo $rm ?></span>
                    <span>R.A.: 123.456.789-0</span>
                    <p>Maternal 2-C Integral</p>
                    <a href="#">EMERGÊNCIA</a>
                </div>
                <hr>
                <div class="btn-actions">
                    <ul class="social-media-icons">
                        <li>
                            <a href="../info/infostudent.php" class="contacts1"><i class="fas fa-mobile-alt"></i></a>
                            <p>INFOS</p>
                        </li>
                        <li>
                            <a href="../schoolgrades/schoolgrades.php" class="rend1"><i class="fas fa-microscope"></i></a>
                            <p>RENDIMENTO</p>
                        </li>
                    </ul>
                    <ul class="social-media-icons-2">
                        <li>
                            <a href="../documents/documents.php" class="docs1"><i class="fas fa-book-open"></i></a>
                            <p>DOCUMENTOS</p>
                        </li>
                        <li>
                            <a href="../requests/docrequest.php" class="solicit1"><i class="fas fa-file"></i></a>
                            <p>SOLICITAÇÕES</p>
                        </li>
                    </ul>
                </div>
            </div>
        </body>
    </html>