<?php
$todo_list = json_decode(file_get_contents('todo.json'));


if (isset($_POST['newTask'])) {
    $todo_list[] = json_decode($_POST['newTask']);

    file_put_contents('todo.json', json_encode($todo_list));
}


if (isset($_POST['toggleAtIndex'])) {
    $todo_list[$_POST['toggleAtIndex']]->isCompleted = !$todo_list[$_POST['toggleAtIndex']]->isCompleted;

    file_put_contents('todo.json', json_encode($todo_list));
}


if (isset($_POST['removeAtIndex'])) {
    array_splice($todo_list, $_POST['removeAtIndex'], 1);

    file_put_contents('todo.json', json_encode($todo_list));
}


header('Content-Type: application/json');

echo json_encode($todo_list);
