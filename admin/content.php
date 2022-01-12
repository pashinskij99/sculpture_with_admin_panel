<?php 

session_start();

$login = "admin";
$password = "12345";

if($login !== $_SESSION['login'] || $password !== $_SESSION['password']) {
   header('Location: /sculpture(pash)/admin');
}

require_once 'includes/connect.php';
$variables = mysqli_query($connect, "SELECT * FROM `variables`");

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
            <a href="#includes/logout.php">Вернуться на сайт</a>
         </div>
      </div>
   </nav>
   <main>
      <div class="container">
          <form action="includes/add-variable.php" method="post">
              <table class="table">
                  <thead class="thead-dark">
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Название</th>
                      <th scope="col">Значение</th>
                      <th scope="col"></th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

                  while ($var = mysqli_fetch_assoc($variables)) {
                      echo '
                        <tr>
                          <th scope="row">' . $var["id"] . '</th>
                          <td>'. $var["title"] .'</td>
                          <td>'. $var["value"] .' </td>
                          <td align="right">
                             <input type="checkbox" class="checkbox" value="11" name="checked" id="">
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


          <h3 class="mt-4 mb-3">Добавить переменную</h3>

          <form action="includes/add-variable.php" method="post" class="row g-3">

              <div class="col-md-6">
                  <label for="var-title" class="form-label">Название переменной</label>
                  <input type="text" name="title" class="form-control" id="var-title">
              </div>

              <div class="col-md-6">
                  <label for="data-type" class="form-label">Тип значения</label>
                  <select id="data-type" class="form-select">
                      <option value="1" selected>Текст</option>
<!--                      <option value="2"></option>-->
                  </select>
              </div>

              <div class="col-md-12" id="text-form">
                  <label for="text" class="form-label">Содержимое</label>
                  <input type="text" name="value" class="form-control" id="text">
              </div>

              <div class="col-12">
                  <button type="submit" class="btn btn-primary">Добавить</button>
              </div>

          </form>
      </div>
   </main>

   <!-- JS Bundled Propper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script>
      // document.getElementById('data-type').addEventListener('change', (event) => {
      //    if(event.target.value == 1) {
      //       document.getElementById('text-form').classList.remove('d-none')
      //       document.getElementById('image-form').classList.add('d-none')
      //    } else {
      //       document.getElementById('text-form').classList.add('d-none')
      //       document.getElementById('image-form').classList.remove('d-none')
      //    }
      // })
   </script>
</body>
</html>


