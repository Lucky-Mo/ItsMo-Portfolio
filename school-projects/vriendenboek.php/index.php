<?php
$guestbookFile = 'guestbook.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
    $name = htmlspecialchars($_POST['name'] ?? 'Anonymous');
    $message = htmlspecialchars($_POST['message']);
    file_put_contents($guestbookFile, json_encode(['name' => $name, 'message' => $message]) . "\n", FILE_APPEND);
}

$messages = file_exists($guestbookFile) ? file($guestbookFile, FILE_IGNORE_NEW_LINES) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vriendenboek</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  




    <div class="container">
      <h1 class="titel">Vriendenboek</h1>
      <div class="input">
        <input type="text" class="inp" placeholder="Enter your Username"
        required>
      </div>

      <div class="input">
        <input type="email" class="inp"
        placeholder="Enter your E-mail" required>
      </div>

      <div class="input">
        <input type="text" class="inp"
        placeholder="Enter your Subtext" required>
      </div>

       <div class="input1">
       <textarea class="inp1" name="comments" rows="4" cols="50">
</textarea>
      </div>

      <input type="submit" class="submit"></input>
    </div>

   

    <div class="messages">
        <h3>Messages:</h3>
        <?php if (!$messages): ?>
            <p>No messages yet. Be the first to leave one!</p>
        <?php else: ?>
            <?php foreach ($messages as $msg): ?>
                <?php if ($entry = json_decode($msg, true)): ?>
                    <div><strong><?= htmlspecialchars($entry['name']) ?></strong>: <?= htmlspecialchars($entry['message']) ?></div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</body>
</html>







<!-- php -S localhost:8000 -->