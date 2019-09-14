CREATE TABLE tenant_reservation
(
    tenant_reservation_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL ,
    tbl_property_id INT NOT NULL ,
    date DATE NOT NULL ,
    owner_id INT NOT NULL ,
    approve INT NOT NULL DEFAULT '0'
);