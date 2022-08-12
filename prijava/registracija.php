<?php
session_start();
include ('../db.php');

if (isset($_POST['register'])) {  
    extract($_POST);
    $mysql = "SELECT * FROM registracija";
    $gotResuslts = mysqli_query($conn, $mysql);
    $imena_firma = array();
    if ($gotResuslts) {
        if (mysqli_num_rows($gotResuslts) > 0) {
            while ($row = mysqli_fetch_array($gotResuslts)) {
                array_push($imena_firma, $row['ime_firme']);
            }
        }
    }
    
    if (in_array($ime_firme, $imena_firma)) {
        header('Location: registration.php?error=Ime firme već postoji');
    } else if ($confirm_password !== $lozinka) {
        header('Location: registration.php?error=Lozinke se ne poklapaju');
    } else if ($confirm_pin !== $pin) {
        header('Location: registration.php?error=Pinovi se ne poklapaju');
    } else {
        $lozinka = password_hash($lozinka, PASSWORD_DEFAULT);
        $datum_kreiranja = $_COOKIE['createdAt'];
        $sql = "INSERT INTO `registracija` (ime, prezime, ime_firme, email, broj_telefona, lozinka, pin, datum_kreiranja) VALUES ('$ime','$prezime','$ime_firme','$email','$broj_telefona','$lozinka','$pin','$datum_kreiranja')";
        
        if ($conn->query($sql) === TRUE) {
            header('Location: registration.php?success');  
        } else {  
            echo "Greska: " . $sql . "<br>" . $conn->error;  
        }
    }

    $conn->close();  
  }
?> 