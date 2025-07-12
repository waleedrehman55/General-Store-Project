<?php
include("includes/connection.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Message deleted successfully.'); window.location.href='messages.php';</script>";
    } else {
        echo "<script>alert('Error deleting message.'); window.location.href='messages.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid Request.'); window.location.href='messages.php';</script>";
}

$conn->close();
?>
