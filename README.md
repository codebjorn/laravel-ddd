<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This project

Laravel is the most popular PHP framework in the world. This repo is a small test how we can provide monolith using
Domain Driver Design.

## Be aware
This is small project made in 2 days. Main idea was to see if Laravel can provide tools to make good monolith.  
In real world example we will need:
1. ORM but not AD, because for moment with AD we can provide anemic data to db.
2. Reduce usage of singleton, and make all through dependency injection.
3. Setup better knowledge for each layer
4. Use aggregates to provide business data and remove any ambiguity
