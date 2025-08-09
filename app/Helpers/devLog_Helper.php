<?php

// app/Helpers/devLog_helper.php
use CodeIgniter\CodeIgniter;


function devLog($content, $filename): string
{
    return CodeIgniter::CI_VERSION;
}