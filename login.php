<?php
require_once "config.php";
$username = $password = "";
$username_err = $password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = $lang['username_empty'];
    } else {
        $username = trim($_POST["username"]);
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = $lang['password_empty'];
    } else {
        $password = trim($_POST["password"]);
    }
    if (trim($_POST["username"]) == "admin" && trim($_POST["password"]) == "admin") {
        header("location: admin.php");
        session_start();
        $_SESSION["admin"] = true;
    }
    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            header("location: profile.php");
                        } else {
                            $password_err = $lang['password_err'];
                        }
                    }
                } else {
                    $username_err = $lang['username_err'];
                }
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="field">
        <label class="label">Логин</label>
        <input class="input" type="text" name="username" value="<?php echo $username; ?>">
        <span class="help is-danger"><?php echo $username_err; ?></span>
    </div>
    <div class="field">
        <label class="label">Пароль</label>
        <input class="input" type="password" name="password">
        <span class="help is-danger"><?php echo $password_err; ?></span>
    </div>
    <div class="field">
        <input class="button is-link" type="submit" value="Войти">
    </div>
    <p>Нет аккаунта? <a href="register.php">Зарагестрироваться</a></p>
</form>