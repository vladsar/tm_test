# Task Manager Application

A simple web-based task manager application that allows users to add, edit, and
delete tasks. 

The application is made as SPA with Vue.js and Laravel.

## How to run


1. Clone the project in the desired folder 
```bash
  git clone https://github.com/vladsar/tm_test.git
```

2. Move to the newly created folder 
```bash
  cd tm_test
```

3. Run
```bash
  composer install
```

4. Create .env by dublicating the content of .env.example.

5. Generate an application encryption key
```bash
  php artisan key:generate
```

6. Create a database named tm_test and set  
```bash
  DB_DATABASE=tm_test
```
in the .env file

7. 
```bash
  php artisan migrate --seed
```

8. Run 
```bash
  npm install
```

9. Run 
```bash
  npm install @vitejs/plugin-vue
```

10. Run 
```bash
  npm run dev
```

11. Open another terminal and run
```bash
  php artisan serve
```
and follow the given link


## Tests

For running tests run
```bash
  php artisan test
```




P.S. Postman collection is in the root folder
