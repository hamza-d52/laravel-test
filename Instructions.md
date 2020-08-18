#Larave Release Instructions

1) Install Vendor
```bash
composer install
```

2) Run migration

```bash
php artisan migrate
```

3) Run following seeder(s)

```bash
php artisan db:seed --class=DatabaseSeeder
```

4) Go to home page and search for coundtry Canada and Click on View Button

5) It will open country show page with all companies and user with their joining date

6) File Task : FileController@store

