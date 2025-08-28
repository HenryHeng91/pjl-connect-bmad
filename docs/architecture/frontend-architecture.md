# \#\# Frontend Architecture

This architecture is based on our decision to use **Laravel Breeze** with **Inertia.js**, which creates a modern, tightly-integrated full-stack application.

### **Component Architecture**

  * All frontend components will reside in the `resources/js/` directory, with subdirectories for `Components`, `Layouts`, and `Pages`. Components will use Vue 3's `<script setup>` syntax.

### **State Management Architecture**

  * We will use **Pinia**, the official state management library for Vue.js, for any application-wide state (e.g., the authenticated user).

### **Routing Architecture**

  * All routing is handled server-side by **Laravel** in the `routes/web.php` file. The frontend `resources/js/Pages/` directory directly maps to our server-side routes. Route protection is handled by Laravel's `auth` middleware.

-----
