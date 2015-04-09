<?php
include 'header.php';
$id = $_GET['id'];
$table = 'book';
$book_title = isset($_POST['book_title']) ? mysqli_real_escape_string($connect, $_POST['book_title']) : '';
$author = isset($_POST['author']) ? mysqli_real_escape_string($connect, $_POST['author']) : '';
$publisher = isset($_POST['publisher']) ? mysqli_real_escape_string($connect, $_POST['publisher']) : '';
if(isset($_POST['update'])) {
    $query_update = "UPDATE $table SET book_title='$book_title', author='$author', publisher='$publisher' WHERE id_book=$id";
    $result_update = mysqli_query($connect, $query_update);
    
    $query = "SELECT * FROM $table WHERE id_book=$id";
    $result = mysqli_query($connect, $query);
    
    echo '<meta http-equiv="refresh" content="1;url=index.php">';
} else {
    $query = "SELECT * FROM $table WHERE id_book=$id";
    $result = mysqli_query($connect, $query);
}
$row = mysqli_fetch_array($result);
isset($result_update) ? $message = '<p class="message">Update success</p>' : $message = '';
?>
<section>
    <div class="has-form">
        <h2>Ubah Data</h2>
        <?php echo $message; ?>
        <form method="post" action="edit.php?id=<?php echo $id; ?>">
            <label>Judul Buku
                <input type="text" name="book_title" value="<?php echo $row['book_title']; ?>" required>
            </label>
            <br>
            <label>Penulis
                <input type="text" name="author" value="<?php echo $row['author']; ?>" required>
            </label>
            <br>
            <label>Penerbit
                <input type="text" name="publisher" value="<?php echo $row['publisher']; ?>" required>
            </label>
            <br>
            <input type="submit" name="update" value="Update" class="link">
        </form>
    </div>
</section>
<?php include 'footer.php'; ?>