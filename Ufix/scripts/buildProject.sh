#!/bin/bash

echo "========== Composer Install =========="
composer install

echo "========== Yarn Install =========="
yarn install

echo "========== Yarn Encore  =========="
yarn encore dev 

echo "========== Restart Server =========="
./bin/console server:stop
./bin/console server:start