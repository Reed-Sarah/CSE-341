
CREATE TABLE users (
  user_id SERIAL,
  is_admin boolean,
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  email VARCHAR(255),
  user_password VARCHAR(255),
  PRIMARY KEY (user_id)
);

CREATE TABLE addresses (
  address_id SERIAL PRIMARY KEY,
  user_id int NOT NULL REFERENCES users (user_id),
  addressLine1 VARCHAR(255),
  addressLine2 VARCHAR(255),
  country VARCHAR(255),
  state VARCHAR(255),
  city VARCHAR(255),
  zip_code VARCHAR(255)
 );


CREATE TABLE products (
  product_id SERIAL,
  name VARCHAR(255),
  description TEXT,
  price FLOAT,
  type VARCHAR(255),
  picture_path VARCHAR(255),
  PRIMARY KEY (product_id)
);

CREATE TABLE reviews (
  review_id SERIAL,
  user_id int NOT NULL,
  product_id int NOT NULL,
  review_text text,
  created_at date,
  PRIMARY KEY (review_id),
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (product_id) REFERENCES products (product_id)
);

CREATE TABLE shopping_carts (
  cart_id SERIAL,
  user_id int NOT NULL,
  product_id int NOT NULL,
  PRIMARY KEY (cart_id),
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (product_id) REFERENCES products (product_id)
);

INSERT INTO users (admin, first_name, last_name, email) VALUES (true, 'Sarah', 'Parsons', 'sarahreed101@hotmail.com');
INSERT INTO addresses (user_id, street, country, state, city, zip_code) VALUES (1, '130 W. Guadalupe Rd.', 'United States', 'Arizona', 'Gilbert', '85233');
INSERT INTO products (name, description, price, type, picture_path) VALUES ('T-Shirt Dress', 'Cute cotton knee length dress, perfect for church or errands. With timeless floral pattern', 18.98, 'dress', 'images/tee-shirt-dress.jpg'),
('Rust Colored Pants', 'These are perfect for fall! So comfy you will never go back to jeans.', 16.89, 'bottom', 'images/rust-pants.jpg'),
('Blue Plaid Pants', 'Change up your look with these stunnig plaid pants. Everyone will want to know where you got them', 14.56, 'bottom', 'images/blue-pants.jpg'),
('Dark Wash Jeans', 'These will be your new favorite jeans. Perfect fit and they will go with everything.', 16.98, 'bottom', 'images/dark-jeans.jpg'),
('White Floral Dress', 'This dress is so light and flowly, perfect for the summer!', 20.98, 'bottom', 'images/floral-dress.jpg'),
('Grey Shirt', 'This is a wardrobe staple, great as a base layer or by its self', 7.54, 'top', 'images/grey-shirt.jpg'),
('Light Wash Jeans"', 'you will wish all your jeans fit like these! And they are so CUTE!' , 14.98, 'bottom', 'images/jeans.jpg'),
('Long Blush Dress', 'This would make the perfect bridesmaid dress, but is also perfect for any occasion', 20.54, 'dress', 'images/pink-long-dress.jpg'),
('Blush Colored Pants', 'These are the perfect new addition to your wardrobe. They are young, hip, and will make all your friends jealous.', 14.98, 'bottom', 'images/pink-pants.jpg'),
('Poncho', 'Spice up your style with this super cute poncho. It is so comfy you will wonder were it has been all your life!', 13.77, 'top', 'images/poncho.jpg');
INSERT INTO reviews (user_id, product_id, review_text) VALUES (1, 6, 'This my favorite shirt! Its so comfy and cute. Everyone needs one.'),
(1, 1, 'This is the most comfy dress I have ever worn!'),
(1, 8, 'I just wore this to a friends wedding it was perfect! Very high quality materials.');
INSERT INTO shopping_carts (user_id, product_id) VALUES (1, 5), (1, 4), (1, 8);
