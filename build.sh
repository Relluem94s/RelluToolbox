#!/bin/bash
echo ">> Changing directory to /shared"
cd shared
echo "---------------------------"
echo ">> Installing npm Modules"
npm install
echo "---------------------------"
echo ">> Installing composer Modules"
composer install
echo "---------------------------"
echo ">> It's done guys, it's finished!"