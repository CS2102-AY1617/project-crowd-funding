/* ===================== DDL ====================== */

CREATE TYPE gender AS ENUM ('male','female','others','prefer not to say');

CREATE TYPE usertype AS ENUM ('donor','entrepreneur','admin');

CREATE TABLE users (
	email VARCHAR(128) PRIMARY KEY,
	user_name VARCHAR(128) NOT NULL,
	hashed_password VARCHAR(32) NOT NULL,
	bio TEXT,
	first_name VARCHAR(128),
	last_name VARCHAR(128),
	gender gender,
	type usertype
);


CREATE TABLE topics (
	topic_name VARCHAR(128) PRIMARY KEY,
	number_of_projects INT DEFAULT 0,
	total_assets INT DEFAULT 0,
	description TEXT
);


CREATE TABLE projects (
	id INTEGER PRIMARY KEY NOT NULL,
	owner VARCHAR(128) NOT NULL REFERENCES users(email),
	title VARCHAR(535) NOT NULL,
	description TEXT NOT NULL,
	start_date DATE NOT NULL,
	end_date DATE NOT NULL,
	topic VARCHAR(128) NOT NULL,
	objective_amount INTEGER NOT NULL,
	status INT NOT NULL
);

CREATE TABLE transactions (
	id SERIAL PRIMARY KEY NOT NULL,
	project_id INTEGER NOT NULL REFERENCES projects(id),
	donor VARCHAR(32) NOT NULL REFERENCES users(email),
	transaction_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	amount INT CHECK(Amount > 0)
);

CREATE TABLE comments (
	project_id INTEGER NOT NULL REFERENCES projects(id),
	commentor VARCHAR(128) NOT NULL REFERENCES users(email),
	comment_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	content TEXT,
	PRIMARY KEY (project_id, commentor)
);

/* ===================== Initial Data ====================== */


INSERT INTO projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl) VALUES ('testaccount', 'Save the Trees/Save the Sanctuary--Fellow Mortals', 'Fellow Mortals provides care for 2,000 injured and orphaned animals every year. The final step in their recovery comes when they move from the hospital to habitats in the outdoor sanctuary. The sanctuary is set back from a busy road, and large trees keep the sanctuary quiet, peaceful and safe by buffering traffic noise, screening human activity and providing privacy. A transmission company is threatening to remove trees and vegetation, putting the wildlife in the sanctuary at risk of injury.', '2016-08-21', '2016-11-20', 'Environment', '10000', 'https://www.globalgiving.org/pfil/25060/pict_original.jpg');
INSERT INTO projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl)  VALUES ('testaccount', 'Helios Touch Modular Lighting', 'Helios is a modular touch screen wall light. This design allows the user to effectively swipe where they want or need light, turning the walls into a canvas for illumination using their hand as the brush.The combination of modularity and the lighting controls equals a product that can be completely tailored by the user. This product provides the opportunity for a lighting solution that is specific to each and every environment.', '2016-10-11', '2016-11-25', 'Design', '100000', 'https://ksr-ugc.imgix.net/assets/014/041/797/a9d0d9225da581b7849fc2feba84099c_original.jpg?w=680&fit=max&v=1476034075&auto=format&q=92&s=33332924f9e65edfe354e1524e8e05da');
INSERT INTO projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl)  VALUES ('testaccount', 'Haloed Houseplant Holiday Cards', 'A Reminder That Everything Is Alive This Holiday Season', '2016-10-26', '2017-01-05', 'Crafts', '1100', 'https://ksr-ugc.imgix.net/assets/014/170/581/2be26c1ef433051d9cde9c4708a46ca6_original.JPG?w=680&fit=max&v=1476846877&auto=format&q=92&s=a4fac7760d9255e9162303e463852304');
INSERT INTO projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl)  VALUES ('testaccount', 'Food Angel- Food Rescue & Food Assistance Program', 'With the mission of "Waste Not, Hunger Not", the program rescues edible surplus food from the food industry that would otherwise be disposed of as waste. The rescued food items will then be prepared as nutritious hot meals in our 2 central kitchens and be redistributed to serve the underprivileged communities in Hong Kong. Today, we serve over 6,000 Free Hot Meals & Food Packs daily to people in need of food assistance and rescue 4,000kg surplus food from going to our landfills every day.', '2016-10-01', '2017-03-05', 'Food', '90000', 'https://www.globalgiving.org/pfil/22113/ph_22113_80484.jpg');
INSERT INTO projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl)  VALUES ('testaccount', 'Shadows of Esteren - A Medieval Horror RPG: Dearg', 'The multi-award winning dark fantasy RPG from France, between Ravenloft, Game of Thrones and Call of Cthulhu.', '2016-07-01', '2017-01-05', 'Games', '20000', 'http://beggingforxp.com/wp-content/uploads/2014/05/spirit_forrest-752x440.jpg');
INSERT INTO projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl)  VALUES ('testaccount', 'TANKY DRONE: Insanely Fast FPV Racing Quadcopter', 'Breathtaking performance and race-proven technology! Speed at 100mph or soar like a bird and see the world like never before.', '2016-09-01', '2016-11-10', 'Technology', '150000', 'http://www.tankydrone.com/img/gallery/05.jpg');
INSERT INTO projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl)  VALUES ('testaccount', 'Civic Technology: The True Story of Hackers for Good', 'Civic Tech is a book about geeks improving government & community life for everyone. Come join us!', '2016-10-01', '2016-11-30', 'Publishing', '1000', 'https://pbs.twimg.com/media/CviRVR6UAAAkgli.jpg');
INSERT INTO projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl)  VALUES ('testaccount', 'Veterinary care for relinquished animals', 'Some animals relinquished to shelters have not received the most basic of veterinary care. The Dumb Friends League is committed to providing comprehensive veterinary care to animals relinquished to our centers in order to get them healthy and ready for adoption. Animals often need medical intervention such as vaccines, dental procedures and complex surgeries, including orthopedic procedures, eye surgery or mass removal. Thousands of animals arrive here annually with medical needs.', '2016-10-20', '2016-12-30', 'Animals', '1000', 'https://www.globalgiving.org/pfil/23057/ph_23057_83336.jpg');
INSERT INTO projects (owner, title, description, start_date, end_date, topic, objective_amount, imageurl)  VALUES ('testaccount', 'Beautifully Nerdy Deep Space Paintings & Prints - FQTQ', 'Deep-space oil paintings & fine art prints, featuring breathtaking galaxies, nebulae, and black holes. Art for awesome nerdy people.', '2016-10-20', '2017-01-03', 'Arts', '4000', 'https://s-media-cache-ak0.pinimg.com/564x/ce/7c/33/ce7c33973a34a597ca2ddf2807d44b8e.jpg');

INSERT INTO topics (topic_name, description) VALUES ('Arts','Art is a diverse range of human activities in creating visual, auditory or performing artifacts (artworks), expressing the author''s imaginative or technical skill, intended to be appreciated for their beauty or emotional power. In their most general form these activities include the production of works of art, the criticism of art, the study of the history of art, and the aesthetic dissemination of art.');
INSERT INTO topics (topic_name, description) VALUES ('Environment','The natural environment encompasses all living things and non-living things occurring naturally. The earth is the place we rely on to live. Save the earth in your project with other people.');
INSERT INTO topics (topic_name, description) VALUES ('Design','Design is the creation of a plan or convention for the construction of an object, system or measurable human interaction, as in architectural blueprints, engineering drawings, business processes, circuit diagrams, sewing patterns, etc. ');
INSERT INTO topics (topic_name, description) VALUES ('Craft','A craft is a pastime or a profession that requires particular skills and knowledge of skilled work. It is an activity that involves making something in a skillful way by using your hands.');
INSERT INTO topics (topic_name, description) VALUES ('Fashion','Fashion is a popular style or practice, especially in clothing, footwear, accessories, makeup, body, or furniture. Fashion is a distinctive and often constant trend in the style in which a person dresses. It is the prevailing styles in behaviour and the newest creations of textile designers.');
INSERT INTO topics (topic_name, description) VALUES ('Food','Food is an essential we are living with. Any project aiming to solve food crisis should be found here.');
INSERT INTO topics (topic_name, description) VALUES ('Game','A game is structured form of play, usually undertaken for enjoyment and sometimes used as an educational tool. Ideas about any type of games (sports games, board games, video games, etc.) should be shared here.');
INSERT INTO topics (topic_name, description) VALUES ('Music','Music is an art form and cultural activity whose medium is sound and silence, which exist in time. The common elements of music are pitch (which governs melody and harmony), rhythm (and its associated concepts tempo, meter, and articulation), dynamics (loudness and softness), and the sonic qualities of timbre and texture (which are sometimes termed the "color" of a musical sound).');
INSERT INTO topics (topic_name, description) VALUES ('Photography','Photography is the science, art, application and practice of creating durable images by recording light or other electromagnetic radiation, either electronically by means of an image sensor, or chemically by means of a light-sensitive material such as photographic film.');
INSERT INTO topics (topic_name, description) VALUES ('Technology','Technology ("science of craft" in Greek) is the collection of techniques, skills, methods and processes used in the production of goods or services or in the accomplishment of objectives, such as scientific investigation.');
INSERT INTO topics (topic_name, description) VALUES ('Publication','To publish is to make content available to the general public. While specific use of the term may vary among countries, it is usually applied to text, images, or other audio-visual content on any traditional medium, including paper (newspapers, magazines, catalogs, etc.). The word publication means the act of publishing, and also refers to any printed copies.');
INSERT INTO topics (topic_name, description) VALUES ('Animal','The word "animal" comes from the Latin animalis, meaning having breath, having soul or living being. They are the friends of human beings on the earth. Any project involving animals should be here.');

INSERT INTO users (email, user_name, type, hashed_password) VALUES ('rootA@gmail.com','imroota','admin', '123456');
INSERT INTO users (email, user_name, type, hashed_password) VALUES ('rootB@gmail.com','imrootb','admin', '123456');
INSERT INTO users (email, user_name, type, hashed_password) VALUES ('beyounce@gmail.com','imbeyounce','donor', '123456');
INSERT INTO users (email, user_name, type, hashed_password) VALUES ('rihanna@gmail.com','imrihanna','donor', '123456');
INSERT INTO users (email, user_name, type, hashed_password) VALUES ('taylor@gmail.com','imuser1','donor', '123456');
INSERT INTO users (email, user_name, type, hashed_password) VALUES ('beiber@gmail.com','imuser2','donor', '123456');
INSERT INTO users (email, user_name, type, hashed_password) VALUES ('gomez@gmail.com','imuser3','donor', '123456');
INSERT INTO users (email, user_name, type, hashed_password) VALUES ('miley@gmail.com','imuser4','donor', '123456');
INSERT INTO users (email, user_name, type, hashed_password) VALUES ('maroon5@gmail.com','imuser5','entrepreneur', '123456');
INSERT INTO users (email, user_name, type, hashed_password) VALUES ('edsheeran@gmail.com','imuser6','entrepreneur', '123456');

INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('10','miley@gmail.com','2016-09-19 10:23:54','100');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('10','gomez@gmail.com','2016-08-14 05:23:54','100');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('10','beiber@gmail.com','2016-08-16 17:23:54','100');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('10','rihanna@gmail.com','2016-08-13 19:23:54','5');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('9','miley@gmail.com','2016-09-19 10:20:54','80');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('9','gomez@gmail.com','2016-07-14 05:22:54','90');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('9','beyounce@gmail.com','2016-07-16 17:25:54','80');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('9','maroon5@gmail.com','2016-08-10 19:24:54','30');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('9','rihanna@gmail.com','2016-08-12 19:34:54','71');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('8','edsheeran@gmail.com','2016-07-28 19:34:54','397');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('8','edsheeran@gmail.com','2016-08-28 19:34:54','1');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('8','miley@gmail.com','2016-09-01 17:34:54','1');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('7','edsheeran@gmail.com','2016-09-01 17:34:54','18000');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('7','taylor@gmail.com','2016-09-02 17:34:54','9');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('6','taylor@gmail.com','2016-08-02 12:34:54','30');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('5','taylor@gmail.com','2016-09-02 17:34:54','10');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('5','beiber@gmail.com','2016-09-04 17:34:54','10');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('5','taylor@gmail.com','2016-09-03 17:34:54','10');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('5','maroon5@gmail.com','2016-09-05 17:34:54','10');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('5','taylor@gmail.com','2016-09-02 13:34:54','10');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('5','taylor@gmail.com','2016-09-01 17:34:54','10');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('5','edsheeran@gmail.com','2016-09-02 13:34:54','10');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('5','beyounce@gmail.com','2016-09-02 13:34:54','10');
INSERT INTO transactions (project_id, donor, transaction_time, amount) VALUES ('5','rihanna@gmail.com','2016-07-02 17:34:54','10');

INSERT INTO comments (project_id, commentor, comment_time, content) VALUES ('10','miley@gmail.com','2016-09-19 10:23:54','This is good!');
INSERT INTO comments (project_id, commentor, comment_time, content) VALUES ('9','maroon5@gmail.com','2016-09-19 10:23:54','Thumbs up');
INSERT INTO comments (project_id, commentor, comment_time, content) VALUES ('8','edsheeran@gmail.com','2016-09-19 10:23:54','LOL');
INSERT INTO comments (project_id, commentor, comment_time, content) VALUES ('9','rihanna@gmail.com','2016-09-19 10:23:54','Nice!!!');
INSERT INTO comments (project_id, commentor, comment_time, content) VALUES ('8','taylor@gmail.com','2016-09-19 10:23:54','Can some one enlighten me on this?');
