CREATE TABLE infotv_pages (
    page_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    modified BIGINT NOT NULL
);

CREATE TABLE infotv_themes (
    theme_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name CHAR(50) NOT NULL
);

CREATE TABLE infotv_theme_styles (
    style_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    -- style_id SERIAL PRIMARY KEY, --
    -- theme_id SERIAL REFERENCES infotv_theme(theme_id), --
    theme_id BIGINT UNSIGNED NOT NULL,
    parameter TEXT NOT NULL,
    value TEXT NOT NULL,
    FOREIGN KEY(theme_id) REFERENCES infotv_themes(theme_id)
);

CREATE TABLE infotv_font_families (
    font_family_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name CHAR(50) NOT NULL
);

CREATE TABLE infotv_font_faces (
    font_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    -- font_id SERIAL PRIMARY KEY, --
    -- font_family_id SERIAL REFERENCES infotv_font_family(font_family_id), --
    font_family_id BIGINT UNSIGNED NOT NULL,
    name CHAR(50) NOT NULL,
    FOREIGN KEY(font_family_id) REFERENCES infotv_font_families(font_family_id)
);

CREATE TABLE infotv_users (
    user_id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    password_hash CHAR(16) NOT NULL,
    salt CHAR(16) NOT NULL
);

