<?php
require './inc/conn.php';
if (empty($_SESSION['nik'])) {
  header("location: ./login.php");
}
$nik = (isset($_SESSION['nik'])) ? $_SESSION['nik'] : '';
$no = 0;
$sql = "SELECT * FROM pengaduan where nik=? order by id_pengaduan desc";
$pengaduan = $conn->execute_query($sql, [$nik])->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<?php
require './components/head.php';
echo headElem('Pengaduan');
?>

<body>
  <div class="antialiased">
    <!-- Navbar -->
    <?php
    require './components/index/nav.php';
    echo navElem('Pengaduan Masyarakat', $_SESSION['username'])
    ?>

    <!-- Sidebar -->
    <?php require './components/index/sidebar.php' ?>

    <main class="p-4 md:ml-64 h-[100vh] bg-gray-50 pt-20">
      <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
          <!-- Start coding here -->
          <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
              <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <?php
                require './components/btnAdd.php';
                echo btnAdd('./aduan/tambah-aduan.php', 'Tambah Aduan')
                ?>
              </div>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <?php
                require './components/thead.php';
                echo thead(['No', 'Tanggal Pengaduan', 'Isi Laporan', 'Status', 'Foto'])
                ?>
                <tbody>
                  <?php
                  require './components/dropdownActionTable.php';
                  foreach ($pengaduan as $item) { ?>
                    <tr class="border-b dark:border-gray-700">
                      <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= ++$no ?></th>
                      <td class="px-4 py-3"><?= $item['tgl_pengaduan'] ?></td>
                      <td class="px-4 py-3"><?= $item['isi_laporan'] ?></td>
                      <td class="px-4 py-3"><?= ($item['status'] == '0') ? 'Menunggu' : (($item['status'] == 'proses') ? 'Diproses' : 'Selesai'); ?></td>
                      <td class="px-4 py-3"><img src="./assets/aduan/<?= $item['foto'] ?>" alt="<?= $item['foto'] ?>" width="64px" height="64px"></td>
                      <?php
                      echo dropdownActionTable($no, "./aduan/edit-aduan.php?id=$item[id_pengaduan]");
                      ?>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>