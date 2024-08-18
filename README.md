Assignment 2: Laravel Blog Application
Project Setup Instructions
Follow these steps to set up the project with an empty database:

1. Clone the Repository
In your bash type following code:
git clone https://github.com/KIRO28/Laravel-assignment-1.git

2. Open the project in vs code.
To install dependencies by using composer to check if it is install or not.
open vs code terminal and type following code.
composer install

3. Install the frontend dependencies with npm:
npm install

4. Set Up the Environment
Copy the .env.example file to create your .env file with following code.
cp .env.example .env


5. Edit the .env file to configure your database and other environment settings. Update the following lines with your database configuration:

DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=<your-database-name>
DB_USERNAME=<your-username>
DB_PASSWORD=<your-password>
Generate Application Key


6. Run Migrations to set up the database schema
php artisan migrate 

7. Start the Laravel development server:
php artisan serve
The application will be available at http://localhost:8000.

Usage Instructions
1. Registering Users

Navigate to http://localhost:8000/register to register a new user.
For admin registration, use http://localhost:8000/admin/register.
Logging In

2. Log in using the credentials you registered.
Admins will have access to the admin panel at http://localhost:8000/admin/dashboard.
Authors and user will have access to normal views

3. Navigating the Admin Panel
Admins can manage users and blog posts through the admin panel.

4. logged in as author and users.
you can create, delete edit or update the blog post. 

