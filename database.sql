

-- 3. Contact form table
CREATE TABLE IF NOT EXISTS table_contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_contact (email, message)
);

-- 4. Users table (Google/GitHub login)
CREATE TABLE IF NOT EXISTS googleusers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) DEFAULT NULL,
    usernameGit VARCHAR(100) DEFAULT NULL,
    avatar VARCHAR(255),
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 5. Solar calculator result table
CREATE TABLE IF NOT EXISTS user_result (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    solar_capacity INT NOT NULL,
    month_bill INT NOT NULL,
    unit_cost INT NOT NULL,
    bill_solar INT NOT NULL,
    saving_month INT NOT NULL,
    saving_year INT NOT NULL,
    system_cost INT NOT NULL,
    area INT NOT NULL,
    payback_period INT NOT NULL,
    tree_added INT NOT NULL,
    annual_generation INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
