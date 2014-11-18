#Setup the database for our limbo lost and found project
#Assignment 2
#Torin Reilly & Michael McGinnis
#1.0

drop database if exists limbo_db;
create database limbo_db;
use limbo_db;

#creates the table to store the users
create table if not exists users
(
user_id int unsigned not null auto_increment,
first_name varchar(20) not null,
last_name varchar(40) not null,
email varchar(60) not null,
pass char(40) not null,
reg_date datetime not null,
primary key (user_id),
unique(email)
);

#inserts the admin
#used my email addresses as a temp so that admin can log on
Insert Into users(first_name, email, pass)
                  values('admin', 'michael.mcginnis1@marist.edu', 'gaze11e');
 
#creates the table to store the stuff people lose or find                  
create table if not exists stuff
(
stuff_id int auto_increment,
location_id int not null,
description text not null,
create_date datetime not null,
update_date datetime not null,
room text,
owner text,
finder text,
status set("found", "lost", "claimed"), #not sure if this is the correct setup with SET
primary key (stuff_id),
foreign key (location_id)
references locations(location_id)
);

#creates the table to store all the locations on campus people can lose or find things
create table if not exists locations
(
location_id int auto_increment,
create_date datetime not null,
update_date datetime not null,
name text not null,
primary key (location_id)
);

#Inserted all the locations on campus
Insert Into locations(create_date, update_date, name)

             values(now(), now(), 'Byrne House'),
                    (now(), now(), 'Chapel'),
                    (now(), now(), 'Champagnat Hall'),
                    (now(), now(), 'Cornell Boathouse'),
                    (now(), now(), 'Donnelly Hall'),
                    (now(), now(), 'Dyson Center'),
                    (now(), now(), 'Fern Tor'),
                    (now(), now(), 'Fontaine Annex'),
                    (now(), now(), 'Fontaine Hall'),
                    (now(), now(), 'Foy Townhouses'),
                    (now(), now(), 'Fulton Street Townhouses'),
                    (now(), now(), 'New Fulton Townhouses'),
                    (now(), now(), 'Gartland Commons'),
                    (now(), now(), 'Greystone Hall'),
                    (now(), now(), 'Hancock Center'),
                    (now(), now(), 'Kieran Gatehouse'),
                    (now(), now(), 'Kirk House'),
                    (now(), now(), 'Leo Hall'),
                    (now(), now(), 'Library'),
                    (now(), now(), 'Longview Park'),
                    (now(), now(), 'Lowell Thomas'),
                    (now(), now(), 'Lower Townhouses'),
                    (now(), now(), 'Marian Hall'),
                    (now(), now(), 'Marist Boathouse'),
                    (now(), now(), 'McCann Recreational Center'),
                    (now(), now(), 'Midrise Hall'),
                    (now(), now(), 'New Townhouses'),
                    (now(), now(), 'St. Ann Hermitage'),
                    (now(), now(), 'St. Peter'),
                    (now(), now(), 'Sheahan Hall'),
                    (now(), now(), 'Steel Plant Art Studios'),
                    (now(), now(), 'Student Center'),
                    (now(), now(), 'Tenney Stadium'),
                    (now(), now(), 'Tennis Pavillion'),
                    (now(), now(), 'Lower West Cedar Townhouses'),
                    (now(), now(), 'Upper West Cedar Townhouses');
              
              