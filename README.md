# Gelos Member Management System

[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://www.php.net/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)
[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://github.com/Traccyyyyy/GelosMembeManagement/commits/main)
[![Last Commit](https://img.shields.io/github/last-commit/Traccyyyyy/GelosMembeManagement)](https://github.com/Traccyyyyy/GelosMembeManagement/commits/main)

## 🎯 Project Overview
A comprehensive web-based member management system for Gelos Enterprises, demonstrating proficiency in full-stack web development. This project showcases practical implementation of user authentication, role-based access control, and data management using PHP and web technologies.

## 🔍 Demo Access
Test the application with these credentials:

**Regular User Access:**
```
Username: demo_user
Password: Demo123!
```

**Admin Access:**
```
Username: admin
Password: Admin123!
```

## 📁 Project Structure
```
telos-member-management/
├── admin/                 # Admin-specific functionality
│   ├── admin.php         # Admin dashboard
│   ├── adminlogin.php    # Admin login interface
│   ├── adminprocess.php  # Admin authentication logic
│   └── admin.txt         # Admin credentials storage
├── auth/                 # User authentication
│   ├── login.php        # User login interface
│   ├── register.php     # User registration
│   ├── logout.php       # Session termination
│   └── accounts.txt     # User credentials storage
├── includes/            # Common components
│   ├── header.php      # Common header with navigation
│   └── footer.php      # Common footer
├── marks/              # Marks management
│   ├── marks.php      # Marks input interface
│   └── processMarks.php # Marks calculation logic
├── css/               # Styling
│   └── style.css     # Global styles
└── images/           # Asset storage
    └── *.png         # UI assets
```

## 💡 Key Code Examples

### Secure Password Validation
```php
// Password validation with multiple requirements
$hasNumber = preg_match('/[0-9]/', $UserPass);
$hasLower = preg_match('/[a-z]/', $UserPass);
$hasUpper = preg_match('/[A-Z]/', $UserPass);
$hasSpecial = preg_match('/[!@#$%^&*()_+{}[\]<>?]/', $UserPass);

if (!$hasNumber || !$hasLower || !$hasUpper || !$hasSpecial) {
    header("Location: register.php?error=3");
    exit();
}
```

### Session Management
```php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Protected route check
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
```

### Marks Calculation
```php
// Calculate statistics
$total = array_sum($marks);
$average = $total / count($marks);
$highest = max($marks);
$lowest = min($marks);

// Grade calculation
if ($average >= 85) $grade = 'HD';
elseif ($average >= 75) $grade = 'D';
elseif ($average >= 65) $grade = 'C';
elseif ($average >= 50) $grade = 'P';
else $grade = 'F';
```

## 📸 Features & Screenshots

### Home Page & Navigation
![Home Page](screenshots/home-page.png)
*Clean and professional landing page with intuitive navigation*

### User Authentication
#### Registration System
![Registration Form](screenshots/registration-form.png)
*Secure registration form with password requirements*

![Password Validation](screenshots/registration-validation.png)
*Real-time password validation and requirements display*

![Registration Success](screenshots/registration-success.png)
*Successful registration with welcome message*

![Registration Error](screenshots/registration-error.png)
*Error handling for existing username or invalid input*

#### Login Interface
![Login Page](screenshots/login-page.png)
*User-friendly login interface with error handling*

### Marks Management
#### Input Interface
![Marks Input](screenshots/marks-input.png)
*Easy-to-use marks entry system*

#### Results Display
![Marks Results](screenshots/marks-results.png)
*Comprehensive results display with statistics and grading*

## 🚀 Key Features
- **User Authentication System**
  - Secure login and registration functionality
  - Session management for users
  - Separate admin authentication portal
  
- **Role-Based Access Control**
  - Admin dashboard for system management
  - User-specific content access
  - Marks/grades management system

- **Responsive Design**
  - Mobile-friendly interface
  - Clean and professional UI
  - Consistent branding throughout

## 💻 Technologies Used
- **Backend:** PHP
- **Frontend:** HTML5, CSS3
- **Data Storage:** File-based system (`.txt` files)
- **Session Management:** PHP Sessions

## 🛠️ Technical Implementation
- Secure user authentication with password hashing
- Form validation and sanitization
- Responsive navigation system
- Modular code structure
- Clean separation of concerns (login process, registration, admin functions)

## 🔒 Security Features
- Protected admin access
- Session-based authentication
- Input validation and sanitization
- Secure password handling

## 🎨 UI/UX Features
- Intuitive navigation menu
- Professional branding integration
- Responsive layout
- Clear user feedback mechanisms

## 🔄 Development Practices
- Modular code organization
- Consistent coding style
- Error handling implementation
- Clean and maintainable codebase

## 🚧 Future Improvements
1. Database Integration
   - Migrate from file-based storage to a proper database system (MySQL/PostgreSQL)
   - Implement proper data relationships and constraints

2. Enhanced Security
   - Implement HTTPS
   - Add CSRF protection
   - Enhance password policies
   - Add rate limiting for login attempts

3. Modern Framework Integration
   - Consider migrating to a modern PHP framework (Laravel/Symfony)
   - Implement MVC architecture

4. Frontend Enhancements
   - Add JavaScript for dynamic interactions
   - Implement form validation on the client side
   - Add loading states and better user feedback
   - Enhance mobile responsiveness

5. Additional Features
   - Password reset functionality
   - Email verification
   - User profile management
   - Activity logging
   - Data export capabilities

## 📝 Developer Notes
This project demonstrates practical implementation of web development concepts including:
- User authentication and authorization
- Session management
- Form handling and validation
- File system operations
- Responsive web design
- Security best practices

## 🤝 Contributing
This is a portfolio project but suggestions and feedback are welcome. Feel free to open issues or submit pull requests.

---
*Note: This project was developed as part of TAFE NSW coursework and uses a fictitious organization for educational purposes.* 