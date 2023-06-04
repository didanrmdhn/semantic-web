<?php
include("header.php");
if (!in_array("guru", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    include("inc_footer.php");
    exit();
}
?>
<h1>Halaman Guru</h1>
Selamat datang di halaman guru
<?php
include("footer.php");
?>