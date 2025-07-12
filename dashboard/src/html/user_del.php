<?php
include("includes/connection.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $sql = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: users.php");
    }
} 
else {
    echo "Invalid Request";
}
?>
