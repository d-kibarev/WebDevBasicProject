<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/content/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/content/bootstrap/dist/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/content/styles.css" />
    <title>
        <?php if (isset($this->title)) echo htmlspecialchars($this->title) ?>
    </title>
</head>

<body>
    <header id="app-header">
        <a href="/"><img src="/content/images/movies.png"></a>
        <h1 id="header-title">Forum</h1>

        <ul class="menu">
            <li><a href="/">Home</a></li>

            <li id="linkUserProfile"><a href="/account/profile">Welcome,
                <?php
                    if(isset($_SESSION['username'])){
                        echo $_SESSION['username'];
                    }
                else{
                    echo "Guest";
                }?>!</a>
            </li>
            <?php if(!$this->isLoggedIn) : ?>
                <li><a href="/account/login">Login</a></li>
            <?php endif ?>
            <?php if($this->isLoggedIn) : ?>
            <li>
                <form method="post" action="/account/logout">
                    <input type="submit" id="btn-logout" value="Logout">
                </form>
            </li>
        </ul>
        <?php endif ?>
    </header>

    <?php include('messages.php'); ?>
