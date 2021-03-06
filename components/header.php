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
    <section class="section is-header" style="height: 50px; margin-top: -40px;">
        <div class="container">
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
                            <div class="select">
                                <select id="selectItem">
                                    <option id="Nur-sultan">Нур-Султан</option>
                                    <option id="Astana">Астана</option>
                                </select>
                            </div>
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link is-arrowless" role="presentation">&nbsp;&nbsp;&nbsp;<i class="fas fa-globe-asia"></i>&nbsp;&nbsp;&nbsp;</a>
                                <div class="navbar-dropdown">
                                    <a class="navbar-item" style="padding-right:0rem" href="" onclick="ChangeLang('ru.php')"><img alt="flag russia" src="https://twemoji.maxcdn.com/2/svg/1f1f7-1f1fa.svg" class="g-image" style="height: 64px;padding:0rem"></a>
                                    <a class="navbar-item" style="padding-right:0rem" href="" onclick="ChangeLang('en.php')"><img alt="flag united states" src="https://twemoji.maxcdn.com/2/svg/1f1fa-1f1f8.svg" class="g-image" style="height: 64px;"></a>
                                    <a class="navbar-item" style="padding-right:0rem" href="" onclick="ChangeLang('kz.php')"><img alt="flag kazakhstan" src="https://twemoji.maxcdn.com/2/svg/1f1f0-1f1ff.svg" class="g-image" style="height: 64px;"></a>
                                    <a class="navbar-item is-invisible" style="margin-bottom:-10px;"></a>
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
                                        <a class="navbar-link" role="presentation"><?php echo $lang['account']; ?></a>
                                        <div class="navbar-dropdown"><a class="navbar-item" href="profile.php"><?php echo $lang['profile']; ?></a><a class="navbar-item" href="event.php"><?php echo $lang['events']; ?></a>
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
        </div>
    </section>
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
                    <form method="POST" action="login.php">
                        <div class="field">
                            <label class="label"><?php echo $lang['username']; ?></label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="text" class="input" name="username" placeholder="Username">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label"><?php echo $lang['password']; ?></label>
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
                                <input class="button is-link" type="submit" name="signin" value="<?php echo $lang['login'] ?>" value="<?php echo md5($date . $ip); ?>">
                            </div>
                            <div class="control">
                                <a href="oauth/google.php?login">
                                    <div class="google-btn">
                                        <div class="google-icon-wrapper">
                                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                        </div>
                                        <p class="btn-text"><?php echo $lang['signWithGoogle']; ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </form>
                </section>
                <footer class="modal-card-foot">
                    <a href="account-recovery.php" class=""><?php echo $lang['loginproblems']; ?></a>
                </footer>
            </div>
            <div id="regid" class="content-tab" style="display:none">
                <section class="modal-card-body">
                    <form method="POST" action="register.php">
                        <div class="field">
                            <label class="label"><?php echo $lang['username']; ?></label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="text" class="input" name="username" placeholder="Username">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label"><?php echo $lang['name']; ?></label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="text" class="input" name="full" placeholder="Your Name">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user-plus"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label"><?php echo $lang['email']; ?></label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="text" class="input" name="email" placeholder="Email">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label"><?php echo $lang['password']; ?></label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="password" class="input" name="password" placeholder="Password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label"><?php echo $lang['confirm_password']; ?></label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="password" class="input" name="confirm_password" placeholder="Password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="field is-grouped">
                            <div class="control">
                                <input class="button is-link" type="submit" name="signup" value="<?php echo $lang['register'] ?>" value="<?php echo md5($date . $ip); ?>">
                            </div>
                            <div class="control">
                                <a href="oauth/google.php?login">
                                    <div class="google-btn">
                                        <div class="google-icon-wrapper">
                                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                                        </div>
                                        <p class="btn-text"><?php echo $lang['signWithGoogle']; ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </form>
                </section>
                <footer class="modal-card-foot">
                    <a href="account-recovery.php" class=""><?php echo $lang['loginproblems']; ?></a>
                </footer>
            </div>
        </div>
    </div>