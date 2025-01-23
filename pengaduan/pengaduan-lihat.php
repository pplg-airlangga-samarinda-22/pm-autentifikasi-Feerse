<?php
require '../inc/conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];

  $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
  $row = $conn->execute_query($sql, [$id])->fetch_assoc();
  $laporan = $row['isi_laporan'];
  $foto = $row['foto'];

  $sql = "SELECT * FROM tanggapan WHERE id_pengaduan=?";
  $row = $conn->execute_query($sql, [$id])->fetch_assoc();
  $tanggal_tangggapan = $row['tgl_tanggapan'];
  $tanggapan = $row['tanggapan'];
  $id_petugas = $row['id_petugas'];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require '../components/head.php';
echo headElem('Tanggapi Pengaduan')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-100 w-3/4 p-20 rounded-md" enctype="multipart/form-data">
      <h1 class="text-3xl mb-8 text-center">Lihat Pengaduan</h1>
      <?php
      require "../components/inputTextArea.php";
      require "../components/inputDisabled.php";
      require "../components/btnSubmit.php";

      echo inputTextArea('laporan', 'Isi Laporan', '', $laporan, true);
      ?>
      <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pratinjau Gambar Sekarang</p>
      <img src="../assets/aduan/<?= $foto ?>" alt="<?= $foto ?>" class="rounded-md mb-5">
      <?php
      echo inputDisabled('tanggal', 'Tanggal Tanggapan', 'date', $tanggal_tangggapan);
      echo inputDisabled('petugas', 'Petugas', 'text', $id_petugas);
      echo inputTextArea('tanggapan', 'Isi Tanggapan', 'Tanggapan', $tanggapan, true);
      ?>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>