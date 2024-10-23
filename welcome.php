<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> 
</head>
<body>
    <div class="container">
        <h2>Welcome, 
        <?php 
       
        if (isset($_SESSION["username"])) {
            echo htmlspecialchars($_SESSION["username"]); 
        } else {
            echo "Guest"; 
        }
        ?>!
        </h2>
        
        <h3>Your Preferences:</h3>
        <p>Favorite Color: <?php echo isset($_COOKIE["favcolor"]) ? htmlspecialchars($_COOKIE["favcolor"]) : "Not set"; ?></p>

        <form method="post" action="logout.php">
            <input type="submit" value="Logout">
        </form>
    </div>
</body>
</html>
