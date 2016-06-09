<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
include 'core/Config.php';
include('core/BaseTable.class.php');
include('core/Post.class.php');
$post = new Post();
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

<?php if (count($post->getPosts()) > 0) { ?>
Last posts:
    <?php foreach($post->getPosts() as $key=>$post) { ?>
                <h2><?php echo htmlspecialchars($post['title']); ?> | On: <?php echo htmlspecialchars($post['creation_date']); ?></h2>
                <p><?php echo htmlspecialchars($post['content']); ?></p>
                <a href="comments.php?id_post=<?php echo $post['id']; ?>">Comments</a>
                <hr>
        <?php } ?>
<?php } else { ?>
           please post content!
<?php } ?>
</div>


<div id="footer">
© 2016
</div>

</body>
</html>

