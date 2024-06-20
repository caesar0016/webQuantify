create table reservationTbl(
	reservationID int primary key,
    merchID int,
    customerID int,
    reservationDate date,
    qty int,
    status varchar(45) DEFAULT 'To Pay',
    paymentStatus varchar(30) DEFAULT 'Pending',
    archiveFlag int DEFAULT 1
);

create table merchTbl(
    merchID int primary key auto_increment,
    itemName varchar(45),
    description varchar(45),
    size varchar(45),
    price decimal,
    stock int,
    categoryID int,
    imagePath varchar(255),
    archiveFlag SMALLINT default 1
);
create table categoryTbl(

    categoryID int primary key AUTO_INCREMENT,
    categoryName varchar(45),
    archive int default 1
);

--This is the alter table side
alter table merchtbl
AUTO_INCREMENT 20;