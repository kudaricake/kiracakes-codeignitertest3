-- Run this once in the pos_database database.
ALTER TABLE users ADD COLUMN avatar VARCHAR(255) NULL AFTER full_name;
