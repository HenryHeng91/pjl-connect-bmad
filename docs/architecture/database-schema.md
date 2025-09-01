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
    contact_person VARCHAR(255) NULL,
    phone_number VARCHAR(50) NULL,
    email VARCHAR(255) NULL,
    cost_details TEXT NULL,
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
    status VARCHAR(50) NOT NULL DEFAULT 'Pending',
    transport_mode ENUM('Sea', 'Air', 'Land') NOT NULL,
    mbl_number VARCHAR(255),
    hbl_number VARCHAR(255),
    mawb_number VARCHAR(255),
    hawb_number VARCHAR(255),
    vessel_name VARCHAR(255),
    voyage_number VARCHAR(255),
    flight_number VARCHAR(255),
    truck_plate_number VARCHAR(255),
    truck_size VARCHAR(100),
    driver_telegram_username VARCHAR(255),
    delivered_at TIMESTAMP NULL,
    FOREIGN KEY (booking_id) REFERENCES bookings(id),
    FOREIGN KEY (carrier_id) REFERENCES carriers(id),
    FOREIGN KEY (shipper_company_id) REFERENCES companies(id),
    FOREIGN KEY (consignee_company_id) REFERENCES companies(id)
);

-- Services offered by PJL
CREATE TABLE services (
    id BINARY(16) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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

-- Maps a carrier to the cost of a specific service
CREATE TABLE carrier_service_costs (
    id BINARY(16) PRIMARY KEY,
    carrier_id BINARY(16) NOT NULL,
    service_id BINARY(16) NOT NULL,
    cost DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (carrier_id) REFERENCES carriers(id) ON DELETE CASCADE,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE
);

-- Represents a customer invoice for a shipment
CREATE TABLE invoices (
    id BINARY(16) PRIMARY KEY,
    shipment_id BINARY(16) NOT NULL,
    invoice_number VARCHAR(255) NOT NULL UNIQUE,
    status VARCHAR(50) NOT NULL DEFAULT 'Draft',
    total_price DECIMAL(10, 2) NOT NULL,
    total_cost DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (shipment_id) REFERENCES shipments(id) ON DELETE CASCADE
);

-- Individual line items on an invoice
CREATE TABLE invoice_items (
    id BINARY(16) PRIMARY KEY,
    invoice_id BINARY(16) NOT NULL,
    service_id BINARY(16) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    cost DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (invoice_id) REFERENCES invoices(id) ON DELETE CASCADE,
    FOREIGN KEY (service_id) REFERENCES services(id)
);
```

-----
