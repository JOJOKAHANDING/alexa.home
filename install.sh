
# @Author: Raphael (Jojo) Kahanding
# @Date:   2017-01-02T08:30:36-08:00
# @Email:  jojokahanding@gmail.com
# @Filename: install.sh
# @Last modified by:   j_kahanding
# @Last modified time: 2017-01-14T01:25:08-08:00

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

#! /bin/sh

# pull orvmfs
git clone https://github.com/fernadosilva/orvfms.git
chmod -Rfv 777 orvfms
# download amazon echo home autmation bridge
# if this does not work download it manually from
# https://github.com/armzilla/amazon-echo-ha-bridge/releases
# Notes are from:
# https://github.com/hollie/misterhouse/wiki/Echo-integration-using-amazon-echo-ha-bridge
curl -L https://github.com/armzilla/amazon-echo-ha-bridge/releases/download/v0.4.0/amazon-echo-bridge-0.4.0.jar --output amazon-echo.java/amazon-echo-bridge-0.4.0.jar
#pull neato botvac
git clone https://github.com/tomrosenback/botvac.git
chmod -Rfv 777 botvac
