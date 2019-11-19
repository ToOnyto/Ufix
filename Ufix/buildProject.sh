#!/bin/bash

echo "========== Composer Install =========="
composer install

echo "========== Yarn Install =========="
yarn install

echo "========== Yarn Encore  =========="
yarn encore dev 
