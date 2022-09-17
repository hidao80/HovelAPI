# HovelAPI

![Framework None](https://img.shields.io/badge/Framework-None-blue.svg)
[![License](https://img.shields.io/github/license/hidao80/HovelAPI)](/LICENSE)

## Install

```sh
git clone https://github.com/hidao80/HovelAPI
```

## How to use

```sh:server
# clone repository
git clone https://github.com/hidao80/HovelAPI
cd HovelAPI

# start built-in web server
php -S localhost:8080 -t public &

# call API
curl -X GET -H "Authorization:Basic dGVzdDp0ZXN0" http://localhost:8080/api/v1/users/7
```

See [the AltoRouter site](http://altorouter.com/) for more information on how routing works.

You can make it multilingual by putting pairs of keywords and translations into the `$message` associative array in `app/lang/{LANGUAGE_NAME}.php`.  
The contents of the `HTTP_ACCEPT_LANGUAGE` header are referenced to automatically switch dictionary files.

BASIC authentication accounts for access restrictions are registered in the $hashes associative array in `conifg/auth.php`.
The hashes are created as follows:

```sh
php -r 'echo password_hash("passwor_string", PASSWORD_BCRYPT), PHP_EOL;'
```

For mac and LInux, when accessing the API from `curl`, etc., the API can be accessed by sending the http header with the result of the following command:

```sh
echo -n "user_name:password_string" | base64
# default value) echo -n "test:test" | base64
```

## How to edit

Describe the route in `routes/api.php`.

Declare functions to be executed when route is accessed in `app/api/v1/functions.php`.  
You may also directly describe the process in an anonymous function in route without declaring it in `functions.php`.

Change the BASIC authentication account from the default one.

Access with a basic authentication header from `curl`, javascript's `fetch()`, or jQuery's `$.ajax()`.

Register messages in the dictionary file for multilingualization if necessary.  
You can also use a function without a dictionary file by writing messages directly into the function.

You are free to add more routes files, dictionary files, and api files.

## Special Thanks

AltoRouter: <http://altorouter.com/>  
@mpyw@qiita.com <https://github.com/mpyw-yattemita/php-auth-examples>

## License

MIT
