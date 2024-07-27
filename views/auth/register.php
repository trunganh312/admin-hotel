<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <!-- import JavaScript -->
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
</head>

<body>
    <h1>Register</h1>
    <form method="post" action="index.php?action=register">
        <label for="firstname">Firstname:</label>
        <input value="<?php if (isset($firstname)) echo htmlspecialchars($firstname); ?>" type="firstname" id="firstname" name="firstname">
        <br>
        <span style="color: red;"><?php if (isset($errors["firstname"])) echo htmlspecialchars($errors["firstname"]); ?></span>
        <br>
        <br>
        <label for="lastname">Lastname:</label>
        <input value="<?php if (isset($lastname)) echo htmlspecialchars($lastname); ?>" type="lastname" id="lastname" name="lastname">
        <br>
        <span style="color: red;"><?php if (isset($errors["lastname"])) echo htmlspecialchars($errors["lastname"]); ?></span>
        <br>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php if (isset($username)) echo htmlspecialchars($username); ?>">
        <br>
        <span style="color: red;"><?php if (isset($errors["username"])) echo htmlspecialchars($errors["username"]); ?></span>
        <br>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php if (isset($password)) echo htmlspecialchars($password); ?>">
        <br>
        <span style="color: red;"><?php if (isset($errors["password"])) echo htmlspecialchars($errors["password"]); ?></span>
        <br>
        <br>
        <input type="submit" value="Register">
    </form>


    <a href="login.php">Login</a>
</body>

</html>