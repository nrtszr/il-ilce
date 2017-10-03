<?php
error_reporting(0);
ob_start();
session_start();
setlocale(LC_ALL,'tr_TR');

             // Include ezSQL core
             include_once "lib/shared/ez_sql_core.php";
 
             // Include ezSQL database specific component
             include_once "lib/mysqli/ez_sql_mysqli.php";
 
             // Initialise database object and establish a connection
             // at the same time - db_user / db_password / db_name / db_host
             $db = new ezSQL_mysqli('root','','il_ilce','localhost');
             $db->query("SET NAMES 'UTF8'");
			 
			 

function GetIP(){
    if(getenv("HTTP_CLIENT_IP")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        if (strstr($ip, ',')) {
            $tmp = explode (',', $ip);
            $ip = trim($tmp[0]);
        }
    } else {
        $ip = getenv("REMOTE_ADDR");
    }
    return $ip;
}
if(!empty($_SESSION['musteri_id']))
{
$musteri_id = $_SESSION['musteri_id'];
}

function renk_kodu()
{ 
$renk = '';
$y=1;
 while($y<=6)
 {
 $sayi=dechex(rand(0,15));
 $renk=$renk.$sayi;
 $y++;
 }
 return '#'.$renk;
} 


function makeSEO($text) { 
    $text=str_replace(" ","-",trim($text)); 
    $text=preg_replace("@[^A-Za-z0-9\-_ĞÜŞİÖÇğüşıöç]+@i","",$text); 
    $text=ereg_replace(" +"," ",trim($text)); 
    $text=ereg_replace("[-]+","-",$text); 
    $text=ereg_replace("[_]+","_",$text); 
    $text=strtolowerTR($text); 
    if ((substr($text,-1)=='_')||(substr($text,-1)=='-')) $text=substr($text,0,-1); 
    return $text; 
} 

function strtolowerTR($text) { 
    $TRBul=array('Ğ','Ü','Ş','İ','Ö','Ç','ğ','ü','ş','ı','ö','ç','I'); 
    $TRDegistir=array('g','u','s','i','o','c','g','u','s','i','o','c','i'); 
    $text=str_replace($TRBul,$TRDegistir,$text); 
    $text=strtolower($text); 
    return $text; 
} 

function seo($s) {
 $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
 $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
 $s = str_replace($tr,$eng,$s);
 $s = strtolower($s);
 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
 $s = preg_replace('/\s+/', '-', $s);
 $s = preg_replace('|-+|', '-', $s);
 $s = preg_replace('/#/', '', $s);
 $s = str_replace('.', '', $s);
 $s = trim($s, '-');
 return $s;
}

function sayfalama($limit,$sayfano,$satir_sayisi=0,$sayfaadi,$adresdeger='',$sayfadegiskenleri) 
{
  $sayfalama = ''; 
  if($satir_sayisi > $limit ) 
  { 
  $sayfa_sayisi = $satir_sayisi / $limit; 
  $sayfa_sayisi = ceil($sayfa_sayisi ); 
  if($sayfano == $sayfa_sayisi ) 
  { 
  $to = $sayfa_sayisi; 
  } elseif($sayfano == $sayfa_sayisi - 1 ) 
  { 
  $to = $sayfano + 1; 
  } elseif($sayfano == $sayfa_sayisi - 2 ) 
  { 
  $to = $sayfano + 2; 
  } else { 
  $to = $sayfano + 3; 
  } 
  if($sayfano < 4 ) 
  { 
  $from = 1; 
  } else { 
  $from = $sayfano - 3; 
  } 
  
  if (4 < $sayfano ) 
//eski  $sayfalama .= ' <button type="button" class="btn btn-default"><a href="'.$sayfaadi.'?sayfano=1'.$adresdeger.$sayfadegiskenleri.'"><b>1</b></a>........</button> '; 
  $sayfalama .= '<li><a href="'.$sayfaadi.'?sayfano=1'.$adresdeger.$sayfadegiskenleri.'">1</a></li>'; 


  
  for($i=$from; $i <= $to; $i++ ) 
  { 
  if($i == $sayfano ) 
  { 
 //eski $sayfalama .= ' <button type="button" class="btn btn-default"><a href="#"><b>['.$i.']</b></a></li> '; 
    $sayfalama .= '<li><a href="#">['.$i.']</a></li>'; 

  } else { 
  //$sayfalama .= ' <button type="button" class="btn btn-default"><a href="'.$sayfaadi.'?sayfano='.$i.$adresdeger.$sayfadegiskenleri.'">'.$i.'</a></button> '; 
  $sayfalama .= '<li><a href="'.$sayfaadi.'?sayfano='.$i.$adresdeger.$sayfadegiskenleri.'">'.$i.'</a></li>'; 
  } 
  } 
  if ($to < $sayfa_sayisi ) 
  { 
//eski  $sayfalama .= ' <button type="button" class="btn btn-default">........<a href="'.$sayfaadi.'?sayfano='.$sayfa_sayisi.$adresdeger.$sayfadegiskenleri.'"> '.$sayfa_sayisi.'</a></button> ';
      $sayfalama .= '<li><a href="'.$sayfaadi.'?sayfano='.$sayfa_sayisi.$adresdeger.$sayfadegiskenleri.'"> '.$sayfa_sayisi.'</a></li>'; 
 
  } 
  } 
  if($sayfalama == "" ) 
  { 
  $sayfalama = 'Sayfa 1'; 
  } 
  return $sayfalama; 
}//sayfalama function

$limit = 20;

$file = $_SERVER["SCRIPT_NAME"];
?>