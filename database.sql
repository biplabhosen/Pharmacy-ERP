-- Medicines Table
CREATE TABLE core_medicines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    generic_name VARCHAR(100),
    img VARCHAR(100),
    category_id INT,
    manufacturer_id INT,
    strength VARCHAR(50),
    unit VARCHAR(50),
    batch_number VARCHAR(50),
    expiry_date DATE,
    purchase_price DECIMAL(10,2),
    selling_price DECIMAL(10,2),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Medicines_img Table
CREATE TABLE core_medicines_imgs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medicines_id INT,
    img VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- Customers Table
CREATE TABLE core_customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100),
    address VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- orders Table
CREATE TABLE core_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sale_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    customer_id INT NULL,
    user_id INT,
    total_amount DECIMAL(10,2),
    discount DECIMAL(10,2) DEFAULT 0,
    net_amount DECIMAL(10,2),
    status_id INT,
    delivery_date DATE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- orders_details Table
CREATE TABLE core_order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    medicine_id INT NULL,
    qty INT,
    unit_price INT,
    discount DECIMAL(10,2) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- Users Table
CREATE TABLE core_users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    password VARCHAR(255),
    role ENUM('admin','pharmacist','cashier') DEFAULT 'pharmacist',
    status ENUM('active','inactive') DEFAULT 'active',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE core_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE core_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- category
CREATE TABLE core_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- manufacturer
CREATE TABLE core_manufacturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    contact_person VARCHAR(100),
    contact_phone VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- stock
CREATE TABLE core_stocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medicines_id INT,
    qty INT,
    transection_type_id INT,
    werehouse_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- transection
CREATE TABLE core_transections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    factor INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- werehouse
CREATE TABLE core_werehouses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    address VARCHAR(100), 
    phone VARCHAR(100), 
    email VARCHAR(100), 
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- supplier Table
CREATE TABLE core_supplier (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100),
    address VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- Purchases Table
CREATE TABLE core_purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    supplier_id INT ,
    total_amount DECIMAL(10,2) ,
    payment_status ENUM('paid','credit','partial') DEFAULT 'credit',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Purchase Items (medicines bought)
CREATE TABLE core_purchase_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    purchase_id INT ,
    medicine_id INT ,
    quantity INT ,
    unit_price DECIMAL(10,2) ,
    subtotal DECIMAL(10,2) ,
    expiry_date DATE,
    batch_number VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);









INSERT INTO `core_status` (`id`, `name`, `created_at`, `updated_at`) VALUES (NULL, 'Paid', current_timestamp(), current_timestamp()), (NULL, 'On hold', current_timestamp(), current_timestamp()), (NULL, 'Pending', current_timestamp(), current_timestamp()), (NULL, 'Overdue', current_timestamp(), current_timestamp()), (NULL, 'Canceled', current_timestamp(), current_timestamp());

INSERT INTO `core_users` (`id`, `name`, `email`, `phone`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES (NULL, 'Admin', 'admin@ffarma.com', '02598988', '12369', 'admin', 'active', current_timestamp(), current_timestamp()), (NULL, 'Manager', 'mang@ffarma.com', '045889665', '1258', 'admin', 'active', current_timestamp(), current_timestamp());

INSERT INTO `core_orders_details` (`id`, `order_id`, `medicine_id`, `qty`, `unit_price`, `discount`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', '5', '2.5', '0.00', current_timestamp(), current_timestamp()), (NULL, '1', '2', '10', '2', '0.00', current_timestamp(), current_timestamp()), (NULL, '2', '2', '6', '2', '0.00', current_timestamp(), current_timestamp());