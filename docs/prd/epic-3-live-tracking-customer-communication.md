# Epic 3: Live Tracking & Customer Communication
**Goal:** Implement real-time driver tracking and automated customer communication to provide end-to-end visibility for every shipment.

### **Story 3.1: Carrier Submits Arrangement Details**
* **As a** Carrier, **I want** to provide the specific truck and driver details via my Telegram bot after accepting a job, **so that** the Ops team has the final arrangement information.
* **Acceptance Criteria:**
    1.  After a carrier accepts a booking, the bot prompts them for the truck plate number, truck size, and the driver's Telegram username.
    2.  The system validates the input provided by the carrier.
    3.  The shipment record in the Back Office is updated with this information, and its status changes to "Ready for Pickup".

### **Story 3.2: Dynamic Driver Assignment Link Generation**
* **As a** Carrier, **I want** the system to provide a unique "magic link" for each job, **so that** I can securely forward it to my assigned driver to begin the tracking process.
* **Acceptance Criteria:**
    1.  When the driver's Telegram username is submitted, the system generates a unique, single-use link.
    2.  The Carrier Bot sends this link back to the carrier staff member who is managing the booking.
    3.  The message includes an instruction for the carrier to forward this link to the assigned driver.

### **Story 3.3: Driver Accepts Job & Initiates Tracking**
* **As a** Driver, **I want** to use the forwarded link to view job details and start sharing my location, **so that** I can easily begin a tracked delivery.
* **Acceptance Criteria:**
    1.  When the driver clicks the unique link, they are shown key job details within their Telegram app.
    2.  A "Start Tracking" button is present.
    3.  Clicking the button prompts the driver to share their live location for an extended period.
    4.  Once location sharing begins, the shipment status in the Back Office updates to "In Transit".

### **Story 3.4: Back-Office Live Map View**
* **As an** Ops Team Member, **I want** to see the driver's real-time location on a map within the booking detail view, **so that** I can monitor the shipment's progress visually.
* **Acceptance Criteria:**
    1.  The booking detail page in the Back Office displays an embedded map.
    2.  If a driver is actively sharing their location, their live position is displayed and updated on the map.
    3.  If tracking is not active, the map shows a "Tracking not started" status.

### **Story 3.5: Automated Customer Tracking Update**
* **As a** Customer, **I want** to receive a final confirmation and a tracking link via Telegram once my shipment is on its way, **so that** I have full visibility of my delivery.
* **Acceptance Criteria:**
    1.  When the shipment status changes to "In Transit", a message is automatically sent to the Customer Telegram bot.
    2.  The message includes final carrier and truck details.
    3.  The message contains a web link that opens a simple page displaying the driver's live location on a map.

---