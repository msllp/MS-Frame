@echo off
if "%1"=="publish" (
    php artisan vendor:publish --tag=public_backend --force
)

if "%1"=="webpack" (
    php artisan vendor:publish --tag=webpack --force
)

if "%1"=="bower" (
    php artisan vendor:publish --tag=bower --force
)

if "%1"=="gulp" (
    php artisan vendor:publish --tag=gulp --force
)

if "%1"=="js" (
    php artisan vendor:publish --tag=webpack --force
    php artisan vendor:publish --tag=bower --force
    php artisan vendor:publish --tag=gulp --force
)


