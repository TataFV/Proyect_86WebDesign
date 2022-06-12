CREATE database empresa_86WebDesign;
USE empresa_86WebDesign;
CREATE USER 'empresa86'@'localhost' identified by '#7gD72Ya22d&SCK';
GRANT ALL PRIVILEGES ON empresa_86webdesign.* to 'empresa86'@'localhost';

Create TABLE user(
id INTEGER(9) auto_increment,
name VARCHAR(100),
lastname VARCHAR(50),
email VARCHAR(50) UNIQUE,
password VARCHAR(20),
role VARCHAR(8),
PRIMARY KEY (id)
);

Create TABLE task(
id INTEGER(9) auto_increment,
name VARCHAR(100),
description VARCHAR(150),
id_ceo INTEGER(9),
id_employee INTEGER(9),
status VARCHAR(50),
priority INTEGER(1),
type VARCHAR(20),
startDate DATETIME,
finishDate DATETIME,
PRIMARY KEY (id),
FOREIGN KEY (id_ceo) REFERENCES user (id),
FOREIGN KEY (id_employee) REFERENCES user (id)
);

DROP TABLE user;
DROP TABLE task;
INSERT INTO user (name, lastname, email, password, role, sex) VALUES ("Sidney", "Lovelace", "s.lovelace@86wd.com", "1234", "CEO", "f");
INSERT INTO user (name, lastname, email, password, role, sex) VALUES ("Ezio",  "Auditore", "e.auditore@86wd.com", "5678", "Employee", "m");
INSERT INTO user (name, lastname, email, password, role, sex) VALUES ("Lara", "Croft", "l.croft@86wd.com", "91011", "Employee", "f");
INSERT INTO user (name, lastname, email, password, role, sex) VALUES ("Nathan", "Drake", "n.drake@86wd.com", "1213", "Employee", "m");
UPDATE user SET  name="Ezzio" WHERE id="Ezio";


SELECT * FROM user;
SELECT * FROM user WHERE user.role='Employee';

SELECT * FROM task;
INSERT INTO task (name, description, id_ceo, id_employee, priority, type, status, startDate, finishDate) VALUES ("Diseño UX", "Crear un prototipo de la App 86WebDesign", 1, 2, 3, "Front-end", "Finalizada", "2022-05-13 08:48:49", "2022-05-16 14:43:00");
INSERT INTO task (name, description, id_ceo, id_employee, priority, type, status, startDate, finishDate) VALUES ("Wireframing", "Crear el boceto de la App 86WebDesign", 1, 2, 2, "Front-end", "Finalizada", "2022-05-17 08:48:49", "2022-05-18 08:45:49");
INSERT INTO task (name, description, id_ceo, id_employee, priority, type, status, startDate, finishDate) VALUES ("Reunión de equipo", "Mostrar avances en los proyectos", 1, 3, 2, "Reunión", "Finalizada", "2022-05-18 09:00:00", "2022-05-18 11:05:26");
INSERT INTO task (name, description, id_ceo, id_employee, priority, type, status, startDate, finishDate) VALUES ("Búsqueda de imagenes", "Buscar imágenes para la App 86WebDesign", 1, 4, 2, "Front-end", "Finalizada", "2022-05-17 08:00:49", "2022-05-19 09:45:49");
INSERT INTO task (name, description, id_ceo, id_employee, priority, type, status, startDate, finishDate) VALUES ("Reunión de equipo", "Mostrar avances en los proyectos", 1, 2, 2, "Reunión", "Finalizada", "2022-05-18 09:05:00", "2022-05-18 11:00:26");
INSERT INTO task (name, description, id_ceo, id_employee, priority, type, status, startDate, finishDate) VALUES ("Prototipado", "Crear el prototipo de la App 86WebDesign", 1, 2, 2, "Testeo", "Finalizada", "2022-05-18 12:00:49", "2022-05-20 13:48:45");
INSERT INTO task (name, description, id_ceo, id_employee, priority, type, status, startDate, finishDate) VALUES ("Prototipado", "Crear el prototipo de la App 20Century", 1, 3, 2, "Testeo", "Finalizada", "2022-05-18 10:00:49", "2022-05-24 13:48:45");
INSERT INTO task (name, description, id_ceo, id_employee, priority, type, status) VALUES ("Testeo", "Participar en el testo de la AppWeb JustRun", 1, 2, 2, "Testeo", "Por hacer");
INSERT INTO task (name, description, id_ceo, id_employee, priority, type, status) VALUES ("Base de datos", "Diseño de la base de datos de la App RockStar", 1, 2, 3, "Front-End", "En curso");
INSERT INTO task (name, description, id_ceo, id_employee, priority, type, status) VALUES ("Base de datos", "Diseño de la base de datos de la App RockStar", 1, NULL, 3, "Front-End", "Por hacer");

SELECT * FROM task;
SELECT DISTINCT id_employee FROM task WHERE status='En curso' OR status='Por hacer';
SELECT DISTINCT id_employee FROM task WHERE status='En curso' OR status='Por hacer' AND id_employee is not null;
SELECT id FROM user WHERE role="Employee";
SELECT id FROM user WHERE role="Employee" AND id NOT IN (SELECT DISTINCT id_employee FROM task WHERE status='En curso' OR status='Por hacer' AND id_employee is not null);
SELECT id FROM task WHERE id_employee IS NULL AND status="Por hacer" ORDER BY priority desc; 


SELECT * FROM task WHERE id_employee=NULL;

UPDATE task SET startDate="2022-06-04 12:08:45" WHERE id=11;

