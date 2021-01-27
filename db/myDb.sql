
CREATE TABLE users (
  user_id int primary key,
  admin boolean,
  first_name varchar,
  last_name varchar,
  email varchar,
  hashed_password varchar
);

CREATE TABLE address (
  address_id int primary key,
  user_id int references users(user_id),
  street varchar,
  country varchar,
  state varchar,
  city varchar,
  zip_code varchar
 );


CREATE TABLE products (
  product_id int primary key,
  name varchar,
  description text,
  price float,
  type varchar,
  picture_path varchar
);

CREATE TABLE reviews (
  review_id int primary key,
  user_id int references users(user_id),
  product_id int references products(product_id),
  review_text text,
  created_at date
);

CREATE TABLE shopping_cart (
  cart_id int primary key,
  user_id int references users(user_id),
  product_id int references products(product_id)
);
