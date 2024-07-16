# Football League Manager

Football League Manager is a web application for managing football leagues, allowing users to create and manage teams, organize matches, track scores, and view league standings.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Testing](#testing)
- [Technologies Used](#technologies-used)
- [Contributing](#contributing)
- [License](#license)

## Installation

### Prerequisites

- PHP 8.0 or higher
- Composer
- MySQL or MariaDB
- Symfony CLI (optional but recommended)

### Steps

1. **Clone the repository:**

    ```bash
    git clone https://github.com/nolan450/test_football_manager
    cd football-league-manager
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Configure the environment:**

   Copy the `.env` file to create a `.env.local` file and configure your database connection settings.

    ```bash
    cp .env .env.local
    ```

   Open `.env.local` and update the `DATABASE_URL` line with your database connection information.

    ```dotenv
    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/main_db"
    ```

4. **Create the database and run migrations:**

    ```bash
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate
    ```

5. **Load test data (fixtures):**

    ```bash
    php bin/console doctrine:fixtures:load
    ```

6. **Start the development server:**

   Using Symfony CLI:

    ```bash
    symfony server:start
    ```

   Or using PHP:

    ```bash
    php -S localhost:8000 -t public
    ```

## Configuration

Make sure to update your `.env.local` file with the appropriate database connection details and any other configuration settings required by your application.

## Usage

Once the development server is running, you can access the application in your web browser at `http://localhost:8000`.

## Testing

To run the unit and functional tests, use PHPUnit:
```bash
php bin/phpunit
```

## Technologies Used

- **PHP**: The main programming language used.
- **Symfony**: The PHP framework used for building the application.
- **MySQL/MariaDB**: The database used for storing application data.
- **Doctrine ORM**: The ORM (Object-Relational Mapping) library used for database interactions.
- **Composer**: Dependency manager for PHP.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
