#test data for lost and found database
# Authors: Torin Reilly, Michael McGinnis

drop database if exists site_db;
create database site_db;
use site_db;

drop table if exists lost;
drop table if exists found;

create table if not exists lost
(
dateReported timestamp default current_timestamp,
dateLost date,  
id int auto_increment not null,
itemType text not null,
color text not null,
brand text,
buildingLost text,
roomLost text,
description text,
primary key(id)
);

create table if not exists found
(
dateReported timestamp default current_timestamp,
dateFound date, 
id int auto_increment not null,
itemType text not null,
color text not null,
brand text,
buildingFound text,
roomFound text,
description text,
primary key(id)
);

INSERT INTO lost(dateLost, itemtype, color, brand, buildingLost, roomLost, description)
  values('2014-11-14', 'watch', 'silver', 'rolex', 'Hancock', '2023', 'CAT WATCH'),
         ('2014-11-16', 'coat', 'red', 'll bean', 'Foy', 'c3', 'fly'),
         ('1964-02-29', 'dad', 'mostly white with a little black on his dads side', 'german', 'dinning hall', null, 'i miss him'),
         ('2014-11-17', 'laptop', 'black', 'Gateway', 'Donnelly', '101', 'cooter');
   
                      
INSERT INTO found(dateFound, itemtype, color, brand, buildingFound, roomFound, description)
  values('2014-11-15', 'watch', 'silver', 'rolex', 'Hancock', '2023', 'CAT WATCH'),
         ('2014-11-14', 'phone', 'black', 'Motorola', 'Student Center', '3023', 'cracked'),
         ('2014-11-17', 'laptop', 'black', 'Gateway', 'Donnelly', '101', 'cooter');
                      
select * from lost;
select * from found;
