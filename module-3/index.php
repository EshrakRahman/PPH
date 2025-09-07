<?php
$dataFile = "tasks.json";
if (!file_exists($dataFile)) {
    file_put_contents($dataFile, json_encode([]));
}
$tasks = json_decode(file_get_contents($dataFile), true) ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Elegant To-Do App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>My To-Do List</h1>

    <form action="tasks.php" method="POST" class="add-form">
      <input type="text" name="task" placeholder="Add a new task..." required>
      <button type="submit" name="action" value="add" class="btn btn-add">Add</button>
    </form>

    <ul class="task-list">
      <?php foreach ($tasks as $t): ?>
        <li class="task-item <?= $t['done'] ? 'done' : '' ?>">
          <span class="task-text"><?= htmlspecialchars($t['task']) ?></span>
          <div class="task-actions">
            <form action="tasks.php" method="POST" style="margin:0;">
              <input type="hidden" name="action" value="toggle">
              <input type="hidden" name="id" value="<?= $t['id'] ?>">
              <button type="submit" class="btn <?= $t['done'] ? 'btn-undo' : 'btn-done' ?>">
                <?= $t['done'] ? 'Undo' : 'Done' ?>
              </button>
            </form>
            <form action="tasks.php" method="POST" style="margin:0;">
              <input type="hidden" name="action" value="delete">
              <input type="hidden" name="id" value="<?= $t['id'] ?>">
              <button type="submit" class="btn btn-delete">Delete</button>
            </form>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>
