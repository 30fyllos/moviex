<p align="center"><a href="#" target="_blank"><img src="https://icon-library.com/images/movie-icon-png/movie-icon-png-2.jpg" width="400"></a></p>

## About The App

Moviex is a plugin of Laravel framework for the user rated top 250 movies. The app uses IMDB's data from [Rapid Api](https://rapidapi.com/apidojo/api/imdb8) and store it in database for later use.

# How it works

Due to api limitation of basic subcsription (500 requests/per month & 5 requests per second) the app shows only 6 movies per page and save them on each call to the database for later use, without the need of new api call, to start using the app you will need your own api key.

### Installation Steps

## 1. Install laravel 8

For windows and linux use the following command (requires docker):

```
curl -s https://laravel.build/example-app | bash

cd example-app
```

For more installation features visit [Laravel 8](https://laravel.com/docs/8.x/installation)

## 2. Run laravel

```
alias sail='bash vendor/bin/sail'
sail up -d
```

## 3. Install moviex package (part 1)

Create the folders 'packages\go4tech\moviex' in the root folder of Laravel app and extract all files in it.
For linux use:

```
mkdir packages && cd packages && mkdir go4tech && cd go4tech && mkdir moviex && cd moviex
```

Example installation path:
e.g. example-app\packages\go4tech\moviex\*

Add a new entry in .env files for you api key

```
MOVIES_API= REPLACE_WITH_YOUR_API_KEY
```

Then use composer throught sail to install it

```
sail composer require go4tech/moviex
```

if the package isn't discoverable changes the following lines in composer.json:

```
"repositories": [
  {
  "type": "path",
  "url": "packages/go4tech/*"
  }
],
```

## 4. Install moviex package (part 2)

```
php artisan moviex:install
```

## 5. Ready to go

Visit [Top Movies](http:\localhost:3000\movies)

# In case of out-of-date npm

```
$ docker-compose exec laravel.test bash
$ npm install -g npm@7.19.1
$ exit
```

# Install phpmyadmin

```
sail down
```

Add phpmyadmin image in the docker file located on root of the application

```
phpmyadmin:
    image: "phpmyadmin"
    ports:
      - 8080:80
    networks:
      - sail
    environment:
      PMA_ARBITRARY: 1
      PMA_HOST: "mysql"
      PMA_USER: "${DB_USERNAME}"
      PMA_PASSWORD: "${DB_PASSWORD}"
      PMA_PORTS: 3306
```

Run again the app

```
sail up -d
```

Visit [Phpmyadmin](http:\localhost:8080)
