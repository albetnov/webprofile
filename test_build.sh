#!/bin/bash
##Build_Test Script for webprofile
##Build by Albet Novendo. 1245180521.
echo "Welcome to Test_Build temporary script"
echo "This script intended to temporary replace artisan command (which will be used in final build.)"
echo "Before continue set up your .env file."
if [ ! -f ".env" ]; then
cp .env.example .env
fi
read -p "Press any key to continue..."
clear
echo "Running script..."
php artisan key:generate
php artisan migrate:fresh
php artisan db:seed --class=apage
php artisan db:seed --class=BaseCMS
php artisan db:seed --class=ipage
php artisan db:seed --class=spage
php artisan db:seed --class=UserSeeder
echo "Script executed successfully."
