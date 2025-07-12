<?php
include("includes/connection.php");

if (isset($_GET['id'])) {
    $del_id = intval($_GET['id']);

    $delete_stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
    $delete_stmt->bind_param("i", $del_id);

    if ($delete_stmt->execute()) {
        echo "<script>
            alert('✅ Category Deleted Successfully');
            window.location.href = 'categories.php';
        </script>";
    } else {
        echo "<script>
            alert(' Something went wrong. Try again!');
            window.location.href = 'categories.php';
        </script>";
    }

    $delete_stmt->close();
} else {
    echo "<script>
        alert(' Invalid request');
        window.location.href = 'categories.php';
    </script>";
}
?>
