<?php
require './components/index/aside.php';
if (isset($_SESSION['level'])) {
  echo asideElem(
    [
      'Dashboard' => './index.php',
      'Masyarakat' => './masyarakat.php',
      'Petugas' => './petugas.php',
      'Laporan' => './laporan.php',
    ],
  );
}

if (isset($_SESSION['nik'])) {
  echo asideElem(
    [
      'Dashboard' => './index.php',
      'Pengaduan' => './aduan.php',
    ],
  );
}
