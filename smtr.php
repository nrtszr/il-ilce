<?php
require_once("config.php");
 
if(isset($_GET['il'])){
 
$il=(int)$_GET['il'];
$secili=(int)$_GET['ilce'];
if($il>0){
//$dk=$db->q("SELECT `id`,`ilce_adi` FROM `ilce` WHERE `il_id`='$il' ORDER BY `id` ASC");

    $datas = $db->get_results("SELECT `id`,`ilce_adi` FROM `ilce` WHERE `il_id`='$il' ORDER BY `id` ASC");
 
if($secili>0){
$list='{"selected":"'.$secili.'",';
}else{
$list='{"0":"Seçiniz",';
}
    foreach ( $datas as $data )
    {
$list.='"'.$data->id.'":"'.$data->ilce_adi.'",';
}
$list=substr($list,0,-1);
$list.="}";
echo $list;
}
}
else if(isset($_GET['ilce'])){
$ilce=(int)$_GET['ilce'];
$secili=(int)$_GET['semt'];
if($ilce>0){
//$dk=$db->q("SELECT `id`,`semt_adi` FROM `semt` WHERE `ilce_id`='$ilce' ORDER BY `id` ASC");
    $datas = $db->get_results("SELECT `id`,`semt_adi` FROM `semt` WHERE `ilce_id`='$ilce' ORDER BY `id` ASC");
if($secili>0){
$list='{"selected":"'.$secili.'",';
}else{
$list='{"0":"Seçiniz",';
}
    foreach ( $datas as $data )
    {
$list.='"'.$data->id.'":"'.$data->semt_adi.'",';
}
$list=substr($list,0,-1);
$list.="}";
echo $list;
}
}
else if(isset($_GET['semt'])){
$semt=(int)$_GET['semt'];
$secili=(int)$_GET['mahalle'];
 
if($semt>0){
//$dk=$db->q("SELECT `id`,`mahalle_adi` FROM `mahalle` WHERE `semt_id`='$semt' ORDER BY `ordernum` DESC, id ASC");
    $datas = $db->get_results("SELECT `id`,`mahalle_adi` FROM `mahalle` WHERE `semt_id`='$semt' ORDER BY `ordernum` DESC, id ASC");


if($secili>0){
$list='{"selected":"'.$secili.'",';
}else{
$list='{"0":"Seçiniz",';
}

    foreach ( $datas as $data )
    {
$list.='"'.$data->id.'":"'.$data->mahalle_adi.'",';
}
$list=substr($list,0,-1);
$list.="}";
echo $list;
}
}
 
//$db->close();
?>