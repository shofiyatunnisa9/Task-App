# Task Manager App

A simple task management application built with **Laravel**, featuring authentication, CRUD tasks, and weather integration using the OpenWeather API. The interface is clean, responsive, and styled using Tailwind CSS.

---

## 🚀 Features

### 🔐 Authentication (Laravel Breeze)

-   Login & Register
-   Forgot Password
-   Remember Me
-   Redirect to dashboard after login

### 📝 Task Management (CRUD)

-   Create, Read, Update, Delete tasks
-   Mark tasks as completed / not completed
-   Tasks are linked to each authenticated user
-   Task list shown in dashboard with status badge
-   Fully responsive UI

### 🌤 Weather Integration

Dashboard displays:

-   Current weather (location from `.env`)
-   5-day weather forecast
-   Weather info uses **OpenWeather API**
-   Clean card layout with icons

### 🎨 Responsive UI with Tailwind

-   Mobile-friendly navigation (hamburger menu)
-   Custom login/register page with premium gradient design
-   Elegant dashboard layout
-   Works smoothly on all screen sizes

---

## 🛠 Tech Stack

-   **Laravel 12**
-   **Laravel Breeze**
-   **Tailwind CSS**
-   **Blade Templates**
-   **OpenWeather API**
-   **MySQL**

---

## 📦 Installation

1. Clone repository:

    ```bash
    git clone https://github.com/shofiyatunnisa9/Task-App.git
    cd task-application

    ```

2. Install dependencies:
    ```bash
    composer install
    npm install && npm run build
    ```
3. Setup Environment

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

    OPENWEATHER_API_KEY=your_openweather_key
    OPENWEATHER_CITY=Jakarta
    OPENWEATHER_UNITS=metric
    ```

4. Generate key:
    ```bash
    php artisan key:generate
    ```
5. Migrate Database
    ```bash
    php artisan migrate
    ```

### ▶ Running the App

1. Star server:
    ```bash
    php artisan serve
    ```
2. Front-end assets::
    ```bash
    npm run dev
    ```
3. Open the app:
    ```bash
    http://localhost:8000
    ```

## 🌤️ Weather API

-   Using:
    -   Current Weather: /data/2.5/weather
    -   Forecast 5 Days: /data/2.5/forecast
-   Weather displayed on dashboard using Tailwind cards.
