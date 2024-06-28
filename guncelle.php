<?php
require_once("baglan.php");

function Filtrele($Deger){
    $Bir   = trim($Deger);
    $Iki   = strip_tags($Bir);
    $Uc    = htmlspecialchars($Iki, ENT_QUOTES);
    $Sonuc = $Uc;
    return $Sonuc;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function AcilirListeIcinMenuYaz($MenuUstIdDegeri=0, $BoslukDegeri=0){
    global $VeritabaniBaglantisi;
    $MenuSorgusu = $VeritabaniBaglantisi->prepare("SELECT * FROM menuler WHERE ustid = ?");
    $MenuSorgusu->execute([$MenuUstIdDegeri]);
    $MenuSorgusuSayi = $MenuSorgusu->rowCount();
    $MenuSorgusuKayitlari = $MenuSorgusu->fetchAll(PDO::FETCH_ASSOC);
    
    if($MenuSorgusuSayi>0){
        foreach($MenuSorgusuKayitlari as $Kayitlar){
            $MenuId = $Kayitlar["id"];
            $MenuUstId = $Kayitlar["ustid"];
            $MenuMenuAdi = $Kayitlar["menuadi"];
            
            echo "<option value=\"" . $MenuId . "\">" . str_repeat("&nbsp;", $BoslukDegeri) . $MenuMenuAdi . "</option>";
            AcilirListeIcinMenuYaz($MenuId, $BoslukDegeri+5);
        }
    }
}

$Sorgu = $VeritabaniBaglantisi->prepare("SELECT * FROM menuler WHERE id = ? LIMIT 1");
$Sorgu->execute([$GelenID]);
$SorgusuSayi = $Sorgu->rowCount();
$SorgusuKayitlari = $Sorgu->fetchAll(PDO::FETCH_ASSOC);
print_r($SorgusuKaydi);

?>
<!-- Menu Güncelle -->
Menu Güncelleme Formu<br />
<form action="guncellesonuc.php" value="<?php echo $SorgusuKaydi["id"]; ?>" method="post">
    Üst Menü : <select name="UstMenuSecimi">
        <option value="0">Ana Menü Yap</option>
        <?php AcilirListeIcinMenuYaz(); ?>
    </select><br />
    Menü Adı : <input type="text" name="MenuAdi" value="<?php echo $SorgusuKaydi["menuadi"]; ?>"/><br />
    <input type="submit" value="Menü Ekle" />
</form><br /><br />

<!-- Menuları Listeleme -->
<?php
$VeritabaniBaglantisi = null;
?>
</body>
</html>