var RegionesYcomunas = {

  "regiones": [
  {
    "NombreRegion": "COQUIMBO",
    "comunas": ["LA SERENA"]
  },
  {
    "NombreRegion": "VALPARAISO",
    "comunas": [ "VIÑA DEL MAR"]
  },
  {
    "NombreRegion": "REGIÓN DE LA ARAUCANIA",
    "comunas": ["PUCON"]
  },
  {
    "NombreRegion": "REGIÓN DE LOS LAGOS",
    "comunas": ["PUERTO VARAS"]
  },
  ]
}


jQuery(document).ready(function () {

  var iRegion = 0;
  var htmlRegion = '<option value="sin-region">SELECCIONE REGIÓN</option><option value="sin-region">--</option>';
  var htmlComunas = '<option value="sin-region">SELECCIONE COMUNA</option><option value="sin-region">--</option>';

  jQuery.each(RegionesYcomunas.regiones, function () {
    htmlRegion = htmlRegion + '<option value="' + RegionesYcomunas.regiones[iRegion].NombreRegion + '">' + RegionesYcomunas.regiones[iRegion].NombreRegion + '</option>';
    iRegion++;
  });

  jQuery('#regiones').html(htmlRegion);
  jQuery('#comunas').html(htmlComunas);

  jQuery('#regiones').change(function () {
    var iRegiones = 0;
    var valorRegion = jQuery(this).val();
    var htmlComuna = '<option value="sin-comuna">SELECCIONE COMUNA</option><option value="sin-comuna">--</option>';
    jQuery.each(RegionesYcomunas.regiones, function () {
      if (RegionesYcomunas.regiones[iRegiones].NombreRegion == valorRegion) {
        var iComunas = 0;
        jQuery.each(RegionesYcomunas.regiones[iRegiones].comunas, function () {
          htmlComuna = htmlComuna + '<option value="' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '">' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '</option>';
          iComunas++;
        });
      }
      iRegiones++;
    });
    jQuery('#comunas').html(htmlComuna);
  });
  jQuery('#comunas').change(function () {
    if (jQuery(this).val() == 'sin-region') {
      alert('selecciones Región');
    } else if (jQuery(this).val() == 'sin-comuna') {
      alert('selecciones Comuna');
    }
  });
  jQuery('#regiones').change(function () {
    if (jQuery(this).val() == 'sin-region') {
      alert('selecciones Región');
    }
  });

});


function validarCampos() {
  var region = $('#regiones').val();
  var comuna = $('#comunas').val();
  var rut = $('#rut').val();
  var nombres = $('#nombres').val();
  var apellidos = $('#apellidos').val();
  var fecha_nacimiento = $('#fecha_nacimiento').val();
  var direccion = $('#direccion').val();
  var telefono = $('#telefono').val();

  if (region=='sin-region'||comuna=='sin-comuna'||rut==''||nombres==''||apellidos==''||fecha_nacimiento==''||direccion==''||telefono==''){
   alert('Debe completar todos los campos');
 } else {
  $('#guardar').submit();
  console.log('todo listo');
}
}




function validarDepartamentoModificar() {

  var region = $('#regiones').val();
  var comuna = $('#comunas').val();
  var codigo_departamento = $('#codigo_departamento').val();
  var numero = $('#numero').val();
  var direccion = $('#direccion').val();
  var habitaciones = $('#cantidad_habitaciones').val();
  var banos = $('#cantidad_banos').val();

  if (codigo_departamento==''){
    $('#codigo_departamento').focus();
    return false;
  }
  if (numero==''){
    $('#numero').focus();
    return false;
  }
  if (direccion==''){
    $('#direccion').focus();
    return false;
  }
  if (region=='sin-region'){
    $('#regiones').focus();
    return false;
  }
  if (comuna=='sin-comuna'){
    $('#comunas').focus();
    return false;
  }
  if (habitaciones==''){
    $('#cantidad_habitaciones').focus();
    return false;
  }
  if (banos==''){
    $('#cantidad_banos').focus();
    return false;
  }
    $('#guardar').submit();
}

function limpiarFormDepartamento() 
{
  document.getElementById("regiones").value = "";
  document.getElementById("comunas").value = "";
  document.getElementById("codigo_departamento").value = "";
  document.getElementById("numero").value = "";
  document.getElementById("direccion").value = "";
  document.getElementById("cantidad_habitaciones").value = "";
  document.getElementById("cantidad_banos").value = "";
}




function valideKey(evt){

   // code is the decimal ASCII representation of the pressed key.
   var code = (evt.which) ? evt.which : evt.keyCode;
   
   if(code==8) { // backspace.
     return true;
   } else if(code>=48 && code<=57) { // is a number.
     return true;
   } else{ // other keys.
     return false;
   }
 }

function validarReserva() {

  var region = $('#regiones').val();
  var comuna = $('#comunas').val();
  var codigo_departamento = $('#cod_departamento :selected').val();
  var fecha_desde = $('#fecha_desde').val();
  var fecha_hasta = $('#fecha_hasta').val();


  if (fecha_desde==''){
    $('#fecha_desde').focus();
    return false;
  }
  if (fecha_hasta<fecha_desde){
    alert('LA FECHA DE TERMINO NO PUEDE SER ANTERIOR A LA FECHA DE INICIO');
    $('#fecha_hasta').focus();
    return false;
  }
  if (cod_departamento==''){
    $('#cod_departamento').focus();
    return false;
  }
  if (region=='sin-region'){
    $('#regiones').focus();
    return false;
  }
  if (comuna=='sin-comuna'){
    $('#comunas').focus();
    return false;
  }

  grabarReserva();
}

function calcularTotal(contador) 
{
  a = $('#cantidad'+contador).val();
  b = $('#valoracion'+contador).val();
  total = $('#total'+contador).val(a*b);
}

function traerTotal(contador) 
{
  a = $('#cantidad'+contador).val();
  b = $('#valoracion'+contador).val();
  total = $('#total'+contador).val(a*b);
  console.log('no funciona');
}