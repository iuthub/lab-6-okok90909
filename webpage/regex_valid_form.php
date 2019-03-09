<?php
 function remove_whitespace($text){
 	return preg_replace("/ /", "", $text);
 }
function remove_nonnumeric($text){
 	return preg_replace("/[^\d,.]/", "", $text);
 }
function remove_newlines($text){
 	return preg_replace("/\n/", "", $text);
 }
function inside_parenthesis($text){
	preg_match("/\[(.*)\]/", $text, $match);
	return $match[1];
// 	return preg_replace("/\](*.)/", "", preg_replace("/(*.)\[/", "", $text));
 }
	$pattern="";
	$text="";
	$replaceText="";
	$replacedText="";

	$match="Not checked yet.";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

	$replacedText=preg_replace($pattern, $replaceText, $text);

	if(preg_match($pattern, $text)) {
						$match="Match!";
					} else {
						$match="Does not match!";
					}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

			<dt>Text</dt>
			<dd><input type="" name="text" value="<?= $text ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="textarea" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
 			<dd> <code><?=	remove_whitespace($replacedText)?></code></dd>

 			<dd> <code><?=	remove_nonnumeric($replacedText)?></code></dd>
			<dd> <code><?=	remove_newlines($replacedText) ?></code></dd>
			<dd> <code><?=	inside_parenthesis($replacedText) ?></code></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>
