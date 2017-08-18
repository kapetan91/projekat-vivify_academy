<?php 

include('blogic.php');

class Post {

	public function createPost($title, $category, $content) {
    
    
    $createdAt = date("Y-m-d H:i:s");
    $createdBy = $_SESSION['current_user']['id'];

    executeQuery("INSERT INTO posts VALUES ( NULL, '$title', '$category', '$content', '$createdAt', '$createdBy')");
    
    // $_SESSION['current_user'] = $user;
    header("Location: http://localhost:1234/home.php");

  }

   public static function getPostInstance() {
    return new Post();
  }

  public function createComments($content, $postId){

    $createdAt = date("Y-m-d H:i:s");
    $author = $_SESSION['current_user']['id'];

    executeQuery("INSERT INTO comments VALUES (NULL, '$author', '$content', '$createdAt', $postId)");

    $_SESSION['current_user'] = $user;

  
     header("Location: http://localhost:1234/single-post.php?post_id=" . $postId);

  }


 public function EditPost(){

      $user=$_SESSION['current_user'];
      $postId = $_GET['post_id'];
      $title=$_POST['title'];
      $content=$_POST['content'];

      $post= fetchSingleQueryResults($postId);

      if($user['id'] !== $post['created_by']){
          $errorMessage="Ne more";
          echo $errorMessage;

      } else{
          $postEdit="UPDATE posts SET title='$title', content='$content' WHERE id='{$postId}'";    
          executeQuery($postEdit);
          
          header("Location: user.php");
      }    


    }

  public static function getEditPost(){
    return new Post();
  }

  function deletePost($id){

    // delete comments for post
    executeQuery("DELETE FROM comments WHERE post_id='{$id}'");

    executeQuery("DELETE FROM posts WHERE id='{$id}'");

    header("Location: user.php");
  }

      public static function getDeletePost() {
        return new Post();
}
  
  function getPostDetalis(){
    $posts = getPosts();
    return $posts;
  }

}



// public function editPost($post){

//     $sqlEditPost = "UPDATE posts SET
//                           title = \"{$post->title}\",
//                           text = \"{$post->text}\",
//                           category_id = ".$post->category->getId().",
//                           user_id = ".$post->user->getId()."
//                           WHERE post.id = ". $post->getId();
//     $this->executeQuery($sqlEditPost);
//   }
//   public function deletePost($id){
//     $sql = "DELETE FROM posts WHERE id=$id";
//     $this->executeQuery($sql);
//   }

?>

