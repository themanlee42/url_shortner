# URL_SHORTNER

1. A user should be able to load the index page of your site and be presented with an input field where they can enter a URL.
2. Upon entering the URL, a "shortened" version of that url is created and shown to the user.
3. When visiting that "shortened" version of the URL, the user is redirected to the original URL.
4. Additionally, if a URL has already been shortened by the system, and it is entered a second time, the first shortened URL will be given back to the user.
5. For example, if a user enters http://google.com/ into the input field, and the app is locally on port 8000, user expects to be given back a URL that looked something like http://localhost:8000/1.
   Then when a user visit http://localhost:8000/1, user is redirected to http://google.com/.
7. PHP & Laravel is used.
8. Used Vue.js and AXIOS to handle functionality/user interactions to API SERVER
9. Unit tests added for testing API
10. Mysql was used for primary DB and SQLite was used for unit testings.
11. CSS, Bootstrap and Webpack was used.

# Installing instruction on dev enviornment:

1. Install PHP 7.4 or up and Apache (or any other web server)
2. Install npm
3. Install composer
4. Install Mysql or MariaDB

5. download vendors and dependencies
$ composer install
$ npm install

6. create .env file (copy from .env.example) - set it to prodution mode

7. complie assets using webpack 
$ npm run prod

7.5 if sh: cross-env: command not found
remove node_modules directory and npm install again. (some weird bug)

8. create database 'url_shortner'

9. migrate schema 
$  php artisan migrate

10. for running unit tests
$ ./vendor/bin/phpunit
 
# DEMO
Even better, I have temporally set up the demo on AWS
http://13.56.164.18/

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
