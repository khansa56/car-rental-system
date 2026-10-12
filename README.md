# Elite Journey Rides — Car Rental Management System

**A Web-Based Car Rental and Fleet Management Application**

## 1. Project Overview

Elite Journey Rides is a web-based Car Rental Management System developed to support the management of vehicle rentals and related business operations. The project provides a centralized interface for handling vehicle information, customer records, booking requests, payments, and administrative activities.

The system demonstrates the practical application of database management concepts and server-side web development by combining PHP, MySQL, HTML, and CSS to organize rental-related information and support common car rental workflows.

## 2. Project Objectives

The main objectives of this project are to:

- Develop a structured system for managing car rental operations.
- Maintain vehicle information and availability records.
- Organize customer details and booking information.
- Support payment-related record management.
- Provide administrative interfaces for managing cars and bookings.
- Apply database connectivity and data management concepts.
- Develop practical skills in PHP, MySQL, and web application development.

## 3. Key Features

### Vehicle Management
- Add and manage vehicle records.
- Update car information.
- Maintain vehicle availability information.
- Display car listings and details.

### Booking Management
- Provide a booking interface for customers.
- Collect booking-related information.
- Manage booking records and booking status.

### Customer Management
- Organize customer information.
- Provide administrative pages for managing customer records.

### Payment Management
- Provide payment-related pages and submission functionality.
- Manage payment records and payment status.

### Administrative Features
- Admin login and logout pages.
- Dashboard interface.
- Car, customer, booking, and payment management pages.
- Access to reports and related records.

### Additional Pages
- Home page
- About page
- Contact page
- Terms and conditions
- Car listing and car details

*The availability of individual functions depends on the project's configuration and successful database connectivity.*

## 4. Technologies Used

| Technology | Purpose |
|---|---|
| HTML5 | Structure of web pages |
| CSS3 | Page styling and layout |
| PHP | Server-side processing |
| MySQL | Relational database management |
| JavaScript | Client-side interactivity, where implemented |
| XAMPP | Local Apache and MySQL environment |
| phpMyAdmin | Database administration |

## 5. Project Structure

```text
Final project/
│
├── index.php
├── about.php
├── contact.php
├── terms.php
│
├── car-listing.php
├── car-details.php
├── booking.php
├── payment.php
│
├── dashboard.php
├── admin_login.php
├── admin_logout.php
├── admin_auth.php
│
├── add_car.php
├── update_car.php
├── delete_car.php
├── manage-cars.php
├── manage-booking.php
├── manage-customers.php
├── manage-payment.php
│
├── setup_database.php
├── create_tables.php
├── db.php
│
├── submit_booking.php
├── submit_payment.php
├── submit_contact.php
│
├── report.php
├── get_bookings.php
├── get_car.php
├── get_history.php
├── get_payments.php
├── view_messages.php
│
└── project pictures11/
    └── Vehicle images and media
```

*This is a representative structure. The complete repository may contain additional files.*

## 6. Installation and Setup

Follow these steps to run the project locally.

### Prerequisites
- XAMPP
- PHP
- MySQL or MariaDB
- A modern web browser

### Step 1: Install XAMPP

Install XAMPP on your computer and open the XAMPP Control Panel.

### Step 2: Configure the Project

Extract the project folder and copy it into the `htdocs` directory inside your XAMPP installation.

For example:

`C:\xampp\htdocs\Final project\`

### Step 3: Start Required Services

Open the XAMPP Control Panel and start:

- Apache
- MySQL

### Step 4: Set Up the Database

1. Open phpMyAdmin at `http://localhost/phpmyadmin/`.
2. Run the project's database setup script as required by the implementation.
3. Confirm that the database and required tables have been created successfully.
4. Check the database connection settings in `db.php`.

The project configuration references a database named `elite_journey`. Database setup scripts and connection settings should be reviewed before running the application.

### Step 5: Open the Application

Open the following address in your browser:

`http://localhost/Final%20project/index.php`

If the project folder has a different name, update the URL accordingly.

## 7. Database Management

The project includes database connection and setup-related PHP files. The database layer is intended to support vehicle records, bookings, customer information, and payment-related operations.

The database configuration should be verified before use to ensure that the connection method, database credentials, and table definitions are consistent.

## 8. Learning Outcomes

This project provides practical experience in:

- Relational database management.
- Server-side programming with PHP.
- Connecting a web application to MySQL.
- Organizing vehicle and booking records.
- Implementing administrative interfaces.
- Structuring a multi-page web application.
- Testing application workflows and database connectivity.

## 9. Limitations and Future Enhancements

Potential future improvements include:

- Secure customer registration and login.
- Role-based authorization for administrative operations.
- Improved input validation and database security.
- Automated booking and vehicle availability updates.
- Enhanced payment processing and transaction records.
- Booking history and analytical reports.
- A more responsive interface for mobile devices.

## 10. Deployment Information

The project source code can be hosted on GitHub for version control, documentation, and portfolio presentation.

**Important:** GitHub Pages does not execute PHP or provide a MySQL database. To run the complete application, use a compatible PHP hosting environment with a configured database, or run it locally using XAMPP.

## 11. Conclusion

Elite Journey Rides demonstrates the application of web development and database management concepts to a practical car rental scenario. By bringing vehicle management, bookings, customer records, and payment-related operations into a single application, the project provides a foundation for further development of a comprehensive rental management solution.

---

**Project Category:** Database Systems and Web Development  
**Application Type:** Car Rental Management System  
**Backend:** PHP  
**Database:** MySQL  
**Local Development Environment:** XAMPP  
**Repository Platform:** GitHub
