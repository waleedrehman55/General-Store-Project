<?php
include("includes/connection.php");

$id = intval($_GET['id']);

if (isset($_GET['id'])) {
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: products.php");
        exit();
    }
}
?>
