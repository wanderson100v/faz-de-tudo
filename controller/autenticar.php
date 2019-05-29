<?php

session_start();

if(isset($_SESSION['logado']))
{
    $login = $_SESSION['logado'];
}else
{
    header("Location: ../login.html");
}