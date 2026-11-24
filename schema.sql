-- =================================================================
-- Smart Clothing Care & Lifespan Assistant - Database Schema (MySQL)
-- Specially Designed for Sri Lankan Climate & Wardrobe Management
-- =================================================================

CREATE DATABASE IF NOT EXISTS `smart_clothing_care` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `smart_clothing_care`;

-- 1. Users Table
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `full_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password_hash` VARCHAR(255) NOT NULL,
    `user_category` ENUM('General Consumer', 'Working Professional', 'Student / Young Adult', 'Household / Homemaker', 'Fashion-Conscious', 'Environmentally Conscious') DEFAULT 'General Consumer',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Clothing Categories Reference Table
CREATE TABLE IF NOT EXISTS `clothing_categories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL UNIQUE,
    `description` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `clothing_categories` (`name`, `description`) VALUES
('Shirt', 'Formal and casual collared button-up shirts'),
('Trousers', 'Tailored trousers, slacks, and casual pants'),
('Dress', 'One-piece garments, casual day dresses, and evening wear'),
('Saree', 'Traditional Sri Lankan sarees in silk, cotton, or georgette'),
('T-shirt', 'Casual knit cotton or synthetic t-shirts'),
('Jacket / Outerwear', 'Blazers, denim jackets, and lightweight coats');

-- 3. Fabric Types Reference Table
CREATE TABLE IF NOT EXISTS `fabrics` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL UNIQUE,
    `washing_temp` VARCHAR(50),
    `drying_advice` TEXT,
    `ironing_temp` VARCHAR(50),
    `humidity_risk` ENUM('Low', 'Medium', 'High', 'Critical') DEFAULT 'Medium'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `fabrics` (`name`, `washing_temp`, `drying_advice`, `ironing_temp`, `humidity_risk`) VALUES
('Cotton', 'Cold to 40°C', 'Line dry in shade or tumble dry low. Ensure 100% dry before storage to prevent mold.', 'Medium-High (150-200°C) with steam', 'High'),
('Silk', 'Cold hand wash only', 'Air dry flat in shade. Avoid direct tropical sun.', 'Low (110°C) without steam on reverse', 'Critical'),
('Denim', 'Cold water inside out', 'Hang inside out in well-ventilated shade.', 'Medium-High (150-180°C)', 'Medium'),
('Polyester', 'Cool water (30°C)', 'Quick-drying. Line dry indoors or outdoors in shade.', 'Low (110°C) synthetic setting', 'Low'),
('Wool', 'Cold hand wash with wool detergent', 'Dry flat on towel away from direct heat and moisture.', 'Low steam press', 'Critical'),
('Linen', 'Cold to 30°C delicate', 'Line dry in shade; iron while slightly damp.', 'High (200°C) with heavy steam', 'High');

-- 4. User Wardrobe Items Table
CREATE TABLE IF NOT EXISTS `wardrobe_items` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT DEFAULT 1,
    `category_id` INT,
    `fabric_id` INT,
    `color` VARCHAR(50),
    `item_name` VARCHAR(100),
    `details` TEXT,
    `image_path` VARCHAR(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`category_id`) REFERENCES `clothing_categories`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`fabric_id`) REFERENCES `fabrics`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. Weather-Based Care Guidance Rules Table (Sri Lanka Monsoon & Tropical Climate)
CREATE TABLE IF NOT EXISTS `weather_care_rules` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `weather_condition` VARCHAR(50) NOT NULL,
    `drying_strategy` TEXT NOT NULL,
    `storage_strategy` TEXT NOT NULL,
    `mold_prevention_tip` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `weather_care_rules` (`weather_condition`, `drying_strategy`, `storage_strategy`, `mold_prevention_tip`) VALUES
('Rainy / Monsoon Season', 'Use indoor clothes drying racks paired with a dehumidifier or electric fan. Apply an extra spin cycle in the washing machine to extract maximum moisture.', 'Leave 2-3 inches of space between hangers in wardrobes. Use breathable cotton garment bags instead of sealed plastic containers.', 'Ensure garments (especially heavy seams and thick pockets) are 100% dry before storing. Use silica gel packets or active charcoal moisture absorbers.'),
('High Humidity (Tropical Dampness)', 'Air garments in shade with active cross-ventilation. Avoid hanging clothes against damp walls.', 'Regularly open wardrobe doors during sunny mornings to allow fresh air circulation.', 'Wipe wardrobe shelves with diluted vinegar solution to eliminate microscopic fungal spores before storage.'),
('Hot & Sunny Weather', 'Wash colored garments inside out in cold water with mild liquid detergent. Hang items in covered shade to protect dyes from UV fading.', 'Store in cool, dry wardrobes away from direct sunlight windows.', 'UV rays break down natural fibers and fade dyes rapidly in tropical sunshine. Always dry inside out in shaded areas.'),
('Indoor Drying Difficulties', 'Spread clothing evenly across indoor airers. Hang smaller items near high airflow points and run an oscillating room fan.', 'Do not crowd clothes in damp rooms or dark closets.', 'Never put damp clothes in laundry baskets; air them out immediately to stop musty odor bacteria growth.');

-- 6. Damage & Repair Reports Table
CREATE TABLE IF NOT EXISTS `damage_reports` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT DEFAULT 1,
    `garment_name` VARCHAR(100) NOT NULL,
    `damage_type` VARCHAR(50) NOT NULL,
    `image_path` VARCHAR(255),
    `ai_analysis_result` TEXT,
    `repair_recommendation` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 7. Clothing Care Reminders Table
CREATE TABLE IF NOT EXISTS `reminders` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT DEFAULT 1,
    `title` VARCHAR(150) NOT NULL,
    `garment_name` VARCHAR(100) NOT NULL,
    `category` ENUM('Wash', 'Maintenance', 'Special Fabric Care', 'Storage') DEFAULT 'Wash',
    `reminder_date` DATE NOT NULL,
    `is_completed` TINYINT(1) DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 8. Contact Form Messages Table
CREATE TABLE IF NOT EXISTS `contact_messages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `subject` VARCHAR(200) NOT NULL,
    `message` TEXT NOT NULL,
    `submitted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
