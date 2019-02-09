<?php

$conn = mysqli_connect('localhost', 'root', '123456', 'demo');

$query = mysqli_query($conn, 'select * from users');

while ($row = mysqli_fetch_assoc($query)) {
  $data[] = $row;
}

if (empty($_GET['callback'])) {
  header('Content-Type: application/json');
  echo json_encode($data);
  exit();
}


header('Content-Type: application/javascript');
$result = json_encode($data);

$callback_name = $_GET['callback'];

echo "typeof {$callback_name} === 'function' && {$callback_name}({$result})";
