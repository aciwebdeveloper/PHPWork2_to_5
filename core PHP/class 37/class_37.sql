CREATE  DATABASE abc01;  /* is used to create db*/

use abc01;/* is used to Select db*/

/* is used to create table*/
CREATE TABLE users(
 id int(255) AUTO_INCREMENT,
 user_name VARCHAR(255) NULL,
 email VARCHAR(255) NULL,
 password VARCHAR(255) NULL,
 PRIMARY KEY(id)
);
