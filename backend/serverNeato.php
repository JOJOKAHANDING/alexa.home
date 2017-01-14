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

// @Author: j_kahanding
// @Date:   2016-12-30T22:13:12-08:00
// @Email:  jojokahanding@gmail.com
// @Filename: serverNeato.php
# @Last modified by:   j_kahanding
# @Last modified time: 2017-01-14T15:14:24-08:00

include_once 'config.php';
include_once 'mytrace.php';

MYTRACEMSG(" Link http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
MYTRACEMSG('GET :'.print_r($_GET, true));
MYTRACEMSG('POST :'.print_r($_POST, true));

if (isset($_GET['NAME']) && isset($_GET['CMD'])) {
    include_once("../botvac/NeatoBotvacApi.php");
    include_once("../botvac/NeatoBotvacClient.php");
    include_once("../botvac/NeatoBotvacRobot.php");
    $found = false;
    $token = false;
    $client = new NeatoBotvacClient($token);
    $auth = $client->authorize(NEATO_EMAIL, NEATO_PASSWORD);
	if ($result = $client->getRobots())
	{
        $name = $_GET['NAME'];
		foreach ($result["robots"] as $robot)
		{
            if ($robot['name'] == $name)
            {
                $found = true;
	             $_robot = new NeatoBotvacRobot($robot["serial"],
		                     $robot["secret_key"]);
                if ($_GET['CMD'] == 'ON')
                {
                    $_robot->startCleaning();
                }
                else
                {
                    $_robot->stopCleaning();
                    // TODO: This does not work
                    // $_robot->sendToBase();
                }
            }
		}
	}

    if (!$found) {
        MYTRACEMSG("$name not found !!!");
    }
    else {
        $response=<<<ETD
HTTP/1.1 200 OK
CONTENT-LENGTH: 0
CONTENT-TYPE: text/xml; charset="utf-8"
ETD;
        header($response);
    }

}

?>
