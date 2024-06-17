**Project Name: User Management System**
This project is a user management system built using the Laravel 8 framework. It enables users to register, log in/out, view, and edit their profiles. Administrators have additional privileges, allowing them to perform CRUD (Create, Read, Update, Delete) operations on users and view user profiles. The system is enhanced with jQuery for form validation, Bootstrap for a polished user interface, and DataTables for client-side search functionality. Throughout development, I've adhered to Laravel's best practices and conventions to ensure optimal performance and maintainability.

**Setup Instructions:**
-Follow these steps to set up and run the project locally:

**Download the Repository:**
-Download and extract the zip file of the repository.
Open the command prompt by typing 'cmd' in the URL bar.

**Install Dependencies:**
-In the command prompt, run 'composer install' to install the required packages.

**Set Environment Variables:**
-Duplicate the .env.example file and rename it to .env.
Open the .env file and update the necessary environment variables such as DB_CONNECTION, DB_HOST, DB_DATABASE, etc., according to your local environment.

**Run Migrations:**
-In the command prompt, run 'php artisan migrate' to execute the database migrations.

**Generate Application Key:**
-In the command prompt, run 'php artisan key
' to generate an application key.

**Link Storage:**
0In the command prompt, run 'php artisan storage
' to create a symbolic link from the "public/storage" directory to the "storage/app/public" directory.

**Start the Development Server:**
-In the command prompt, run 'php artisan serve' to start the development server.

**Access the Application:**
The project can be accessed through the provided URL, for example: 'http://127.0.0.1:8000'.

**Additional Notes**
-Admins can only modify/provide admin roles
I've set an admin account with the username:admin and password:admin
-registered users in the login page will automatically have user role.
-make sure ID in your table is auto incremented.
