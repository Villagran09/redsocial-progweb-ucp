<?php
session_start();
require './Negocios/MensajeNegocio.php';
date_default_timezone_set("America/Buenos_Aires");
setlocale(LC_TIME, "spanish");
error_reporting(0);
$user=$_SESSION['k_username'];

//$usuarioNegocio= new UsuarioNegocio();
if (isset($_POST["mensajePadreId"])==FALSE) {
    
    if ($user==emanuelgimenez10) {
    $remitenteUsuarioId=1;
}
if ($user==cnchocron) {
    $remitenteUsuarioId=2;
}
if ($user==jorges.lossada) {
    $remitenteUsuarioId=3;
}
if ($user==fernandezja) {
    $remitenteUsuarioId=4;
}
if ($user==fernan2322) {
    $remitenteUsuarioId=5;
}
if ($user==miguevillagran) {
    $remitenteUsuarioId=6;
}
if ($user==cesar91bo) {
    $remitenteUsuarioId=7;
}
    
    //$remitenteUsuarioId=$usuarioNegocio->obtenerUsuarioPorNombre($_SESSION['k_username'])->getUsuarioId();
    $destinatarioUsuarioId = $_POST["destinatarioUsuarioId"];
    $fecha= date("Y-m-d H:i:s");
    $contenido= $_POST["contenido"];

        $msj= new Mensaje(0, null, $contenido, $fecha, $remitenteUsuarioId,$destinatarioUsuarioId);

$msjNegocio= new MensajeNegocio();
$msjNegocio->guardarMensaje($msj);
    
}else {
    if ($user==emanuelgimenez10) {
    $remitenteUsuarioId=1;
}
if ($user==cnchocron) {
    $remitenteUsuarioId=2;
}
if ($user==jorges.lossada) {
    $remitenteUsuarioId=3;
}
if ($user==fernandezja) {
    $remitenteUsuarioId=4;
}
if ($user==fernan2322) {
    $remitenteUsuarioId=5;
}
if ($user==miguevillagran) {
    $remitenteUsuarioId=6;
}
if ($user==cesar91bo) {
    $remitenteUsuarioId=7;
}
    $fecha= date("Y-m-d H:i:s");
    $contenido= $_POST["contenido"];
    $destinatarioUsuarioId=$_POST["destinatarioUsuarioId"];
    $mensajePadreId=$_POST["mensajePadreId"];
            

     $msj= new Mensaje(0, $mensajePadreId, $contenido, $fecha, $remitenteUsuarioId,$destinatarioUsuarioId);

$msjNegocio= new MensajeNegocio();
$msjNegocio->guardarMensaje($msj);
    
}
header("Location: /Parcial/muroPrueba.php");