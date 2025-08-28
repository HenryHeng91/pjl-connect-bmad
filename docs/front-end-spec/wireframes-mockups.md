# Wireframes & Mockups

### **Primary** **Design** **Files**

High-fidelity visual designs and prototypes will be developed in a collaborative tool like **Figma**. The final design file will be linked here as the single source of truth for the UI's visual appearance.

### **Key** **Screen** **Layouts**

A low-fidelity wireframe for the **Booking** **Detail** **View**:

```
+--------------------------------------------------------------------------+
| ## Booking ID: PJL-1024  |  Status: [In Transit]  | P&L: [$150.00]    | Header
+--------------------------------------------------------------------------+
| Left Column (70%)                  | Right Column (30%)                 | Main
|------------------------------------|------------------------------------|
| ### Shipment Details              | ### Carrier & Driver Info         |
| - Pickup: [Address]                | - Carrier: [Carrier Name]          |
| - Destination: [Address]           | - Truck: [Plate #], [Size]         |
| - Customer: [Name], [Contact]      | - Driver: [Name], [Telegram]       |
|                                    |                                    |
| ### Attached Documents            | ### Live Map View                 |
| - [Booking_Order.pdf] (view)       | [Embedded map showing live         |
| - [Carrier_DO.pdf] (view)          |  driver location]                  |
|                                    |                                    |
| ### Communication Log             | ### Action Panel                  |
| - [Timestamp] Msg to Carrier       | [  Update Customer Button  ]        |
| - [Timestamp] Carrier Accepted     | [ Generate Customs Doc Button ]    |
| - [Timestamp] Msg to Customer      |                                    |
+--------------------------------------------------------------------------+
```

  * **Interaction** **Notes**: The **Action** **Panel** is dynamic and only shows buttons relevant to the booking's current status.
