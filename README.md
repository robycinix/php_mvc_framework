# PHP Micro-Framework

A lightweight PHP micro-framework based on the MVC architecture. It features routing, request/response handling, a simple ORM, middleware support, and environment-based configuration. Designed for building clean, maintainable web applications.

## Features

- MVC (Model-View-Controller) structure
- Routing system
- Request and Response handling
- Simple ORM for database operations
- Middleware support
- Environment configuration via `.env`

## Project Structure

```
composer.json
.env.example
config/
    config.php
public/
    index.php
core/
    App.php
    Router.php
    Request.php
    Response.php
    Controller.php
    View.php
    Model.php
    Database.php
    ORM.php
src/
    MiddlewareInterface.php
    AuthMiddleware.php
app/
    Controllers/
        HomeController.php
    Views/
        home.php
```

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/robycinix/php_mvc_framework.git
   ```

2. Navigate into the project directory:
   ```bash
   cd php_mvc_framework
   ```

3. Install dependencies using Composer:
   ```bash
   composer install
   ```

4. Set up your environment file:
   ```bash
   cp .env.example .env
   ```

5. Configure your database settings in `config/config.php` and `.env`.

## Quick Start

- Start your local development server:
  ```bash
  php -S localhost:8000 -t public
  ```
- Visit `http://localhost:8000` in your browser.

## Usage Example

### Defining a Route

In `routes/web.php` (or directly in the Router setup):

```php
$router->get('/', 'HomeController@index');
```

### Creating a Controller

In `app/Controllers/HomeController.php`:

```php
<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view('home', ['message' => 'Welcome to the PHP Micro-Framework!']);
    }
}
```

### Creating a View

In `app/Views/home.php`:

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1><?php echo \$message; ?></h1>
</body>
</html>
```

### Connecting to a Database

Configure your database credentials in `.env` and use the `Model` class to interact with the database.

Example usage in a Model:

```php
<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected \$table = 'users';
}
```

## Requirements

- PHP >= 7.4
- Composer

## License

This project is licensed under the MIT License.

---

> Feel free to contribute and improve this framework! Created by Roby.

[GitHub Repository](https://github.com/robycinix/php_mvc_framework)

