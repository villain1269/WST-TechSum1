# Tasks for Today Management System

A CodeIgniter 4 and MySQL task management application for IT0049 Web System Technologies TechSum 2.

## Features

- Public Welcome, Task List, Profile, and About pages
- Login and logout using PHP password hashing and CodeIgniter sessions
- Protected task management actions for authenticated users
- Validated task creation and editing
- Task archiving through soft deletion
- Archived tasks excluded from public task listings
- CSRF protection enabled for forms

## Requirements

- PHP 8.2 or newer
- MySQL or MariaDB
- Composer
- PHP extensions required by CodeIgniter 4, including `intl`, `mbstring`, and `mysqli`

## Installation

1. Clone or copy this project.
2. Install the Composer dependencies:

   ```bash
   composer install
   ```

3. Copy `env` and rename the copy to `.env`.
4. Configure the application URL and database connection in `.env`:

   ```dotenv
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = tasks_db
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

5. Create a MySQL or MariaDB database named `tasks_db`.
6. Import the database file:

   ```text
   database/tasks_db.sql
   ```

   Alternatively, run the migration and seeder:

   ```bash
   php spark migrate
   php spark db:seed DatabaseSeeder
   ```

7. Start the CodeIgniter development server:

   ```bash
   php spark serve
   ```

8. Open the URL shown by CodeIgniter, normally:

   ```text
   http://localhost:8080/
   ```

## Demo Login

```text
Username: Christian
Password: password
```

Change the demo password before deploying the application to a real production environment.

## Pages and Routes

| Page or Action | URL | Access |
|---|---|---|
| Welcome | `/` | Public |
| Task List | `/tasks` | Public |
| Profile | `/profile` | Public |
| About | `/about` | Public |
| Login | `/login` | Public |
| Logout | `POST /logout` | Authenticated users |
| New Task | `/tasks/new` | Authenticated users |
| Create Task | `POST /tasks/create` | Authenticated users |
| Edit Task | `/tasks/edit/{id}` | Authenticated users |
| Update Task | `POST /tasks/update/{id}` | Authenticated users |
| Archive Task | `POST /tasks/delete/{id}` | Authenticated users |

## Validation Rules

- The task title is required.
- The task title must not exceed 150 characters.
- The task date is required.
- The task date must use the valid `YYYY-MM-DD` format.
- Task status must be either `pending` or `done`.
- Login requires both a username and password.

## Authentication and Security

Management actions are protected by an authentication filter. Users who are not logged in are redirected to the login page when attempting to create, edit, update, or archive tasks.

Passwords are stored using secure password hashing and verified with PHP's `password_verify()` function.

CSRF protection is enabled for application forms, including login, logout, task creation, task updates, and task archiving.

## Soft Deletion

Tasks are not permanently removed from the database.

When a task is archived, its `is_archived` value is changed from `0` to `1`. Archived tasks remain in the database but are excluded from the Welcome and Task List pages.

## Database Files

The project includes:

```text
database/tasks_db.sql
app/Database/Migrations/
app/Database/Seeds/
```

The migration adds:

- The `password` column to the `users` table
- The `is_archived` column to the `tasks` table

The database seeder creates or updates the demo user password.

## Hosting

The web server document root should point to the project's `public` directory.

Do not use the project root, `app`, or `writable` directory as the public document root.

For a hosted deployment, update the application URL in `.env`:

```dotenv
app.baseURL = 'https://example.com/'
```

The database must use the updated schema from `database/tasks_db.sql`, or the migration must be executed after importing the original database.

## Project Structure

```text
app/
├── Config/          Routes, filters, and database configuration
├── Controllers/     Request handling and application workflows
├── Database/        Migrations and seeders
├── Filters/         Authentication filter
├── Models/          User and task database access
└── Views/           Public, login, and task management pages

database/            SQL database export
public/              Public web root and front controller
tests/               CodeIgniter test files
writable/            Runtime cache, logs, sessions, and uploads
```

## Testing Checklist

The following workflows should be tested before submission:

1. Open `/tasks/new` while logged out and confirm that it redirects to `/login`.
2. Open `/tasks/edit/1` while logged out and confirm that it redirects to `/login`.
3. Attempt to archive a task while logged out and confirm that access is denied.
4. Log in with the demo account.
5. Submit a task without a title and confirm that validation rejects it.
6. Submit a task without a task date and confirm that validation rejects it.
7. Create a valid task.
8. Edit the task.
9. Archive the task.
10. Confirm that the archived task disappears from the Welcome and Task List pages.
11. Confirm that the database record remains with `is_archived = 1`.
12. Log out and confirm that protected actions are blocked again.