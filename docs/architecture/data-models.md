# \#\# Data Models

### **New Model: Company**

  * **Purpose**: To act as a central "address book" for any company involved in a transaction (customer, shipper, consignee).

### **New Top-Level Model: Booking**

  * **Purpose**: Represents the initial, complete request from a customer. This is the parent record for all related activities.

### **Updated Model: Shipment**

  * **Purpose**: Represents a single, discrete consignment handled by one carrier to fulfill all or part of a customer Booking.

### **Updated Model: ShipmentDetail**

  * **Purpose**: Stores the specific details of a single container or package within a single Shipment.

-----
