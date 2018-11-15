<?php

echo "<h1>Almeria, tierra de cine</h1>";
            
if (isset($data["error"])) {
    echo "<h3 style='color:red'>".$error."</h3>";
}

//-------------------------------------------------------------------------------------------------------------------------------------

echo "
<div id='tablaLugares'>
    <h2>Lugares</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Longitud</th>
            <th>Latitud</th>
        </tr>";
foreach ($tablas["lugares"] as $lugares)
echo "
        <form method='post' action='index.php/comprobar_insert_lugar'>
        <tr>
            <td><input type='text' name='nombLug' value='" .$lugares["nombre"]. "' /></td>
            <td><textarea name='descLug'>" .$lugares["descripcion"]. "</textarea></td>
            <td><input type='text' name='longLug' value='" .$lugares["longitud"]. "' /></td>
            <td><input type='text' name='latLug' value='" .$lugares["latitud"]. "' /></td>
            <td><input type='submit' value='Modificar' /></td>
        </form>
        <form method='post' action='confirm_delete_lugares'>
            <input type='hidden' name='idLug' value='" .$lugares["id"]. "'/>
            <td><input type='submit' value='Eliminar' /></td>
        </tr>
        </form>";
                
echo "
        <form method='post' action='confirm_insert_lugar'>
        <tr>
            <td><input type='text' name='nombInsLug' /></td>
            <td><textarea type='text' name='descInsLug'></textarea></td>
            <td><input type='text' name='longInsLug' /></td>
            <td><input type='text' name='latInsLug' /></td>
            <td><input type='submit' value='Insertar' /></td>
        </tr>
        </form>
        </table>
</div>";

//-------------------------------------------------------------------------------------------------------------------------------------

echo "
<div id='tablaPeliculas'>
    <h2>Peliculas</h2>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Año</th>
            <th>Pais</th>
            <th>Cartel</th>
        </tr>";

foreach ($tablas["peliculas"] as $peliculas) {
    $img = '<img width="50" src="data:image/jpeg;base64,'.base64_encode($peliculas["cartel"]).'"/>';
    echo " 
            <form method='post' action='index.php'>
            <tr>
                <td><input type='text' name='titPel' value='" .$peliculas["titulo"]. "' /></td>
                <td><input type='text' name='anioPel' value='" .$peliculas["anio"]. "' /></td>
                <td><input type='text' name='paisPel' value='" .$peliculas["pais"]. "' /></td>
                <td align='center' >$img</td>
                <td><input type='submit' value='Modificar' /></td>
                </form>
            <form method='post' action='confirm_delete_peliculas'>
                <input type='hidden' name='idPel' value='" .$peliculas["id"]. "'/>
                <td><input type='submit' value='Eliminar' /></td>
            </tr>
            </form>";
    }
        
echo "  
        <form method='post' action='confirm_insert_peliculas'>   
        <tr>
            <td><input type='text' name='titInsPel' /></td>
            <td><input type='text' name='anioInsPel' /></td>
            <td><input type='text' name='paisInsPel' /></td>
            <td><input type='file' name='cartInsPel' /></td>
            <td><input type='submit' value='Insertar' /></td>
        </tr>
        </form>
    </table>
</div>";

//-------------------------------------------------------------------------------------------------------------------------------------

echo "
<div id='tablaLocalizacioens'>
    <h2>Localizaciones</h2>
    <table>
        <tr>
            <th>Descripcion</th>
            <th>Fotografia</th>
            <th>Lugar</th>
            <th>Pelicula</th>
        </tr>";
foreach ($tablas["localizaciones"] as $localizaciones)
    $img = '<input type="image" width="50" src="data:image/jpeg;base64,'.base64_encode($localizaciones["fotografia"]).'"/>';
    echo "
            <form method='post' action='index.php'>
            <tr>
                <td><textarea type='textarea'>" .$localizaciones["descripcion"]. "</textarea></td>
                <td align='center'>$img</td>
                <td><input type='text' name='lugLoc' value='" .$localizaciones["id_lugar"]. "' /></td>
                <td><input type='text' name='pelLoc' value='" .$localizaciones["id_pelicula"]. "' /></td>
                <td><input type='submit' value='Modificar' /></td>
                </form>
            <form method='post' action='confirm_delete_localizaciones'>
                <input type='hidden' name='idLoc' value='" .$localizaciones["id"]. "'/>
                <td><input type='submit' value='Eliminar' /></td>
            </tr>
            </form>";

echo "
        <form method='post' action='index.php'>
            <tr>
                <td><textarea name='descInsLoc'></textarea></td>
                <td><input type='file' name='descInsImg' /></td>
                <td><input type='text' name='email1' /></td>
                <td><input type='text' name='nick1' /></td>
                <input type='hidden' name='do' value='insertUser'/>
                <td><input type='submit' value='Insertar' /></td>
            </tr>
        </form>
    </table>
</div>";
