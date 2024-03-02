 <?php

 $con = mysqli_connect('localhost', 'root', '', 'bd_generica');

 $filename = "bd-generica.json";

 $data = file_get_contents($filename);

 $array = json_decode($data, true);

foreach ($array as $value) {

  $query = "INSERT INTO `historico_uf`(`id`, `nombreIndicador`, `codigoIndicador`, `unidadMedidaIndicador`, `valorIndicador`, `fechaIndicador`, `tiempoIndicador`, `origenIndicador`) VALUES ('".$value['id']."','".$value['nombreIndicador']."','".$value['codigoIndicador']."','".$value['unidadMedidaIndicador']."','".$value['valorIndicador']."','".$value['fechaIndicador']."','".$value['tiempoIndicador']."','".$value['origenIndicador']."')";

  mysqli_query($con,$query);

}

echo "Data inserted successfully";