<?php
session_start();
include('../db.php');
if (isset($_SESSION['admin'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Izmeni profil</title>
        <link href="../slike/hurryup_logo2.ico" rel="icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="password.css">
        <script src="admin.js" defer></script>
    </head>

    <body>
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon"></span>
                            <span class="title">
                                <h2><img src="../slike/hurryup_logo2-removebg-preview.png" alt="Logo"></h2>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="admin.php">
                            <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                            <span class="title">Firme</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                            <span class="title">Podešavanja</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <span class="title">Promeni lozinku</span>
                        </a>
                    </li>
                    <li>
                        <a href="../prijava/logout.php">
                            <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                            <span class="title">Odjavi se</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="main">
                <div class="topbar">
                    <div class="toggle" onclick="toggleMenu()"></div>
                    <div class="search">
                        <label>
                            <input type="text" placeholder="Pretraži">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="min-height: 85vh;">
                    <form class="p-5 rounded shadow" action="password_db.php" method="POST" enctype="multipart/form-data" style="width: 30rem; background-color: #fff;">
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= htmlspecialchars($_GET['error']) ?>
                            </div>
                        <?php } ?>
                        <br><label for="userPin">Stara lozinka</label><br><br>
                        <input type="password" name="userPassword" id="fname" class="form-control"><br>
                        <label for="userPin">Nova lozinka</label><br><br>
                        <input type="password" name="userPasswordNew" id="email" class="form-control"><br>
                        <label for="userPin">Potvrdi novu lozinku</label><br><br>
                        <input type="password" name="userPasswordNewConfirm" id="confirm" class="form-control"><br>
                        <input type="submit" name="update" id="submit-btn" class="btn2" value="Potvrdi">
                    </form>
                </div>
            </div>
        </div>
        <script>
            const btn = document.getElementById("submit-btn");
            const fname = document.getElementById("fname");
            const email = document.getElementById("email");
            const confirm = document.getElementById("confirm");
            deactivate()

            function activate() {
                btn.disabled = false;
            }

            function deactivate() {
                btn.disabled = true;
            }

            function check() {
                if (fname.value != '' && email.value != '' && confirm.value != '') {
                    activate()
                } else {
                    deactivate()
                }
            }

            fname.addEventListener('input', check)
            email.addEventListener('input', check)
            confirm.addEventListener('input', check)
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: login.php');
}
