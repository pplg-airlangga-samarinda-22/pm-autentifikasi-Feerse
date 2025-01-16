<?php
require_once "./inc/conn.php";
if (empty($_SESSION['nik']) && empty($_SESSION['level'])) {
  header("location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
require './components/head.php';
echo headElem('Laporan Pengaduan')
?>

<body>
  <div class="antialiased">
    <!-- Navbar -->
    <?php
    require './components/index/nav.php';

    echo navElem('Pengaduan Masyarakat', $_SESSION['username'])
    ?>
    <!-- Sidebar -->
    <?php
    require './components/index/aside.php';
    echo asideElem(
      [
        'Dashboard' => '#',
        'Aduan' => './aduan.php'
      ],
    )
    ?>
    <main class="p-4 md:ml-64 h-[100vh] bg-gray-50 pt-20">
      <div>
        <?php
        $loggedAs = '';
        if (isset($_SESSION['nik'])) {
          $loggedAs = 'Masyarakat';
        } else if (isset($_SESSION['level'])) {
          if ($_SESSION['level'] == 'admin') {
            $loggedAs = 'Admin';
          } else if ($_SESSION['level'] == 'petugas') {
            $loggedAs = 'Petugas';
          }
        }
        ?>
        <h1>Halo <b><?= $_SESSION['username'] ?></b>, Anda login sebagai <b><?= $loggedAs ?></b></h1>
      </div>
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>