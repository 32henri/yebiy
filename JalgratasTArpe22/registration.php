<?php
    requier_once("config.php");
    if(isSet($_REQUEST["sisestusnupp"])){
        $command=$connectionString->prepare(query:"INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi)VALUES (?, ? )");
        $command->bind_param(types: "ss", $_REQUEST["eesnimi"], $_REQUEST["perekonnanimim"]); $command->execute();
        $connectionString->close();
        header("Location: $_SERVER[PHP_SELF]?lisatudeesnimi=$_REQUEST[eesnimi]"); exit
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kasutaja Registreerimine</title>
</head>
<body>
    <h1>Registreerimine</h1>
    <?php
        if(isSet($_REQUEST["lisatudeesnimi"])){
            echo "Lisati $_REQUEST[lisatudeesnimi]";
        }
    ?>
    <form action="?">
        <dl>
            <dt>Eesnimi:</dt>
            <dd><input type="text" names="eesnimi" /><dd>
            <dt>Perekonnanimi:</dt>
            <dd><input type="text" names="perekonnamimi" /><dd>
            <dt><input type="submit" names="sisestusnupp" value="sisesta" /></dt>
        </dl>
    </form>
</body>
</html>