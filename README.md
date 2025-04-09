# Customer Feedback Portal - Setup Guide

This guide walks you through setting up the Customer Feedback Portal on your local environment. The project includes a Laravel backend API and a React frontend.

## 📌 Project Overview

This lightweight application allows users to:

-   Submit feedback with ratings and emoji-based happiness indicators
-   View recent feedback submissions
-   Filter feedback by rating

## ✅ Prerequisites

Make sure the following are installed:

-   PHP >= 8.1
-   Composer
-   MySQL >= 5.7
-   Node.js >= 14.x and npm
-   Git

## 📁 Repository Structure

customer-feedback-portal/├── feedback-app/           # Laravel Backend API└── feedback-frontend/      # React Frontend
## 🛠️ Step 1: Clone the Repository

```bash
git clone "https://github.com/pratikdahal105/feedback_app.git"
cd customer-feedback-portal
```
## 🔧 Step 2: Set Up the Backend (Laravel)
Navigate to the Laravel project directory:
```bash
cd feedback-app
```
Install PHP dependencies:
```bash
composer install
```
Copy and configure environment variables:
```bash
cp .env.example .env
php artisan key:generate
```
Update your .env file with database credentials:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=feedback_db
DB_USERNAME=your_mysql_username
DB_PASSWORD=your_mysql_password
```
Create the database:
```bash
mysql -u your_mysql_username -p
In the MySQL prompt:CREATE DATABASE feedback_db;
exit;
```
Run migrations:
```bash
php artisan migrate
```
Start the Laravel development server:
```bash
php artisan serve
```
Your backend should now be running at: 

➡️ http://localhost:8000

## 💻 Step 3: Set Up the Frontend (React)

Open a new terminal and go to the frontend directory:
```bash
cd ../feedback-frontend
```
Install JavaScript dependencies:
```bash
npm install
```
Start the React dev server:
```bash
npm start
```
Your frontend should now be running at: 

➡️ http://localhost:3000


## 🔍 Step 4: Verify Configuration

✅ API Endpoint in React
Make sure Axios calls in FeedbackForm.jsx and FeedbackList.jsx point to the backend URL:
```bash
await axios.post('http://localhost:8000/api/feedback', formData);
```
Change this if your backend runs on a different port or URL.

⚙️ CORS Configuration in Laravel

Edit config/cors.php:<?php
```bash
return [
    'paths' => ['api/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:3000'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
```
## 🧪 Using the Application

Open your browser at http://localhost:3000 
