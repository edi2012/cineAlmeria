<?php 
    foreach ($list_users as $user) {
          echo "<tr>";
          echo "<td>".$user['username']."</td><td>".$user['email']."</td><td>".$user['telef']."</td><td><img src='".base_url("uploads")."/".$user['img']."'/></td>";
          echo "<td><a href='users/update_user/".$user['id']."'>Modificar</a></td>";
          echo "<td><a href='users/delete_user/".$user['id']."'>Eliminar</a></td>";
          echo "</tr>";
      }
?>