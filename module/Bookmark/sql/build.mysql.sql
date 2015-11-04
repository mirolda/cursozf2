CREATE SCHEMA zf2 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
CREATE TABLE bookmarks (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  url varchar(255) NOT NULL,
  title varchar(255) NOT NULL,
  description text NOT NULL,
  creationAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  modifiedAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY url_UNIQUE (url)
) DEFAULT CHARSET=utf8;

INSERT INTO zf2.bookmarks
(id, url, title, description, creationAt, modifiedAt) VALUES
(1, 'www.google.es', 'Google', 'Google', '18/08/2015 08:23:24', '18/08/2015 08:23:24'),
(2, 'www.amazon.es', 'Amazon', 'Compras', '18/08/2015 08:23:24', '18/08/2015 08:23:24'),
(3, 'www.cadenaser.com', 'CadenaSer', 'Radio', '18/08/2015 08:23:24', '18/08/2015 08:23:24'),
(4, 'www.wikipedia.org', 'Wikipedia', 'Wiki', '18/08/2015 08:23:24', '18/08/2015 08:23:24');