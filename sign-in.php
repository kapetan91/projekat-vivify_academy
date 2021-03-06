<?php session_start() ;
include ('auth.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $auth = Auth::getAuthInstance(); 
        $auth->signIn($_POST['email'], $_POST['password']);
        }

?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">
    <title>Vivify Academy Blog - Homepage</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="sign-in">

    <?php include('header.php') ?>
</header>

    <div class="container">
        <main class="page-content">
            <div class="profile">

            <form method="post">
                 <div class="new-post">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-input">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-input">
                    </div>
                    
            </div>
            <div class="form-group">
           <input type="submit" class="button button--primary" value="Sign in">
            <a href="register.php" title="Register">Sign up</a>
            </div>
        </form>
        </main>
    </div>
    
    <?php include('footer.php'); ?>

</body>
</html>
