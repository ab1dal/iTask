<img src="https://media0.giphy.com/media/3o85xtLX7zCyeeWGLC/giphy.gif?cid=ecf05e47yeg4a0bta9a5bhotcb5jaget1vrzox8vhnpcokvi&rid=giphy.gif&ct=g" width="100%">

# Todo-list app

CRUD with user login. Built with Laravel 8.

Live: [https://patrikstaaf.se/todo-php/](https://patrikstaaf.se/todo-php/)


## Features

-   As a user I'm able to create an account.

-   As a user I'm able to login.

-   As a user I'm able to logout.

-   As a user I'm able to edit my account email and password.

-   As a user I'm able to upload a profile avatar image.

-   As a user I'm able to create new tasks with title, description and deadline date.

-   As a user I'm able to edit my tasks.

-   As a user I'm able to delete my tasks.

-   As a user I'm able to mark tasks as completed.

-   As a user I'm able to mark tasks as uncompleted.

-   As a user I'm able to create new task lists with title.

-   As a user I'm able to edit my task lists.

-   As a user I'm able to delete my task lists along with all tasks.

-   As a user I'm able to add a task to a list.

-   As a user I'm able to view all tasks.

-   As a user I'm able to view all tasks within a list.

-   As a user I'm able to view all tasks which should be completed today.

-   As a user I'm able to remove a task from a list.

-   As a user I'm able to delete my account along with all tasks and lists.

-   As a user I'm able to reset my password via email.

## Installation
   
    
      git clone https://github.com/patrikstaaf/todo-php
      cd todo-php
      cp .env.example .env
      composer install
      npm install
      php artisan key:generate
      php artisan storage:link
      php artisan migrate:fresh
      npm run watch
      php artisan serve


## Code Review

Code review written by [Neo Lejondahl](https://github.com/NeoIsRecursive).

1. `Controllers` - Strict types,
2. `CategoryTaskController:21` - Maybe validate format aswell,
3. `Models/User:61-66` - You have created hasmany on the user but never use them?,
4. `web.php` - Really like the structure and how it looks, easy to see were stuff is.
5. `resources/css/app.css` - maybe make some own classes and @apply tailwindcss classes to them, if you repeat lots of classes on more than one location example buttons or nav links, 
6. `accesability` - I could navigate and do everything on the site with only the keyboard, great! 
7. `overall` - I like it, the code is clean and ‘simple’ which is great. Really good job and it looks good aswell,

## Testers

Tested by the following people:

1. Theo Sandell
2. Neo Lejondahl
3. Albin Andersson

## Wunderlist+

Follow-up assignment to add features to a classmate's project, done by [Theo Sandell](https://github.com/theo0165).
Link to the pull request: [pull request](https://github.com/patrikstaaf/todo-php/pull/2)
Link to the branch: [branch](https://github.com/patrikstaaf/todo-php/tree/wunderlist+)
