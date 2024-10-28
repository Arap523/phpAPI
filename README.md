# User Authentication System

A simple user registration and authentication application using PHP and MySQL. This application securely stores passwords using salted hashing and allows users to register and log in.

## Features
- **User Registration**: Register a new user with a username and password.
- **User Authentication**: Authenticate an existing user by verifying the username and password.
- **Password Security**: Passwords are securely stored using salted hashing with bcrypt.

## Prerequisites
- **PHP** (>= 7.0)
- **MySQL** or **MariaDB**
- **Composer** (optional, for managing dependencies)
-  **Postman** (for API testing)

## Database Setup
1. **Create a Database**: Open your MySQL client and run the following commands to create a database and table.

    ```sql
    CREATE DATABASE user_auth;
    USE user_auth;

    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(15) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    );
    ```

2. **Database Configuration**: Update `db.php` with your database connection settings.

## Project Structure

## Usage

### 1. Registration
To register a new user, navigate to `register.php` in your browser and fill in the form:
- **Username**: Max 15 characters.
- **Password**: Min 8 characters, must include letters, numbers, and symbols.

### 2. Login
To authenticate a user, navigate to `login.php` in your browser and enter your credentials.

### API Endpoints (Optional)
If you want to make this application RESTful, you can send `POST` requests to the following endpoints:
- **Register**: `/register` with JSON data `{ "username": "yourUsername", "password": "yourPassword" }`
- **Login**: `/login` with JSON data `{ "username": "yourUsername", "password": "yourPassword" }`

### Example using `curl`

#### Register a new user:
```bash
curl -X POST http://localhost/(your path)/auth/register.php -d "username=testuser&password=Password1!" 
```
#### Login a user:
```bash
curl -X POST http://localhost/(your path)/auth/login.php -d "username=testuser&password=Password1!" 
```
## Testing with Postman

### 1. User Registration
To register a new user:
1. Open **Postman**.
2. Set the **method** to `POST`.
3. Set the **URL** to `http://localhost/(your path)/auth/register.php`.
4. Go to the **Headers** tab and set `Content-Type` to `application/x-www-form-urlencoded`.
5. Go to the **Body** tab, select `x-www-form-urlencoded`, and add the following keys and values:
   - `username`: the username to register (max 15 characters)
   - `password`: a secure password (min 8 characters, including letters, numbers, and symbols)

6. Click **Send**. A successful response will return `"Registrasi berhasil!"`, or an error message if the registration fails.

**Example Input**:
```plaintext
username: testuser
password: Password1!
```

### 2. User Login
To Login a user:
1. Open **Postman**.
2. Set the **method** to `POST`.
3. Set the **URL** to `http://localhost/(your path)/auth/login.php`.
4. Go to the **Headers** tab and set `Content-Type` to `application/x-www-form-urlencoded`.
5. Go to the **Body** tab, select `x-www-form-urlencoded`, and add the following keys and values:
   - `username`: the registered username
   - `password`: the password for the username

6. Click **Send**. A successful response will return `Autentikasi berhasil!`, or an error message if the authentication fails.

**Example Input**:
```plaintext
username: testuser
password: Password1!
```
