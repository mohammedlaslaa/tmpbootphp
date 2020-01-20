<?php
$fruit2 = ['Pomme', 'poire'];
setcookie('arrayfruit2', serialize($fruit2), time() + 3600, '/');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <?php
  if (isset($_COOKIE['arrayfruit2'])) {
    var_dump(unserialize($_COOKIE['arrayfruit2']), false);
    foreach (unserialize($_COOKIE['arrayfruit2']) as $val) {
      echo $val . "<br>";
    }
  }

  var_dump($_COOKIE);
  ?>
</body>

</html>