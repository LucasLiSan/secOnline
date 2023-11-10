<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pgdatabase";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Loop through each form

        //$formCount = isset($_POST['formCount']) ? intval($_POST['formCount']) : 1;
        $maxFormNumber = isset($_POST['formCount']) ? intval($_POST['formCount']) : 1;

        for ($i = 1; $i <= $maxFormNumber; $i++) {
            // Get data from the form
            $cod = isset($_POST["cod-$i"]) ? $_POST["cod-$i"] : '';
            $item = isset($_POST["item-$i"]) ? $_POST["item-$i"] : '';
            $marca = isset($_POST["marca-$i"]) ? $_POST["marca-$i"] : '';
            $modelo = isset($_POST["modelo-$i"]) ? $_POST["modelo-$i"] : '';
            $condicao = isset($_POST["condicao-$i"]) ? $_POST["condicao-$i"] : '';
            $local = isset($_POST["local-$i"]) ? $_POST["local-$i"] : '';
            $ue = isset($_POST["ue-$i"]) ? $_POST["ue-$i"] : '';
            $aquisicao = isset($_POST["aquisicao-$i"]) ? $_POST["aquisicao-$i"] : '';
            $valor = isset($_POST["valor-$i"]) ? $_POST["valor-$i"] : '';
            $cor = isset($_POST["cor-$i"]) ? $_POST["cor-$i"] : '';
            $largura = isset($_POST["largura-$i"]) ? $_POST["largura-$i"] : '';
            $undMedLarg = isset($_POST["undMedLarg-$i"]) ? $_POST["undMedLarg-$i"] : '';
            $altura = isset($_POST["altura-$i"]) ? $_POST["altura-$i"] : '';
            $undMedAlt = isset($_POST["undMedAlt-$i"]) ? $_POST["undMedAlt-$i"] : '';
            $comprimento = isset($_POST["comprimento-$i"]) ? $_POST["comprimento-$i"] : '';
            $undMedComp = isset($_POST["undMedCompr-$i"]) ? $_POST["undMedCompr-$i"] : '';
            $espessura = isset($_POST["espessura-$i"]) ? $_POST["espessura-$i"] : '';
            $undMedEspe = isset($_POST["undMedEspe-$i"]) ? $_POST["undMedEspe-$i"] : '';
            $profundidade = isset($_POST["profundidade-$i"]) ? $_POST["profundidade-$i"] : '';
            $undMedProfund = isset($_POST["undMedProfund-$i"]) ? $_POST["undMedProfund-$i"] : '';
            $diametro = isset($_POST["diametro-$i"]) ? $_POST["diametro-$i"] : '';
            $undMedDiametro = isset($_POST["undMedDiametro-$i"]) ? $_POST["undMedDiametro-$i"] : '';
            $largTampo = isset($_POST["largTampo-$i"]) ? $_POST["largTampo-$i"] : '';
            $undMedLargTampo = isset($_POST["undMedLargTampo-$i"]) ? $_POST["undMedLargTampo-$i"] : '';
            $compTampo = isset($_POST["compTampo-$i"]) ? $_POST["compTampo-$i"] : '';
            $undMedCompTampo = isset($_POST["undMedCompTampo-$i"]) ? $_POST["undMedCompTampo-$i"] : '';
            $espessuraTampo = isset($_POST["espessuraTampo-$i"]) ? $_POST["espessuraTampo-$i"] : '';
            $undMedEspeTampo = isset($_POST["undMedEspeTampo-$i"]) ? $_POST["undMedEspeTampo-$i"] : '';
            $altPernas = isset($_POST["altPernas-$i"]) ? $_POST["altPernas-$i"] : '';
            $undMedAltPernas = isset($_POST["undMedAltPernas-$i"]) ? $_POST["undMedAltPernas-$i"] : '';
            $espessuraPernas = isset($_POST["espessuraPernas-$i"]) ? $_POST["espessuraPernas-$i"] : '';
            $undMedEspesPernas = isset($_POST["undMedEspesPernas-$i"]) ? $_POST["undMedEspesPernas-$i"] : '';
            $qtdPerna = isset($_POST["qtdPerna-$i"]) ? $_POST["qtdPerna-$i"] : '';
            $qtdPorta = isset($_POST["qtdPorta-$i"]) ? $_POST["qtdPorta-$i"] : '';
            $qtdPrate = isset($_POST["qtdPrate-$i"]) ? $_POST["qtdPrate-$i"] : '';
            $qtdGav = isset($_POST["qtdGav-$i"]) ? $_POST["qtdGav-$i"] : '';
            $qtdHelice = isset($_POST["qtdHelice-$i"]) ? $_POST["qtdHelice-$i"] : '';
            $qtdVelox = isset($_POST["qtdVelox-$i"]) ? $_POST["qtdVelox-$i"] : '';
            $qtdPol = isset($_POST["qtdPol-$i"]) ? $_POST["qtdPol-$i"] : '';
            $btu = isset($_POST["btu-$i"]) ? $_POST["btu-$i"] : '';
            $addInfo = isset($_POST["addInfo-$i"]) ? $_POST["addInfo-$i"] : '';
            $chave = isset($_POST["chave-$i"]) ? $_POST["chave-$i"] : '';
            $timeStamp = time();

            // Insert data into the database
            $sql = "INSERT INTO patrimonio (id, item, marca, modelo, condicao, localizacao, ue, lastCheck, valor, dataAquisit, cor, largura, undMedLarg, altura, undMedAlt, comprimento, undMedCompr, espessura, undMedEspe, profundidade, undMedProfund, diametro, undMedDiametro, compTampo, undMedCompTampo, espessuraTampo, undMedEspeTampo, largTampo, undMedLargTampo, altPernas, undMedAltPernas, espessuraPernas, undMedEspesPernas, qtdPortas, qtdPrateleiras, qtdGavetas, qtdHelices, qtdVelox, qtdPernas, chaveamento, telaPolegadas, arCondBTU, infoAdd) VALUES ($cod, '$item', '$marca', '$modelo', '$condicao', '$local', '$ue', '$timeStamp', '$valor', '$aquisicao', '$cor', '$largura', '$undMedLarg', '$altura', '$undMedAlt', '$comprimento', '$undMedComp', '$espessura', '$undMedEspe', '$profundidade', '$undMedProfund', '$diametro', '$undMedDiametro', '$compTampo', '$undMedCompTampo', $espessuraTampo, '$undMedEspeTampo', '$largTampo', '$undMedLargTampo', '$altPernas', '$undMedAltPernas', '$espessuraPernas', '$undMedEspesPernas', $qtdPorta, $qtdPrate, $qtdGav, $qtdHelice, $qtdVelox, $qtdPerna, '$chave', $qtdPol, $btu, '$addInfo')";
            if ($conn->query($sql) === TRUE) {
                echo "Record $i inserted successfully.<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
?>
