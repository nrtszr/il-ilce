<?php
include 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="tr-TR">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width" />
<title>Serpito - Ajax Chain Select - İl ilçe seçimi</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<style>
	body{
		background-color:#000000;
	}
	select { width:150px; line-height:24px; padding:5px; background-color:#F8F8F8; border:1px solid #300; float:left; margin-right:15px;}
	select option{line-height:24px;}
</style>

</head>
<body>
<br>
<p align="center">
                 <select id="il" name="il" class="form-control select2">
                     <option value="0">İl Seçiniz</option>
                     <?php

                     $datas = $db->get_results("SELECT id,il_adi FROM il ORDER BY id ASC");
                     foreach ( $datas as $data )
                     {

                         ?>
                         <option value="<?php echo $data->id; ?>"><?php echo $data->il_adi?></option>
                         <?php
                     }
                     ?>
                 </select>
 
<select name="ilce" id="ilce">
<option value="0">İlçe Seçiniz</option>
</select>
<select name="semt" id="semt">
<option value="0">Semt Seçiniz</option>
</select>
<select name="mahalle" id="mahalle">
<option value="0">Mahalle Seçiniz</option>
</select>
 
<script src="selectchained.js" type="text/javascript"></script>
<script>
$("#ilce").remoteChained("#il", "smtr.php?ilce=0");
$("#semt").remoteChained("#ilce", "smtr.php?semt=0");
$("#mahalle").remoteChained("#semt", "smtr.php?mahalle=0");
</script>

</p>
</body>
</html>