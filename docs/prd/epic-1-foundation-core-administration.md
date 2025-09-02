# Epic 1: Foundation & Core Administration
**Goal:** Establish the core application foundation, including Telegram authentication and the back-office modules for managing carriers and services, enabling initial data setup.

### **Story 1.0: Initial Project Setup & Credentials**
* **As a** Project Admin, **I want** to configure the required Telegram service credentials, **so that** the development agent can integrate with the Telegram API without being blocked.
* **Acceptance Criteria:**
    1. A placeholder for the Telegram Bot API credential is created in the project's configuration.
    2. The application is configured to read this credential from the environment.
    3. The configuration gracefully handles a missing credential without crashing.

### **Story 1.1: Project Scaffolding & Database Setup**
* **As a** Developer, **I want** a new Laravel project initialized with a MySQL database connection, **so that** I have a clean and stable foundation to build the application on.
* **Acceptance Criteria:**
    1.  A new Laravel project is created.
    2.  The `.env` file is configured for a local MySQL database connection.
    3.  The database migration system is functional, confirmed by running an initial migration.

### **Story 1.2: Telegram-based Authentication**
* **As an** Ops Team Member, **I want** to log into the Back Office system using my Telegram account, **so that** I can access the platform securely without managing a separate password.
* **Acceptance Criteria:**
    1.  A "Login with Telegram" button is present on the application's login page.
    2.  Clicking the button initiates the standard Telegram OAuth authentication flow.
    3.  Upon successful authentication, a user session is created, and the user is redirected to the main dashboard.
    4.  An unsuccessful or denied authentication attempt displays a clear error message to the user.

### **Story 1.3: Carrier Management (CRUD)**
* **As a** Manager, **I want** to create, read, update, and delete carriers in the Back Office, **so that** I can maintain an up-to-date list of our logistics partners and their cost data.
* **Acceptance Criteria:**
    1.  A "Carriers" section is accessible in the Back Office UI only to users with the "Manager" role.
    2.  The manager can view a list of all existing carriers.
    3.  The manager can add a new carrier with relevant details (e.g., company name, contact info, cost prices for services).
    4.  The manager can edit and delete existing carriers.

### **Story 1.4: Service Management (CRUD)**
* **As a** Manager, **I want** to create, read, update, and delete the services PJL offers, including their selling prices, **so that** we have a centralized and accurate price book for use in quotations and P&L calculations.
* **Acceptance Criteria:**
    1.  A "Services" section is accessible in the Back Office UI only to users with the "Manager" role.
    2.  The manager can view a list of all existing services with their selling prices.
    3.  The manager can add a new service with a name, description, and price.
    4.  The manager can edit and delete existing services.

---