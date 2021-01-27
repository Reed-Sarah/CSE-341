
CREATE TABLE users (
  user_id SERIAL,
  admin boolean,
  first_name VARCHAR(255),
  last_name VARCHAR(255),
  email VARCHAR(255),
  hashed_password VARCHAR(255),
  PRIMARY KEY (user_id)
);

CREATE TABLE addresses (
  address_id SERIAL,
  user_id int NOT NULL,
  street VARCHAR(255),
  country VARCHAR(255),
  state VARCHAR(255),
  city VARCHAR(255),
  zip_code VARCHAR(255),
  PRIMARY KEY (address_id),
  FOREIGN KEY (user_id) REFERENCES users (user_id)
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
