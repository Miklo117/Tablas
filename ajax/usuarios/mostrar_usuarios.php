<table class="table table-bordered table-hover">
    <thead>
        <th>id usuario</th>
        <th>nombre</th>
        <th>usuario</th>
        <th>ciudad</th>
        <th>tipo</th>
        <th>opcion</th>
    </thead>
    <tbody>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/tablas/includes/database.php");
$consulta=$db->query("select * from usuarios");
if($db->num_rows($consulta)>0)
{
    while($fila_usuario=$db->fetch_array($consulta))
    {
        echo "<tr>";
        echo "<td>".$fila_usuario['id']."</td>";
        echo "<td>".$fila_usuario['nombre']."</td>";
        echo "<td>".$fila_usuario['usuario']."</td>";
        echo "<td>".$fila_usuario['ciudad']."</td>";
        if($fila_usuario['tipo']=="1")
        {
            $tipo="Admin";
        }
        else
        {
            $tipo="Cliente";
        }
        echo "<td>".$tipo."</td>";
        if($fila_usuario['tipo']=="0")
        {
            echo "<td><button onclick=\"eliminar_usuario('".$fila_usuario['id']."')\"><i class='fa fa-eraser' aria-hidden='true'></button></i></td>";
        }
        else
        {
            echo "<td></td>";
        }
        echo "</tr>";
    }
}
?>
    </tbody>
</table>