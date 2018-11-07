<?php
    if (isset($error)) {
        echo "<h3 style='color:red'>$error</h3>";
    }
    echo form_open("control/comprobar");
    echo "Usuario:<input type='text' name='nombre' /><br/>
          Contraseña:<input type='text' name='pass' /><br/>
          <input type='submit' />";
