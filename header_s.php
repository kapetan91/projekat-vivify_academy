<?php


$user = $_SESSION['current_user'];

// ako korisnik nije ulogovan redirect na login
if (empty($user)) {
    header ("Location: http://localhost:1234/sign-in.php");
}

 ?>
 <header class="header">

    <a href="home.php" class="logo" title="VivifyAcademy blog">
        Vivify<strong>blog</strong>
    </a>

    <nav class="navigation">
        <a href="home.php" title="Home">Home</a>
        <a href="about.php" title="About">About</a>
        <a href="contact.php" title="Contact">Contact</a>
        <a href="sign-in.php" title="Sign-in">Admin</a>
    </nav>
</header>