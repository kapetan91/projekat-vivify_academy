<?php
	include('db.php');

	function fetchPostById($id){

		$sql = "SELECT * FROM posts WHERE id = '{$id}'";

        return fetch($sql);


	}

	function fetchUserById() {

		$sql_users = "SELECT * FROM users WHERE id = '{$id}'";
		
		return fetchAll($sql_users);

	}

	function fetchFromTableById($table, $id){

    	$sqlT = "SELECT * FROM $table WHERE id='{$id}'";

    	return $sqlT;
	}

	function fetchUserWhoPosted(){


	}

	function fetchCommentsOnPost($id){

		// var_dump($id);


		$sql_comments = "SELECT comments.id, comments.author, comments.content, comments.created_at, profiles.name FROM comments
        INNER JOIN users ON comments.author = users.id
        INNER JOIN profiles ON users.id = profiles.user_id
        WHERE post_id = '{$id}'
        ORDER BY created_at DESC LIMIT 3";

        return fetchAll($sql_comments);

	}

	function fetchPostsByUser(){

		$sqlPostByU = "SELECT * FROM posts WHERE users.id = 1";
		
		return fetchAll($sqlPostByU);

	}

	function fetchSingleQueryResults($postId){

        $sqlPost = "SELECT posts.id, posts.title, posts.created_at, posts.created_by, posts.content,
                posts.category, profiles.name FROM posts
                INNER JOIN users ON users.id = posts.created_by
                INNER JOIN profiles ON users.id = profiles.user_id
                WHERE posts.id = '{$postId}'";
    	            
        return fetch($sqlPost);
	}

	function getPosts(){

		$sql = "SELECT posts.id, posts.title, posts.created_at, posts.created_by, posts.content,
                posts.category, profiles.name FROM posts
                INNER JOIN users ON users.id = posts.created_by
                INNER JOIN profiles ON users.id = profiles.user_id
                ORDER BY created_at DESC LIMIT 3";

        return fetchAll($sql);
	}

	function fetchAllFromTable($tableName){
		$sql = $tableName;

		return fetchAll($tableName);
	}

	function fetchAllPosts(){
		$sql = "SELECT posts.id, posts.title, posts.created_at, posts.content,
                profiles.name, posts.category FROM posts
                INNER JOIN users ON users.id = posts.created_by
                INNER JOIN profiles ON users.id = profiles.user_id
                ORDER BY created_at DESC";

         return fetchAll($sql);

	}
	function getCategory($categoryId){
        $sqlc = "SELECT posts.id, posts.title, posts.created_at, posts.content, posts.created_by, profiles.name,  posts.category
            FROM posts 
            INNER JOIN users ON users.id = posts.created_by
            INNER JOIN profiles ON users.id = profiles.user_id
            WHERE posts.category = '{$categoryId}'
            ORDER BY created_at DESC";

        return fetchAll($sqlc);

	}


		

?>