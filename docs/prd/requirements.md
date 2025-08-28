# Requirements

### **Functional Requirements**
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

### **Non-Functional Requirements**
1.  **NFR1: Technology Stack:** The system must be built using the PHP Laravel framework and a MySQL database.
2.  **NFR2: Infrastructure:** The system must be deployable on the company's existing shared hosting environment.
3.  **NFR3: User Interface:** The Back Office user interface shall be simple, intuitive, and designed to function like a ticket system to guide the user's workflow.
4.  **NFR4: Performance:** Typical API responses and bot interactions must complete in under 2 seconds.
5.  **NFR5: Security:** The system must provide role-based access control, ensuring only users with the "Manager" role can access cost and pricing information.

---