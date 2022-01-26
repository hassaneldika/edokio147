<?php include("connect.php") ;

?>
<!DOCTYPE html>
<html>

<head>
	<title>Uploaded Files</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh;
		}

		.alb {
			width: 200px;
			height: 200px;
			padding: 5px;
		}

		.alb img {
			width: 100%;
			height: 100%;
		}

		
	</style>
</head>

<body>
	<a href="posts.php">&#8592; Back</a>
	<?php
	$conx = new Service;
	$conx->connect();
	$query = $conx->dbh->prepare("SELECT DISTINCT * FROM uploadedfiles WHERE Title = :Title;");
    $query->bindParam(":Title", $_GET['Title']);
	$query->execute();
	$result = $query->fetchAll();

	foreach ($result as $rows) {
	?>
	
		<div class="alb">
			<?php if(strpos($rows['file_url'],".pdf")){?>
				<img src="images/pdf.png">
				<a href="Uploaded Files/<?php echo $rows['file_url'] ?>"><?php echo $rows['file_url'] ?></a></br>
				<?php } else {?>
			<img src="Uploaded Files/<?php echo $rows['file_url'] ?>">
			<a><?php echo $rows['file_url'] ?></a></br>
			<?php } ?>
				<input type="hidden" name="file_url" value="<?php echo $rows['file_url'] ?>">
				<a class="btn btn-danger text-white" href="RemoveFile.php?Title=<?php echo $_GET['Title']?>&file_url=<?php echo $rows['file_url'] ?>">Delete</a>
			

		</div>

	<?php } ?>

</body>

</html>