<?php
require_once("config-php");
    if (!empty($_REQUEST["teooriatulemus"])){
        $command=$connectionString->prepare("SELECT id, eesnimi, perekonnanimi FROM jalgrattaeksam WHERE teooriatulemus = -1")
        $command->bind_result($id, $eesnimi, $perekonnanimi);
        $command->execute();?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Teooriaeksam</title>
        </head>
        <body>
            <table>
                <?php
                while($command->fetch()){
                    echo "
                    <tr>
                        <td>$eesnimi</td>
                        <td>$perekonnanimi</td>
                        <td>
                            <form action=''>
                                <input type='hidden' name='id' value='$id' />
                                <input type='text' name='teooriatulemus' />
                                <input type='submit' value='Sisesta tulemus' />
                            </form>
                        </td>
                    </tr>
                    ";}?>
            </table>
        </body>
    </html>