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
        <tr>
            <td><input type='text' name='nombLug' value='" .$lugares["nombre"]. "' disabled /></td>
            <td><textarea name='descLug' disabled>" .$lugares["descripcion"]. "</textarea></td>
            <td><input type='text' name='longLug' value='" .$lugares["longitud"]. "' disabled /></td>
            <td><input type='text' name='latLug' value='" .$lugares["latitud"]. "' disabled /></td>
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
    echo " 
            <tr>
                <td><input type='text' name='titPel' value='" .$peliculas["titulo"]. "' disabled /></td>
                <td><input type='text' name='anioPel' value='" .$peliculas["anio"]. "' disabled /></td>
                <td><input type='text' name='paisPel' value='" .$peliculas["pais"]. "' disabled /></td>
                <td align='center' ><img width='50' src='" .$peliculas["cartel"]. "' disabled /></td>
            <form method='post' action='confirm_delete_peliculas'>
                <input type='hidden' name='idPel' value='" .$peliculas["id"]. "'/>
                <td><input type='submit' value='Eliminar' /></td>
            </tr>
            </form>";
    }
        
echo form_open_multipart('control/confirm_insert_peliculas');
echo "  
        <tr>
            <td><input type='text' name='titInsPel' /></td>
            <td><input type='text' name='anioInsPel' /></td>
            <td><input type='text' name='paisInsPel' /></td>
            <td><input type='file' name='userfile' size='20' /></td>
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
foreach ($tablas["localizaciones"] as $localizaciones) {    
    echo "
            <tr>
                <td><textarea type='textarea' disabled>" .$localizaciones["descripcion"]. "</textarea></td>
                <td align='center'><img width='50' src='" .$localizaciones["fotografia"]. "' disabled /></td>
                <td><input type='text' name='lugLoc' value='" .$localizaciones["id_lugar"]. "' disabled /></td>
                <td><input type='text' name='pelLoc' value='" .$localizaciones["id_pelicula"]. "' disabled /></td>
            <form method='post' action='confirm_delete_localizaciones'>
                <input type='hidden' name='idLoc' value='" .$localizaciones["id"]. "'/>
                <td><input type='submit' value='Eliminar' /></td>
            </tr>
            </form>";
    }
echo form_open_multipart('control/confirm_insert_localizaciones');
echo "
            <tr>
                <td><textarea name='descInsLoc'></textarea></td>
                <td><input type='file' name='userfile' size='20' /></td>
                <td>
                    <select name='lugar'>";
                        foreach ($tablas["lugares"] as $lugares)
                            echo "<option value='" .$lugares["nombre"]. "'>" .$lugares["nombre"]. "</option>";
                echo "</select>
                </td>
                <td>
                    <select name='pelicula'>";
                        foreach ($tablas["peliculas"] as $peliculas)
                            echo "<option value='" .$peliculas["titulo"]. "'>" .$peliculas["titulo"]. "</option>";
                echo "</select>
                </td>
                <td><input type='submit' value='Insertar' /></td>
            </tr>
        </form>
    </table>
</div>";