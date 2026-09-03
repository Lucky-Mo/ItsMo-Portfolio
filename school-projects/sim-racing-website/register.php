<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: url('Images/loginesimbackg.png') no-repeat;
      background-size: cover;
      background-position: center;
    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 20px 100px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 99;
    }

    /* logo */
    .logo {
      font-size: 2.5em;
      font-weight: 600;
      color: rgb(0, 0, 0);
      user-select: none;
      text-decoration: none;
    }

    /* nav */
    .navigation a {
      position: relative;
      font-size: 1.1em;
      color: rgb(0, 0, 0);
      text-decoration: none;
      font-weight: 500;
      margin-left: 40px;
    }

    /* nav a hover bewegende streep naar recht */
    .navigation a::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -6px;
      width: 100%;
      height: 3px;
      background-color: white;
      border-radius: 5px;
      transform-origin: right;
      transform: scaleX(0);
      transition: transform .5s;
    }

    /* nav a hover bewegende streep naar recht */
    .navigation a:hover::after {
      transform-origin: left;
      transform: scaleX(1);
    }

    /* nav btn login */
    .navigation .btnLogin-popup {
      width: 130px;
      height: 50px;
      background-color: transparent;
      border: 2px solid rgb(0, 0, 0);
      outline: none;
      border-radius: 14px;
      cursor: pointer;
      font-size: 1.1em;
      color: rgb(0, 0, 0);
      font-weight: 500;
      margin-left: 40px;
      transition: .5s;
    }

    /* nav btn login while hover*/
    .navigation .btnLogin-popup:hover {
      background: rgb(0, 0, 0);
      color: #ffffff;
      border-color: white;
      border-width: 3px;
    }

    /* container */
    .wrapper {
      position: relative;
      width: 400px;
      height: 500px;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, .5);
      border-radius: 20px;
      backdrop-filter: blur(20px);
      box-shadow: 0 0 50px rgba(255, 174, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      /* overflow: hidden; */
      transition: height .2s ease;
    }

    .wrapper .form-box {
      width: 100%;
      padding: 30px;
    }

    /* closing icon */
    .wrapper .icon-close {
      position: absolute;
      top: 0;
      right: 0;
      width: 45px;
      height: 45px;
      background-color: #162938;
      font-size: 2em;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      border-bottom-left-radius: 20px;
      border-top-right-radius: 17px;
      cursor: pointer;
      z-index: 1;
    }

    /* titel login box */
    .form-box h2 {
      font-size: 2em;
      color: #000000;
      text-align: center;
    }

    /* onder-lijn input */
    .input-box {
      position: relative;
      width: 90%;
      height: 30px;
      border-bottom: 2px solid #000000;
      margin: 30px 0;
      font-size: 18px;
    }

    /* label username en password */
    .input-box label {
      position: absolute;
      top: 10px;
      left: 5px;
      transform: translateY(-50%);
      font-size: 1em;
      color: #ffffff;
      font-weight: 500;
      pointer-events: none;
      transition: .5s;
    }

    /* is voor username en password naar boven te laten gaan */
    .input-box input:focus~label,
    .input-box input:valid~label {
      top: -15px;
    }

    /* input username en password */
    .input-box input {
      width: 90%;
      height: 100%;
      background: transparent;
      border: none;
      outline: none;
      color: #ccbfbf;
      font-weight: 600;
      padding: 0 15px 0 5px;
      font-size: 16px;
    }

    /* icon input username en password */
    .input-box.icon {
      position: absolute;
      right: 2000px;
      font-size: 1.2em;
      color: #ffffff;
      line-height: 57px;
    }

    .remember-forget {
      font-size: .9em;
      color: #ffffff;
      font-weight: 500;
      margin: -15px 0 15px;
      display: flex;
      justify-content: space-between;
    }

    .remember-forget label input {
      accent-color: #ff9900;
      margin-right: 3px;
    }

    .remember-forget a {
      color: #ffffff;
      text-decoration: none;
    }

    .remember-forget a:hover {

      text-decoration: underline;
    }


    /* login btn in container */
    .btn {
      width: 100%;
      height: 45px;
      background-color: #17222b;
      border: none;
      outline: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1em;
      color: white;
      font-weight: 500;
      position: relative;
      top: 10px;
    }

    /* dont have an acc line */
    .login-register {
      font-size: .9em;
      color: #ffffff;
      text-align: center;
      font-weight: 500;
      margin: 25px 0 10px;
    }

    /* register link */
    .login-register p a {
      color: #ffffff;
      text-decoration: none;
    }

    /* register link underline */
    .login-register p a:hover {
      text-decoration: underline;
    }
  </style>

</head>

<body>


  <header>
    <a class="logo" href="/index.php">Logo</a>
    <nav class="navigation">
      <button class="btnLogin-popup" onclick="popup()">Login</button>
    </nav>
  </header>

  <div class="wrapper">
    <a href="/index.php"><span class="icon-close"><ion-icon name="close"></ion-icon></span></a>
    <div class="form-box register">
      <h2>Registration</h2>
      <form action="#">

        <div class="input-box">
          <input type="text" required name="username">
          <span class="icon"><ion-icon name="person"></ion-icon></span>
          <label>Username</label>
        </div>

        <div class="input-box">
          <input type="email" required name="email">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <label>Email</label>
        </div>

        <div class="input-box">
          <input type="password" required name="password">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <label>Password</label>
        </div>

        <div class="input-box">
          <input type="password" required>
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <label>Confirm Password</label>
        </div>

        <div class="remember-forget">
          <label><input type="checkbox"> I agree to the terms & conditions</label>
        </div>

        <button type="submit" class="btn" name="register">Register </button>
        <div class="login-register">
          <p>Already have an account? <a href="/sim-racing-website/login.php" class="login-link">Login </a></p>
        </div>
      </form>
    </div>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script>
    function popup() {
      location.href = "login.php"
    }
  </script>

</body>

</html>


<?php 
// Import Database file (db)
require_once 'db_connection.db';
// Listen for register key press
if(isset($_POST['register'])){
  // SQL statement
  $createAccount = $db->prepare("INSERT INTO tb_esimracing(username, email, password)VALUES(:user, :email, :pass)");

  // bind the values to the parameters
  $createAccount->bindParam(":user", $_POST['username']);
  $createAccount->bindParam(":email", $_POST['email']);
  $createAccount->bindParam(":pass", $_POST['password']);
  
  //check if successfully executed
  if($createAccount->execute()){
    echo '<script>alert("Account '.$_POST['username'].' created successfully");</script>';
    header("Location: login.php");
  }else{
    echo '<script>alert("Error in register.php file");</script>';
  }
}

?>










<!-- 

<?php
session_start();

// Initialize the session variable for storing data if not already set
if (!isset($_SESSION['formula1_times'])) {
    $_SESSION['formula1_times'] = [];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $time = htmlspecialchars($_POST['time']);
    $date = htmlspecialchars($_POST['date']);
    $car = htmlspecialchars($_POST['car']);

    // Add the new entry to the session data
    $_SESSION['formula1_times'][] = [
        'name' => $name,
        'time' => $time,
        'date' => $date,
        'car' => $car,
    ];

    // Sort the data by time (ascending)
    usort($_SESSION['formula1_times'], function ($a, $b) {
        return strcmp($a['time'], $b['time']);
    });
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formula 1 Times</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        form {
            width: 80%;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        form div {
            margin-bottom: 10px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input, form button {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }
        form button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Formula 1 Times</h1>


    <form method="post" action="">
      <div>
          <label for="name">Driver Name</label>
          <input type="text" id="name" name="name" required>
      </div>
      <div>
          <label for="time">Time (HH:MM:SS)</label>
          <input type="time" step="1" id="time" name="time" required>
      </div>
      <div>
          <label for="date">Date</label>
          <input type="date" id="date" name="date" required>
      </div>
      <div>
          <label for="car">Car</label>
          <input type="text" id="car" name="car" required>
      </div>
      <button type="submit">Add Time</button>
  </form>


  <table>
      <thead>
          <tr>
              <th>Name</th>
              <th>Time</th>
              <th>Date</th>
              <th>Car</th>
          </tr>
      </thead>
      <tbody>
          <?php if (!empty($_SESSION['formula1_times'])): ?>
              <?php foreach ($_SESSION['formula1_times'] as $entry): ?>
                  <tr>
                      <td><?= htmlspecialchars($entry['name']) ?></td>
                      <td><?= htmlspecialchars($entry['time']) ?></td>
                      <td><?= htmlspecialchars($entry['date']) ?></td>
                      <td><?= htmlspecialchars($entry['car']) ?></td>
                  </tr>
              <?php endforeach; ?>
          <?php else: ?>
              <tr>
                  <td colspan="4" style="text-align: center;">No times added yet</td>
              </tr>
          <?php endif; ?>
      </tbody>
  </table>
</body>
</html>