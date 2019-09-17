# Full-stack-web-application
# Travel-Experts
Project Overview:

workshop 1 Build an HTML page that will be the entry page for your travel website. There should be some information about the agency, a menu that provides links to other pages, and any other features that you would like to include that will make your site look professional.

Your menu should provide links to other pages which you will also construct. While you are encouraged to add more features as time permits, the basic requirements are:

A Main page that will welcome the customer to the site and provide links and menus to the other pages.
index.php
A “Contact Us” page that has information about how to phone, email, or go to the agency.
contact.php
A “Vacation Package” page listing all vacation packages available.
packages.php
A “Customer Registration” page
register.php
registerform-js.php
workshop 2 sql file:

travelexperts.sql
A MySQL import script has been provided to set up a pre-built database for you to use. You are free to make any adjustments to the database that your application requires. You will need to use the following tables to enhance the web pages you developed earlier:

Packages
Products
Packages_products
Agencies
Agents
Customers
Bookings
To install the database, use the MySQL import function and select the TravelExperts.sql file that has been provided for you. This script will generate the entire database including test data so you can focus on programming and not on DBA tasks during this module.

Assumptions:

Customers make a booking for only one package per booking
When a package is set up the price is never changed
Required scripts:

Modify the web page that lists the packages available.
Package get data from MYSQL

Re-design the contact page so that it is generated from the database and lists all the agencies, showing the agency address and phone number, followed by the contact information for each agent at that agency. Agency information from MYSQL

When the package list is being generated, create an order button next to each package which will go to an order page that has a customer order form for that package. Customers will enter their data and submit the order which will result in creation of a customer record and a booking record. We know this is overly simplified, but at this point we are demonstrating that we can capture remote orders into the database to demonstrate the concept to the Travel Experts managers. order table

If your team has 4 members, design an additional feature that you feel would be useful for the site.
