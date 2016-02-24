#########################################PROJECT DELIVERABLE 4 SCRIPT##################################

#Create Statements
create table people (
    firstName varchar(128),
    middleName varchar(128),
    lastName varchar(128),
    ssn integer,
    people_id int not null AUTO_INCREMENT,
    street_address varchar(1024),
    city varchar(128),
    state varchar(128),
    zip integer,
    email varchar(128),
    phone_no integer,
    facebook varchar(128),
    twitter varchar(128),
    linkedin varchar(128),
    aboutme varchar(2048),
    photo varchar(40),
    department varchar(30),
    Primary key (people_id)
);

#Index last name as last name is frequently used
CREATE INDEX last_name_index
ON people (lastName);

#Index on city as this is the most frequently use when searching for people in a particular geographic location
CREATE INDEX city_index
ON people (city);



create table student (
    studentId int not null references people (people_id),
    major varchar(128),
    internship varchar(128),
    primary key (studentId)
);

create table faculty (
    facultyId int not null references people (people_id),
	designation varchar(128),
    primary key (facultyId)
	
);
 
create table alumni (
    alumniID int not null references people (people_id),
    primary key (alumniID)
);

create table collegeEvent (
    eventName varchar(128),
    eventId int not null AUTO_INCREMENT,
    eventTime time,
    eventDate date,
    venue varchar(128),
    primary key (eventId)
);

create table event_registration (
    alumni_id int not null,
    eventId int not null,
    foreign key (alumni_id)
        references alumni (alumniID),
    foreign key (eventId)
        references collegeEvent (eventId)
);

create table logIn (
    peopleId int not null,
    userName varchar(128),
    password varchar(128),
	is_student boolean not null,
	is_faculty boolean not null,
	is_alumni boolean not null,
    primary key (userName),
    foreign key (peopleId)
        references people (people_id)
);


CREATE TABLE college (
    college_id INT NOT NULL AUTO_INCREMENT,
    alumni_id int NOT NULL,
    graduation_yr int NOT NULL,
    major_advisor VARCHAR(128) NOT NULL,
    major VARCHAR(128) NOT NULL,
    PRIMARY KEY (college_id),
    foreign key (alumni_id)
        references alumni (alumniID)
);
  

create table testimonials (
    testimonialID int not null AUTO_INCREMENT,
    testimonialDescriptor varchar(2048),
    primary key (testimonialID),
    facultyId int not null,
    alumniId int not null,
    foreign key (facultyId)
        references faculty (facultyId),
    foreign key (alumniId)
        references alumni (alumniID)
);

