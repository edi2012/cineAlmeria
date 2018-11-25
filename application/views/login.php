<script>
    function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "test/" + str, true);
        xmlhttp.send();
        }
    }
    
</script>

<?php
    if (isset($error)) {
        echo "<h3 style='color:red'>$error</h3>";
    }
    echo form_open("control/comprobar");
    echo "Usuario:<input type='text' name='nombre' onkeyup='showHint(this.value)' /><br/>
          Contraseña:<input type='text' name='pass' /><br/>
          <input type='submit' />
           <p>Prueba: <span id='txtHint'></span></p>
           </form>";