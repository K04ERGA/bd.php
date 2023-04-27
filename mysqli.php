<?php
// подключаемся к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Экзамен_Богатырев";

$conn = new mysqli($servername, $username, $password, $dbname);

// проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// делаем запрос к базе данных
$sql = "SELECT *
from вызов
where кодврача >3";
$result = $conn->query($sql);

// выводим результат в браузер
if ($result->num_rows > 0) {
  // выводим заголовки столбцов
  echo "<table><tr><th>ID</th><th>Name</th><th>Адрес</th><th>КодВрача</th><th>госномер</th></tr>";
  
  // выводим каждую строку результата
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["НомерВызова"]."</td><td>".$row["ФИОПациента"]."</td><td>".$row["Адрес"]."</td><td>".$row["КодВрача"]."</td><td>".$row["Госномер"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

// закрываем соединение
$conn->close();
?>
