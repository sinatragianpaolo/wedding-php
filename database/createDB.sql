CREATE TABLE weds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(100) NOT NULL,
    guest1_name VARCHAR(100) NOT NULL,
    guest1_surname VARCHAR(100),
    guest2_name VARCHAR(100) NOT NULL,
    guest2_surname VARCHAR(100),
    wedding_date TIMESTAMP
);

ALTER TABLE weds ADD CONSTRAINT unique_id_slug UNIQUE (id, slug);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    weds_id INT NOT NULL
);

ALTER TABLE users ADD CONSTRAINT unique_email_password UNIQUE (email, password);
ALTER TABLE users ADD CONSTRAINT unique_wedding_access UNIQUE (email, weds_id);
ALTER TABLE users ADD CONSTRAINT fk_weds_id FOREIGN KEY (weds_id) REFERENCES weds(id);

CREATE TABLE pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    enabled BOOLEAN DEFAULT 0,
    weds_id INT NOT NULL,
    template_id INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE pages ADD CONSTRAINT unique_name_weds_id UNIQUE (name, weds_id);

CREATE TABLE page_templates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
);
ALTER TABLE page_templates ADD CONSTRAINT unique_name UNIQUE (name);
ALTER TABLE pages ADD CONSTRAINT fk_template_id FOREIGN KEY (template_id) REFERENCES page_templates(id);