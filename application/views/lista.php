<?php
    echo "<h1>Lista</h1>";
    echo "<table style='border:1px solid black; padding:10px'>
                        <tr>
                            <th>Titulo</th>
                            <th>Año</th>
                            <th>Pais</th>
                            <th>Cartel</th>
                        </tr>";
   //foreach ($list as $cine)
                echo "  <form method='post' action='index.php'>
                        <tr>
                            <td><input type='text' name='nombMod' value='' /></td>
                            <td><input type='text' name='apeMod' value='' /></td>
                            <td><input type='text' name='emailMod' value='' /></td>
                            <td><input type='text' name='nickMod' value='' /></td>
                        </tr>
                        </form>
                    </table>
                </div>";
?>