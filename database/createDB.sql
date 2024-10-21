CREATE TABLE weds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(100) NOT NULL,
    bride_name VARCHAR(100) NOT NULL, /*sposa*/
    bride_surname VARCHAR(100),
    groom_name VARCHAR(100) NOT NULL,
    groom_surname VARCHAR(100),
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
ALTER TABLE users ADD CONSTRAINT fk_weds_id FOREIGN KEY (weds_id) REFERENCES weds(id);