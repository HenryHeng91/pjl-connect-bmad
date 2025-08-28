# \#\# Components

### **Backend Components (Laravel Services)**

  * **Authentication Service**: Handles the Telegram login workflow and manages user roles.
  * **Booking Ingestion Service**: Manages receiving bookings, interfacing with the OCR service, and creating records.
  * **Shipment Workflow Service**: Contains the core business logic for status transitions and carrier assignment.
  * **Telegram Notification Service**: A centralized service for dispatching all outgoing bot messages.
  * **Analytics Service**: Handles data aggregation and CSV exports.
  * **Document Generation Service**: Generates customs documents from PDF/Excel templates.

### **Frontend Components (Vue.js Views/Pages)**

  * **Dashboard/Queue View**: The primary "ticket-style" interface for the Ops team.
  * **Shipment Detail View**: The detailed page for a single shipment.
  * **Admin Pages (CRUD)**: Pages for managers to manage Companies, Carriers, and Services.
  * **Stats Dashboard View**: The simple page for displaying key KPIs for managers.

-----
