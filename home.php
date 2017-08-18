<?php include('blogic.php') ?>
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

                $posts = getPosts();


                foreach ($posts as $post) { ?>

                <article class="article">
                    <header>
                        <h1><a href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a></h1>
                        <h3>category: <strong>
                    <a href="category-tabs.php?category_id=<?php echo($post['category']) ?>"><?php echo($post['category'])?></a>
                    </strong></h3>
                        <div class="article_meta"> <?php echo($post['created_at'])?> by: <?php echo($post['name'])?></div>
                    </header>

                    <div>
                        <p><?php echo($post['content']) ?></p>
                    </div>
                </article>

         <?php } ?>
		</main>
		<div class="paginator">
            <a href="all-post.php" title="All posts">All posts</a>
         </div>
        </main>
    </div>

    <?php include('footer.php') ?>

</body>
</html>