<?php 
session_start();
include('post.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'add') {
        $post=Post::getPostInstance(); 
        $post->createPost($_POST['title'], $_POST['category'], $_POST['content']);
        }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'delete') {
        $delete_post=Post::getDeletePost(); 
        $delete_post->deletePost($_POST['post_id']);
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
<body class="user">

    <?php include('header_s.php') ?>
     <div class="container">
        <main class="page-content">
            <table class="table-list">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Options</th>
                    </tr>
                </thead>

                <tbody>
                <?php

                $p = new Post();
                $posts = $p->getPostDetalis();

             


                foreach ($posts as $post) { ?>
                    <tr>
                        <td><a href="single-post.php?post_id=<?php echo($post['id']) ?>" title="title"><?php echo($post['title']) ?></a></td>
                        <td>
                            <a href="edit.php?post_id=<?php echo($post['id']) ?>" name="edit" title="edit">Edit</a>

                            <!-- <a href=" name="delete" title="delete"></a> -->

                            <form method="post">
                                <input type="submit" value="Delete">
                                <input type="hidden" name="post_id" value="<?php echo($post['id']) ?>">
                                <input type="hidden" name="action" value="delete">
                            </form>


                        </td>
                    </tr>
                      <?php } ?>
                    <!-- <tr>
                        <td><a href="#" title="#">Post title</a></td>
                        <td><a href="#" name="edit" title="edit">Edit</a>
                            <input type="hidden" name="action" value="delete">
                            <a href="#" name="delete" title="delete">Delete</a></td>
                    </tr> -->
                </tbody>
            </table>
            
            <header class="page-header">
                <h1>Add new post</h1>
            </header>
            <form method="post">
            <div class="content-new-post">
                <div class="form-group">
                    <label class="form-label">Post title</label>
                        <input type="text" name="title" class="form-input">
                </div>
                    <label class = "form-label"> category:</label>
                        <input type="text" name="category" class="">

                <div class="form-group">
                    <label class="form-label">Post content</label>
                    <textarea rows="15" type= "text" name="content" class="form-input"></textarea>
                </div>

                <div class="form-group">
                <input type="submit" class="button button--primary" value="Save">
                </div>

                <input type="hidden" name="action" value="add">

            </div>
            </form>
        </main>




        <?php include('footer.php'); ?>

</body>
</html>