<?php
$dataFile = "tasks.json";
$tasks = [];
if (file_exists($dataFile)) {
    $tasks = json_decode(file_get_contents($dataFile), true) ?? [];
}

$action = $_POST['action'] ?? '';
$id = $_POST['id'] ?? '';

if ($action === 'add') {
    $taskText = trim($_POST['task'] ?? '');
    if ($taskText !== '') {
        $tasks[] = [
            'id' => time(),   // unique id
            'task' => $taskText,
            'done' => false
        ];
    }
}

if ($action === 'toggle' && $id) {
    foreach ($tasks as &$t) {
        if ($t['id'] == $id) {
            $t['done'] = !$t['done'];
            break;
        }
    }
    unset($t);
}

if ($action === 'delete' && $id) {
    $tasks = array_values(array_filter($tasks, fn($t) => $t['id'] != $id));
}

file_put_contents($dataFile, json_encode($tasks, JSON_PRETTY_PRINT));

header("Location: index.php");
exit;
