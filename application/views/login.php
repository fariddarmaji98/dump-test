<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    LOGIN
    <form action="<?php echo base_url() ?>" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <input type="submit" name="cek" value="LOGIN">
    </form>
</body>
</html>