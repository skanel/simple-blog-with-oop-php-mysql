<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
include 'core/Config.php';
include('core/BaseTable.class.php');
include('core/Post.class.php');
include('core/Comment.class.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="My blog for testing">
    <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>

<div id="header">
<h1><a href="index.php">My Super Blog!</a></h1>

</div>

<div id="section">
<a href="index.php"> <<< Back </a>	
                <?php 
                if(!isset($_GET['id_post'])){
                	header('Location: index.php');
                	exit;
                }else{
                	$id_post = (int)trim($_GET['id_post']);                
                	$comment = new comment();
                	$post = new Post();
                	$post->load($id_post);
                	$commentList = $comment->getCommentsbyPostId($id_post);
		?>                
                 <?php if($post->title!=null) { ?>
                    <h2><?php echo htmlspecialchars($post->title); ?></h2>
                    <p><?php echo htmlspecialchars($post->content); ?></p>
                    <hr>
                    <?php 
                	if(count($commentList) >0){
                		foreach ($commentList as $key=>$comment){?>
                					 <p>
                					 <?php echo htmlspecialchars($comment['owner']); ?>
                					 <i>commented on <?php echo htmlspecialchars($comment['comment']); ?></i>
                					 </p> 
                		<?php }
                	} else {
                
                		echo "There is no comment on this post";
                	}
                  } else { ?>
                    <p>Sorry, Not available for you! </p>
                 <?php } ?>
                
                <?php } 
         
                ?>
                
    
</div>


<div id="footer">
© 2016
</div>

</body>
</html>