<html>
<body>
 
<form action="welcome.php" method="post">
Name: <input type="text" name="name" value="asfdf"><br>
E-mail: <input type="text" name="email" value="asfdf"><br>
<input type="submit">
</form>
 Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
</body>
</html>
