# **PJL Connect Product Requirements Document (PRD)**

### ## Goals and Background Context

#### **Goals**
* To increase the operational capacity of the Ops team, enabling them to manage a significantly higher volume of shipments without a proportional increase in headcount.
* To reduce the average booking processing time (from customer submission to carrier acceptance) by at least 75%.
* To improve data accuracy and reduce costly errors by automating data entry and communication workflows.

#### **Background Context**
The current workflow at PJL Logistics is a manual process that acts as a bottleneck to business growth and is susceptible to costly errors. PJL Connect is being built to solve this by creating a centralized, "Telegram-first" automation platform. It will streamline the entire shipment lifecycle—from OCR-based booking ingestion to live driver tracking—dramatically increasing efficiency, reducing friction for clients and partners, and providing a single source of truth for all operations.

#### **Change Log**
| Date | Version | Description | Author |
| :--- | :--- | :--- | :--- |
| August 26, 2025 | 1.0 | Initial PRD Draft | Siekhay (PM) |

---
### ## Requirements

#### **Functional Requirements**
1.  **FR1: Telegram-based Authentication:** The system shall allow users to authenticate and log into the Back Office using their Telegram account.
2.  **FR2: Booking Ingestion:** The system shall receive booking documents (PDF, JPG, Excel) submitted by clients via a dedicated Customer Telegram bot.
3.  **FR3: OCR Processing:** The system shall use OCR to automatically extract data from known booking document formats. If a format is unknown, a blank shipment record shall be created with the document attached for manual entry.
4.  **FR4: Automated Ops Assignment:** The system shall alert an Ops Manager via Telegram of new bookings, suggest an Ops team member for assignment based on workload, and allow the manager to approve the assignment via a button in Telegram.
5.  **FR5: Carrier Onboarding:** The system shall generate unique "magic links" to associate multiple carrier staff Telegram accounts with a single carrier entity in the Back Office.
6.  **FR6: Carrier Dispatch & Tracking:** The system shall dispatch bookings to all associated staff of an assigned carrier via the Carrier Telegram bot and must log which specific staff member accepts or rejects the booking.
7.  **FR7: Dynamic Driver Assignment:** The system shall generate a dynamic, single-use link for a carrier to forward to a driver, linking them to a specific shipment.
8.  **FR8: Live Location Tracking:** The system shall request and receive live location data from the assigned driver's Telegram account.
9.  **FR9: Automated Customer Updates:** The system shall send automated shipment status updates, including carrier and tracking information, to the customer via the Customer Telegram bot.
10. **FR10: Carrier & Cost Management:** A manager-only section in the Back Office shall allow for managing carriers and their associated cost prices for services.
11. **FR11: Service & Price Management:** The Back Office shall allow for creating PJL's services and defining their selling prices.
12. **FR12: Profit & Loss Calculation:** The system shall calculate the profit and loss for each completed shipment based on the assigned service (selling price) and carrier (cost price).
13. **FR13: Manager Dashboard:** A manager-only dashboard shall display key KPIs such as total bookings, average processing time, and P&L.
14. **FR14: CSV Data Export:** A manager-only feature shall allow for the export of shipment data to a CSV file.

#### **Non-Functional Requirements**
1.  **NFR1: Technology Stack:** The system must be built using the PHP Laravel framework and a MySQL database.
2.  **NFR2: Infrastructure:** The system must be deployable on the company's existing shared hosting environment.
3.  **NFR3: User Interface:** The Back Office user interface shall be simple, intuitive, and designed to function like a ticket system to guide the user's workflow.
4.  **NFR4: Performance:** Typical API responses and bot interactions must complete in under 2 seconds.
5.  **NFR5: Security:** The system must provide role-based access control, ensuring only users with the "Manager" role can access cost and pricing information.

---
### ## User Interface Design Goals

#### **Overall UX Vision**
The user experience for the PJL Connect Back Office will be task-oriented and highly efficient, designed to minimize cognitive load and guide the Ops team through their daily workflows. The vision is for a clean, data-rich interface that prioritizes clarity and speed, presenting the right information and actions to the user at the right time.

#### **Key Interaction Paradigms**
* **Ticket-Based Workflow:** The core of the interface will function like a ticketing system or Kanban board. Each booking will be a "ticket" that moves through clear states (e.g., "New", "Awaiting Carrier", "In Transit", "Completed").
* **Action-Oriented Design:** The UI will always prompt the user with a clear "next action" for each booking, driving the workflow forward.
* **Bot-to-Web Handoff:** Alerts in the Ops Telegram bot will contain deep links that take the user directly to the relevant booking/ticket in the Back Office.

#### **Core Screens and Views**
* **Main Dashboard / Queue:** A central, filterable view of all shipments, organized by status.
* **Booking Detail View:** A comprehensive view of a single shipment, showing all extracted data, communication history, attached documents, and the live driver location.
* **Admin - Carrier Management:** A view for managers to add/edit carriers and their cost prices.
* **Admin - Service Management:** A view for managers to define services and their selling prices.
* **Admin - Manager Stats Page:** The minimalist dashboard displaying key KPIs.

#### **Accessibility**
* **Standard:** The application should adhere to **WCAG 2.1 AA** standards.

#### **Branding**
* To be defined, but the overall aesthetic should be professional, clean, and modern, with a strong focus on usability and data clarity.

#### **Target Platforms**
* **Web Responsive:** The Back Office must be fully functional on modern desktop browsers and usable on tablet-sized devices.

---
### ## Technical Assumptions

#### **Repository Structure: Monorepo**
* A single repository will contain all code for the PJL Connect platform. This approach simplifies development, dependency management, and deployment.

#### **Service Architecture: Monolith**
* The application will be built as a single, monolithic system. This is the most straightforward and fastest approach for an MVP using the chosen Laravel stack.

#### **Testing Requirements: Unit + Integration**
* The quality assurance strategy will require both unit tests to verify individual components and integration tests to ensure these components work together correctly.

#### **Additional Technical Assumptions and Requests**
* The application **must** be built using the **PHP Laravel framework** and a **MySQL** database.
* The application **must** be deployable on the company's **existing shared hosting** environment.
* The frontend will be developed using **Vue.js**, chosen for its strong integration with the Laravel ecosystem.

---
### ## Epic List

* **Epic 1: Foundation & Core Administration**
    * **Goal:** Establish the core application foundation, including Telegram authentication and the back-office modules for managing carriers and services, enabling initial data setup.
* **Epic 2: End-to-End Booking Ingestion & Dispatch**
    * **Goal:** Automate the complete workflow from a customer submitting a booking via Telegram to a carrier accepting the job, providing the core value of the platform.
* **Epic 3: Live Tracking & Customer Communication**
    * **Goal:** Implement real-time driver tracking and automated customer communication to provide end-to-end visibility for every shipment.
* **Epic 4: Manager Insights & Reporting**
    * **Goal:** Provide managers with key performance insights and data export capabilities to measure operational efficiency and profitability.

---
### ## Epic 1: Foundation & Core Administration
**Goal:** Establish the core application foundation, including Telegram authentication and the back-office modules for managing carriers and services, enabling initial data setup.

#### **Story 1.1: Project Scaffolding & Database Setup**
* **As a** Developer, **I want** a new Laravel project initialized with a MySQL database connection, **so that** I have a clean and stable foundation to build the application on.
* **Acceptance Criteria:**
    1.  A new Laravel project is created.
    2.  The `.env` file is configured for a local MySQL database connection.
    3.  The database migration system is functional, confirmed by running an initial migration.

#### **Story 1.2: Telegram-based Authentication**
* **As an** Ops Team Member, **I want** to log into the Back Office system using my Telegram account, **so that** I can access the platform securely without managing a separate password.
* **Acceptance Criteria:**
    1.  A "Login with Telegram" button is present on the application's login page.
    2.  Clicking the button initiates the standard Telegram OAuth authentication flow.
    3.  Upon successful authentication, a user session is created, and the user is redirected to the main dashboard.
    4.  An unsuccessful or denied authentication attempt displays a clear error message to the user.

#### **Story 1.3: Carrier Management (CRUD)**
* **As a** Manager, **I want** to create, read, update, and delete carriers in the Back Office, **so that** I can maintain an up-to-date list of our logistics partners and their cost data.
* **Acceptance Criteria:**
    1.  A "Carriers" section is accessible in the Back Office UI only to users with the "Manager" role.
    2.  The manager can view a list of all existing carriers.
    3.  The manager can add a new carrier with relevant details (e.g., company name, contact info, cost prices for services).
    4.  The manager can edit and delete existing carriers.

#### **Story 1.4: Service Management (CRUD)**
* **As a** Manager, **I want** to create, read, update, and delete the services PJL offers, including their selling prices, **so that** we have a centralized and accurate price book for use in quotations and P&L calculations.
* **Acceptance Criteria:**
    1.  A "Services" section is accessible in the Back Office UI only to users with the "Manager" role.
    2.  The manager can view a list of all existing services with their selling prices.
    3.  The manager can add a new service with a name, description, and price.
    4.  The manager can edit and delete existing services.

---
### ## Epic 2: End-to-End Booking Ingestion & Dispatch
**Goal:** Automate the complete workflow from a customer submitting a booking via Telegram to a carrier accepting the job, providing the core value of the platform.

#### **Story 2.1: Customer Bot & Booking Ingestion**
* **As a** Customer, **I want** to submit my booking document to a dedicated Telegram bot, **so that** I can easily initiate a shipment request.
* **Acceptance Criteria:**
    1.  A Customer Telegram bot is created and connected to the Laravel backend.
    2.  The bot can receive file submissions (PDF, JPG, Excel).
    3.  When a file is received, the system creates a new shipment record with a "New" status, attaches the file, and logs the customer's Telegram user ID.

#### **Story 2.2: OCR Processing & Data Extraction**
* **As an** Ops Team Member, **I want** the system to automatically read booking documents using OCR, **so that** I don't have to enter the data manually.
* **Acceptance Criteria:**
    1.  When a shipment record has a "New" status, an OCR process is triggered.
    2.  If the document matches a known template, key data is extracted and populated into the shipment record.
    3.  The shipment status is updated to "Pending Ops Review".
    4.  If the document format is unknown, the record remains largely blank but is still moved to "Pending Ops Review" status.

#### **Story 2.3: Ops Manager Assignment Workflow**
* **As an** Ops Manager, **I want** to be notified of new bookings via Telegram and be able to assign them to my team with one click, **so that** work is distributed quickly.
* **Acceptance Criteria:**
    1.  On "Pending Ops Review" status, a Telegram message is sent to the designated Ops Manager.
    2.  The message suggests an assignee from the Ops team based on their current workload.
    3.  The message has an "Assign" button that, when clicked, assigns the shipment to the suggested user.
    4.  An alert is then sent to the assigned Ops member's Telegram account.

#### **Story 2.4: Back-Office Booking Review & Dispatch**
* **As an** Ops Team Member, **I want** to review the details of an assigned booking, select a carrier, and dispatch the job from the Back Office, **so that** I can move the shipment to the next stage.
* **Acceptance Criteria:**
    1.  The Ops member can open the booking detail view directly from their Telegram link.
    2.  They can verify and, if necessary, edit the OCR-extracted data.
    3.  The UI provides an interface to select a registered carrier from a list.
    4.  A "Dispatch to Carrier" button is available, which updates the shipment status to "Dispatched".

#### **Story 2.5: Carrier Bot Dispatch & Response**
* **As a** Carrier, **I want** to receive new job offers on my Telegram bot and be able to accept or decline them simply, **so that** I can manage my incoming work efficiently.
* **Acceptance Criteria:**
    1.  Clicking "Dispatch to Carrier" sends a notification to all associated staff for that carrier via the Carrier Telegram bot.
    2.  The message contains booking details and "Accept"/"Decline" buttons.
    3.  The system logs which specific staff member responded.
    4.  If **accepted**, the shipment status is updated to "Awaiting Carrier Info", and the carrier is prompted to provide truck details.
    5.  If **declined**, the shipment status is updated to "Carrier Declined", and the assigned Ops member is alerted.

---
### ## Epic 3: Live Tracking & Customer Communication
**Goal:** Implement real-time driver tracking and automated customer communication to provide end-to-end visibility for every shipment.

#### **Story 3.1: Carrier Submits Arrangement Details**
* **As a** Carrier, **I want** to provide the specific truck and driver details via my Telegram bot after accepting a job, **so that** the Ops team has the final arrangement information.
* **Acceptance Criteria:**
    1.  After a carrier accepts a booking, the bot prompts them for the truck plate number, truck size, and the driver's Telegram username.
    2.  The system validates the input provided by the carrier.
    3.  The shipment record in the Back Office is updated with this information, and its status changes to "Ready for Pickup".

#### **Story 3.2: Dynamic Driver Assignment Link Generation**
* **As a** Carrier, **I want** the system to provide a unique "magic link" for each job, **so that** I can securely forward it to my assigned driver to begin the tracking process.
* **Acceptance Criteria:**
    1.  When the driver's Telegram username is submitted, the system generates a unique, single-use link.
    2.  The Carrier Bot sends this link back to the carrier staff member who is managing the booking.
    3.  The message includes an instruction for the carrier to forward this link to the assigned driver.

#### **Story 3.3: Driver Accepts Job & Initiates Tracking**
* **As a** Driver, **I want** to use the forwarded link to view job details and start sharing my location, **so that** I can easily begin a tracked delivery.
* **Acceptance Criteria:**
    1.  When the driver clicks the unique link, they are shown key job details within their Telegram app.
    2.  A "Start Tracking" button is present.
    3.  Clicking the button prompts the driver to share their live location for an extended period.
    4.  Once location sharing begins, the shipment status in the Back Office updates to "In Transit".

#### **Story 3.4: Back-Office Live Map View**
* **As an** Ops Team Member, **I want** to see the driver's real-time location on a map within the booking detail view, **so that** I can monitor the shipment's progress visually.
* **Acceptance Criteria:**
    1.  The booking detail page in the Back Office displays an embedded map.
    2.  If a driver is actively sharing their location, their live position is displayed and updated on the map.
    3.  If tracking is not active, the map shows a "Tracking not started" status.

#### **Story 3.5: Automated Customer Tracking Update**
* **As a** Customer, **I want** to receive a final confirmation and a tracking link via Telegram once my shipment is on its way, **so that** I have full visibility of my delivery.
* **Acceptance Criteria:**
    1.  When the shipment status changes to "In Transit", a message is automatically sent to the Customer Telegram bot.
    2.  The message includes final carrier and truck details.
    3.  The message contains a web link that opens a simple page displaying the driver's live location on a map.

---
### ## Epic 4: Manager Insights & Reporting
**Goal:** Provide managers with key performance insights and data export capabilities to measure operational efficiency and profitability.

#### **Story 4.1: Data Aggregation for Reporting**
* **As a** Manager, **I want** the system to collect and process key data points from each shipment, **so that** the data is ready for analysis on the dashboard and in exports.
* **Acceptance Criteria:**
    1.  A backend process is created to aggregate key metrics from completed shipments.
    2.  This aggregated data is stored in a way that is optimized for quick retrieval.
    3.  The aggregation process runs automatically as shipments are completed.

#### **Story 4.2: Minimalist Manager Dashboard**
* **As a** Manager, **I want** to see a simple dashboard with high-level KPIs, **so that** I can get a quick overview of business performance.
* **Acceptance Criteria:**
    1.  A new "Dashboard" page is created in the Back Office, accessible only to users with the "Manager" role.
    2.  The page displays at least three key metrics: Total Bookings, Average Booking Processing Time, and Total Profit & Loss.
    3.  The manager can filter these metrics by a simple time period (e.g., "This Week", "This Month").

#### **Story 4.3: CSV Export Functionality**
* **As a** Manager, **I want** to export all shipment data to a CSV file, **so that** I can perform custom analysis and reporting in external tools.
* **Acceptance Criteria:**
    1.  An "Export to CSV" button is available in the Back Office.
    2.  The manager can select a date range for the export.
    3.  The system generates and downloads a CSV file containing all relevant data for shipments within the selected range.

