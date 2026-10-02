# CodeIgniter POS System

A basic Point-of-Sale system developed for IT0049 Web System Technologies using CodeIgniter 4, PHP, and MySQL.

## Features

- Landing page
- About page
- Customer Accounts
- User Accounts
- MySQL database integration
- Add customers
- Add users
- Edit customers
- Edit users
- Customer and user validation
- User avatar upload
- JPG and PNG file validation
- Maximum avatar size of 2 MB
- Resized avatar display
- Placeholder avatar for users without images

## Technologies Used

- PHP
- CodeIgniter 4
- MySQL
- XAMPP
- Apache
- HTML
- Git and GitHub

## Main Routes

| Page | URL |
|---|---|
| Landing page | `/` |
| About page | `/about` |
| Customers | `/customers` |
| Add customer | `/customers/new` |
| Users | `/users` |
| Add user | `/users/new` |

## Local Installation

1. Install XAMPP.
2. Start Apache and MySQL.
3. Copy the project into:

   `C:\xampp\htdocs\WSTTechs`

4. Create a MySQL database named:

   `pos_db`

5. Import `pos_db.sql` through phpMyAdmin.
6. Configure the `.env` database settings.
7. Open:

   `http://localhost/WSTTechs/public/`

## Database Configuration

The local `.env` file should contain:

```ini
database.default.hostname = localhost
database.default.database = pos_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306