# Saran Academy Website + Admin Panel

This project provides a complete school website and admission query management system using **HTML, CSS, JavaScript, PHP, and SQL**.

## School Details Included
- School Name: **Saran Academy**
- Address: **Koniya Ghat, Varanasi**
- Classes: **Nursery to Class 8**
- Facilities highlighted: **Computer Lab, Yoga, Dedicated Teachers**

> Note: Library is intentionally not mentioned.

## Features
- Responsive school website homepage
- Admission query form on the main website
- Query data saved to MySQL database
- Admin login panel
- Admin dashboard to view all admission queries

## Default Admin Credentials
- Username: `admin`
- Password: `admin123`

## Setup Instructions
1. Create DB/table using SQL file:
   ```bash
   mysql -u root -p < database.sql
   ```
2. Update DB credentials in `config.php` if needed.
3. Run local server:
   ```bash
   php -S 0.0.0.0:8000
   ```
4. Open in browser:
   - Website: `http://localhost:8000/index.php`
   - Admin: `http://localhost:8000/admin/login.php`
