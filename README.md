Hello! You have to upload dump of database from root directory and set ur data in db.php file.

## Keep calm, drink coffee and enjoy :)

/admin

login: admin@admin.com

password: admin

## Yii2 Test Task

II. CRUD:
On the admin dashboard, add section called "Videos". It must have a submenu with 2 items: 
-Categories
-Videos

Click on the "Categories" will lead you to list of all categories. From this place, you are able to create new categories and edit/delete existing ones. Category model must contain:
-Title
-Slug
-Description

Click on the "Videos" leads you to list of all videos, where you able to add/update/delete videos.
HINT: current admin dashboard already contains several controllers/models/views, you can consider them as example. Admin files located in modules/admin. 
Video model must contain:
-Title
-Description
-Category (choice of existing category from above)
-Link to the video file
