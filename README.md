## PLEASE FOLLOW THE STEPS BELOW BEFORE ANYTHING ELSE

Please follow the steps below:

1. Make sure you have installed the following
- PHP Version 8 or higher
- Composer
- NPM(Node)

2. Clone the repository in your local directory
3. Open terminal and redirect to the file location.
4. In your localhost, make sure to create an empty database and update **.env** file to change Database Details.
5. Run commands below:

```
php artisan key:generate
npm install && npm run dev

```

In another terminal, run:
```
php artisan migrate:fresh --seed
php artisan serve
```

6. Use the below details for login as user registration was skipped and have a user account seeded.
```
test@admin.com
testpassword
```
