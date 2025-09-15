# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel-based meal tracking application for employees and trainees. The system uses Laravel Jetstream with Livewire for the frontend, includes QR code/barcode scanning functionality, and generates PDF reports for meal tracking data.

## Development Commands

### PHP/Laravel Commands
- `php artisan serve` - Start the development server
- `php artisan migrate` - Run database migrations
- `php artisan migrate:fresh --seed` - Fresh migration with seeders
- `php artisan db:seed` - Run database seeders
- `composer install` - Install PHP dependencies
- `composer update` - Update PHP dependencies

### Frontend Commands
- `npm install` - Install Node.js dependencies
- `npm run dev` - Start Vite development server for assets
- `npm run build` - Build assets for production

### Testing
- `php artisan test` - Run PHPUnit tests (configured via phpunit.xml)
- `vendor/bin/phpunit` - Alternative test runner

### Code Quality
- `vendor/bin/pint` - Laravel Pint code formatter (if installed)

## Architecture Overview

### Core Technology Stack
- **Backend**: Laravel 10.x with PHP 8.1+
- **Frontend**: Livewire 3.x components with Blade templates
- **Authentication**: Laravel Jetstream with Fortify
- **Styling**: Tailwind CSS
- **Build Tool**: Vite
- **Database**: MySQL (via XAMPP)

### Key Features
- **QR Code/Barcode Scanning**: Employee meal tracking via QR codes and barcodes
- **PDF Generation**: Reports using TCPDF and Spatie Laravel PDF
- **Excel Export**: Using Maatwebsite Excel package
- **Real-time UI**: Livewire components for interactive interfaces

### Directory Structure

**Models** (`app/Models/`):
- `User.php` - User authentication with user types
- `Employee_meal_log.php` - Employee meal tracking records
- `Trainee_meal_log.php` - Trainee meal tracking records
- `Barcode.php` - Barcode management
- `Qrcode.php` - QR code management
- `User_type.php`, `Category.php`, `Meal_type.php` - Supporting data models

**Livewire Components**:
- `ParentComponents/` - Main page components (e.g., `EmployeeMealTrackerComponent`, `ManageUserComponent`)
- `Components/` - Reusable child components for CRUD operations
- `GenerateDocumentsComponent/` - PDF and document generation components

**Routes** (`routes/web.php`):
- Organized by functionality with route prefixes:
  - `Emp-Meal-Tracker` - Employee meal tracking
  - `Emp-Barcode-List` - Barcode management
  - `Generate-Reports` - Report generation
  - `Manage-User` - User management
  - `Scanner` - QR code scanning functionality

### Database

The application uses standard Laravel migrations in `database/migrations/` with comprehensive seeders for initial data setup. Key tables include:
- Users with user types
- Employee and trainee meal logs
- Barcode and QR code management
- Categories and meal types

### Authentication & Authorization

Uses Laravel Jetstream with Sanctum for API authentication. User types determine access levels and available features.

## Development Notes

- The application is designed for XAMPP environment (Windows-based development)
- Contains both employee and trainee tracking (some trainee routes are commented out)
- Uses Livewire for reactive components without page refreshes
- PDF generation supports both employee and trainee meal tracking reports
- QR code scanning functionality includes hardware integration components