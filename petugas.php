<?php
require './inc/conn.php';

if (empty($_SESSION['level'])) {
  header('location: ./login.php');
}

$no = 0;
$sql = "SELECT * FROM petugas";
$items = $conn->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<?php
require './components/head.php';
echo headElem('Petugas');
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
                echo btnAdd('./petugas/tambah-petugas.php', 'Tambah Petugas')
                ?>
              </div>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <?php
                require './components/thead.php';
                echo thead(['No', 'Nama', 'Telepon', 'Username', 'Level'])
                ?>
                <tbody>
                  <?php
                  require './components/dropdownActionTable.php';
                  foreach ($items as $item) { ?>
                    <tr class="border-b dark:border-gray-700">
                      <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= ++$no ?></th>
                      <td class="px-4 py-3"><?= $item['nama_petugas'] ?></td>
                      <td class="px-4 py-3"><?= $item['telp'] ?></td>
                      <td class="px-4 py-3"><?= $item['username'] ?></td>
                      <td class="px-4 py-3"><?= $item['level'] ?></td>
                      <?php
                      echo dropdownActionTable($no, "./petugas/edit-petugas.php?id=$item[id_petugas]");
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