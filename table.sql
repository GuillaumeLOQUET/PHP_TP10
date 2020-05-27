CREATE TABLE utilisateur(
                            id int PRIMARY KEY,
                            login text,
                            password text,
                            mail text,
                            nom text,
                            prenom text
);

CREATE TABLE etudiant(
                         id int PRIMARY KEY,
                         user_id text,
                         nom text,
                         prenom text,
                         note text
);