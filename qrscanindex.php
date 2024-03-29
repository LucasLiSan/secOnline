<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>LOCALIZE O ALUNO</title>
            <script src="./node_modules/html5-qrcode/html5-qrcode.min.js"></script>
            <link rel="stylesheet" href="qrscanindex.css">
        </head>
        <body>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <div class="video-bg">
                <video width="320" height="240" autoplay loop muted>
                 <source src="https://assets.codepen.io/3364143/7btrrd.mp4" type="video/mp4">
               Your browser does not support the video tag.
               </video>
            </div>
            <div class="conteiner">
                <h1>PRONTUÁRIO DIGITAL</h1>
                <h2>Use o QR CODE para localizar o aluno</h2>
                <main>
                    <div id="reader"></div>
                    <div id="result"></div>
                </main>
            </div>
            <script>
                const scanner = new Html5QrcodeScanner('reader', {
                    qrbox: {
                        width: 250,
                        height: 250,
                    },
                    fps: 20,
                });
                scanner.render(success, error);
                function success(result) {
                    document.getElementById('result').innerHTML =  `<form id="form" action="index/index.php" method="get">` +
                        `<input type="hidden" name="rm" value="${result}">` +
                        `</form>`;
                    //window.location.replace(String(result));
                    //scanner.clear();
                    //document.getElementById('reader').remove();
                    document.getElementById("form").submit();
                }
                function error(err) {
                    console.error(err);
                }
            </script>
        </body>
    </html>