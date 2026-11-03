# Object-Oriented PHP Secure Role-Based Web Application (Wk 4 Performance Assessment)

## Author
* **Name:** Todd Upshaw
* **Course:** Object-Oriented PHP / Web Development
* **Environment:** Visual Studio Code (VCASTLE) / XAMPP / Apache

---

## Project Overview
This project is a secure PHP web application built using **Object-Oriented Programming (OOP)** principles and the **MVC (Model-View-Controller)** architecture. It features secure database authentication, session-based role authorization, and HTTPS enforcement across tiered user levels.

The application connects to the `sdc342_wk4pa` MySQL database to authenticate user credentials and dynamically route users to specific role-based dashboards upon successful login.

---

## Key Features & Technical Specifications
* **Architecture:** Strictly structured using MVC separation of concerns with clean namespace separation (`Models` and `Controllers`).
* **Database Layer:** Utilizes PDO (PHP Data Objects) for secure, prepared-statement database interactions.
* **Role-Based Access Control (RBAC):**
  * **Level 1 (Administrator):** Access to Administrator Options and the full View User Accounts directory.
  * **Level 2 (Standard User):** Access to the application Menu and the View Products catalog.
  * **Level 3 (Technician):** Access to Incident Management and the View Open Incidents portal.
* **Security:** Session validation checks on every protected page and dedicated logout handling that clears session variables.

---

## File Structure & Descriptions

```text
Upshaw_Wk4PA/
├── Models/
│   ├── Database.php          # Singleton PDO connection handler
│   └── UserDB.php            # Database query methods for user authentication and account viewing
├── Controllers/
│   ├── User.php              # User entity model class
│   └── UserController.php    # Session management and HTTPS enforcement utilities
├── index.php                 # Login entry point page
├── admin_menu.php            # Level 1: Administrator navigation dashboard
├── view_accounts.php         # Level 1: Administrator account viewing table
├── user_menu.php             # Level 2: Standard user navigation menu
├── view_products.php         # Level 2: Standard user product catalog view
├── tech_menu.php             # Level 3: Technician navigation dashboard
├── view_incidents.php        # Level 3: Technician open incidents portal
└── README.md                 # Project documentation
