# Mini Shopping Cart

> Build with Laravel and Vue.js

## Features

* Laravel 5.6
* Vue + VueRouter + Vuex
* Pages with custom layouts
* Login, register
* Authentication with JWT
* Bulma + Material Icons

## Installation

* `git clone git@github.com:cesaramirez/mini-shopping-cart.git`
* `cd mini-shopping-cart` or name that you defined
* `cp .env.example .env`
* `composer install`
* `php artisan key:generate`
* `php artisan jwt:secret`
* Edit `.env` and set your database connection details
* `php artisan migrate`
* `php artisan db:seed`
* `yarn`
* `yarn dev`

### Note

For sending email I recommend [mailtrap](mailtrap.io) copy username and password and set in `.env`
Please set this values:

```bash
MAIL_USERNAME=null
MAIL_PASSWORD=null
```

## Usage

### Local Development Server

You can route serve with artisan CLI

```bash
php artisan serve
```

#### Development

```bash
# build and watch
yarn watch

# serve with hot reloading
yarn hot

# for up
```

#### Production

```bash
yarn production
```
