<?php
require_once "config.php";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = $lang['username_empty'];
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = $lang['username_similar'];
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo $lang['smth_wrong'];
            }
        }
        mysqli_stmt_close($stmt);
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = $lang['password_empty'];
    } elseif (strlen(trim($_POST["password"])) < 3) {
        $password_err = $lang['password_small'];
    } else {
        $password = trim($_POST["password"]);
    }
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = $lang['confirm_password'];
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = $lang['password_different'];
        }
    }
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
            } else {
                echo $lang['smth_wrong'];
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
        <input class="input" type="password" name="password" value="<?php echo $password; ?>">
        <span class="help is-danger"><?php echo $password_err; ?></span>
    </div>
    <div class="field">
        <label class="label">Подтверждение пароля</label>
        <input class="input" type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
        <span class="help is-danger"><?php echo $confirm_password_err; ?></span>
    </div>
    <div class="field">
        <input class="button is-link" type="submit" value="Зарегистрироваться">
    </div>
    <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
</form>