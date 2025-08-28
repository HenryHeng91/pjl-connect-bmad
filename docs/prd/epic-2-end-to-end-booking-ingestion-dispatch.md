# Epic 2: End-to-End Booking Ingestion & Dispatch
**Goal:** Automate the complete workflow from a customer submitting a booking via Telegram to a carrier accepting the job, providing the core value of the platform.

### **Story 2.1: Customer Bot & Booking Ingestion**
* **As a** Customer, **I want** to submit my booking document to a dedicated Telegram bot, **so that** I can easily initiate a shipment request.
* **Acceptance Criteria:**
    1.  A Customer Telegram bot is created and connected to the Laravel backend.
    2.  The bot can receive file submissions (PDF, JPG, Excel).
    3.  When a file is received, the system creates a new shipment record with a "New" status, attaches the file, and logs the customer's Telegram user ID.

### **Story 2.2: OCR Processing & Data Extraction**
* **As an** Ops Team Member, **I want** the system to automatically read booking documents using OCR, **so that** I don't have to enter the data manually.
* **Acceptance Criteria:**
    1.  When a shipment record has a "New" status, an OCR process is triggered.
    2.  If the document matches a known template, key data is extracted and populated into the shipment record.
    3.  The shipment status is updated to "Pending Ops Review".
    4.  If the document format is unknown, the record remains largely blank but is still moved to "Pending Ops Review" status.

### **Story 2.3: Ops Manager Assignment Workflow**
* **As an** Ops Manager, **I want** to be notified of new bookings via Telegram and be able to assign them to my team with one click, **so that** work is distributed quickly.
* **Acceptance Criteria:**
    1.  On "Pending Ops Review" status, a Telegram message is sent to the designated Ops Manager.
    2.  The message suggests an assignee from the Ops team based on their current workload.
    3.  The message has an "Assign" button that, when clicked, assigns the shipment to the suggested user.
    4.  An alert is then sent to the assigned Ops member's Telegram account.

### **Story 2.4: Back-Office Booking Review & Dispatch**
* **As an** Ops Team Member, **I want** to review the details of an assigned booking, select a carrier, and dispatch the job from the Back Office, **so that** I can move the shipment to the next stage.
* **Acceptance Criteria:**
    1.  The Ops member can open the booking detail view directly from their Telegram link.
    2.  They can verify and, if necessary, edit the OCR-extracted data.
    3.  The UI provides an interface to select a registered carrier from a list.
    4.  A "Dispatch to Carrier" button is available, which updates the shipment status to "Dispatched".

### **Story 2.5: Carrier Bot Dispatch & Response**
* **As a** Carrier, **I want** to receive new job offers on my Telegram bot and be able to accept or decline them simply, **so that** I can manage my incoming work efficiently.
* **Acceptance Criteria:**
    1.  Clicking "Dispatch to Carrier" sends a notification to all associated staff for that carrier via the Carrier Telegram bot.
    2.  The message contains booking details and "Accept"/"Decline" buttons.
    3.  The system logs which specific staff member responded.
    4.  If **accepted**, the shipment status is updated to "Awaiting Carrier Info", and the carrier is prompted to provide truck details.
    5.  If **declined**, the shipment status is updated to "Carrier Declined", and the assigned Ops member is alerted.

---