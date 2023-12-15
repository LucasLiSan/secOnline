<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
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

    // Function to sanitize and validate input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Loop through each form
    for ($i = 1; $i <= $_POST['formCount']; $i++) {
        // Sanitize and validate data
        $cod = test_input($_POST["cod-$i"]);
        $item = test_input($_POST["item-$i"]);
        $marca = test_input($_POST["marca-$i"]);
        $modelo = test_input($_POST["modelo-$i"]);
        $condicao = test_input($_POST["condicao-$i"]);

        // SQL query to insert data into the database
        $sql = "INSERT INTO patrimonio (id, item, marca, modelo, condicao) VALUES ('$cod', '$item', '$marca', '$modelo', '$condicao')";

        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully for Form $i";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}
/*
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pgdatabase";

    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    if (isset($_POST['submitForm'])) {
        // Loop through each form

        //$formCount = isset($_POST['formCount']) ? intval($_POST['formCount']) : 1;
        //$formCount = $_POST['formCount'];
        echo '<pre>'; 
        print_r($_POST); 
        echo '</pre>';
        for ($i = 1; $i <= $_POST['formCount']; $i++) {
            // Get data from the form
            $cod = isset($_POST['cod-' . $i]) ? $_POST['cod-' . $i] : null;
            $item = isset($_POST['item-' . $i]) ? $_POST['item-' . $i] : null;
            $marca = isset($_POST['marca-' . $i]) ? $_POST['marca-' . $i] : null;
            $modelo = isset($_POST['modelo-' . $i]) ? $_POST['modelo-' . $i] : null;
            $condicao = isset($_POST['condicao-' . $i]) ? $_POST['condicao-' . $i] : null;

            /*$local = $_POST["local-$i"];
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
            //$timeStamp = time();

            // Insert data into the database
            $stmt = $mysqli->prepare("INSERT INTO patrimonio (id, item, marca, modelo, condicao) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $cod, $item, $marca, $modelo, $condicao);
            $stmt->execute();
            $stmt->close();

            /*$sql = "INSERT INTO patrimonio (id, item, marca, modelo, condicao, lastCheck) VALUES ($cod, '$item', '$marca', '$modelo', '$condicao', '$timeStamp')";
            if ($conn->query($sql) === TRUE) {
                echo "Record $i inserted successfully.<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        header("Location: patCadastro.php");
        exit();
    }

    $mysqli->close();*/
?>
