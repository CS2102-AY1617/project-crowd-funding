--crowdFund

CREATE TYPE CATEGORY AS ENUM (
	'Animals','Arts and Culture','Children','Climate Change','Democracy and Governance',
	'Disaster Recovery','Economic Development','Education','Environment',
	'HIV-AIDS','Health','Human Rights','Humanitarian Assistance','Hunger','LGBTQ',
	'Malaria','Microfinance','Peace and Security','Sport','Technology','Women and Girls'
);

CREATE TYPE USER_TYPE AS ENUM (
	'admin','entrepreneur','donor'
);

CREATE TYPE GENDER AS ENUM (
	'male','female','others','prefer not to say'
);

CREATE TABLE users (
	email VARCHAR(32) PRIMARY KEY,
	psw VARCHAR(32) NOT NULL,
	type USER_TYPE NOT NULL DEFAULT 'donor'
);

CREATE TABLE entrepreneurs (
	uen CHAR(10) PRIMARY KEY,
	c_email VARCHAR(32) REFERENCES users(email),
	c_name VARCHAR(64) NOT NULL UNIQUE,
	c_web VARCHAR(32) NOT NULL,
	c_location VARCHAR(128),
	c_description VARCHAR(500)
);

CREATE TABLE donors (
	d_email VARCHAR(32) PRIMARY KEY REFERENCES users(email),
	d_name VARCHAR(64) NOT NULL UNIQUE,
	gender GENDER,
	age SMALLINT
);

CREATE TABLE projects (
	p_id INTEGER PRIMARY KEY,
	owner CHAR(10) REFERENCES entrepreneurs(uen),
	title VARCHAR(64) NOT NULL,
	description VARCHAR(500),
	s_date DATE NOT NULL,
	e_date DATE NOT NULL CHECK (e_date >= s_date),
	categories CATEGORY NOT NULL,
	fund_aim INTEGER NOT NULL CHECK(fund_aim > 0), --SGD
	curr_fund INTEGER NOT NULL DEFAULT 0 CHECK(curr_fund >= 0),	--SGD
	active BOOLEAN NOT NULL	--compare s_date with current time
);

CREATE TABLE fundings (
	project INTEGER REFERENCES projects(p_id),
	donor VARCHAR(32) REFERENCES donors(d_email),
	time TIMESTAMP NOT NULL,	--TIMESTAMP format '2004-10-19 10:23:54'
	PRIMARY KEY(project,donor,time),
	amount INTEGER CHECK(amount > 0)
);

INSERT INTO users VALUES ('rootA@gmail.com','imroot','admin');
INSERT INTO users VALUES ('rootB@gmail.com','imroot','admin');

INSERT INTO users VALUES ('beyounce@gmail.com','imbeyounce','donor');
INSERT INTO users VALUES ('rihanna@gmail.com','imrihanna','donor');
INSERT INTO users VALUES ('ladygaga@gmail.com','imuser','donor');
INSERT INTO users VALUES ('katyperry@gmail.com','imuser','donor');
INSERT INTO users VALUES ('taylor@gmail.com','imuser','donor');
INSERT INTO users VALUES ('beiber@gmail.com','imuser','donor');
INSERT INTO users VALUES ('gomez@gmail.com','imuser','donor');
INSERT INTO users VALUES ('miley@gmail.com','imuser','donor');
INSERT INTO users VALUES ('maroon5@gmail.com','imuser','donor');
INSERT INTO users VALUES ('edsheeran@gmail.com','imuser','donor');

INSERT INTO donors VALUES ('beyounce@gmail.com','Beyonce Giselle Knowles-Carter','female','35');
INSERT INTO donors VALUES ('rihanna@gmail.com','Robyn Rihanna Fenty','female','28');
INSERT INTO donors VALUES ('ladygaga@gmail.com','Stefani Joanne Angelina Germanotta','female','30');
INSERT INTO donors VALUES ('katyperry@gmail.com','Katheryn Elizabeth Hudson','female','31');
INSERT INTO donors VALUES ('taylor@gmail.com','Taylor Alison Swift','female','26');
INSERT INTO donors VALUES ('beiber@gmail.com','Justin Drew Bieber','male','22');
INSERT INTO donors VALUES ('gomez@gmail.com','Selena Marie Gomez','female','24');
INSERT INTO donors VALUES ('miley@gmail.com','Miley Ray Cyrus','female','23');
INSERT INTO donors VALUES ('maroon5@gmail.com','Adam Levine','male','37');
INSERT INTO donors VALUES ('edsheeran@gmail.com','Edward Christopher','male','25');

INSERT INTO users VALUES ('savh@gmail.com','imuser','entrepreneur');
INSERT INTO users VALUES ('awwa@gmail.com','imuser','entrepreneur');
INSERT INTO users VALUES ('fmwh@gmail.com','imuser','entrepreneur');
INSERT INTO users VALUES ('idv@gmail.com','imuser','entrepreneur');
INSERT INTO users VALUES ('lgbtvoicetz@gmail.com','imuser','entrepreneur');
INSERT INTO users VALUES ('serudsindia@gmail.com','imuser','entrepreneur');

INSERT INTO entrepreneurs VALUES ('S61SS0119J','savh@gmail.com','Singapore Association of the Visually Handicapped','www.savh.org.sg',null,null);
INSERT INTO entrepreneurs VALUES ('S70SS0021J','awwa@gmail.com','Asian Womens Welfare Association','www.awwa.org.sg',null,null);
INSERT INTO entrepreneurs VALUES ('3728DU567G','fmwh@gmail.com','Fellow Mortals Wildlife Hospital','www.fellowmortals.org','Lake Geneva, Wisconsin - USA',null);
INSERT INTO entrepreneurs VALUES ('3D2843728H','idv@gmail.com','International Disaster Volunteers (IDV)','www.idvolunteers.org','Bristol, Somerset - United Kingdom',null);
INSERT INTO entrepreneurs VALUES ('E8392427UY','lgbtvoicetz@gmail.com','LGBT Voice of Tanzania','www.lgbtvoicetz.org','Dar es salaam - Tanzania, United Republic of',null);
INSERT INTO entrepreneurs VALUES ('EIUF20383H','serudsindia@gmail.com','Sai Educational Rural & Urban Development Society (SERUDS)','www.serudsindia.org','KURNOOL, ANDHRA PRADESH - India',null);

INSERT INTO projects VALUES ('1','S61SS0119J','Braille books for 4000 visually challenged kids',
	'This project provides Braille books for 4000 visually challenged students. This will help them become independent and own personal copies of the books as that is lacking now. This will help in widening their horizons and gaining immense knowledge. Singapore Association of the Visually Handicapped (SAVH),based in Singapore, is a well-known non-profit organization working at the grass roots level for education, employment and rehabilitation of people with visual challenges from rural areas.',
	'2016-06-08','2017-09-08','Children','20000','5251','TRUE'
);
INSERT INTO projects VALUES ('2','S70SS0021J','Girls2Pioneers',
	'Women are still underrepresented in Science, Technology, Engineering, and Mathematics (STEM), despite the fact that these fields are growing exponentially. The Asian Womens Welfare Association is implementing a programme to encourage more girls in Singapore to take up careers in STEM, especially those who are at risk or from low income families. Through day camps tailored by our curriculum developer Destination Imagination, we hope to engage the next generation of pioneers and innovators.',
	'2016-07-08','2017-06-08','Women and Girls','30000','6525','TRUE'
);
INSERT INTO projects VALUES ('3','3728DU567G','Save the Trees/Save the Sanctuary--Fellow Mortals',
	'Fellow Mortals provides care for 2,000 injured and orphaned animals every year. The final step in their recovery comes when they move from the hospital to habitats in the outdoor sanctuary. The sanctuary is set back from a busy road, and large trees keep the sanctuary quiet, peaceful and safe by buffering traffic noise, screening human activity and providing privacy. A transmission company is threatening to remove trees and vegetation, putting the wildlife in the sanctuary at risk of injury.',
	'2016-07-10','2017-10-11','Animals','12000','800','TRUE'
);
INSERT INTO projects VALUES ('4','3728DU567G','Fellow Mortals Wildlife Hospital',
	'Fellow Mortals is a professional wildlife hospital that cares for injured and orphaned wild animals brought to the hospital by compassionate members of the community. Treated animals include songbirds, waterfowl, hawks, eagles, owls, rabbits, red and grey squirrels, opossum, woodchucks, beaver, and many other species. More than 40,000 wild animals of more than 100 species have received care since 1985, with the majority successfully returned to the wild.',
	'2016-07-10','2017-10-11','Animals','10000','825','TRUE'
);
INSERT INTO projects VALUES ('5','3D2843728H','A Daycare Center for Angel',
	'Angel is four years old and lives in the community of Matin-ao with her grandparents and older brother. Angels daycare center was badly damaged by typhoon Haiyan which tore through the Philippines in November 2013. The building is still totally unusable, so Angel and her classmates are missing out on important opportunities for early learning. With your help, we will repair the building and give Angel back the daycare center she needs to build a brighter future.',
	'2016-07-15','2016-10-15','Disaster Recovery','1000','165','TRUE'
);
INSERT INTO projects VALUES ('6','3D2843728H','Give Noldy a year of school',
	'This project will provide a year of education for 7 year old Noldy. Noldy arrived at the HTDC orphanage in 2010, along with his brother and sister. His dad had to make the heart breaking decision to leave them at the orphanage after his wife died in the 2010 earthquake, leaving him with eight children he couldnt afford to care for alone. With your help, we will be able to provide Noldy with the education he needs to build a secure future.',
	'2016-07-18','2017-10-17','Children','600','30','TRUE'
);
INSERT INTO projects VALUES ('7','3D2843728H','Change Lives with English Education',
	'The English in Mind (EIM) Institute is a non-profit, Haitian led English school in Port-au-Prince, Haiti. The school teaches English as a vocational skill to help students find the long-term employment they need to build a secure future. The school has around 200 students and also boasts a teacher training programme and networking facility to help students find work and develop essential job skills.',
	'2016-07-20','2017-02-21','Education','25000','18009','TRUE'
);
INSERT INTO projects VALUES ('8','E8392427UY','Donate to support Usalama House- LGBTQ safe space',
	'Usalama House (LGBT homeless shelter) provides a safe and comfortable home for LGBT youth 6-24 years who are kicked out of their parents home because of their sex orientation and gender identity. The home also provide nutritious food, decent clothing, healthcare and valuable education which will help them obtain requisite skills as either entrepreneurs or entrepreneurs to be self employed, employ others and be marketable wherever they find themselves in this world.',
	'2016-07-21','2016-12-11','LGBTQ','14000','13400','TRUE'
);
INSERT INTO projects VALUES ('9','EIUF20383H','Food Sponsorship for Destitute Old Age Person',
	'This microproject helps to provide midday meal to homeless old age person for a year. Every day we provide nutritious food to 30 destitute elders, who are homeless, neglected by their families. Due to poverty some families are not able to feed these older persons. Among 30 poor old age persons, some of them use to begging at neighbor houses, near by locations to feed themselves. By seeing this since 2009, we are providing nutritious food to 30 destitute elders in Kurnool District of AP.',
	'2016-07-22','2016-10-11','Hunger','590','351','TRUE'
);
INSERT INTO projects VALUES ('10','EIUF20383H','Sponsor a Girl Child to access Quality Education',
	'This micro project provides quality education to the poor girl child age group 12 to 16yrs studying VI to X Std, as Education is a basic human right, vital to personal & societal development and well-being. This project protects Girl Child from Child Marriages, Trafficking, Domestic Servants, Eradication of illiteracy & Provides Good Quality Education. From this unique project deprived girl child get timely education material support, uniforms, shoes, footwear, test papers, dictionary',
	'2016-08-10','2016-11-15','Children','390','305','TRUE'
);

INSERT INTO fundings VALUES ('10','miley@gmail.com','2016-09-19 10:23:54','100');
INSERT INTO fundings VALUES ('10','gomez@gmail.com','2016-08-14 05:23:54','100');
INSERT INTO fundings VALUES ('10','beiber@gmail.com','2016-08-16 17:23:54','100');
INSERT INTO fundings VALUES ('10','rihanna@gmail.com','2016-08-13 19:23:54','5');

INSERT INTO fundings VALUES ('9','miley@gmail.com','2016-09-19 10:20:54','80');
INSERT INTO fundings VALUES ('9','gomez@gmail.com','2016-07-14 05:22:54','90');
INSERT INTO fundings VALUES ('9','beyounce@gmail.com','2016-07-16 17:25:54','80');
INSERT INTO fundings VALUES ('9','maroon5@gmail.com','2016-08-10 19:24:54','30');
INSERT INTO fundings VALUES ('9','rihanna@gmail.com','2016-08-12 19:34:54','71');

INSERT INTO fundings VALUES ('8','ladygaga@gmail.com','2016-07-25 19:34:54','10000');
INSERT INTO fundings VALUES ('8','katyperry@gmail.com','2016-07-28 19:34:54','3000');
INSERT INTO fundings VALUES ('8','edsheeran@gmail.com','2016-07-28 19:34:54','397');
INSERT INTO fundings VALUES ('8','edsheeran@gmail.com','2016-08-28 19:34:54','1');
INSERT INTO fundings VALUES ('8','katyperry@gmail.com','2016-08-28 19:34:54','1');
INSERT INTO fundings VALUES ('8','miley@gmail.com','2016-09-01 17:34:54','1');

INSERT INTO fundings VALUES ('7','edsheeran@gmail.com','2016-09-01 17:34:54','18000');
INSERT INTO fundings VALUES ('7','taylor@gmail.com','2016-09-02 17:34:54','9');

INSERT INTO fundings VALUES ('6','taylor@gmail.com','2016-08-02 12:34:54','30');

INSERT INTO fundings VALUES ('5','taylor@gmail.com','2016-09-02 17:34:54','10');
INSERT INTO fundings VALUES ('5','beiber@gmail.com','2016-09-04 17:34:54','10');
INSERT INTO fundings VALUES ('5','taylor@gmail.com','2016-09-03 17:34:54','10');
INSERT INTO fundings VALUES ('5','maroon5@gmail.com','2016-09-05 17:34:54','10');
INSERT INTO fundings VALUES ('5','taylor@gmail.com','2016-09-02 13:34:54','10');
INSERT INTO fundings VALUES ('5','taylor@gmail.com','2016-09-01 17:34:54','10');
INSERT INTO fundings VALUES ('5','edsheeran@gmail.com','2016-09-02 13:34:54','10');
INSERT INTO fundings VALUES ('5','beyounce@gmail.com','2016-09-02 13:34:54','10');
INSERT INTO fundings VALUES ('5','rihanna@gmail.com','2016-07-02 17:34:54','10');
INSERT INTO fundings VALUES ('5','katyperry@gmail.com','2016-07-02 17:54:54','10');
INSERT INTO fundings VALUES ('5','taylor@gmail.com','2016-07-12 17:44:54','10');
INSERT INTO fundings VALUES ('5','taylor@gmail.com','2016-07-20 17:24:54','10');
INSERT INTO fundings VALUES ('5','katyperry@gmail.com','2016-07-20 17:14:54','10');
INSERT INTO fundings VALUES ('5','beiber@gmail.com','2016-07-12 17:04:54','10');
INSERT INTO fundings VALUES ('5','ladygaga@gmail.com','2016-09-12 17:04:54','10');
INSERT INTO fundings VALUES ('5','taylor@gmail.com','2016-09-12 10:34:54','10');
INSERT INTO fundings VALUES ('5','gomez@gmail.com','2016-09-02 11:34:54','5');

INSERT INTO fundings VALUES ('4','gomez@gmail.com','2016-07-14 11:32:54','825');

INSERT INTO fundings VALUES ('3','gomez@gmail.com','2016-07-14 11:32:54','400');
INSERT INTO fundings VALUES ('3','beiber@gmail.com','2016-07-14 11:32:54','400');

INSERT INTO fundings VALUES ('2','edsheeran@gmail.com','2016-08-14 15:32:54','4000');
INSERT INTO fundings VALUES ('2','taylor@gmail.com','2016-08-14 15:12:54','2525');

INSERT INTO fundings VALUES ('1','beyounce@gmail.com','2016-08-10 15:12:54','5250');
INSERT INTO fundings VALUES ('1','rihanna@gmail.com','2016-08-11 15:12:54','1');
