<?php
mysql_connect("localhost","root","");
mysql_select_db("cmtdb");
error_reporting(E_ALL ^ E_NOTICE);
$notify = "";
$name=$_POST['name'];
$comment=$_POST['comment'];
$submit=$_POST['submit'];
if(isset($_POST['notify_box'])){ $notify = $_POST['notify_box']; }
$dbLink = mysql_connect("localhost", "root", "");
    mysql_query("SET character_set_client=utf8", $dbLink);
    mysql_query("SET character_set_connection=utf8", $dbLink);

if($submit)
{
if($name&&$comment)
{
$insert=mysql_query("INSERT INTO comment (name,comment) VALUES ('$name','$comment') ");
}
else
{
echo "please fill out all fields";
}
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comment box</title>
</head>
<body>
<center>
<form action="comment.php" method="POST">
<table>
<tr><td>Name: <br><input type="text" name="name"/></td></tr>
<tr><td colspan="2">Comment: </td></tr>
<tr><td colspan="5"><textarea name="comment" rows="10" cols="50"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Comment"></td></tr>
</table>
</form>

<?php echo $name;?><br>
<?php echo $comment;?>

<?php
$dbLink = mysql_connect("localhost", "root", "");
mysql_query("SET character_set_results=utf8", $dbLink);
mb_language('uni');
mb_internal_encoding('UTF-8');

$sql="SELECT * FROM comment";
$getquery= mysql_query($sql);
while($row= mysql_fetch_array($getquery))
{
$name=$row['name'];
$comment=$row['comment'];
}
?>

</body>
</html>