<?php
include('blogic.php');
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
            $allPosts = fetchAllPosts();
            foreach ($allPosts as $post) {
        
           
        ?>

		<article class="article">
		    <section>
		        <h1><?php echo($post['title'])?></h1>
		        <h3>category: <strong>
		        <a href="category-tags.php?category_id=<?php echo($post['category']) ?>"><?php echo($post['category'])?></a>
		        </strong></h3>
		        <div class="article_meta"> by: <?php echo($post['name'])?></div>
		    </section>
		    <div>
		        <p><?php echo($post['content']) ?></p>

		    </div>
		</article>
     <?php } ?>
        </main>
    </div>

    <?php include('footer.php') ?>
</body>
</html>