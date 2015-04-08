<?php
    include 'connect.php';
    $book_title = isset($_POST['book_title']) ? mysqli_real_escape_string($connect, $_POST['book_title']) : '';
    $author = isset($_POST['author']) ? mysqli_real_escape_string($connect, $_POST['author']) : '';
    $publisher = isset($_POST['publisher']) ? mysqli_real_escape_string($connect, $_POST['publisher']) : '';
    if(isset($_POST['save'])) {
        $query = "INSERT INTO book (id_book, book_title, author, publisher) VALUES (null,'$book_title', '$author', '$publisher')";
        $result = mysqli_query($connect, $query);
        if($result) {
            echo 'Save success';
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD MYSQLI - Insert</title>
    </head>
    <body>
        <header>
            <h1>Insert Data</h1>
        </header>
        <section>
            <form method="post" action="insert.php">
                <label>Judul Buku
                    <input type="text" name="book_title" placeholder="Judul buku" required>
                </label>
                <br>
                <label>Penulis
                    <input type="text" name="author" placeholder="Penulis" required>
                </label>
                <br>
                <label>Penerbit
                    <input type="text" name="publisher" placeholder="Penerbit" required>
                </label>
                <br>
                <input type="submit" name="save" value="Save">
            </form>
        </section>
    </body>
</html>
