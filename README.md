# Todo List API

## Overview
The **Todo List API** is a backend application built with **Laravel 10** and **MySQL**. It provides a secure and efficient way to manage user authentication and CRUD operations for tasks. The API uses **JWT (JSON Web Tokens)** for authentication, ensuring only authorized users can access and modify their data.

## Features
- **User Authentication**: Register, login, and logout using JWT.
- **Task Management**:
  - Get task
  - Create new tasks.
  - Update task details.
  - Delete tasks.
- **Secure Endpoints**: All task-related endpoints are protected with JWT authentication.
- **Scalable and Easy to Use**: Designed with RESTful principles for better scalability and integration.

## Technologies Used
- **Programming Language**: PHP
- **Framework**: Laravel 10
- **Database**: MySQL
- **Authentication**: JSON Web Tokens (JWT)

## Prerequisites
- PHP >= 8.1
- Composer
- MySQL

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/rodrigocarreonc/TodoListApi.git
   cd todo-list-api
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Create a `.env` file by copying the example:
   ```bash
   cp .env.example .env
   ```

4. Configure the `.env` file with your database and JWT settings:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password

   JWT_SECRET=your_jwt_secret_key
   ```

5. Generate the application key and JWT secret:
   ```bash
   php artisan key:generate
   php artisan jwt:secret
   ```

6. Run database migrations:
   ```bash
   php artisan migrate
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```
   The API will be accessible at `http://localhost:8000`.

## API Endpoints

### Authentication
- **Register**: `POST /api/auth/register`
  ```json
  {
    "name": "John Doe",
    "email": "john.doe@example.com",
    "password": "password123",
  }
  ```

- **Login**: `POST /api/auth/login`
  ```json
  {
    "email": "john.doe@example.com",
    "password": "password123"
  }
  ```

- **Logout**: `POST /api/auth/logout`
  - Requires Bearer Token in the Authorization header.

### Task Management
- **Get All Tasks**: `GET /api/todos`
- **Create a Task**: `POST /api/todos`
  ```json
  {
    "title": "New Task",
    "description": "This is a new task."
  }
  ```
- **Update a Task**: `PUT /api/todos/{id}`
  ```json
  {
    "title": "Updated Task",
    "description": "This task has been updated.",
    "status": "completed"
  }
  ```
- **Delete a Task**: `DELETE /api/todos/{id}`
---
**Enjoy building your tasks with the Todo List API!**

