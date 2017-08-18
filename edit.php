<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico">
    <title>Vivify Academy Blog - Homepage</title>

    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="homepage">


    <?php 
    session_start();
    include('header.php');
    include('post.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'edit') {
        $post=Post::getEditPost(); 
        $post->EditPost($_POST['title'], $_POST['content']);
        }
    ?>

         <div class="container">
        <main class="page-content">

    

                <?php



                // var_dump($_GET['post_id']);

               if (isset($_GET['post_id'])) {

                   $postId = $_GET['post_id'];

                    // var_dump($postId);
                    $singlePost=fetchPostById($postId);
                    // var_dump($singlePost);
                  
                   ?>


                
                
           
             <form method="post">
                <div class="content-new-post">
                <div class="form-group">
                    <label for="title">Title </label><br>
                    <input type="text" class="form-input" name="title" value="<?php echo $singlePost['title'] ?>"><br>
                    <label for="content">Content</label><br>
                    <textarea name="content" rows="20" class="form-input" ><?php echo $singlePost['content'] ?></textarea> <br>

                    <button type="submit" value="EditPost" class="button button--primary"> Save </button>
                    <input type="hidden" name="action" value="edit">

                </form>    

                <?php } ?>
                </div>
                </div>
                </div>

        </main>
  	<?php include ('footer.php')?>