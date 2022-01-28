<?php 
session_start();

$login = "admin";
$password = "12345";

   if(isset($_SESSION['login']) === $login && isset($_SESSION['password']) === $password) {
      header('Location: /sculpture(pash)/admin/content.php');
   }



?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Dashboard</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
   main {
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
   }
</style>
<body>
   <main style="margin-top: 20px;">
         <form action="includes/login.php" method="post" class="row g-3 col-md-6" style="width: 20%;">
            <h2>Вход в админ панель</h2>
            <div class="col-md-12">
               <label for="var-title" class="form-label">Логин</label>
               <input type="text" name="login" class="form-control" id="var-title">
            </div>
            <div class="col-md-12">
               <label for="var-title" class="form-label">Пароль</label>
               <input type="password" name="password" class="form-control" id="var-title">
            </div>

            <div class="col-12">
               <button type="submit" class="btn btn-primary">Войти</button>
            </div>
         </form>
   </main>
</body>
</html>