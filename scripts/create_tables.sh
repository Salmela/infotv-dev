#!/bin/bash

mysql -h localhost -u root -p infotv_dev < ./create_tables.sql
mysql -h localhost -u root -p infotv_dev < ./add_test_data.sql
