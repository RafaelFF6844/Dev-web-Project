<?php plantilla ::aplicar();

$CI = &get_instance();
$factura =  new wan_factura();
$factura ->fecha = date('Y-m-d');

$factura->id=$id;

if($_POST){

//  $factura->id = $_POST['id'];

   foreach ($factura as $prop=>$val) {
   $factura-> $prop = $_POST[$prop];
  }
if($factura ->id >0){

      $CI->db->where('id',$factura->id);
    $CI->db->update('factura',$factura);

  }else{
         $CI->db->insert('factura',$factura);
          $factura->id=$CI->db->insert_id();
    }

$CI->db->query("delete from factura_detalle where factura='{$factura->id}'");

//Para los articulos
$art_nombre = $_POST['art_nombre'];
$art_precio = $_POST['art_precio'];
$art_cantidad = $_POST['art_cantidad'];
$art_subtotal = $_POST['art_subtotal'];

$todo = array();
foreach($art_nombre as $k=>$nombre){
$todo[]= array('factura'=>$factura->id,
'articulo'=>$nombre,
'cantidad'=>$art_cantidad[$k],
'precio'=>$art_precio[$k],
'subttotal'=>$art_subtotal[$k]);

$CI->db->insert_batch('factura_detalle',$todo);


}



}else if($id>0){
  $CI->db->where('id',$id);
  $rs = $CI->db->get('factura')->result();
  if(count($rs) > 0){
    $factura = $rs[0];
  }
}

?>

<h3>Factura## <?php echo $factura->id;?> </h3>
<form method="post" action="">
  <input type="hidden" value="<?php echo $factura->id; ?>"  name='id'/>

<div class="row">
  <div class="col col-md-6">
    <div class="input-group form-group">

  <label class="input-group-addon">Fecha:</label>
  <input value="<?php echo $factura->fecha; ?>" type="date" name="fecha" class="form-control"/>
</div>
</div>
</div>
<div class="row">
  <div class="col col-xs-6">
    <div class="input-group form-group">
      <label class="input-group-addon">RNC:</label>
      <input value="<?php echo $factura->rnc; ?>" type="text" name="rnc" class="form-control"/>
  </div>
</div>

<div class="col col-xs-6">
  <div class="input-group form-group">
    <label class="input-group-addon">Cliente: </label>
    <input value="<?php echo $factura->cliente; ?>" type="text" name="cliente" class="form-control"/>
  </div>
</div>
</div>
<div class="input-group form group">
  <label class="input-group-addon">Descripcion:</label>
<textarea class="form-control" name="descripcion"><?php echo $factura->descripcion; ?></textarea>
</div>

<div>
  <label>Detalle</label>
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
            <th>Precio</th>
                <th>Cantidad</th>
                    <th>Sub-total</th>
      </tr>

    </thead>
    <tbody id="f_tbody">
    </tbody>

  </table>
  <div class="text-right">


  </div>
</div>
<div class="row">
  <div class="col col-xs-6">
    <div class="input-group form-group">
      <label class="input-group-addon">Itebis:</label>
      <input type="text" id="itbis" name="itbis" class="form-control"/>
  </div>
</div>

<div class="col col-xs-6">
  <div class="input-group form-group">
    <label class="input-group-addon">Sub Total: </label>
    <input type="text" id="subtotal" name="subtotal" class="form-control"/>
  </div>
</div>
</div>
<div class="row">
  <div class="col col-md-offset-2  col-md-6 ">
    <div class="input-group form-group">
      <label class="input-group-addon">Total:</label>
      <input type="text" id="total" name="total" class="form-control"/>

  </div>
</div>
<div class="input-group form group">
  <label class="input-group-addon">Comentario:</label>
<textarea class="form-control" name="comentario">
</textarea>
</div>
</form>
<textarea id="text_plantilla" style="display:none">
  <td>
    <input  required value='{articulo}' class ="form-control" type="text" name="art_nombre[]"/>
  </td>
  <td>
    <input onkeyup="calcular()" required value='{precio}' class ="form-control" type="text" name="art_precio[]"/>
  </td>
  <td>
    <input onkeyup="calcular()" required value = '{cantidad}' class ="form-control" type="text" name="art_cantidad[]"/>
  </td>
  <td>
    <input required readonly value ='{subttotal}' class ="form-control"  type="text" name="art_subtotal[]"/>
  </td>

</textarea>
<iframe id="if_print"></iframe>
<script>

function imprimir(){
  document.getElementById('if_print').src='<?php echo base_url("factura/imprimir/$factura->id"); ?>';
}
function eliminar(btn){
  if(confirm("Quiere eliminar este articulo")){
    registro = btn.parentNode.parentNode;
    registro.parentNode.removeChild(registro);
  }

}


function my_num(num){
  rs=0;
  tmp=parseFloat(num);
  if(!isNaN(tmp)){
    rs=tmp;
  }
  return rs;

}

function calcular(){

  total=0;
  itbis=0;

  precio = document.getElementsByName('art_precio[]');
  cantidad =  document.getElementsByName('art_cantidad[]');
  subtotal =  document.getElementsByName('art_subtotal[]');

for(x=0; x< precio.length; x++){
sub = (my_num(precio[x].value) * my_num(cantidad[x].value)).toFixed(2);

subtotal[x].value = sub;
total += my_num(sub);

}

document.getElementById('subtotal').value = total;
it=total*0.18;
document.getElementById('itbis').value=it;
total =  total + it;
document.getElementById('total').value=total;


}
function nuevaFila(){
obj = {};
obj.articulo="";
obj.precio="";
obj.cantidad="";
obj.subttotal="";

agregarFila(obj);
}

function agregarFila(obj){
  tr = document.createElement('tr');
  cont = document.getElementById('text_plantilla').value;

for(prop in obj){
 cont = cont.replace('{'+prop+'}',obj[prop]);
}

  tr.innerHTML =cont;
document.getElementById('f_tbody').appendChild(tr);
}
</script>
<script>
 <?php

$det = $CI->db->query("select *from factura_detalle where factura = '{$factura->id}'")->result();

$json = json_encode($det);
echo "
detalle = {$json};

";
  ?>
  for(k in detalle){
    fila = detalle[k];
    agregarFila(fila);
  }
  print();

</script>
