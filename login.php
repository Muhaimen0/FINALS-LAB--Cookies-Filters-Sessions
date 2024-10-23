<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    
    
    $favcolor = filter_input(INPUT_POST, 'favcolor', FILTER_SANITIZE_STRING);

    
    if (!preg_match("/^[a-zA-Z\s]+$/", $favcolor)) {
        $error = "Favorite color can only contain letters and spaces.";
    } else {
        
        if (!empty($username) && !empty($favcolor)) {
            
            $_SESSION["username"] = $username;

            
            setcookie("favcolor", $favcolor, time() + (86400 * 30), "/"); 
           
            header("Location: welcome.php");
            exit();
        } else {
            $error = "Both fields are required.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> 
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <br>
            <label for="favcolor">Favorite Color:</label>
            <input type="text" name="favcolor" required>
            <br>
            <input type="submit" value="Login">
        </form>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
