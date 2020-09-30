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
    <link rel="stylesheet" href="css/bulma-checkradio.min.css">
    <link rel="stylesheet" href="css/modal-fx.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/site.webmanifest">
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
                <div class="navbar-start">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link is-arrowless" role="presentation"><i class="fas fa-globe-asia"></i></a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" style="padding-right:1rem" href=""><img alt="flag russia" src="https://twemoji.maxcdn.com/2/svg/1f1f7-1f1fa.svg" class="g-image" style="height: 64px;"></a>
                            <a class="navbar-item" style="padding-right:1rem" href=""><img alt="flag united states" src="https://twemoji.maxcdn.com/2/svg/1f1fa-1f1f8.svg" class="g-image" style="height: 64px;"></a>
                            <a class="navbar-item" style="padding-right:1rem" href=""><img alt="flag kazakhstan" src="https://twemoji.maxcdn.com/2/svg/1f1f0-1f1ff.svg" class="g-image" style="height: 64px;"></a>
                        </div>
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <a class="navbar-item bd-navbar-item-love mx-2" href="">
                            <span><?php echo $lang['about']; ?></span>
                        </a>
                        <?php
                        if ($logged == false) {
                        ?>
                            <a class="button modal-button" data-target="#login">
                                <span class="icon has-text-info">
                                    <i class="far fa-user has-text-link"></i>
                                </span>
                                <span><?php echo $lang['login']; ?></span>
                            </a>
                        <?php
                        } else if ($logged == true) {
                        ?>
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" role="presentation">My Account</a>
                                <div class="navbar-dropdown"><a class="navbar-item" href="">Profile</a><a class="navbar-item" href="">Events</a>
                                    <hr class="navbar-divider">
                                    <a class="navbar-item" href="logout.php"><?php echo $lang['logout']; ?></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="#login" class="modal modal-fx-fadeInScale">
        <div class="modal-background"></div>
        <div class="modal-content modal-card">
            <header class="modal-card-head">
                <nav class="tabs" style="margin-bottom: -1.25rem;flex-grow:1;">
                    <div class="container">
                        <ul>
                            <li class="tab is-active" onclick="openTab(event,'loginid')"><a><?php echo $lang['login']; ?></a></li>
                            <li class="tab" onclick="openTab(event,'regid')"><a><?php echo $lang['register']; ?></a></li>
                        </ul>
                    </div>
                </nav>
                <button class="modal-button-close delete" aria-label="close"></button>
            </header>
            <div id="loginid" class="content-tab">
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
                            <a href="login.php?forgot" class="is-pulled-right"><?php echo $lang['passwordReset']; ?></a>
                        </div>
                        <br>
                        <div class="field is-grouped">
                            <div class="control">
                                <input class="button is-link" type="submit" name="signin" value="Sign in" value="<?php echo md5($date . $ip); ?>">
                            </div>
                            <div class="control">
                                <a href="oauth/google.php?login">
                                    <div class="google-btn">
                                        <div class="google-icon-wrapper">
                                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                        </div>
                                        <p class="btn-text"><?php echo $lang['SignWithGoogle']; ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </form>
                </section>
                <footer class="modal-card-foot">
                    <a class="button is-light modal-button" data-target="#register">
                        <span class="icon has-text-info">
                            <i class="fas fa-sign-in-alt has-text-link"></i>
                        </span>
                        <span><?php echo $lang['register']; ?></span>
                    </a>
                    <a href="login.php?resend" class="button is-light"><?php echo $lang['verification']; ?></a>
                </footer>
            </div>
            <div id="regid" class="content-tab" style="display:none">
                <section class="modal-card-body">
                    <form method="POST" action="login.php?register">
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
                            <label class="label">Your name</label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="text" class="input" name="full" placeholder="Your Name">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user-plus"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="text" class="input" name="email" placeholder="Email">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
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
                        <br>
                        <div class="field is-grouped">
                            <div class="control">
                                <input class="button is-link" type="submit" name="signup" value="Sign up" value="<?php echo md5($date . $ip); ?>">
                            </div>
                            <div class="control">
                                <a href="oauth/google.php?login">
                                    <div class="google-btn">
                                        <div class="google-icon-wrapper">
                                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                        </div>
                                        <p class="btn-text">Sign up with Google</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </form>
                </section>
                <footer class="modal-card-foot">
                    <a href="login.php?login" class="button is-light">Already have an account?</a>
                    <a href="login.php?resend" class="button is-light">Resend verification email</a>
                </footer>
            </div>
        </div>
    </div>