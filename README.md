# Food Fox - Food Delivery Web App

## Overview
**Food Fox** is a simple and efficient food delivery web application that allows users to browse restaurants, place orders, and manage deliveries. This project is built using **PHP**, **SQL (MySQL Database)**, **HTML**, and **CSS**.

## Features
- User Registration & Login
- Restaurant Listings
- Food Menu with Pricing
- Add to Cart & Checkout
- Order Management
- Admin Dashboard

## Tech Stack
- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL

## Installation Steps
### 1. Clone the Repository
```sh
 git clone https://github.com/jaylakhani2403/food-delivery-web.git
 cd food-delivery-web
```

### 2. Setup Database
- Import the `database.sql` file into MySQL.
- Update `config.php` with your database credentials.

### 3. Start the Server
Ensure you have **XAMPP** or **WAMP** installed and start the Apache and MySQL services.
- Place the project folder inside `htdocs` (for XAMPP) or `www` (for WAMP).
- Open the browser and go to:
  ```
  http://localhost/food-fox/
  ```

## Folder Structure
```
/food-fox
│── index.php         # Home Page
│── login.php         # User Login
│── signup.php        # User Registration
│── dashboard.php     # Admin Dashboard
│── menu/             # Restaurant Menus
│── orders/           # Order Management
│── resto/            # Restaurant Details
│── settings/         # User Settings
│── images/           # Images Folder
│── js/script.js      # JavaScript File
│── css/style.css     # CSS Styles
│── styles.css        # Additional Styles
│── config.php        # Database Configuration
│── database.sql      # Database Schema
```

## Future Enhancements
- Implementing Online Payment Integration
- Adding Order Tracking
- Mobile Responsive Design

## License
This project is open-source and free to use.

---
Made with ❤️ by **JAY LAKHANI**

