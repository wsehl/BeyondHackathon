<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Greenmeetings</title>
    <link rel="stylesheet" href="css/mystyles.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/modal-fx.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-light.min.css">
</head>

<body>
    <nav id="navbar" class="bd-navbar navbar is-spaced is-fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="index.php"><img src="images/logo.png" alt="Restaurant X" width="112" height="28"></a>
                <div id="navbarBurger" class="navbar-burger burger" data-target="navMenuDocumentation">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <div id="navMenuDocumentation" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item" href="about.php"><span><?php echo $lang['about']; ?></span></a>
                    <a class="navbar-item" href="contact.php"><span><?php echo $lang['contact']; ?></span></a>
                    <div class="navbar-item">
                        <div class="buttons">
                            <?php
                            if ($logged == false) {
                            ?>
                                <a class="button modal-button" data-target="#signin">
                                    <span class="icon has-text-info">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <span><?php echo $lang['login']; ?></span>
                                </a>
                            <?php
                            } else if ($logged == true) {
                            ?>
                                <a href="welcome.php" class="button is-small">Профиль</a>
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link" role="presentation">My Account</a>
                                    <div class="navbar-dropdown"><a class="navbar-item" href="//localhost/sites/sehlga/user/admin">Pastes</a><a class="navbar-item" href="//localhost/sites/sehlga/profile">Settings</a>
                                        <hr class="navbar-divider">
                                        <a class="navbar-item " href="logout.php">Logout</a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="#signin" class="modal modal-fx-fadeInScale">
        <div class="modal-background"></div>
        <div class="modal-content modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Sign in</p>
                <button class="modal-button-close delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <form method="POST" action="login.php?login">
                    <div class="field">
                        <label class="label">Username</label>
                        <div class="control has-icons-left has-icons-right">
                            <input type="text" class="input" name="username" placeholder="Username">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control has-icons-left has-icons-right">
                            <input type="password" class="input" name="password" placeholder="Password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="b-checkbox is-info is-inline">
                            <input class="is-checkradio is-info" id="rememberme" name="rememberme" type="checkbox" checked="">
                            <label for="rememberme">
                                <?php echo $lang['rememberme']; ?>
                            </label>
                        </div>
                        <a href="login.php?forgot" class="is-pulled-right">Forgot Password?</a>
                    </div>
                    <br>
                    <div class="field is-grouped">
                        <div class="control">
                            <input class="button is-link" type="submit" name="signin" value="Sign in" value="<?php echo md5($date . $ip); ?>">
                        </div>
                        <!-- Oauth -->
                        <div class="control">
                            <a href="oauth/google.php?login">
                                <div class="google-btn">
                                    <div class="google-icon-wrapper">
                                        <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                    </div>
                                    <p class="btn-text">Sign in with Google</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- // -->
                </form>

            </section>
            <footer class="modal-card-foot">
                <a href="login.php?register" class="button is-light">Register</a>
                <a href="login.php?resend" class="button is-light">Resend verification email </a>
            </footer>
        </div>
    </div>