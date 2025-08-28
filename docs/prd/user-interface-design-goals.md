# User Interface Design Goals

### **Overall UX Vision**
The user experience for the PJL Connect Back Office will be task-oriented and highly efficient, designed to minimize cognitive load and guide the Ops team through their daily workflows. The vision is for a clean, data-rich interface that prioritizes clarity and speed, presenting the right information and actions to the user at the right time.

### **Key Interaction Paradigms**
* **Ticket-Based Workflow:** The core of the interface will function like a ticketing system or Kanban board. Each booking will be a "ticket" that moves through clear states (e.g., "New", "Awaiting Carrier", "In Transit", "Completed").
* **Action-Oriented Design:** The UI will always prompt the user with a clear "next action" for each booking, driving the workflow forward.
* **Bot-to-Web Handoff:** Alerts in the Ops Telegram bot will contain deep links that take the user directly to the relevant booking/ticket in the Back Office.

### **Core Screens and Views**
* **Main Dashboard / Queue:** A central, filterable view of all shipments, organized by status.
* **Booking Detail View:** A comprehensive view of a single shipment, showing all extracted data, communication history, attached documents, and the live driver location.
* **Admin - Carrier Management:** A view for managers to add/edit carriers and their cost prices.
* **Admin - Service Management:** A view for managers to define services and their selling prices.
* **Admin - Manager Stats Page:** The minimalist dashboard displaying key KPIs.

### **Accessibility**
* **Standard:** The application should adhere to **WCAG 2.1 AA** standards.

### **Branding**
* To be defined, but the overall aesthetic should be professional, clean, and modern, with a strong focus on usability and data clarity.

### **Target Platforms**
* **Web Responsive:** The Back Office must be fully functional on modern desktop browsers and usable on tablet-sized devices.

---
##Technical Assumptions

### **Repository Structure: Monorepo**
* A single repository will contain all code for the PJL Connect platform. This approach simplifies development, dependency management, and deployment.

### **Service Architecture: Monolith**
* The application will be built as a single, monolithic system. This is the most straightforward and fastest approach for an MVP using the chosen Laravel stack.

### **Testing Requirements: Unit + Integration**
* The quality assurance strategy will require both unit tests to verify individual components and integration tests to ensure these components work together correctly.

### **Additional Technical Assumptions and Requests**
* The application **must** be built using the **PHP Laravel framework** and a **MySQL** database.
* The application **must** be deployable on the company's **existing shared hosting** environment.
* The frontend will be developed using **Vue.js**, chosen for its strong integration with the Laravel ecosystem.

---