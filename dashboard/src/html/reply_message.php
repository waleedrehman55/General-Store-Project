<?php
include("includes/connection.php");

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request'); window.location.href='messages.php';</script>";
    exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM messages WHERE id = $id");
$message = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reply to Message</title>
  <link rel="stylesheet" href="../assets/css/styles.min.css">
</head>
<style>
  body, html {
    margin: 0;
    padding: 0;
    height: 100%;
  }

  .container-outer {
    display: flex;
    align-items: center; 
    justify-content: center;
    height: 100vh;
    background-color: #f8f9fa;
    padding: 20px;
  }

  .container-reply {
    width: 100%;
    max-width: 600px;
    background-color: #fff;
    border-radius: 10px;
    border: 0.5px solid darkgray;
    padding: 30px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08);
  }

  .container-reply h4 {
    margin-bottom: 15px;
  }

  .btn {
    min-width: 100px;
  }

  textarea {
    resize: vertical;
  }
</style>
<body>
  <div class="container-outer">
    <div class="container-reply">
      <h4>Reply to: <?= htmlspecialchars($message['name']) ?> (<?= htmlspecialchars($message['email']) ?>)</h4>
      <p><strong>Subject:</strong> <?= htmlspecialchars($message['subject']) ?></p>
      <p><strong>Message:</strong> <?= (htmlspecialchars($message['message'])) ?></p>
     <form method="POST" action="send_reply.php">
        <input type="hidden" name="email" value="<?= $message['email'] ?>">
        <input type="hidden" name="name" value="<?= $message['name'] ?>">
        <input type="hidden" name="id" value="<?= $message['id'] ?>">
        <textarea name="reply" class="form-control" rows="5" placeholder="Write your reply..." required></textarea>
       <button type="submit" name="send" class="btn btn-success mt-2">Send Reply</button>
        <a href="messages.php" class="btn btn-secondary mt-2">Back</a>
      </form>
    </div>
  </div>
</body>
</html>
