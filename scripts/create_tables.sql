CREATE TABLE infotv_pages (
    id SERIAL PRIMARY KEY,
    title varchar(50) NOT NULL,
    content text NOT NULL,
    modified date
);

CREATE TABLE infotv_themes (
    theme_id SERIAL PRIMARY KEY,
    name char(50) NOT NULL
);

CREATE TABLE infotv_theme_styles (
    style_id SERIAL PRIMARY KEY,
    theme_id SERIAL REFERENCES infotv_theme(theme_id),
    parameter text,
    value text
);

CREATE TABLE infotv_font_families (
    font_family_id SERIAL PRIMARY KEY,
    name char(50) NOT NULL
);

CREATE TABLE infotv_font_faces (
    font_id SERIAL PRIMARY KEY,
    font_family_id SERIAL REFERENCES infotv_font_family(font_family_id),
    name char(50) NOT NULL
);

CREATE TABLE infotv_users (
    user_id SERIAL PRIMARY KEY,
    name varchar(50) NOT NULL,
    password_hash char(16) NOT NULL,
    salt char(16) NOT NULL
);

