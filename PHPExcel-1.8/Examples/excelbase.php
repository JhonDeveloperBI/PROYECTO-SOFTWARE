<?php
 /* Ejemplo 1 generando excel desde mysql con PHP
    @Autor: Carlos Hernan Aguilar Hurtado
 */
 
$host="127.0.0.1:3307";
$user="root";
$password="12345";
$db="software";
$con = new mysqli($host,$user,$password,$db);

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $output = ''; 
$result = "SELECT * FROM establecimientos"; 

//$result = $con->query($sql1) or die (mysqli_error());
$query = $con->query($result) or die (mysqli_error());


if(mysqli_num_rows($query) > 0)  
      {  
           $output .= '  
                <table class="table" border="5">  
                     <tr>  
                          <th>Nombre</th>  
                          <th>Direccion</th>  
                          <th>Telefono</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($query))  
           {  
                $output .= '  
                     <tr>  
                          <td>'.$row["nombre"].'</td>  
                          <td>'.$row["direccion"].'</td>  
                          <td>'.$row["telefono"].'</td>  
                     </tr>  
                ';  
           }  

$output .= '</table>';  
           header("Content-Type: application/xls");   
           header("Content-Disposition: attachment; filename=download.xls");  
           echo $output; 



}















/*
 $registros = mysqli_num_rows ($query);
 
 if ($registros > 0) {
   require_once '../Classes/PHPExcel.php';
   $objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("ingenieroweb.com.co")
        ->setLastModifiedBy("ingenieroweb.com.co")
        ->setTitle("Exportar excel desde mysql")
        ->setSubject("Ejemplo 1")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("ingenieroweb.com.co  con  phpexcel")
        ->setCategory("ciudades");    

   $i = 1;    
   while ($registro = mysqli_fetch_assoc ($query)) {
       
       
      $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $registro->nombre);
            ->setCellValue('A1'.$i, $registro->direccion);
                       
  $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);


  $col=1;
 foreach($registro as $key=>$value) {
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $i, $value);
        $col++;
    }
$i++;

      
   }
}
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="ejemplo1.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
*/





?>