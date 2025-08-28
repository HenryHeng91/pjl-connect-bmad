# \#\# Development Workflow

### **Local Development Setup**

Developers will need PHP, Composer, Node.js, and MySQL. Setup involves cloning the repo, running `composer install` and `npm install`, configuring the `.env` file, and running `php artisan migrate`.

### **Running the Development Servers**

Two commands must be run in separate terminals:

1.  `npm run dev` (Starts the Vite server for frontend assets)
2.  `php artisan serve` (Starts the Laravel backend server)

-----
