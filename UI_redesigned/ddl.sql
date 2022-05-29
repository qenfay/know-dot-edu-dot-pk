
-- DATABASE INITIALISATION

CREATE DATABASE KNOW_EDU_PK;
USE KNOW_EDU_PK;

-- TABLE
CREATE TABLE EndUser (
	userID CHAR(5),
    accountType VARCHAR(7),
    userName VARCHAR(20),
    pw VARCHAR(225),
    fullName VARCHAR(100),
    phone VARCHAR(30),
    
    PRIMARY KEY (userID)
);

CREATE TABLE Course (
	courseID INT, 
    title VARCHAR(150),
	field VARCHAR(50),
    
    PRIMARY KEY (courseID)
);

CREATE TABLE StudentCourse (
	studentID CHAR(5),
    courseID INT,
    
    PRIMARY KEY (studentID, courseID),
    FOREIGN KEY (studentID) REFERENCES EndUser(userID) ON DELETE CASCADE,
    FOREIGN KEY (courseID) REFERENCES Course(courseID) ON DELETE CASCADE
);

CREATE TABLE TeacherCourse (
	teacherID CHAR(5),
    courseID INT,
    
    PRIMARY KEY (teacherID, courseID),
    FOREIGN KEY (teacherID) REFERENCES EndUser(userID) ON DELETE CASCADE,
	FOREIGN KEY (courseID) REFERENCES Course(courseID) ON DELETE CASCADE
);


CREATE TABLE CourseContent (
	contentID INT,
    courseID INT,
    position INT, 
    contentType VARCHAR(20),
    filePath VARCHAR(300),
    
    PRIMARY KEY (contentID),
    FOREIGN KEY (courseID) REFERENCES Course(courseID) ON DELETE CASCADE
);

-- DATA 

INSERT INTO EndUser VALUES
    ('S0001','Student','akendrickfan99','$2y$10$nmXGIIlX7cfo5nZdx/YVqOAhF0Tvr8YsbTiFoOfeRibc03lXanTOm', 'Anna Kendrick','+92 330 283 4829'), -- pw = jquery
    ('S0002','Student','blairwaldorf','$2y$10$nmXGIIlX7cfo5nZdx/YVqOAhF0Tvr8YsbTiFoOfeRibc03lXanTOm','Blair Waldorf','+92 330 283 4830'),
    ('S0003','Student','toughboywaseem','$2y$10$nmXGIIlX7cfo5nZdx/YVqOAhF0Tvr8YsbTiFoOfeRibc03lXanTOm','Waseem Tough Nadeem','+92 330 283 4831'),
    ('S0004','Student','araib48','$2y$10$nmXGIIlX7cfo5nZdx/YVqOAhF0Tvr8YsbTiFoOfeRibc03lXanTOm','Areeb Amir','+92 330 283 4832'),
    ('S0005','Student','bajwasaab','$2y$10$nmXGIIlX7cfo5nZdx/YVqOAhF0Tvr8YsbTiFoOfeRibc03lXanTOm','Gen Qamar Bajwa','+92 330 283 4833'),
    ('T0001','Teacher','shaafay1954','$2y$10$RXDElUbs62MG6Gkgla3kL.Aczt/np3dRkamBJ5in/6P4p2C39FcsW','Kamran','+92 330 283 4834'),
    ('T0002','Teacher','einsteinhimself','$2y$10$RXDElUbs62MG6Gkgla3kL.Aczt/np3dRkamBJ5in/6P4p2C39FcsW','Albert Einstein','+92 330 283 4835'),
    ('T0003','Teacher','curieherself','$2y$10$RXDElUbs62MG6Gkgla3kL.Aczt/np3dRkamBJ5in/6P4p2C39FcsW','Marie Curie','+92 330 283 4836'), -- pw = radium
    ('T0004','Teacher','webdevpro','$2y$10$RXDElUbs62MG6Gkgla3kL.Aczt/np3dRkamBJ5in/6P4p2C39FcsW','Sergey Brin','+92 330 283 4837'),
    ('A0001','Admin','admin1','$2y$10$SrmqN.FmKaUAgquRW6AhOu0p18Dji8xxqBIe0xYMLrDj/iUW5vokK','Shaafay','+92 330 283 4838'), -- pw = admin
    ('A0002','Admin','admin2','$2y$10$SrmqN.FmKaUAgquRW6AhOu0p18Dji8xxqBIe0xYMLrDj/iUW5vokK','Talaal','+92 330 283 4839'); -- pw = admin

INSERT INTO Course VALUES
    (1,'Calculus I','Math'),
    (2,'Calculus II','Math'),
    (3,'Discrete Math','Math'),
    (4,'Python','Computer Science'),
    (5,'Economics of Pakistan','Economics'),
    (6,'Assembly Language','Hardware'),
    (7,'Digital Logic Design','Hardware');

INSERT INTO StudentCourse VALUES
    ('S0001',1),
    ('S0002',3),
    ('S0003',4),
    ('S0004',6),
    ('S0005',7),
    ('S0001',5),
    ('S0002',5),
    ('S0003',6);

INSERT INTO TeacherCourse VALUES
    ('T0001',1),
    ('T0002',2),
    ('T0003',5),
    ('T0004',3),
    ('T0002',6),
    ('T0003',4),
    ('T0003',7);
    
INSERT INTO CourseContent VALUES
	(1, 1, 1, 'Photo', 'https://i.pinimg.com/originals/ac/92/31/ac9231d75d831a6cd187f43ccea47f0e.jpg'),
	(2, 1, 2, 'Description', 'files/1.txt'),
	(3, 2, 1, 'Photo', 'https://wallpapercave.com/wp/wp2790127.jpg'),
	(4, 2, 2, 'Description', 'files/2.txt'),
	(5, 3, 1, 'Photo', 'https://i.pinimg.com/736x/21/39/3c/21393c41e9afb4beb99e32a5be5f3655.jpg'),
	(6, 3, 2, 'Description', 'files/3.txt'),
	(7, 4, 1, 'Photo', 'https://images.hdqwalls.com/download/python-qhd-3840x2160.jpg'),
	(8, 4, 2, 'Description', 'files/4.txt'),
	(9, 5, 1, 'Photo', 'https://i.pinimg.com/originals/2c/b8/f0/2cb8f0568e8e9df268d0ea0d79a2bc11.jpg'),
	(10, 5, 2, 'Description', 'files/5.txt'),
	(11, 6, 1, 'Photo', 'https://cdn.suwalls.com/wallpapers/3d/colorful-honeycomb-assembly-51458-1920x1080.jpg'),
	(12, 6, 2, 'Description', 'files/6.txt'),
	(13, 7, 1, 'Photo', 'https://cdn.hipwallpaper.com/i/97/68/qWNscL.jpg'),
	(14, 7, 2, 'Description', 'files/7.txt');
	
	
   
