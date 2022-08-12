<?php
    session_start();

    if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link href="../slike/hurryup_logo2.ico" rel="icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="admin.css">
        <script src="admin.js" defer></script>
    </head>
    <body>
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon"></span>
                            <span class="title"><h2><img src="../slike/hurryup_logo2-removebg-preview.png" alt="Logo"></h2></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
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
                        <a href="password.php">
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
                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers">1,042</div>
                            <div class="cardName">Dnevni pregledi</div>
                        </div>
                        <div class="iconBox">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers">80</div>
                            <div class="cardName">Prodaje</div>
                        </div>
                        <div class="iconBox">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers">208</div>
                            <div class="cardName">Komentari</div>
                        </div>
                        <div class="iconBox">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers">12500 RSD</div>
                            <div class="cardName">Zarada</div>
                        </div>
                        <div class="iconBox">
                        <i class="fa fa-usd" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Nove narudžbine</h2>
                            <a href="#" class="btn">Sve narudžbine</a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Ime</td>
                                    <td>Cena</td>
                                    <td>Plaćanje</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Narudžbina 1</td>
                                    <td>1400 RSD</td>
                                    <td>Plaćeno</td>
                                    <td><span class = "status delivered">Isporučeno</span></td>
                                </tr>
                                <tr>
                                    <td>Narudžbina 2</td>
                                    <td>800 RSD</td>
                                    <td>Plaćeno</td>
                                    <td><span class = "status pending">U procesu</span></td>
                                </tr>
                                <tr>
                                    <td>Narudžbina 3</td>
                                    <td>2600 RSD</td>
                                    <td>Nije plaćeno</td>
                                    <td><span class = "status return">Nije isporučeno</span></td>
                                </tr>
                                <tr>
                                    <td>Narudžbina 4</td>
                                    <td>15000 RSD</td>
                                    <td>Plaćeno</td>
                                    <td><span class = "status delivered">Isporučeno</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Nove firme</h2>
                        </div>
                        <table>
                            <tbody id="firme">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    } else {
        header('Location: login.php');
    }
