# POS database plan

This is the initial data plan for the POS Customer Accounts and User Accounts tables. The application is not connected to these tables yet.

## Customer Accounts

Table: `pos_customer_accounts`

Primary key: `customer_account_id`

The table stores customer identity and contact information. `customer_code` and `email` are unique so the same account is not accidentally registered twice.

## User Accounts

Table: `pos_user_accounts`

Primary key: `user_account_id`

The table stores staff login accounts. `username` and `email` are unique. Passwords should be saved as hashes in `password_hash`, never as plain text.

The accompanying `POS_DATABASE_PLAN.sql` file contains the table definitions and five sample records for each table.
