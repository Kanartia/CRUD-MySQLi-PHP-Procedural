<?php
include 'header.php';
$table = 'book';
$query = "SELECT * FROM $table";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
$i = 1;
?>
<section>
    <h2>Data Buku</h2>
    <table cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($count != 0) {
                while ($row = mysqli_fetch_array($result)):
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['book_title']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['publisher']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id_book']; ?>">Ubah</a> | 
                            <a href="delete.php?id=<?php echo $row['id_book']; ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endwhile;
            } else {
                ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Data tidak ditemukan</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</section>
<?php include 'footer.php'; ?>