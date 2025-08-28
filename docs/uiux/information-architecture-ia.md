# Information Architecture (IA)

This section outlines the structure of the **PJL** **Connect** **Back** **Office**, ensuring that users can find information and accomplish tasks logically and intuitively.

### **Site** **Map** / **Screen** **Inventory**

```mermaid
graph TD
    subgraph "Public"
        A[Login Page]
    end

    subgraph "Authenticated App"
        B[Main Application Layout]
        C[Dashboard / Bookings Queue]
        D[Admin Section]
        E[Booking Detail View]
        F[Carrier Management]
        G[Service Management]
        H[Manager Stats Page]
    end

    A -- Login --> B
    B --> C
    B --> D
    C -- Click Booking --> E
    D -- Manager Role --> F
    D -- Manager Role --> G
    D -- Manager Role --> H
```

### **Navigation** **Structure**

  * **Primary** **Navigation**: Simple and role-based. "Dashboard" for all users; "Admin" is added for Managers.
  * **Secondary** **Navigation**: Within the "Admin" section, links for "Carrier Management", "Service Management", and "Manager Stats".
  * **Breadcrumb** **Strategy**: Will be used on detailed pages for clear context and easy navigation (e.g., `Admin > Carrier Management > Edit Carrier`).
