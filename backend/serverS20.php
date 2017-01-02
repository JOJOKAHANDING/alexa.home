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
// @Filename: serverS20.php
# @Last modified by:   Raphael (Jojo) Kahanding
# @Last modified time: 2017-01-02T08:28:00-08:00

include_once 'config.php';
include_once 'mytrace.php';

// Format s
// http://backend/serverS20.php?NAME=plug&CMD=ON
// where
// plug is the name of the S20 plug
// CMD is ON or OFF

MYTRACEMSG(" Link http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
MYTRACEMSG('GET :'.print_r($_GET, true));
MYTRACEMSG('POST :'.print_r($_POST, true));

if (isset($_GET['NAME']) && isset($_GET['CMD'])) {
    include_once '../orvfms/lib/orvfms/orvfms.php';
    $s20Table = initS20Data();
    if (count($s20Table) == 0) {
        MYTRACEMSG("No sockets found \n".
        "Please check if all sockets are on-line and assure that they \n".
        "they are not locked (check WiWo app -> select socket -> more -> Advanced \n".
        "This code does not support locked or password protected devices\n");
    } else {
        $s20Table = updateAllStatus($s20Table);
        $found = false;
        $name = $_GET['NAME'];
        foreach ($s20Table as $mac => $devData) {
            if ($devData['name'] == $name) {
                $found = true;
                $currentStatus = checkStatus($mac, $s20Table);
                $newStatus = $_GET['CMD'] == 'ON' ? 1 : 0;

                if ($newStatus != $currentStatus) {
                    actionAndCheck($mac, $newStatus, $s20Table);
                }
                TRACEMSG("$name found !!!");
                break;
            }
        }
        if (!$found) {
            TRACEMSG("$name found !!!");
        }
    }
}

?>
