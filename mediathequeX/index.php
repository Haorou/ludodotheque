<?php
require("controller/controller.php");

try
{
    loginpage();    
}
catch(Exception $e)
{
    die($e->getMessage());
}