-- TODO: Put ALL SQL in between `BEGIN TRANSACTION` and `COMMIT`
BEGIN TRANSACTION;

-- TODO: create tables

-- CREATE TABLE `examples` (
-- 	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
-- 	`name`	TEXT NOT NULL
-- );

CREATE TABLE images(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    description TEXT,
    file_ext TEXT NOT NULL,
    image_name TEXT,
    source TEXT
);
CREATE TABLE tags(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    tag_name TEXT NOT NULL UNIQUE
);
CREATE TABLE image_tags(
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    image_id INTEGER NOT NULL,
    tag_id INTEGER NOT NULL
);

-- TODO: initial seed data

-- INSERT INTO `examples` (id,name) VALUES (1, 'example-1');
-- INSERT INTO `examples` (id,name) VALUES (2, 'example-2');

INSERT INTO images (id, description, file_ext, image_name, source) VALUES (1,"team huddle", "jpg", "teamhuddle", "https://cornellbigred.com/images/2019/11/21/PS_090619_WVBl_vs_Youngstown_State_University_0567_crop.jpg?width=1080&height=608&mode=crop&format=jpg&quality=80");
    -- <!-- Source: https://cornellbigred.com/images/2019/11/21/PS_090619_WVBl_vs_Youngstown_State_University_0567_crop.jpg?width=1080&height=608&mode=crop&format=jpg&quality=80 -->

-- 3 tags applied to 1 image
INSERT INTO tags (id, tag_name) VALUES (1, "team");
INSERT INTO image_tags (id, image_id, tag_id) VALUES (1, 1, 1);
INSERT INTO tags (id, tag_name) VALUES (2, "games");
INSERT INTO image_tags (id, image_id,tag_id) VALUES (2, 1, 2);
INSERT INTO tags (id, tag_name) VALUES (3, 'ivies');
INSERT INTO image_tags (id, image_id, tag_id) VALUES (3, 1, 3);

INSERT INTO images (id, description, file_ext, image_name, source) VALUES (2, "The starting 6 huddling together before the match", 'jpg', "playershuddle", "https://cornellbigred.com/galleries/womens-volleyball/volleyball-vs-yale-11-08-19/the-cornell-big-red-volleyball-team-competes-against-yale-on-friday-nov-8-2019-in-newman-arena-in-ithaca-ny-/3789/39430");
    -- <!-- Source: https://cornellbigred.com/galleries/womens-volleyball/volleyball-vs-yale-11-08-19/the-cornell-big-red-volleyball-team-competes-against-yale-on-friday-nov-8-2019-in-newman-arena-in-ithaca-ny-/3789/39430 -->

-- image 2 with multiple tags
INSERT INTO image_tags (id, image_id, tag_id) VALUES (4,2, 1);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (5, 2, 2);

INSERT INTO images (id, description, file_ext, image_name, source) VALUES (3, "Volleyball cart ready for practice", 'jpg', "cart", "https://cornellbigred.com/images/2020/2/2/083019_VB_PreSeason_005_crop.jpg?width=1080&height=608&mode=crop&format=jpg&quality=80");
    -- <!-- Source: https://cornellbigred.com/images/2020/2/2/083019_VB_PreSeason_005_crop.jpg?width=1080&height=608&mode=crop&format=jpg&quality=80 -->

INSERT INTO tags (id, tag_name) VALUES (4, 'equiptment');
INSERT INTO image_tags (id, image_id, tag_id) VALUES (6, 3, 4);

INSERT INTO images (id, description, file_ext, image_name, source) VALUES (4, "Cornell's beautiful campus", 'jpg', "campus", "https://pbs.twimg.com/media/EHKfW40XUAEsFB-.jpg");
    -- <!-- Source: https://pbs.twimg.com/media/EHKfW40XUAEsFB-.jpg -->

INSERT INTO image_tags (id, image_id, tag_id) VALUES (7, 4, 3);

INSERT INTO images (id, description, file_ext, image_name, source) VALUES (5, "Libero Lily Barber playing defense during a game!", 'jpg', "barber", "https://cornellbigred.com/galleries/womens-volleyball/volleyball-vs-yale-11-08-19/the-cornell-big-red-volleyball-team-competes-against-yale-on-friday-nov-8-2019-in-newman-arena-in-ithaca-ny-/3789/39476");
     -- <!-- Source: https://cornellbigred.com/galleries/womens-volleyball/volleyball-vs-yale-11-08-19/the-cornell-big-red-volleyball-team-competes-against-yale-on-friday-nov-8-2019-in-newman-arena-in-ithaca-ny-/3789/39476 -->

-- image 3 with multiple tags
INSERT INTO image_tags (id, image_id, tag_id) VALUES (8, 5, 2);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (9, 5, 3);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (10, 4, 1);

INSERT INTO images (id, description, file_ext, image_name, source) VALUES (6, "Meet our new assistant coach, Kris Grunwald!", 'jpg', "grunwald", "https://cornellbigred.com/images/2020/2/25/VB_Kris_Grundwald_8191.jpg?width=1080&height=608&mode=crop&format=jpg&quality=80");
    -- <!-- Source: https://cornellbigred.com/images/2020/2/25/VB_Kris_Grundwald_8191.jpg?width=1080&height=608&mode=crop&format=jpg&quality=80 -->

INSERT INTO tags (id, tag_name) VALUES (5, 'coaches');
INSERT INTO image_tags (id, image_id, tag_id) VALUES (11, 6, 5);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (12, 6, 1);

INSERT INTO images (id, description, file_ext, image_name, source) VALUES (7, "COVID-19 NCAA Update", 'jpg', "covoid19update", "https://cornellbigred.com/images/2020/3/12/ES7078cXQAckNmO.jpg?width=1080&height=608&mode=crop&format=jpg&quality=80");
     -- <!-- Source: https://cornellbigred.com/images/2020/3/12/ES7078cXQAckNmO.jpg?width=1080&height=608&mode=crop&format=jpg&quality=80 -->

INSERT INTO image_tags (id, image_id, tag_id) VALUES (13, 7, 3);

INSERT INTO images (id, description, file_ext, image_name) VALUES (8, 'Whole team dressed up for our halloween practice', 'jpg', "halloween");
    -- <!-- Source: (original work) Casey Justus -->
INSERT INTO image_tags (id, image_id, tag_id) VALUES (14, 8, 1);
INSERT INTO tags (id, tag_name) VALUES (6, 'fun');
INSERT INTO image_tags (id, image_id, tag_id) VALUES (15, 8, 6);

INSERT INTO images (id, description, file_ext, image_name) VALUES (9, 'So happy to see our alumni supporting us at Columbia', 'jpg', "alumni");
   -- <!-- Source: (original work) Casey Justus -->

INSERT INTO tags (id, tag_name) VALUES (7, 'alumni');
INSERT INTO image_tags (id, image_id, tag_id) VALUES (16, 9, 7);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (17, 9, 1);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (18, 9, 2);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (19, 9, 3);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (20, 9, 6);

INSERT INTO images (id, description, file_ext, image_name) VALUES (10, "Team brunch in San Franisco, CA!", 'jpg', "california");
   -- <!-- Source: (original work) Casey Justus -->

INSERT INTO tags (id, tag_name) VALUES (8, 'travel');
INSERT INTO image_tags (id, image_id, tag_id) VALUES (21, 10, 8);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (22, 10, 1);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (23, 10, 2);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (24, 10, 6);

INSERT INTO images (id, description, file_ext, image_name) VALUES (11, 'The team helping out at the local animal shelter. We loved the dogs and cats!', 'jpg', "animalshelter");
   -- <!-- Source: (original work) Casey Justus -->
INSERT INTO image_tags (id, image_id, tag_id) VALUES (25, 11, 1);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (26, 11, 6);
INSERT INTO tags (id, tag_name) VALUES (9, 'outreach');
INSERT INTO image_tags (id, image_id, tag_id) VALUES (27, 11, 9);


COMMIT;
