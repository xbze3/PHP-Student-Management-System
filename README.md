# School Management System (SMS)

## Overview

The School Management System (SMS) is a PHP-based web application designed to manage a primary school environment. The system follows Object-Oriented Programming (OOP) principles and the Model-View-Controller (MVC) architecture to ensure clean structure, maintainability, and scalability.

The application supports role-based access, student and class management, score recording, and academic reporting across multiple school years and terms.

---

## Objectives

- Manage users, students, classes, grades, subjects, and scores efficiently
- Enforce role-based permissions for teachers and administrators
- Record and report student academic performance accurately
- Apply OOP and MVC principles in a real-world PHP application

---

## System Features

### User & Role Management

- Two user roles:
    - **Teachers**: manage student scores only
    - **Office Administrators**: manage all system functionalities

### Grade Management

- Predefined grades: Grade 1 to Grade 6
- Grade names are fixed and cannot be modified

### Class Management

- Each grade contains 4 classes
- Classes are uniquely named and permanently linked to a grade

### Student Management

- Students are assigned to a single class
- Each student can belong to only one class at a time

### Subject Management

- Subjects are shared across all classes within the same grade

### Score Management

- Teachers record scores per subject
- Three terms per school year
- Scores are tied to both subject and school year

### School Year & Term Management

- Scores are organized by school year and term
- Allows viewing of historical academic records

---

## Reports

### Student Report Card

- Displays a student’s performance for a selected school year
- Includes term scores and subject averages

### Average Performance Reports

- Shows average performance by grade and subject
- Supports administrative academic analysis

---

## Technical Details

- Built with **pure PHP** (no external frameworks)
- Uses **MVC architecture**
- Object-Oriented design throughout the application
- Runs on **XAMPP**

---

## Security & Validation

- Server-side and client-side input validation
- Protection against SQL injection and XSS
- Role-based access control enforced throughout the system

---

## User Interface

- Simple and user-friendly design
- Clear separation of permissions by user role
- Easy navigation for administrators and teachers

---

## Conclusion

This project demonstrates practical application of PHP, OOP, MVC architecture, and collaborative software development while addressing real-world school management needs.
