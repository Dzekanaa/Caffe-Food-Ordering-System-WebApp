<?php

if (isset($_POST['order'])) { 
    include_once("db.php");
    $broj_stola = $_COOKIE['broj_stola'];
    $vreme_narucivanja = $_COOKIE['vreme_narucivanja'];
    $konacna_cena = $_COOKIE['narudzbina'];
    $detalji = $_COOKIE['detalji'];
    $ime_firme = $_COOKIE['ime_firme'];
    $sql = "INSERT INTO `narudzbine` (ukupna_cena, vreme_narucivanja, broj_stola, ime_firme, detalji, napomena) VALUES ('$konacna_cena', '$vreme_narucivanja', '$broj_stola', '$ime_firme', '$detalji', 'nema')";
    if ($conn->query($sql) === TRUE) {
        ?> <script>window.location.href = 'ponuda.html?ime_firme=<?php echo $ime_firme ?>&broj_stola=<?php echo $broj_stola ?>';</script> <?php
    } else {  
        echo "Greska: " . $sql . "<br>" . $conn->error;  
    }
    $conn->close();  
  }
?> 