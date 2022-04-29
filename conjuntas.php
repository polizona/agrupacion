<?PHP
	$hostname_localhost ="68.70.164.26";
	$database_localhost ="polizona_XX";
	$username_localhost ="polizona_XX";
	$password_localhost ="tu_password";
      include("index.php"); 

//realiza conexion
    $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
        if ($conexion) {
            $tabla= $_POST ['tabla'];
            $campo1= $_POST ['campo1'];
	        $campo2= $_POST ['campo2'];
    //registro a DB
               $consulta="create view conjuntas as select ".$campo1.", ".$campo2.", count(*)/(select count(*) from ".$tabla.") as Probabilidad from ".$tabla." where ".$campo1." in(select distinct ".$campo1." from ".$tabla.") and ".$campo2." in(select distinct ".$campo2." from ".$tabla.") group by ".$campo2.", ".$campo1." order by ".$campo1.", ".$campo2.";";
            $registro=mysqli_query($conexion,$consulta);
                //Confirmacion
               if ($registro) {
		mysqli_close($conexion);
                 echo "Registro almacenado. <br>";
               }
            else {
               echo "error en la ejecución del registro <br>";
            }
        }

?>
