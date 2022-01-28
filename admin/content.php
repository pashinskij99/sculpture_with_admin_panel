<?php
session_start();

$login = "admin";
$password = "12345";

if(isset($login) !== isset($_SESSION['login']) || isset($password) !== isset($_SESSION['password'])) {
    header('Location: /sculpture(pash)/admin');
}

require_once 'includes/connect.php';
$variables = mysqli_query($connect, "SELECT * FROM `variables`");
$tableSelectForTypeGenerate = mysqli_query($connect, "SELECT `id`, `type` FROM `selecttypegenerate` WHERE 1");
$tableSelectForBackground = mysqli_query($connect, "SELECT `id`, `background` FROM `selectbackground` WHERE 1");
$tableSelectForTexture = mysqli_query($connect, "SELECT `id`, `texture` FROM `selecttexture` WHERE 1");
$tableInputSize = mysqli_query($connect, "SELECT `id`, `size` FROM `inputsize` WHERE 1");
$tableInputTime = mysqli_query($connect, "SELECT `id`, `time` FROM `inputtime` WHERE 1");

while ($var = mysqli_fetch_array($tableSelectForTypeGenerate)) {
    $stateForTypeGenerateDefault = $var['type'] === 'default' ? 'selected' : null;
    $stateForTypeGenerateTime = $var['type'] === 'time' ? 'selected' : null;
}
while ($var = mysqli_fetch_array($tableSelectForBackground)) {
    $stateForBackgroundRoom1 = $var['background'] === 'Room I' ? 'selected' : null;
    $stateForBackgroundRoom2 = $var['background'] === 'Room II' ? 'selected' : null;
    $stateForBackgroundRoom3 = $var['background'] === 'Room III' ? 'selected' : null;
}
while ($var = mysqli_fetch_array($tableSelectForTexture)) {
    $stateForPlastic = $var['texture'] === 'plastic' ? 'selected' : null;
    $stateForMetal = $var['texture'] === 'metal' ? 'selected' : null;
}
while ($var = mysqli_fetch_array($tableInputSize)) {
    $valueSize = $var['size'];
}
while ($var = mysqli_fetch_array($tableInputTime)) {
    $valueTime = $var['time'];
}

$selectTexture = '
    <select name="texture[]" id="texture">
      <option '. $stateForPlastic .' value="plastic">Plastic</option>
      <option '. $stateForMetal .' value="metal">Metal</option>
    </select>
';
$selectBackground = '
    <select name="background[]" id="background">
      <option '. $stateForBackgroundRoom1 .' value="Room I">Room I</option>
      <option '. $stateForBackgroundRoom2 .' value="Room II">Room II</option>
      <option '. $stateForBackgroundRoom3 .' value="Room III">Room III</option>
    </select>
';
$sizeInputTypeNumber = '
    <input type="number" id="size" name="size" value='. $valueSize .'
       min="1" max="10">
';
$timeInputTypeNumber = '
    <input type="number" id="time" name="time" value='. $valueTime .'
       min="8" max="30">
';
$selectTypeGenerate = '
    <select name="typeGenerate[]" id="typeGenerate">
      <option '. $stateForTypeGenerateDefault .' value="default">Default</option>
      <option '. $stateForTypeGenerateTime .' value="time">Time</option>
    </select>
';

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
      <div class="container-fluid">
         <a href="#" class="navbar-brand">
            Menu
         </a>
         <div style="flex-grow: 0;" class="collapse navbar-collapse" id="navbarSupportedContent">
            <a href="includes/logout.php">Вернуться на сайт</a>
         </div>
      </div>
   </nav>
   <main>
      <div class="container">
          <form action="includes/checkbox.php" method="post">
              <table class="table">
                  <thead class="thead-dark">
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
<!--                      <th scope="col">Null</th>-->
                      <th scope="col">Value</th>
<!--                      <th scope="col"></th>-->
                  </tr>
                  </thead>
                  <tbody>

                  <?php

                  while ($var = mysqli_fetch_assoc($variables)) {
                      echo '
                        <tr>
                          <th scope="row">' . $var["id"] . '</th>
                          <td>'. $var["title"] .'</td>
                          <td>
                            '. ( $var["title"] != 'ChangeTexture' ?"": $selectTexture) .'
                            '. ( $var["title"] != 'ChangeBackground' ?"": $selectBackground) .'
                            '. ( $var["title"] != 'MakeASculpture' ?"": $timeInputTypeNumber) .'
                            '. ( $var["title"] != 'Size' ?"": $sizeInputTypeNumber) .'
                          </td>
                          <td>'. ( $var["title"] != 'MakeASculpture' ?"": $selectTypeGenerate) .'</td>

                          <td align="right">
                             <input type="checkbox" class="checkbox" value='. $var["id"] .' name="all[]"  '. ( $var["checked"] != 1 ?: 'checked')  .' >
                          </td>
                        </tr>
                    ';
                  }

                  ?>

                  </tbody>
              </table>
              <button
                      type="submit"
                      class="btn btn-danger"
                      style="
                        display: block;
                        margin-left: auto;
                      ">Скрыть</button>
          </form>
      </div>
   </main>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


