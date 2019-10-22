1
2
3
4
5
6
7
8
9
<?php
session_start();

if(session_destroy())
{

header("Location: login.php");
}
?>