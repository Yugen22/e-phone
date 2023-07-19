<?php
    session_start();
    include ("sambungan.php");

    if (isset($_POST["submit"])) {
        $userid = $_POST["userid"];
        $password = $_POST["password"];

        $jumpa = FALSE;

        if ($jumpa == FALSE) {
            $sql = "SELECT * FROM pembeli";
            $result = mysqli_query($sambungan, $sql);
            while($pembeli = mysqli_fetch_array($result))   {
                if ($pembeli["idpembeli"] == $userid && $pembeli["password"] == $password) {
                    $jumpa = TRUE;
                    $_SESSION["idpengguna"] = $pembeli["idpembeli"];
                    $_SESSION["nama"] = $pembeli["namapembeli"];
                    $_SESSION["status"] = "pembeli";
                    break;
                }
            }
        }

        if ($jumpa == FALSE) {
            $sql = "SELECT * FROM penjual";
            $result = mysqli_query($sambungan, $sql);
            while($penjual = mysqli_fetch_array($result))   {
                if ($penjual["idpenjual"] == $userid && $penjual["password"] == $password) {
                    $jumpa = TRUE;
                    $_SESSION["idpengguna"] = $penjual["idpenjual"];
                    $_SESSION["nama"] = $penjual["namapenjual"];
                    $_SESSION["status"] = "penjual";
                    break;
                }
            }
        }

        if ($jumpa == TRUE)
            if ($_SESSION["status"] == "pembeli")
                header("Location: pembeli_home.php");
            else if ($_SESSION["status"] == "penjual")
                header("Location: penjual_home.php");
        else 
            echo "window.location='index.php'";
            echo "<script>alert('kesalahan pada username atau password');</script>";
    }      
?>

<link rel="stylesheet" href="abutton.css">
<link rel="stylesheet" href="aborang.css">
<center>
    <img class="tajuk" src="imej/tajuk.png" width=500>
</center>
    
<h3 class="pendek">LOG IN</h3>
<form class="pendek" action="index.php" method="post">
    <table>
        <tr>
            <td><img src="imej/user.png"></td>
            <td><input type="text" name="userid" placeholder="idpengguna"></td>
        </tr>
        <tr>
            <td><img src="imej/lock.png"></td>
            <td><input type="password" name="password" placeholder="password"></td>
        </tr>
    </table>
    <button class="login" type="submit" name="submit">Login</button>
    <button class="signup" type="button" onclick="window.location='signup.php'">Sign Up</button>
</form>