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
            <li><a href="/account/login">Login</a></li>
            <li><a href="/account/register">Register</a></li>
        </ul>
    </header>

    <?php include('messages.php'); ?>
