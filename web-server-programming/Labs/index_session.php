<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   $country = $_POST["country"];
    $_SESSION["user_country"] = $country;

    echo "<p>Перейдите на <a href='test_session.php'>страницу test.php</a>, чтобы увидеть ее.</p>";

} else 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index Page</title>
</head>
<body>

    <h1>Укажите вашу страну:</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="country">Страна:</label>
        <input type="text" id="country" name="country"><br><br>
        <input type="submit" value="Отправить">
    </form>

</body>
</html>
