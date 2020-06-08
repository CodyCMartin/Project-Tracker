[![Project Status: WIP – Initial development is in progress, but there has not yet been a stable, usable release suitable for the public.](https://www.repostatus.org/badges/latest/wip.svg)](https://www.repostatus.org/#wip)

# Project Tracker by Cody Martin

This website was made for a final project. The main purpose of this site is for freelancers or hobbyist to be able to keep track of their current projects in an organized manner. The functional goals are as follows:

  - ✔️ Users can Register/Login
  - Users can Create, Read, Update and Delete projects

# Future Features

  - Users able to collaborate with one another and update their project from their home project screen
  - Time tracking for better billing
  - Users ability to click and drag project cards to sort priority 
  - Form pops up to add new project instead of loading a new form page

### Tech

This site was built using the following technologies:

* HTML
* CSS
* PHP
* MySQL
* Bootstrap


# Challenges and Lessons Learned

*  <ins>Line 8 in CreateProjects.php </ins> <br />
I had a little trouble figuring out just how I wanted to implement the logic to check for client names already existing in the database. I went through a few if/else designs before I was able to refactor it down to a simple if statement by changing the way I was querying the database. I originally wasn't adding a WHERE clause in my SQL that filtered the results to only return names of clients if the current user id was the creator of that client record. This helped cut my code in half by allowing me to simply compare the number of returned rows to figure out if a client was already in the database. Simply put, if the db returned 0 rows, then insert the new client data. If it returned 1 or more rows, client exists, don't insert which prevents duplicates of the same client being made and assigned a new client_id in the db. 




