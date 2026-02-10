<?php
include("includes/conexao.php");
$id=intval($_GET["id"]);
$f=$conn->query("SELECT arquivo FROM fotos WHERE id=$id")->fetch_assoc();
$caminho="uploads/".$f["arquivo"];
$marca="watermark/logo.png";
$img=imagecreatefromjpeg($caminho);
$wm=imagecreatefrompng($marca);
imagecopy($img,$wm,50,50,0,0,imagesx($wm),imagesy($wm));
header("Content-Type: image/jpeg");
imagejpeg($img,null,90);
imagedestroy($img); imagedestroy($wm); ?>