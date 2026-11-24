# Smart Clothing Care & Lifespan Assistant - Website Deployment Guide

Welcome to the **Smart Clothing Care & Lifespan Assistant** full-stack web application code repository, built specifically for Sri Lankan consumers, households, and apparel management.

## 🛠️ Technology Stack
- **HTML5**: Responsive, semantic structure covering all 13 modules.
- **CSS3**: Custom design featuring a nature-inspired color palette (`#7A9A8B` Sage Green, `#FAF8F5` Soft Ivory, `#F5F0EB` Warm Beige, `#2D4A3E` Forest Green), smooth animations, glassmorphism, and card grid layouts.
- **JavaScript (ES6+)**: Interactive image drag-and-drop preview, dynamic weather care lookup, AJAX API calls, reminder management, and form validation.
- **PHP 8+**: Modular server-side processing (`api/analyze.php`, `api/weather.php`, `api/reminders.php`, `api/contact.php`).
- **MySQL**: Relational database structure (`schema.sql`) storing user wardrobe items, weather rules, damage reports, reminders, and contact entries.

---

## 🚀 Quick Setup & Deployment Instructions

### 1. Database Setup (MySQL)
1. Open **phpMyAdmin** or your MySQL database client (e.g., MySQL Workbench).
2. Create a new database named `smart_clothing_care` or import `schema.sql`:
   ```sql
   SOURCE path/to/schema.sql;
   ```

### 2. Web Server Configuration (XAMPP / WAMP / Apache / Nginx)
1. Copy the entire repository folder into your server's root directory:
   - **XAMPP**: `htdocs/smart-clothing-care/`
   - **WAMP**: `www/smart-clothing-care/`
   - **Linux Apache**: `/var/www/html/smart-clothing-care/`
2. Open `config.php` and verify your MySQL credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', 'your_password');
   define('DB_NAME', 'smart_clothing_care');
   ```

### 3. Launching the Application
Open your web browser and navigate to:
`http://localhost/smart-clothing-care/index.php`

---

## 🌟 Key Features & AI Integration Points
1. **Clothing Information Analysis**: Dynamic category and fabric selection with image upload hooks for ResNet-50 / Gemini Vision AI integration.
2. **Monsoon & Humidity Weather Guidance**: Grounded rules for Sri Lankan rainy seasons, high ambient humidity, mold/fungal prevention, and sun fading.
3. **Damage & DIY Repair Identification**: Step-by-step restoration guides for tears, stain removal, and hard water mineral scaling.
4. **Care Reminders**: Full interactive task management dashboard.
