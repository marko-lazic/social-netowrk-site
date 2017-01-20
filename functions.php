<?php
/**
 * Created by PhpStorm.
 * User: set.rs
 * Date: 1/20/2017
 * Time: 1:11 PM
 */

$dbhost = 'sql11.freemysqlhosting.net';
$dbname = 'sql11154709';
$dbuser = 'sql11154709';
$dbpass = 'Bacj1nSRu6';
$dbport = '3306';
$appname = "SET's Nest";

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error) die($connection->connect_error);

function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
}

function queryMysql($query)
{
    global $conneciton;
    $result = $conneciton->query($query);
    if (!result) die($conneciton->error);
    return $result;
}

function destroySession()
{
    $_SESSION = array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
}

function showProfile($user)
{
        if (file_exists("$user.jpg"))
            echo "<img src='$user.jpg' stye='float:left;'>";

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo stripslashes($row['text']). "<br style='clear:left;'><br>";
    }
}

?>

