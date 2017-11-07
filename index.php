<?php
require_once 'cad/CategoriaCad.php';
$datos = CategoriaCad::listarCategorias();
$unaC = null;
if(isset($_POST["accion"])){
   $co=@$_POST["codigo"]; 
   $nom=@$_POST["nombre"];
   require_once 'cad/CategoriaCad.php';
   if($_POST["accion"]=="Registrar"){
        if(CategoriaCad::registrar($nom)){
            $me= "Registrada";
        }else {
            $me= "No registrada";
        }
   }else if($_POST["accion"]=="Eliminar"){
        if(CategoriaCad::eliminar($co)){
            $me= "Eliminada";
        }else {
            $me= "No eliminada";
        }
   }else if($_POST['accion']=="Modificar"){
       require_once 'modelo/CategoriaModelo.php';
       $una = new CategoriaModelo();
       $id = $_POST['codigo'];
       $nombre = $_POST['nombre'];
       if(CategoriaCad::modificar($id,$nombre)){
           $me="Modificada";
       }else{
           $me="No modificada";
       }
   }else if($_POST['accion']=="Buscar"){
       require_once 'modelo/CategoriaModelo.php';
       $una = new CategoriaModelo();
       $id = $_POST['codigo'];
       $nombre = $_POST['nombre'];
       $unaC=CategoriaCad::bucarUnaCategoria($id);
           if($unaC != null){
           $me="se encontro";
           
           $unaC=$unaC->fetch_array();
           //print_r($unaC);
           
       }else{
           $me="No se encontro";
       }
   }
   else{
       $me="Accion no permitida";
   }
}

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST">
                 <table border="1" align="center">
                <thead>
                    <tr>
                        <th colspan="2">Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Codigo:</td>
                        <td><input type="text" name="codigo" value="<?php if($unaC == null){ echo "";}else{ echo $unaC['codigo'];} ?>" /></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="nombre" value="<?php if($unaC == null){ echo "";}else{ echo $unaC['nombre'];} ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            
                            <input type="submit" value="Registrar" name="accion" />
                            <input type="submit" value="Eliminar" name="accion" />
                            <input type="submit" value="Modificar" name="accion" />
                            <input type="submit" value="Buscar" name="accion" />
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo @$me;?></td>
                    </tr>
                </tbody>
            </table>
        </form>      
        
            <select>
                <option>--seleccion --</option>
                <?php 

		foreach ($datos as $key => $value) {
															
		 ?>
                <option <?= $value -> codigo ?> > <?= $value -> nombre ?> </option>
                <?php
                }
                ?>
            </select>
    </body>
</html>