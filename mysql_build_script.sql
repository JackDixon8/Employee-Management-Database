CREATE TABLE hr_regions (
                         region_id INT (11) AUTO_INCREMENT PRIMARY KEY,
                         region_name VARCHAR (25) DEFAULT NULL
);

CREATE TABLE hr_countries (
                           country_id CHAR (2) PRIMARY KEY,
                           country_name VARCHAR (40) DEFAULT NULL,
                           region_id INT (11) NOT NULL,
                           FOREIGN KEY (region_id) REFERENCES hr_regions (region_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE hr_locations (
                           location_id INT (11) AUTO_INCREMENT PRIMARY KEY,
                           street_address VARCHAR (40) DEFAULT NULL,
                           postal_code VARCHAR (12) DEFAULT NULL,
                           city VARCHAR (30) NOT NULL,
                           state_province VARCHAR (25) DEFAULT NULL,
                           country_id CHAR (2) NOT NULL,
                           FOREIGN KEY (country_id) REFERENCES hr_countries (country_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE hr_jobs (
                      job_id INT (11) AUTO_INCREMENT PRIMARY KEY,
                      job_title VARCHAR (35) NOT NULL,
                      min_salary DECIMAL (8, 2) DEFAULT NULL,
                      max_salary DECIMAL (8, 2) DEFAULT NULL
);

CREATE TABLE hr_departments (
                             department_id INT (11) AUTO_INCREMENT PRIMARY KEY,
                             department_name VARCHAR (30) NOT NULL,
                             location_id INT (11) DEFAULT NULL,
                             FOREIGN KEY (location_id) REFERENCES hr_locations (location_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE hr_employees (
                           employee_id INT (11) AUTO_INCREMENT PRIMARY KEY,
                           first_name VARCHAR (20) DEFAULT NULL,
                           last_name VARCHAR (25) NOT NULL,
                           email VARCHAR (100) NOT NULL,
                           phone_number VARCHAR (20) DEFAULT NULL,
                           hire_date DATE NOT NULL,
                           job_id INT (11) NOT NULL,
                           salary DECIMAL (8, 2) NOT NULL,
                           manager_id INT (11) DEFAULT NULL,
                           department_id INT (11) DEFAULT NULL,
                           FOREIGN KEY (job_id) REFERENCES hr_jobs (job_id) ON DELETE CASCADE ON UPDATE CASCADE,
                           FOREIGN KEY (department_id) REFERENCES hr_departments (department_id) ON DELETE CASCADE ON UPDATE CASCADE,
                           FOREIGN KEY (manager_id) REFERENCES hr_employees (employee_id)
);

CREATE TABLE hr_dependents (
                            dependent_id INT (11) AUTO_INCREMENT PRIMARY KEY,
                            first_name VARCHAR (50) NOT NULL,
                            last_name VARCHAR (50) NOT NULL,
                            relationship VARCHAR (25) NOT NULL,
                            employee_id INT (11) NOT NULL,
                            FOREIGN KEY (employee_id) REFERENCES hr_employees (employee_id) ON DELETE CASCADE ON UPDATE CASCADE
);



INSERT INTO hr_regions(region_id,region_name)VALUES (1,'Europe');
INSERT INTO hr_regions(region_id,region_name)VALUES (2,'Americas');
INSERT INTO hr_regions(region_id,region_name)VALUES (3,'Asia');
INSERT INTO hr_regions(region_id,region_name)VALUES (4,'Middle East and Africa');


INSERT INTO hr_countries(country_id,country_name,region_id)VALUES ('BR','Brazil',2);
INSERT INTO hr_countries(country_id,country_name,region_id)VALUES ('CA','Canada',2);

INSERT INTO hr_countries(country_id,country_name,region_id)VALUES ('CN','China',3);

INSERT INTO hr_countries(country_id,country_name,region_id)VALUES ('EG','Egypt',4);

INSERT INTO hr_countries(country_id,country_name,region_id)VALUES ('HK','HongKong',3);

INSERT INTO hr_countries(country_id,country_name,region_id)VALUES ('JP','Japan',3);

INSERT INTO hr_countries(country_id,country_name,region_id)VALUES ('US','United States',2);


INSERT INTO hr_locations(location_id, street_address, postal_code, city, state_province, country_id)VALUES (1400,'2014 Jabberwocky Rd','26192','Southlake','Texas','US');
INSERT INTO hr_locations(location_id, street_address, postal_code, city, state_province, country_id)VALUES (1500, '2011 Interiors Blvd', '99236', 'South San Francisco', 'California', 'US');


INSERT INTO hr_jobs(job_id,job_title,min_salary,max_salary)VALUES (1,'Cool Job',0,100000);
INSERT INTO hr_jobs(job_id,job_title,min_salary,max_salary)VALUES (2,'Assistant to the cool job',8200.00,16000.00);
INSERT INTO hr_jobs(job_id,job_title,min_salary,max_salary)VALUES (3,'Example Job yay!',3000.00,6000.00);




INSERT INTO hr_departments(department_id,department_name,location_id)VALUES (1,'Administration',1700);
INSERT INTO hr_departments(department_id,department_name,location_id)VALUES (2,'Marketing',1800);
INSERT INTO hr_departments(department_id,department_name,location_id)VALUES (3,'Purchasing',1700);
INSERT INTO hr_departments(department_id,department_name,location_id)VALUES (4,'Human Resources',2400);



INSERT INTO hr_employees(employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id)VALUES (100, 'Bob', 'Bobby', 'BobIsYourUncle@haha.com', '515.123.4567', '1987-06-17', 2, 24000.00, 100, 1);
INSERT INTO hr_employees(employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id)VALUES (101, 'Jack', 'Dixon', 'heyThatsMe@yay.com', '515.123.4568', '1989-09-21', 3, 17000.00, 100, 1);
INSERT INTO hr_employees(employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id)VALUES (102, 'Lex', 'Allen', 'TheFlashsuperman@idk.com', '515.123.4569', '1993-01-13', 1, 17000.00, 100, 2);
INSERT INTO hr_employees(employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id)VALUES (103, 'Fake', 'Person', 'example@example.com', '590.423.4567', '1990-01-03', 1, 9000.00, 102, 3);



INSERT INTO hr_dependents(dependent_id,first_name,last_name,relationship,employee_id) VALUES (1,'eric','Greg','Child',206);
INSERT INTO hr_dependents(dependent_id,first_name,last_name,relationship,employee_id) VALUES (2,'Tim','Timmy','Child',205);
