<?php
require '../inc/conn.php';

if ($_SERVER['REQUEST_METHOD'] === "GET") {
  $id_pengaduan = $_GET['id'];

  $sql = "SELECT * FROM pengaduan where id_pengaduan=?";
  $row = $conn->execute_query($sql, [$id_pengaduan])->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $id_pengaduan = $_GET['id'];

  $sql = "UPDATE pengaduan SET status='proses' WHERE id_pengaduan=?";
  $row = $conn->execute_query($sql, [$id_pengaduan]);

  if ($row) {
    header("location:../pengaduan.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require '../components/head.php';
echo headElem('Verval Pengaduan')
?>

<body>
  <div class="h-[100vh] flex justify-center items-center">
    <form action="#" method="POST" class="max-w-md bg-slate-100 w-3/4 p-20 rounded-md" enctype="multipart/form-data">
      <h1 class="text-3xl mb-8 text-center">Verifikasi dan Validasi Pengaduan</h1>
      <?php
      require "../components/inputDisabled.php";
      require "../components/btnSubmit.php";

      echo inputDisabled('isi_laporan', 'Isi Laporan', 'text', $row['isi_laporan']);
      ?>
      <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pratinjau Gambar Sekarang</p>
      <img src="../assets/aduan/<?= $row["foto"] ?>" alt="<?= $row["foto"] ?>" class="rounded-md mb-5">
      <?php
      echo btnSubmit('Proses')
      ?>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>