<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>
<body>
    <h1>Book Entry Results</h1>
    <?php
    // TODO 1: Create short variable names.
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $price = $_POST['price'];

    // TODO 2: Check and filter data coming from the user.
    if(isset($_POST['isbn']) &&
    isset($_POST['author']) &&
    isset($_POST['title']) &&
    isset($_POST['price'])
    )

    // TODO 3: Setup a connection to the appropriate database.
    $conn = new mysqli('localhost', 'root', '', 'publications');
    if($conn->connect_error){
        die ("Fatal Error");
    }

    // TODO 4: Query the database.
    $query = "INSERT INTO catalogs (isbn, author, title, price) VALUES('$isbn','$author','$title','$price')";
    $result = $conn->query($query);

    // TODO 5: Display the feedback back to user.
    if($result){
        echo "The book has inserted into database. Thank you !!!";
    }else{
        echo "The book cannot inserted into database. Please try again !!!";
    }

    // TODO 6: Disconnecting from the database.
    $conn->close();

    ?>
</body>
</html>