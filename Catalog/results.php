<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>
<body>
    <h1>Book Search Results</h1>
    <?php
    // TODO 1: Create short variable names.
    $searchtype = $_POST['searchtype'];
    $searchterm = $_POST['searchterm'];

    // TODO 2: Check and filter data coming from the user.
    if(isset($_POST['searchtype']) &&
    isset($_POST['searchterm'])
    )

    // TODO 3: Setup a connection to the appropriate database.
    $conn = new mysqli('localhost', 'root', '', 'publications');
    if($conn->connect_error){
        die ("Fatal Error");
    }

    // TODO 4: Query the database.
    $query = "SELECT * FROM catalogs WHERE $searchtype LIKE '%$searchterm%'";
    $result = $conn->query($query);
    if(!$result){
        echo ("Cannot access to database.");
    }

    // TODO 5: Retrieve the results.
    $rows = $result->num_rows;

    // TODO 6: Display the results back to user.
    echo "<table>
    <tr>
    <th>Isbn</th>
    <th>Author</th>
    <th>Title</th>
    <th>Price</th>
    </tr>
    ";

    for($j = 0; $j < $rows; $j++){
        $row = $result->fetch_array(MYSQLI_NUM);
        echo "<tr>";
        for($k = 0; $k < 4; $k++){
            echo "<td>" . htmlspecialchars($row[$k]) . "</td>&nbsp&nbsp";
    
        }
        echo "</tr>";
    }

    echo "</table>";

    // TODO 7: Disconnecting from the database.
    $conn->close();

    ?>
</body>
</html>