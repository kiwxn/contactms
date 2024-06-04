CREATE TABLE Users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);
CREATE TABLE Contacts (
    contact_id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100),
    photo VARCHAR(255)
);
CREATE TABLE Favorites (
    user_id INT NOT NULL,
    contact_id INT NOT NULL,
    PRIMARY KEY (user_id, contact_id)
);