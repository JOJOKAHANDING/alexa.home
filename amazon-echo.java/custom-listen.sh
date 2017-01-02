
# The MIT License
#
# Copyright (c) 2017 Raphael (Jojo) Kahanding
#
# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:
#
# The above copyright notice and this permission notice shall be included in all
# copies or substantial portions of the Software.
#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
# SOFTWARE.

# @Author: Raphael (Jojo) Kahanding
# @Date:   2017-01-02T09:21:12-08:00
# @Email:  jojokahanding@gmail.com
# @Filename: custom-listen.sh
# @Last modified by:   Raphael (Jojo) Kahanding
# @Last modified time: 2017-01-02T11:45:03-08:00

#!/bin/sh
MYDATAPATH=/volume1/homes/jojo/www/alexa.home/amazon-echo.java
MYJAVAPATH=/var/packages/Java8/target/j2sdk-image/bin/java
MYAMAZONBRIDGEPATH=/volume1/homes/jojo/www/alexa.home/amazon-echo.java/amazon-echo-bridge-0.4.0.jar
MYIPADDRESS=192.168.1.14
MYLOGFILE=/volume1/homes/jojo/temp/amazon_bridge.log
cd $MYDATAPATH
nohup $MYJAVAPATH -jar $MYAMAZONBRIDGEPATH --upnp.config.address=$MYIPADDRESS > $MYLOGFILE &
