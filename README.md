Name: Kishor Karki 
StudentId: 220279631

Assignment 3: Laravel Blog Application implementing react
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


6. Run Migrations to set up the database schema
php artisan migrate 

7. Start the Laravel development server:
php artisan serve
The application will be available at http://localhost:8000.

After this run the clone project of reactApplication then you can see the list of blog and its detail when clicked.

<!-- Usage Instructions
1. Registering Users

Navigate to http://localhost:8000/register to register a new user.
For admin registration, use http://localhost:8000/admin/register.

#Logging In

2. Log in using the credentials you registered.
Admins will have access to the admin panel at http://localhost:8000/admin/dashboard.
Authors and user will have access to normal views

3. Navigating the Admin Panel
Admins can manage all users and blog posts through the admin panel.

4. logged in as author and users.
you can create, delete edit or update the blog post you have created.  -->


Approach for this assignment:

I had created a new branch name reactDev where i created two function to retrive all the blog posts and a specific blog post on the basis of _id. As, this application follows the MVC (Model-View-Controller) pattern. The routes are defined in routes/web.php for web interactions and routes/api.php for API endpoints. Controllers handle business logic, while Blade templates manage the views. The application uses Laravel’s built-in authentication and authorization features to manage user access and roles. It was not that difficult to solve this assignment as, I did most of them by watching recorded videos from mylean and also did went through the some videos and websites to implement the API.

POSTMAN COLLECTION

{
	"info": {
		"_postman_id": "ad8d0169-8896-40d4-a335-7704693dd9cd",
		"name": "New Collection",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "37895258"
	},
	"item": [
		{
			"name": "get all posts",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "http://127.0.0.1:8000/api/posts",
					"protocol": "http",
					"host": [
						"127",
						"0",
						"0",
						"1"
					],
					"port": "8000",
					"path": [
						"api",
						"posts"
					]
				}
			},
			"response": []
		},
		{
			"name": "get post by id",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "http://127.0.0.1:8000/api/posts/66bcc69bd3d220199b0190a8",
					"protocol": "http",
					"host": [
						"127",
						"0",
						"0",
						"1"
					],
					"port": "8000",
					"path": [
						"api",
						"posts",
						"66bcc69bd3d220199b0190a8"
					]
				}
			},
			"response": []
		}
	]
}


