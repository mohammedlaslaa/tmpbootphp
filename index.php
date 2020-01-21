<?php

if (isset($_GET['name']) && $_GET['name'] == 'redirect') {
  header('Location: http://www.google.com/');
};

$filename2 = md5($_SERVER['REQUEST_URI']);
$dateinst = time();
$datefile = filemtime('./cache/' . $filename2);
if (file_exists('./cache/' . $filename2) && ($dateinst - $datefile) < (3600 * 3)) {
  readfile('./cache/' . $filename2);
} else {
  ob_start();
  setcookie('ip', $_SERVER['REMOTE_ADDR']);

  $ynum = (int) file_get_contents("log/" . date('d-m-Y') . ".txt");
  $affichecount = "hello vous êtes le visiteur numéro : " . $ynum += 1;
  setcookie('number', 1);

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">

  </head>

  <body>
    <?php
    if (!isset($_COOKIE['ip'])) {
      echo $affichecount;
    }

    if (isset($_COOKIE['arrayfruit'])) {
      var_dump(unserialize($_COOKIE['arrayfruit']), false);
      foreach (unserialize($_COOKIE['arrayfruit']) as $val) {
        echo $val . "<br>";
      }
    }

    if (isset($_COOKIE['arrayfruit2'])) {
      var_dump(unserialize($_COOKIE['arrayfruit2']), false);
      foreach (unserialize($_COOKIE['arrayfruit2']) as $val) {
        echo $val . "<br>";
      }
    }

    echo "vardump";

    var_dump($_COOKIE);

    // Display the date
    var_dump(getdate());

    $date = getdate();

    echo $date['year'];

    echo "<br>";

    // Set the default date

    date_default_timezone_set('Europe/Paris');

    $x = strtotime("-1week");

    echo $x;

    echo "<br>";

    echo date("d-m-Y", $x);

    echo "<br>";

    echo date("Y-m-d H:i:s");

    echo "<br>";

    echo date("d-m-Y H:i:s") . "<br>";

    echo time();

    //Start session global variable

    // session_start();

    // $_SESSION["salut"] = "coucou";

    /****** Read file ******/

    require_once('element/nav.php');

    // Test isset

    $form = isset($_GET["contact"]) ? "form" : "";

    // display the file depending the key value

    if ($form == "form") {
      require_once('element/contact.php');
    } else {
      require_once('element/main.php');
    }

    require_once('element/footer.php');

    // Test an existing file

    $x = file_exists('element/script.php');

    if ($x) {
      require_once('element/script.php');
    }

    // Open new file and write it

    $myfile = fopen("newfile.php", "w") or die("Unable to open file!");
    $txt = "<h1>New File !</h1>";
    fwrite($myfile, $txt); // Then you can require it in this file

    // all information of the server

    //  var_dump($_SERVER);

    function getMinDate($arg1, $arg2 = false)
    {
      $x = strtotime($arg1);
      if (!$arg2) {
        $y = time();
      } else {
        $y = strtotime($arg2);
      }
      if ($x > $y) {
        return $arg1 . " est plus récent que " . date('d-m-y', $y) . " et son timestamp est " . $x;
      } elseif ($y > $x) {
        return date('d-m-y', $y) . " est plus récent que " . $arg1 . " et son timestamp est " . $y;
      }
    }

    echo getMinDate('12-01-20');

    function getNbDay($arg1, $arg2)
    {
      $datetime1 = date_create($arg1);
      $datetime2 = date_create($arg2);
      $interval = date_diff($datetime1, $datetime2);
      return $interval->format('%R%a days');
    }

    echo getNbDay('19-01-2018', '20-01-2020');

    function increase(&$x): void
    {
      $x *= 5;
    }

    $xiu = 100;

    echo $xiu;
    increase($xiu);
    echo $xiu;

    echo "<br>";

    echo md5("hllkflkj");

    echo "<br>";

    echo password_hash("mohammed", PASSWORD_DEFAULT);

    // Null coalescing operator is a shortcut of the ternary operator

    $testoperator = isset($_POST['name']) ? $_POST['name'] : '';

    $testoperator = $_POST['name'] ?? '';


    $nameFileDateOfTheDay = date("d-m-Y");

    $createFile = "log/$nameFileDateOfTheDay.txt";

    if (!file_exists($createFile)) {
      $x = 1;
      file_put_contents($createFile, $x);
    } elseif ($_COOKIE['ip'] !== $_SERVER['REMOTE_ADDR']) {
      $y = (int) file_get_contents($createFile);
      $y += 1;
      file_put_contents($createFile, $y);
    }
    echo "<br>";

    ?>

    <a href="?delete=ok">SUPPRIME MOI !<a>

        <?php

        $testy = $_GET["delete"] ?? "";

        function deleteLog($arg)
        {
          if (is_dir($arg)) {
            array_map('unlink', glob("$arg/*.txt"));
          } else {
            return "Ce n'est pas un dossier valide";
          }
        }

        if ($testy == "ok") {
          deleteLog('log');
        }

        echo "<br>";

        echo date("d-m-Y", filemtime('./index2.php'));

        echo "<br>";

        var_dump(stat('./index2.php'));

        $txt = nl2br("texte 
      texte
      texte");

        echo $txt;

        // $test = "bonjour";

        // unset($test);

        // echo $test



        ?>

        <?= $title ?? "Bonjour"; ?>

        <?= "Heeeeeeeeeyy" ?>
  </body>

  </html>
<?php
  $content = ob_get_contents();
  file_put_contents('./cache/' . $filename2, $content);
}
?>