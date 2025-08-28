# User Flows

### **New** **Booking** **Processing** & **Dispatch**

  * **User** **Goal**: For an **Ops** **Team** **Member** to efficiently process a new, automatically ingested booking and successfully dispatch it to a carrier.
  * **Entry** **Point**: A new booking appears on the Dashboard/Queue with the status "Pending Ops Review".
  * **Success** **Criteria**: The booking is accepted by a carrier, and its status is updated to "Awaiting Carrier Info".

#### Flow Diagram

```mermaid
graph TD
    A[Start: New Booking in Queue<br/>Status: Pending Ops Review] --> B{Is OCR data correct?};
    B -- No --> C[Ops Manually Corrects Data];
    B -- Yes --> D[Ops Selects a Carrier];
    C --> D;
    D --> E[Ops Clicks "Dispatch"];
    E --> F{Carrier Responds via Bot};
    F -- Accepts --> G[Success: Booking Accepted<br/>Status: Awaiting Carrier Info];
    F -- Declines --> H[Ops Alerted: Re-assign Carrier];
    F -- No Response --> I[System Sends 15-min Reminders];
    H --> D;
    I --> F;
```
