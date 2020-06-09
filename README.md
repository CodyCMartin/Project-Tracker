[![Project Status: WIP – Initial development is in progress, but there has not yet been a stable, usable release suitable for the public.](https://www.repostatus.org/badges/latest/wip.svg)](https://www.repostatus.org/#wip)

# Project Tracker by Cody Martin

This website was made for a final project. The main purpose of this site is for freelancers or hobbyist to be able to keep track of their current projects in an organized manner. The functional goals are as follows:

- ✔️ Users can Register/Login
- Users can Create, Read, Update and Delete projects

# Future Features

- Users able to collaborate with one another and update their project from their home project screen
- Time tracking for better billing
- Users ability to click and drag project cards to sort priority
- ✔️ Form pops up to add new project instead of loading a new form page

### Tech

This site was built using the following technologies:

- HTML
- CSS
- PHP
- MySQL
- JavaScript
- Bootstrap

# Challenges and Lessons Learned

- <ins>Line 8 in CreateProjects.php </ins> <br />
  I had a little trouble figuring out just how I wanted to implement the logic to check for client names already existing in the database. I went through a few if/else designs before I was able to refactor it down to a simple if statement by changing the way I was querying the database. I originally wasn't adding a WHERE clause in my SQL that filtered the results to only return names of clients if the current user id was the creator of that client record. This helped cut my code in half by allowing me to simply compare the number of returned rows to figure out if a client was already in the database. Simply put, if the db returned 0 rows, then insert the new client data. If it returned 1 or more rows, client exists, don't insert which prevents duplicates of the same client being made and assigned a new client_id in the db.

- <ins>Line 28 in projects.php </ins> <br />
  This was my first time using a join on a query to combine table results. I originally made two queries but this complicated the output for displaying the projects. So I figured creating a join would be time well spent rather then fighting through the display issues I was facing due to the separate db queries I was making between the HTML. With the help of some material from class and videos off YouTube, I was able to go into PHPmyadmin and troubleshoot my way through creating a working join query.

- <ins>Creating pop-up forms </ins> <br />
  As I added more features to my project my list of files began to get excessive. This coupled with the poor user experience of loading a form on an entirely separate page got me thinking of ways I could fix both problems. I looked into pop-up forms which required no page loading and also let me delete dedicated form pages to cut down my file count. I had trouble with the placement of the forms more then anything but was able to finally place it properly in the center with some simple CSS.
