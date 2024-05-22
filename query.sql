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
INSERT INTO Contacts (user_id, fullname, phone, email, photo) 
VALUES 
    (1, 'John', '1234567890', 'john@example.com', 'john_photo.jpg'),
    (1, 'Alice', '9876543210', 'alice@example.com', 'alice_photo.jpg'),
    (1, 'Bob', '5555555555', 'bob@example.com', 'bob_photo.jpg'),
    (1, 'Emma', NULL, 'emma@example.com', 'emma_photo.jpg'),
    (1, 'Mike', '9998887777', NULL, 'mike_photo.jpg'),
    (1, 'Sarah', '1112223333', 'sarah@example.com', NULL),
    (1, 'David', '4444444444', NULL, NULL),
    (1, 'Olivia', NULL, 'olivia@example.com', NULL),
    (1, 'James', '6666666666', 'james@example.com', 'james_photo.jpg'),
    (1, 'Sophia', NULL, NULL, 'sophia_photo.jpg'),
    (1, 'Michael', '7777777777', 'michael@example.com', NULL),
    (1, 'Emily', NULL, NULL, 'emily_photo.jpg'),
    (1, 'Matthew', '8888888888', 'matthew@example.com', NULL),
    (1, 'Ava', '9999999999', NULL, 'ava_photo.jpg'),
    (1, 'Daniel', NULL, NULL, NULL),
    (1, 'Ethan', '3333333333', 'ethan@example.com', 'ethan_photo.jpg'),
    (1, 'Benjamin', NULL, 'benjamin@example.com', NULL),
    (1, 'Mia', '2222222222', NULL, 'mia_photo.jpg'),
    (1, 'Charlotte', NULL, 'charlotte@example.com', NULL),
    (1, 'Amelia', '7777777777', NULL, NULL);
