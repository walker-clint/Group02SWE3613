<?php
session_start();
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
session_destroy(); 
if(!session_is_registered('id')){ 
$msg = "You are now logged out";
} else {
$msg = "<h2>could not log you out</h2>";
} 
?> 
<html>
<body>
<?php echo "$msg"; ?><br>
<p><a href="http://www.somewebsite.com">Click here</a> to return to our home page </p>
</body>
</html>