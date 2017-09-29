<?php
	// configure color scheme: "dark" (default) or "light"
	$scheme = 'dark';
	// check whether Save button was hit
	if (isset($_POST['submit'])) {
		// setting correct mime type for chosen extension
		if ($_POST['ext'] == '.md'){
			$mime = "markdown";
		} else {
			$mime = "plain";
		}
		// check whether filename was entered
		if ($_POST['filename'] !== '') {
			$filename = $_POST['filename'];
		} else {
			$filename = 'yourfile';
		}
		// set mime type for file to be saved
		header('Content-type: text/'.$mime);
		// set filename for file to be saved
		header('Content-disposition: attachment;filename='.$filename.$_POST['ext']);
		// echo file contents
		echo $_POST['text'];
		// prevent the html stuff below to be written into the file by exiting
		exit;
	}
?>

<!doctype HTML>
<html>
	<head> 
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!-- css: reset -->
    	<link rel="stylesheet" href="assets/css/reset.css" type="text/css" />
    	<!-- css: style -->
		<link rel="stylesheet" href="assets/css/style-<?php echo $scheme; ?>.css" type="text/css" />
		<title>DistLess</title>
	</head>

	<body>
		<!-- help tooltip -->
		<div class="tooltip">?
  			<span class="tooltiptext">Hit F11 to toggle fullscreen</span>
		</div> 
		<main class="main" role="main">
			<form method="post" action="" class="distless">
				<!-- extension selector -->
				<select name="ext">
					<option value=".txt">.txt</option>
  					<option value=".md">.md</option>
  				</select>
  				<!-- filename -->
				<input type="text" class="field" name="filename" placeholder="Filename"/>
				<!-- file content -->
				<textarea class="text" name="text" placeholder="Text"></textarea>
				<!-- save file button -->
				<input class="submit" type="submit" name="submit" value="Save" />
			</form>
		</main>
	</body>
</html>
