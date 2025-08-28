# \#\# Testing Strategy

### **Testing Pyramid**

Our strategy will focus on a large base of fast **Unit Tests**, a smaller layer of **Integration/Feature Tests**, and minimal **End-to-End Tests** for the MVP.

### **Test Organization**

  * **Backend (Pest/PHPUnit)**: Tests will be organized in Laravel's default `tests/Unit` and `tests/Feature` directories.
  * **Frontend (Vitest)**: Tests will reside within the `resources/js/` directory.

-----
