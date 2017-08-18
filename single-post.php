<?php
session_start();
include('post.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $post=Post::getPostInstance(); 
        $post->createComments($_POST['content'], $_GET['post_id']);
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
<body class="homepage">

    <?php include('header.php') ?>

    <div class="container">
        <main class="page-content">
        <?php
            $post = fetchSingleQueryResults($_GET['post_id']);
        ?>   
            <article class="article">
                <section>
                    <h1><?php echo($post['title'])?></h1>
                    <h3>category: <strong>
                    <a href="category-tabs.php?category_id=<?php echo($post['category']) ?>"><?php echo($post['category'])?></a>
                    </strong></h3>
                    <div class="article_meta"> by: <?php echo($post['name'])?></div>
                </section>
                <div>
                    <p><?php echo($post['content']) ?></p>
                </div>
            </article> 
        

         <div class="container">
         <form method="post">
                <div class="form-group">
                    <label class="form-label">Your comments</label>
                    <textarea rows="7" name="content" class="form-input"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="button button--primary" value="Send">
                </div>
            </div>
                <div class="container">
                <div class="comments">

                    <h3>comments:</h3>

            <?php 
            $commentsPost = fetchCommentsOnPost($post['id']);

            foreach ($commentsPost as $comment) { ?> 
                    
                    <div class="single-comments">
                        <div>posted by: <strong><?php echo($comment['name']) ?> </strong> <?php echo($comment['created_at']) ?></div>
                        <div class="comments-posts"><?php echo($comment['content']) ?></div>
                    </div>
            </form>
            </div>

            <?php } ?> 

                

            </article>
        </main>
    </div>

    <?php include('footer.php') ?>
</body>
</html>
