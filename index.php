<?php


    $mysqli = new mysqli("localhost", "root", "root", "company");
    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

function createTables ($mysqli)
{
    $mysqli->query("CREATE TABLE products(id INT NOT NULL UNIQUE AUTO_INCREMENT)");
    $mysqli->query("CREATE TABLE clients(id INT NOT NULL UNIQUE AUTO_INCREMENT)");
    $mysqli->query("CREATE TABLE orders(id INT NOT NULL UNIQUE AUTO_INCREMENT)");
    $mysqli->query("CREATE TABLE payments(id INT NOT NULL UNIQUE AUTO_INCREMENT)");
}

createTables ($mysqli);

function createColumns ($mysqli)
{
    //add columns to product table
    $mysqli->query("ALTER TABLE products ADD product_name varchar(255)");
    $mysqli->query("ALTER TABLE products ADD product_price varchar(255)");
    $mysqli->query("ALTER TABLE products ADD product_image_link varchar(255)");

//add columns to clients table
    $mysqli->query("ALTER TABLE clients ADD client_name varchar(255)");
    $mysqli->query("ALTER TABLE clients ADD client_lastname varchar(255)");
    $mysqli->query("ALTER TABLE clients ADD client_email varchar(255)");
    $mysqli->query("ALTER TABLE clients ADD client_address varchar(255)");

//add columns to order table
    $mysqli->query("ALTER TABLE orders ADD order_number varchar(255)");
    $mysqli->query("ALTER TABLE orders ADD order_date DATETIME");
    $mysqli->query("ALTER TABLE orders ADD client_id int");
    $mysqli->query("ALTER TABLE orders ADD FOREIGN KEY (client_id) REFERENCES clients(id)");
    $mysqli->query("ALTER TABLE orders ADD product_id int");
    $mysqli->query("ALTER TABLE orders ADD FOREIGN KEY (product_id) REFERENCES products(id)");
    $mysqli->query("ALTER TABLE orders ADD order_sum int");

    $mysqli->query("ALTER TABLE orders ALTER COLUMN (product_id) ");


//add columns to payment table
    $mysqli->query("ALTER TABLE payments ADD payment_number varchar(255)");
    $mysqli->query("ALTER TABLE payments ADD payment_date DATETIME");
    $mysqli->query("ALTER TABLE payments ADD order_id int");
    $mysqli->query("ALTER TABLE payments ADD FOREIGN KEY (order_id) REFERENCES orders(id)");
    $mysqli->query("ALTER TABLE payments ADD payment_sum int");
    $mysqli->query("ALTER TABLE payments ADD FOREIGN KEY (payment_sum) REFERENCES orders(order_sum)");
    $mysqli->query("ALTER TABLE payments ADD payment_status BOOL DEFAULT false");
}

createColumns ($mysqli);

function addProducts ($mysqli)
{
//$mysqli->query("INSERT INTO products(product_name, product_price, product_image_link )
//                      VALUES('tshirt', '200', '/tshirt.png')");
//$mysqli->query("INSERT INTO products(product_name, product_price, product_image_link )
//                      VALUES('pants', '300', '/pants.png')");
//$mysqli->query("INSERT INTO products(product_name, product_price, product_image_link )
//                      VALUES('skirt', '250', '/skirt.png')");
//$mysqli->query("INSERT INTO products(product_name, product_price, product_image_link )
//                      VALUES('jacket', '500', '/jacket.png')");

}
addProducts ($mysqli);

function addClients ($mysqli)
{
//$mysqli->query("INSERT INTO clients (client_name, client_lastname, client_email, client_address )
//                      VALUES('John', 'Black', 'john@gmail.com', 'Jensen Beach')");
//$mysqli->query("INSERT INTO clients (client_name, client_lastname, client_email, client_address )
//                      VALUES('Tom', 'Red', 'tom@gmail.com', 'Jensen Beach')");
//$mysqli->query("INSERT INTO clients (client_name, client_lastname, client_email, client_address )
//                      VALUES('Jacob', 'White', 'jacob@gmail.com', 'Jensen Beach')");
}

addClients ($mysqli);

$cart_data = [1, 3, 5];

function addOrders ($mysqli, $cart_data)
{
    $mysqli->query("CREATE TABLE order_details(product_price INT)");
    foreach ($cart_data as $id) {
        $mysqli->query("SELECT product_price INTO order_details FROM products WHERE (id == $id)");
    }
    $order_sum = $mysqli->query("SELECT COUNT(product_price) FROM order_details");
    $mysqli->query("INSERT INTO orders (order_number, order_date, client_id, product_id, order_sum )
                      VALUES('1111AA', GETDATE(), 3, $cart_data, $order_sum)");
    $mysqli->query("DROP TABLE order_details");
}

