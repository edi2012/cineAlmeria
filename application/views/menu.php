<?php
    $listaLugares = $data["listaLugares"];
    $lsitaPeliculas = $data["listaPeliculas"];
    $listaLocalizaciones = $data["listaLocalizaciones"];

echo "<h1>Almeria, tierra de cine</h1>";
            
if (isset($data["msjUsu"])) {
    echo "<h3 style='color:red'>".$data["msjUsu"]."</h3>";
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
foreach ($listaLugares as $lugares)
echo "
        <form method='post' action='index.php'>
        <tr>
            <td><input type='text' name='nombLug' value='' /></td>
            <td><input type='text' name='descLug' value='' /></td>
            <td><input type='text' name='longLug' value='' /></td>
            <td><input type='text' name='latLug' value='' /></td>
            <td><a class='boton' href='#'>Eliminar</a></td>
            <input type='hidden' name='idusuario' value=''/>
            <input type='hidden' name='do' value='modUser'/>
            <td><input type='submit' value='Modificar' /></td>
        </tr>
        </form>";
                
echo "
        <form method='post' action='index.php'>
        <tr>
            <td><input type='text' name='nombInsLug' /></td>
            <td><input type='text' name='descInsLug' /></td>
            <td><input type='text' name='longInsLug' /></td>
            <td><input type='text' name='latInsLug' /></td>
            <input type='hidden' name='do' value='insertUser'/>
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
/* for ($i = 0; $i < count($list); $i++) {
                $user = $list[$i];*/
echo " 
        <form method='post' action='index.php'>
        <tr>
            <td><input type='text' name='titPel' value='' /></td>
            <td><input type='text' name='anioPel' value='' /></td>
            <td><input type='text' name='paisPel' value='' /></td>
            <td><input type='text' name='cartPel' value='' /></td>
            <td><a class='boton' href='#'>Eliminar</a></td>
            <input type='hidden' name='idusuario' value=''/>
            <input type='hidden' name='do' value='modUser'/>
            <td><input type='submit' value='Modificar' /></td>
        </tr>
        </form>";
        
echo "  
        <form method='post' action='index.php'>   
        <tr>
            <td><input type='text' name='titInsPel' /></td>
            <td><input type='text' name='anioInsPel' /></td>
            <td><input type='text' name='paisInsPel' /></td>
            <td><input type='text' name='cartInsPel' /></td>
            <input type='hidden' name='do' value='insertUser'/>
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
/* for ($i = 0; $i < count($list); $i++) {
                $user = $list[$i];*/
echo "
        <form method='post' action='index.php'>
        <tr>
            <td><input type='text' name='nombMod' value='' /></td>
            <td><input type='text' name='apeMod' value='' /></td>
            <td><input type='text' name='emailMod' value='' /></td>
            <td><input type='text' name='nickMod' value='' /></td>
            <td><a class='boton' href='#'>Eliminar</a></td>
            <input type='hidden' name='idusuario' value=''/>
            <input type='hidden' name='do' value='modUser'/>
            <td><input type='submit' value='Modificar' /></td>
        </tr>
        </form>";

echo "
        <form method='post' action='index.php'>
            <tr>
                <td><input type='text' name='nomb1' /></td>
                <td><input type='text' name='ape1' /></td>
                <td><input type='text' name='email1' /></td>
                <td><input type='text' name='nick1' /></td>
                <input type='hidden' name='do' value='insertUser'/>
                <td><input type='submit' value='Insertar' /></td>
            </tr>
        </form>
    </table>
</div>";
