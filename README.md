# MegaStop - Premium Electronics E-commerce Store

![MegaStop](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## Overview

MegaStop is a modern e-commerce platform built with Laravel, designed to showcase and sell premium electronics and accessories. The application features a sleek, responsive design with gold accents, providing users with an elegant shopping experience.

## Features

- **Product Catalog**: Browse products with filtering by category and search functionality
- **Shopping Cart**: Add, remove, and update products in your cart
- **User Authentication**: Secure login and registration system
- **Admin Dashboard**: Manage products, view statistics, and monitor store activity
- **Responsive Design**: Optimized for all devices with premium UI elements

## Tech Stack

- **Backend**: Laravel 12.x
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: MySQL/SQLite
- **Dependencies**: See composer.json and package.json for full list

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL or SQLite

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/megastop.git
   cd megastop
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install JavaScript dependencies:
   ```bash
   npm install
   ```

4. Create and configure environment file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Configure your database in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=megastop
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```

7. Build frontend assets:
   ```bash
   npm run build
   ```

8. Start the development server:
   ```bash
   php artisan serve
   ```

9. Visit `http://localhost:8000` in your browser

## Admin Access

After seeding the database, you can access the admin dashboard with these credentials:

- **Email**: admin@megastop.com
- **Password**: admin123

## Deployment to StackCP Shared Hosting

1. **Prepare Your Application**:
   - Run `npm run build` to compile assets
   - Make sure your `.env` file is configured for production

2. **Upload Files to StackCP**:
   - Upload all files to your StackCP hosting account via FTP or Git
   - Make sure to set the document root to the `public` folder

3. **Configure Environment**:
   - Update the `.env` file with your production database credentials
   - Set `APP_ENV=production` and `APP_DEBUG=false`
   - Generate a new application key if needed: `php artisan key:generate`

4. **Set Permissions**:
   - Set proper permissions for storage and bootstrap/cache directories:
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

5. **Run Migrations**:
   - Run migrations on your production database:
   ```bash
   php artisan migrate --seed
   ```

6. **Configure Web Server**:
   - Ensure your web server is configured to use `public/index.php` as the entry point
   - Set up URL rewriting (Apache .htaccess should be included in the repository)

7. **Optimize for Production**:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## Project Structure

- **app/**: Contains the core code of the application
  - **Http/Controllers/**: Controllers for handling requests
  - **Models/**: Eloquent models (Product, User)
- **database/**: Database migrations and seeders
- **resources/**: Frontend assets and views
  - **css/**: Stylesheets including Tailwind CSS
  - **js/**: JavaScript files
  - **views/**: Blade templates
- **routes/**: Application routes
- **public/**: Publicly accessible files

## Contributing

1. Fork the repository
2. Create your feature branch: `git checkout -b feature/amazing-feature`
3. Commit your changes: `git commit -m 'Add some amazing feature'`
4. Push to the branch: `git push origin feature/amazing-feature`
5. Open a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).