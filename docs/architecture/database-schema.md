# \#\# Database Schema

```sql
-- Central "address book" for all companies
CREATE TABLE companies (
    id BINARY(16) PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    address TEXT,
    contact_person VARCHAR(255),
    phone_number VARCHAR(50),
    email VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Logistics partners/carriers
CREATE TABLE carriers (
    id BINARY(16) PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Top-level customer request
CREATE TABLE bookings (
    id BINARY(16) PRIMARY KEY,
    booking_reference VARCHAR(255) NOT NULL UNIQUE,
    company_id BINARY(16) NOT NULL,
    status VARCHAR(50) NOT NULL,
    booking_date DATETIME NOT NULL,
    FOREIGN KEY (company_id) REFERENCES companies(id)
);

-- A single consignment handled by one carrier
CREATE TABLE shipments (
    id BINARY(16) PRIMARY KEY,
    booking_id BINARY(16) NOT NULL,
    carrier_id BINARY(16),
    shipper_company_id BINARY(16),
    consignee_company_id BINARY(16),
    transport_mode ENUM('Sea', 'Air', 'Land') NOT NULL,
    mbl_number VARCHAR(255),
    hbl_number VARCHAR(255),
    mawb_number VARCHAR(255),
    hawb_number VARCHAR(255),
    vessel_name VARCHAR(255),
    voyage_number VARCHAR(255),
    flight_number VARCHAR(255),
    FOREIGN KEY (booking_id) REFERENCES bookings(id),
    FOREIGN KEY (carrier_id) REFERENCES carriers(id),
    FOREIGN KEY (shipper_company_id) REFERENCES companies(id),
    FOREIGN KEY (consignee_company_id) REFERENCES companies(id)
);

-- Specific items/containers within a shipment
CREATE TABLE shipment_details (
    id BINARY(16) PRIMARY KEY,
    shipment_id BINARY(16) NOT NULL,
    description TEXT,
    container_number VARCHAR(255),
    quantity INT,
    net_weight_kg DECIMAL(10, 2),
    gross_weight_kg DECIMAL(10, 2),
    cbm DECIMAL(10, 3),
    FOREIGN KEY (shipment_id) REFERENCES shipments(id) ON DELETE CASCADE
);
```

-----
