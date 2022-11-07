What it can:

 - Register new users with checking for existing users
 - Login users with sessions ids checking and saving. Checking for admin or not
 - Saving sessions in cookies and log-out from existing if another will open
 - Reset passwords
 - Render content depending of user status (admin or not) 
 - Admin can clear users sessions and delete users
 
---------------------------------------------------------------------- 
 
To start a project: 

1) Put the project folder into your localserver public folder (www or public_html)

2) Create MySQL database with 'users' table and with rows like bellow: 
  - email
  - username
  - password
  - session_id
  - role
  - status
  
3) Specify db_name, username, etc in: app/controllers/BaseController.php
 
4) Open project folder in terminal and run: composer install

5) Run the server and open project in the browser (http://localhost:<port>/simpleAdminPage)
