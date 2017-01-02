<!-- The MIT License

Copyright (c) 2017 Raphael (Jojo) Kahanding

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE. -->
<?php

# @Author: Raphael (Jojo) Kahanding
# @Date:   2016-10-22T22:25:09-07:00
# @Email:  jojokahanding@gmail.com
# @Filename: mytrace.php
# @Last modified by:   Raphael (Jojo) Kahanding
# @Last modified time: 2017-01-02T08:28:07-08:00

function LogFilePath()
{
    return PATH_LOGFILE . 'ALEXAHOME-TRACE.' . date('Y-m-d') . '.LOG';
}

function MYTRACEMSG($message)
{
    $stream = fopen(LogFilePath(), 'ab');
    fwrite($stream, date('H:i:s') . ' '
        . $message . EOL_LOG);
    fclose($stream);
}

function REQUESTVAR($index)
{
	$value = "";
    if (isset($_REQUEST[$index]))
	{
        $value = $_REQUEST[$index];
		MYTRACEMSG("REQUEST_VAR[$index] == $value");
	}
	else
	{
	   MYTRACEMSG("Error REQUEST[$index] not defined ");
	}
    return $value;
}

function GETVAR($index)
{
	$value = "";
    if (isset($_GET[$index]))
	{
        $value = $_GET[$index];
		MYTRACEMSG("GET_VAR[$index] == $value");
	}
	else
	{
	   MYTRACEMSG("Error GET[$index] not defined ");
	}
    return $value;
}

function POSTVAR($index)
{
	$value = "";
    if (isset($_POST[$index]))
	{
        $value = $_POST[$index];
		MYTRACEMSG("POST_VAR[$index] == $value");
	}
	else
	{
	   MYTRACEMSG("Error POST[$index] not defined ");
	}
    return $value;
}


?>
