CREATE TABLE infotv_pages (
    page_id SERIAL PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    modified BIGINT NOT NULL
);

CREATE TABLE infotv_themes (
    theme_id SERIAL PRIMARY KEY,
    name CHAR(50) NOT NULL
);

CREATE TABLE infotv_theme_styles (
    style_id SERIAL PRIMARY KEY,
    theme_id SERIAL REFERENCES infotv_themes(theme_id),
    parameter TEXT NOT NULL,
    value TEXT NOT NULL
);

CREATE TABLE infotv_font_families (
    font_family_id SERIAL PRIMARY KEY,
    name CHAR(50) NOT NULL
);

CREATE TABLE infotv_font_faces (
    font_id SERIAL PRIMARY KEY,
    font_family_id SERIAL REFERENCES infotv_font_families(font_family_id),
    font_family_id BIGINT UNSIGNED NOT NULL,
    name CHAR(50) NOT NULL
);

CREATE TABLE infotv_users (
    user_id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    password_hash CHAR(16) NOT NULL,
    salt CHAR(16) NOT NULL
);

