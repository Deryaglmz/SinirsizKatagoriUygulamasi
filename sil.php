<?php
require_once("baglan.php");

$GelenID = Filtrele($_GET["id"]);
echo $GelenID . " <br>";

function Filtrele($Deger){
    $Bir   = trim($Deger);
    $Iki   = strip_tags($Bir);
    $Uc    = htmlspecialchars($Iki, ENT_QUOTES);
    $Sonuc = $Uc;
    return $Sonuc;
}

$MenuHiyerarsisiniBulDizisi = array($GelenID);

function MenuHiyerarsisiniBul($MenuIdDegeri){
    global $VeritabaniBaglantisi;
    global $MenuHiyerarsisiniBulDizisi;

    $MenuSorgusu = $VeritabaniBaglantisi->prepare("SELECT * FROM menuler WHERE ustid = ?");
    $MenuSorgusu->execute([$MenuIdDegeri]);
    $MenuSorgusuSayisi = $MenuSorgusu->rowCount();
    $MenuSorgusuKayitlari = $MenuSorgusu->fetchAll(PDO::FETCH_ASSOC);

    if($MenuSorgusuSayisi > 0){
        foreach($MenuSorgusuKayitlari as $Kayitlar){
            $MenuId = $Kayitlar["id"];
            $MenuHiyerarsisiniBulDizisi[] = $MenuId;
            MenuHiyerarsisiniBul($MenuId);
        }
    }

    return $MenuHiyerarsisiniBulDizisi;
}

if(isset($GelenID)){
    $SilineceklerMenuler = MenuHiyerarsisiniBul($GelenID);

    foreach($SilineceklerMenuler as $SilinecekID){
        $Sil = $VeritabaniBaglantisi->prepare("DELETE FROM menuler WHERE id = ? LIMIT 1");
        $Sil->execute([$SilinecekID]);
        $SilKontrolSayisi = $Sil->rowCount();
        if($SilKontrolSayisi < 1){
            echo "HATA<br />";
            echo "İşlem Sırasında Beklenmeyen Bir Sorun Oluştu. Daha Sonra Tekrar Deneyiniz.<br />";
            echo "Ana Sayfaya Geri Dönmek İçin Lütfen Buraya <a href='index.php'>Tıklayınız</a>.";
            exit();
        }
    }

    header("Location:index.php");
    exit();
}else{
    echo "HATA<br />";
    echo "Ana Sayfaya Geri Dönmek İçin Lütfen Buraya <a href='index.php'>Tıklayınız</a>.";
}

$VeritabaniBaglantisi = null;
?>
