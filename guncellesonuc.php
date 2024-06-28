<?php
require_once("baglan.php");
function Filtrele($Deger){
    $Bir   = trim($Deger);
    $Iki   = strip_tags($Bir);
    $Uc    = htmlspecialchars($Iki, ENT_QUOTES);
    $Sonuc = $Uc;
    return $Sonuc;
}


$GelenID = Filtrele($_POST["id"]);
$GelenUstMenuSecimi = Filtrele($_POST["UstMenuSecimi"]);
$GelenMenuAdi = Filtrele($_POST["MenuAdi"]);


if(($GelenID != "") and ($GelenUstMenuSecimi != "") and ($GelenMenuAdi != "")){
    $Guncelle = $VeritabaniBaglantisi->prepare("UPDATE menuler ustid = ?, menuadi = ? LIMIT 1");
    $Guncelle->execute([$GelenUstMenuSecimi, $GelenMenuAdi, $GelenID]);
    $GuncelleKontrolSayisi = $Guncelle->rowCount();

    if($GuncelleKontrolSayisi > 0){
        header("Location:index.php");
        exit();
    }else{
        echo "HATA<br />";
        echo "İşlem Sırasında Beklenmeyen Bir Sorun Oluştu. Daha Sonra Tekrar Deneyiniz.<br />";
        echo "Ana Sayfaya Geri Dönmek İçin Lütfen Buraya <a href='index.php'>Tıklayınız</a>.";
    }
}else{
    echo "HATA<br />";
    echo "Lütfen Boş Alan Bırakmayınız.<br />";
    echo "Ana Sayfaya Geri Dönmek İçin Lütfen Buraya <a href='index.php'>Tıklayınız</a>.";
}

$VeritabaniBaglantisi = null;
?>
