<?php
/**
 * Created by PhpStorm.
 * User: set.rs
 * Date: 1/20/2017
 * Time: 2:29 PM
 */
require_once 'header.php';

echo "<br><span class='main'>Welcome to $appname,";

if ($loggedin) echo "$user, you are logged in.";
else           echo ' please sign up and/or log in to join in.';
?>
</span><br><br>
</body>
</html>
