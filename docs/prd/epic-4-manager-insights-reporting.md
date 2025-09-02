# Epic 4: Manager Insights & Reporting
**Goal:** Provide managers with key performance insights and data export capabilities to measure operational efficiency and profitability.

### **Story 4.1: Data Aggregation for Reporting**
* **As a** Manager, **I want** the system to collect and process key data points from each shipment, **so that** the data is ready for analysis on the dashboard and in exports.
* **Acceptance Criteria:**
    1.  A backend process is created to aggregate key metrics from completed shipments.
    2.  This aggregated data is stored in a way that is optimized for quick retrieval.
    3.  The aggregation process runs automatically as shipments are completed.

### **Story 4.2: Minimalist Manager Dashboard**
* **As a** Manager, **I want** to see a simple dashboard with high-level KPIs, **so that** I can get a quick overview of business performance.
* **Acceptance Criteria:**
    1.  A new "Dashboard" page is created in the Back Office, accessible only to users with the "Manager" role.
    2.  The page displays at least three key metrics: Total Bookings, Average Booking Processing Time, and Total Profit & Loss.
    3.  The manager can filter these metrics by a simple time period (e.g., "This Week", "This Month").

### **Story 4.3: CSV Export Functionality**
* **As a** Manager, **I want** to export all shipment data to a CSV file, **so that** I can perform custom analysis and reporting in external tools.
* **Acceptance Criteria:**
    1.  An "Export to CSV" button is available in the Back Office.
    2.  The manager can select a date range for the export.
    3.  The system generates and downloads a CSV file containing all relevant data for shipments within the selected range.

### **Story 4.4: Back-Office User Guide**
* **As a** new Ops Team Member, **I want** a simple user guide for the Back Office, **so that** I can learn how to use the system's core features.
* **Acceptance Criteria:**
    1.  A `user-guide.md` file is created in the `docs/` directory.
    2.  The guide explains how to log into the system.
    3.  The guide explains the main dashboard queue and how to open a booking for review.
    4.  The guide explains the process of reviewing a booking, assigning a carrier, and dispatching the job.

