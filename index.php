<?php 
// Import script autoload agar bisa menggunakan library
require_once('./vendor/autoload.php');
// Import library
use Firebase\JWT\JWT;
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
if (isset($_POST['submit'])) {
  $email =  $_POST["email"];
  $password =  $_POST["password"];
  $myObj = new stdClass();
$myObj->email = "$email";
$myObj->password = "$password";
$myJSON = json_encode($myObj);
header('Content-Type: application/json');
// Cek method request apakah POST atau tidak
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  exit();
}
$input = json_decode($myJSON);
// Jika tidak ada data email atau password
if (!isset($input->email) || !isset($input->password)) {
  http_response_code(400);
  exit();
}
// Cuma data mock/dummy, bisa diganti dengan data dari database
include_once 'api/config/database.php';
include_once 'api/objects/user.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// instantiate user object
$user = new User($db);
$user->email = $input->email;
$email_exists = $user->emailExists();

// Jika email atau password tidak sesuai
if($email_exists && password_verify($input->password, $user->password)) {
// 15 * 60 (detik) = 15 menit
$expired_time = time() + (15 * 60);
$payload = [
  'email' => $input->email,
  'exp' => $expired_time
];
$access_token = JWT::encode($payload, $_ENV['ACCESS_TOKEN_SECRET']);
setcookie('Mendoan',$access_token);
header("location:dashboard.php");
}
else{
    echo json_encode([
    'message' => 'Email atau password tidak sesuai'
  ]);
  exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;500&display=swap" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  <script src="style.js">
</script>
   <h2 class="subtitle">Mendoan</h2>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="#">
            <h1>Create Account</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your email for registration</span>
            <input type="text" placeholder="Name" />
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="password" />
            <button>Sign Up</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="" id="login_form" method="POST">
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input name ="email" type="email" placeholder="Email" />
            <input name ="password"type="password" placeholder="Password" />
            <a href="#">Forgot your password?</a>
            <button type="submit" class="btn btn-info" name="submit" value="submit" >Submit</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h2>Man Tsabata Nabata</h2>
                <blockquote>"Barang siapa yang fokus di satu titik, dia yang akan tumbuh"</blockquote>
                <!-- <button class="ghost" id="signUp">Sign Up</button> -->
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>