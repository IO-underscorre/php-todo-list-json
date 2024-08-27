<?php
$todo_list = json_decode(file_get_contents('todo.json'), true);


if (isset($_POST['newTask'])) {
    $new_task = json_decode($_POST['newTask'], true);

    if (preg_match('/[A-Za-zÀ-ÖØ-öø-ÿ0-9]{3,}/i', $new_task['title'])) {
        $new_task['isCompleted'] = false;
        $todo_list[] = $new_task;
    }

    file_put_contents('todo.json', json_encode($todo_list));
}


if (isset($_POST['toggleAtIndex'])) {
    $todo_list[$_POST['toggleAtIndex']]['isCompleted'] = !$todo_list[$_POST['toggleAtIndex']]['isCompleted'];

    file_put_contents('todo.json', json_encode($todo_list));
}


if (isset($_POST['removeAtIndex'])) {
    array_splice($todo_list, $_POST['removeAtIndex'], 1);

    file_put_contents('todo.json', json_encode($todo_list));
}


header('Content-Type: application/json');

echo json_encode($todo_list);
