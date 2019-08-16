-- GET ALL GENRES FILM
SELECT genre.name AS genres 
FROM films 
INNER JOIN genre_assoc ON films.id = genre_assoc.films_id 
INNER JOIN genre ON genre_assoc.genre_id = genre.id 
WHERE films.id = 1;

-- GET ACTORS FILMS 
SELECT play.personnage, people.prenom, people.nom 
FROM films
INNER JOIN play ON films.id = play.films_id 
INNER JOIN  people ON play.people_id = people.id
WHERE films.id = 1;

-- GET FILM WITH DIRECTOR
SELECT people.prenom AS director_pre, people.nom AS director_nom, films.titre, films.synopsis, films.date_sortie, films.id
FROM films
INNER JOIN people ON films.realisateur_id = people.id;

-- GET FILM WHISHLIST
SELECT people.prenom AS director_pre, people.nom AS director_nom, films.titre, films.synopsis, films.date_sortie, films.id
FROM user 
INNER JOIN whilist ON user.id = whishlist.user_id
INNER JOIN films ON whishlist.films_id = films.id
INNER JOIN people ON films.realisateur_id = people.id
WHERE user.id = 1;

