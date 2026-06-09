# Traversy Media Feedback Site

A simple PHP and MySQL application for collecting and displaying user feedback.

## Requirements

- PHP 8.0+
- MySQL
- XAMPP (recommended)

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/your-username/feedback-site.git
```

### 2. Move the project

Place the project inside your web server directory (e.g. `htdocs` if using XAMPP).

### 3. Create the database

Create a MySQL database named php_dev (or whatever you like) and run the following SQL statement:

```sql
CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 4. Configure the database connection

Edit `config/database.php` and update your credentials:

```php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'php_dev';
```

### 5. Start the server

Start Apache and MySQL through XAMPP.

### 6. Open the application

Navigate to:

```text
http://localhost/feedback-site
```

## Features

- Submit feedback through a form
- Form validation
- Store feedback in a MySQL database
- Display submitted feedback

## License

This project is intended for educational purposes.
