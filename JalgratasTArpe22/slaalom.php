<?php
    require_once ("config.php");
    if (!empty($_REQUEST["korras_id"])){
        $command=$connectionString->prepare("UPDATE jalgrattaeksam SET slaalom=2 WHERE id=?");
        $command->bind_param("i", $_REQUEST["korras_id"]);
        $command->execute();
    }
    if (!empty($_REQUEST["vigane_id"])){
        $command=$connectionString->prepare("UPDATE jalgrattaeksam SET slaalom=2 WHERE id=?");
        $command->bind_param("i", $_REQUEST["vigane_id"]);
        $command->execute();
    }
    $command=$connectionString->prepare("SELECT id, eesnimi, perekonna FROM jalgrattaeksam WHERE teooriatulemus>=9 AND slaalom=1");
    $command->bind_result($id, $eesnimi, $perekonnanimi);
    $command->execute();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slaalom</title>
</head>
<body>
    <table>
        <?php
            while($command->fetch()){
                echo "
                    <tr>
                        <td>$eesnimi</td>
                        <td>perekonnanimi<td>
                        <td>
                            <a href='?korras_id=$id'>Korras</a>
                            <a href='?vigane_id=$id'>Ebaõnnestunud</a>
                    </tr>
                ";
            }
            ?>
    </table>
</body>
</html>