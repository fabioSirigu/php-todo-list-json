<?php
/* Nello svolgere l’esercizio seguite un approccio graduale.
Prima assicuratevi che la vostra pagina index.php (il vostro front-end) riesca a comunicare correttamente con il vostro script PHP (le vostre “API”).
Lo step successivo è quello di “testare" l'invio di un nuovo task, sapendo che manca comunque la persistenza lato server (ancora non memorizzate i dati da nessuna parte).
Solo a questo punto sarà utile passare alla lettura della lista da un file JSON.
Bonus
Mostrare lo stato del task → se completato, barrare il testo
Permettere di segnare un task come completato facendo click sul testo
Permettere il toggle del task (completato/non completato)
Abilitare l’eliminazione di un task */


$tasks = file_get_contents('tasks.json');
$all_tasks = json_decode($tasks, true);


if (isset($_POST['task'])) {

      $task = [
            'text' => $_POST['task'],
            'done' => false,
      ];
      array_push($all_tasks, $task);
      $json_tasks = json_encode($all_tasks);
      file_put_contents('tasks.json', $json_tasks);
};

if (isset($_POST['done'])) {

      $index = $_POST['done'];
      array_splice($all_tasks, $index, 1);
      $json_tasks = json_encode($all_tasks);
      file_put_contents('tasks.json', $json_tasks);
};

if (isset($_POST["changeDone"])) {

      $done = $_POST['changeDone'];
      $all_tasks[$done]["done"] = !$all_tasks[$done]["done"];
      $json_tasks = json_encode($all_tasks);
      file_put_contents('tasks.json', $json_tasks);
};


header('Content-Type: application/json');
echo json_encode($all_tasks);
