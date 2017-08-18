-----Cotización------
<script>

function cotizar{

if(isset($_POST["cotizando"])){
 
$Cantidad = $_POST["qty"];
$CostoFinal = $_POST["est-final"];
$CostoUnico = $_POST["est-cu"];
$CostoCiento = $_POST["est-100"];
$CostoMillar = $_POST["est-1000"];
$papel = $_POST["Papel"];


if ($Cantidad <= 99) {

$CostoFinal($CostoUnico + $CostoCiento + $CostoMillar + (($Cantidad-100) * ($CostoCiento/100)) + ($Cantidad * $CostoUnitario) + $papel);

 return $CostoFinal;


} else if ($Cantidad > 100) {

$CostoFinal = $CostoUnico + $CostoCiento + $CostoMillar + (($Cantidad-1000) * ($CostoMillar/1000)) + (($Cantidad-100) * ($CostoCiento/100)) + ($Cantidad * $CostoUnitario) + $papel;

 return $CostoFinal;

} else if ($Cantidad > 1000) {

 $CostoFinal = $CostoUnico + $CostoCiento + $CostoMillar + (($Cantidad-1000) * ($CostoMillar/1000)) + (($Cantidad-100) * ($CostoCiento/100)) + ($Cantidad * $CostoUnitario) + $papel;

 return $CostoFinal;
 
}else
{
    echo 'Hay un error;';
}
}
}
?>
</script>


