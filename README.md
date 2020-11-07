# admin-user-login-system 

## Techs used:
 1. PHP - Backend logic
 2. mysqli -datbase querry
 
 Database name = multi-login 
 Table name= users;
 
## To do:
  * Check if users already exist
  * Add icons to form inputs;
  * Ability to edit a users info.

 ## How it works; 
 * Both the user and admin login using the same form, the info is sent to the database for verification. If the login is for admin, the page rredirects to the admin home page, if however, its a normal user, page redirects to normal page. 
 * Only admins have the role of creating new admins.
 * The first admin is created directly through the database.
