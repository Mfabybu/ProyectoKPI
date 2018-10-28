
<?php 
$alert = '';
   if (!empty($_POST)){
      if (empty($_POST['nombre']) || empty($_POST['min']) || empty($_POST['max']))
      {
         $alert = 'Los Datos Son Obligatorios';
      }else{
         require_once"conexion.php";
         $nombre = $_POST['nombre'];
         $min = $_POST['min'];
         $max = $_POST['max'];

         $query = mysqli_query($conection,"SELECT * FROM conkpi WHERE nombre='$nombre' OR min='$min' OR max='$max'");
         $result = mysqli_num_rows($query);
         $query_insert = mysqli_query($conection, "INSERT INTO conkpi(nombre,min,max) VALUES ('$nombre','$min','$max')");

           
         
      }

   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de medición de KPI</title>
		
</head>
<body>
	<section id="container">

		<form action="" method="post">

			<h3>Crear KPI</h3>
			

         <input type="text" name="nombre" placeholder="Ingresar Nombre de KPI">
			<input type="text" name="min" placeholder="Ingresar Dato Minimo">
			<input type="text" name="max" placeholder="Ingresar Dato Maximo">
         <div class="alert"><?php echo isset($alert) ? $alert : '';  ?></div>
			<input type="submit" value="INGRESAR">

		</form>

    </section>
</body>	
</html>