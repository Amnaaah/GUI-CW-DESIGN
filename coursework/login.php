<?php
session_start();

// Check if username and email cookies are set
if (isset($_COOKIE['username']) && isset($_COOKIE['email'])) 
{
    // If cookies are set,fill the form
    $savedUsername = $_COOKIE['username'];
    $savedEmail = $_COOKIE['email'];
} else {
    // If no cookies, leave the fields blank
    $savedUsername = "";
    $savedEmail = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Booksy Login</title>
  <style>
    body 
    {
      background-image: url('Images/logbg.png');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card 
    {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 15px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
      padding: 40px;
      width: 100%;
      max-width: 500px;
    }

    .btn-primary 
    {
      background-color: #154d52;
      border: none;
      font-size: 18px;
    }

    .btn-primary:hover 
    {
      background-color: #46a8b3;
    }

    .card-title 
    {
      color: #15707a;
      font-weight: bold;
      font-size: 28px;
      margin-bottom: 20px;
    }

    .form-label 
    {
      color: #555;
      font-size: 16px;
    }

  </style>

</head>
<body>
  <div class="login-container">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title text-center">Welcome to Booksy</h3>
        <p class="text-center">Login to access your account</p>
       <form action="loginn.php" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="txtusername" name="username" 
               value="<?php echo htmlspecialchars($savedUsername); ?>" required> 
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="txtemail" name="email" 
               value="<?php echo htmlspecialchars($savedEmail); ?>" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="txtpassword" name="password" required>
    </div>
    <button type="submit" id="btnlogin" class="btn btn-primary w-100">Login</button>
          <div class="text-center mt-3">
              <p>New to Booksy? <a href="Register.html" class="btn btn-outline-secondary">Register Now</a></p>
            </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


