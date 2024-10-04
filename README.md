<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Rest API CRUD - Laravel Project

This project is a **REST API CRUD** application built with Laravel. It demonstrates the creation of a simple RESTful API that supports operations such as **Create**, **Read**, **Update**, and **Delete** (CRUD) on a `student` resource.

The application provides the basic functionality to manage student records, including storing and retrieving information like names, email addresses, phone numbers, and languages.

## Features

- Simple, fast routing for API endpoints.
- Powerful database ORM (Eloquent) for managing `student` records.
- RESTful architecture for efficient and scalable API development.
- Integrated with Laravel’s powerful features like migrations, validation, and more.

## API Endpoints

- **GET /api/students** - Retrieve all students.
- **GET /api/students/{id}** - Retrieve a single student by ID.
- **POST /api/students** - Create a new student record.
- **PUT /api/students/{id}** - Update an existing student record.
- **DELETE /api/students/{id}** - Delete a student record.

## Database Schema

The `students` table includes the following fields:
- `id`: Primary key (auto-increment).
- `name`: String, required.
- `email`: String, required.
- `phone`: String, optional.
- `language`: String, required.
- `timestamps`: Created and updated timestamps.

## Getting Started

To get started with the project, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/CRISHFAS/Restapi-Crud-Laravel.git

2. Navigate to the project directory:

   ```bash

cd Restapi-Crud-Laravel

3. Install dependencies using Composer:

   ```bash

composer install

4. Create a .env file by copying the .env.example and configuring your database:

   ```bash

cp .env.example .env

5. Run the migrations to create the students table:

   ```bash

php artisan migrate

6. Start the Laravel development server:

   ```bash

    php artisan serve

# Testing

To test the API, you can use tools like Postman or cURL. Ensure that your local server is running at `http://127.0.0.1:8000` or your configured URL.
