# Project Overview

This project is a web-based platform that aims to showcase Cambodia’s travel destination using HTML, CSS, JavaScript, PHP, and MYSQL. It is categorized into 4 locations or destinations, including temples, cities, beaches, and forests. Each category will display a mosaic of images with the name of the location. It also included suggested activities and a form to register for the trip.

## Project Demo:

All of the source code can be viewed here: [HERE](https://github.com/CheaRitheavatey/explore)
Download Zip: [HERE](../explore.zip)

---

# Project objective:

The main goal of this project is:
To create a responsive website that showcases Cambodia’s cultural and natural destinations.
To apply concepts learned in class, including:
HTML layout structure
CSS style (for this project, mosaic layouts and CSS animations are being used)
Navigation bar
PHP mysqli and Database (MYSQL) interaction
MVC architecture

---

# Key implementation

This project includes several design components that were taught in class, including

Mosaic gallery layout: using template columns to show different image shapes and sizes altogether on gallery pages, such as Temple, City, Beach, and Forest.

CSS animations: using image hover zoom, animated navigation dropdown, and fade-in effects

Navigation bar: dropdown menu for gallery categories and included active link

PHP form: using mysqli, and connecting to the database by user input name, email, date, and route to submit their interests for the trip. There is a confirmation page when submission is successful, and error handling for when it is not successful.

MYSQL integration: there is a table named ‘booking’ that stores all the booking details that the user inputs with a timestamp.

> ![alt text](<img/diagram/Screenshot%20(168).png>)

MVC Structure: organizes code to improve scalability, and easy to read, understand, and maintain

Additional (self-learn):
JavaScript: to give action to buttons and 3d modeling movement

---

# System Architecture

The project follows an MVC architecture:

## Model

Handle database connection (MYSQL)
Insert booking records

## View

Contains HTML pages such as home, categories, booking form, and success page
Display the front-end content
CSS style

## Controller

Include a booking controller to pass the data to the model layer

---

# Diagram

Below are the wireframes and the brainstorming before actually doing the HTML and CSS

Home page

> ![alt text](<img/diagram/brainstorm (1).png>)

Gallery page (temple, forest, city, beach)

> ![alt text](<img/diagram/brainstorm (2).png>)

About page

> ![alt text](<img/diagram/brainstorm (3).png>)

PHP form submission

> ![alt text](<img/diagram/brainstorm (4).png>)

For navigation bar

> ![alt text](<img/diagram/brainstorm (5).png>)

For the main file (index.html)

> ![alt text](<img/diagram/brainstorm (6).png>)

For categories file (forest, beach, temple, city)

> ![alt text](<img/diagram/brainstorm (7).png>)

> ![alt text](<img/diagram/brainstorm (8).png>)
> For the form submission page
> ![alt text](<img/diagram/brainstorm (12).png>)

For the about page

> ![alt text](<img/diagram/brainstorm (9).png>)

> ![alt text](<img/diagram/brainstorm (11).png>)

> ![alt text](<img/diagram/brainstorm (10).png>)

---

# Project structure

```
Explore
 ├── Controller
 │    └── Bookingcontroller
 ├── Model
 │    ├── Booking
 │    └── Database
 │    └── Connection
 ├── Public
 │    ├── Css
 │    │    └── Style.css
 │    └── Js
 │         └── script.js
 └── View
      ├── Category
      │    ├── City
      │    ├── Temple
      │    ├── Forest
      │    └── Beach
      ├── booking
            ├── success
            ├── form
            └── index.php
      ├── Index.html
      └── About.html
```

---

# Future improvement:

For future improvement, this project can implement an admin dashboard where the admin can log in and view all the bookings made from the website. And integrate with Google Maps to show exactly each place as the user clicks on the images.

---

# Conclusion

The project aims to show Cambodia’s travel destination while combining a mixture of design components and architectural concepts learned in class, including HTML structuring, CSS animations, PHP forms, MYSQL interaction, and MVC.

---

# Reference

For self learning (JavaScript, 3d modeling)
https://www.w3schools.com/js/
https://sketchfab.com/search?type=models

This project uses several images sourced from TikTok creators for educational purposes only.
All images remain the property of their respective content owners.

Each image includes a reference link to the original TikTok post.
The images are used solely as part of a school project to demonstrate web development (PHP, MySQL, HTML, CSS, and JavaScript).

Below are all the links to the sources of the images that were used on this website.

---

## Beach category:

[https://vt.tiktok.com/ZSySjRoET](https://vt.tiktok.com/ZSySjRoET)
[https://vt.tiktok.com/ZSySjBdoA/](https://vt.tiktok.com/ZSySjBdoA/)
[https://vt.tiktok.com/ZSySjuPub](https://vt.tiktok.com/ZSySjuPub)
[https://vt.tiktok.com/ZSySjwsX8](https://vt.tiktok.com/ZSySjwsX8)
[https://vt.tiktok.com/ZSySjo6fC](https://vt.tiktok.com/ZSySjo6fC)
[https://vt.tiktok.com/ZSyS6Y3NC](https://vt.tiktok.com/ZSyS6Y3NC)
[https://vt.tiktok.com/ZSyS6ftLj](https://vt.tiktok.com/ZSyS6ftLj)
[https://vt.tiktok.com/ZSy99HPtK](https://vt.tiktok.com/ZSy99HPtK)
[https://vt.tiktok.com/ZSy9935cg](https://vt.tiktok.com/ZSy9935cg)
[https://vt.tiktok.com/ZSy9xJSnJ](https://vt.tiktok.com/ZSy9xJSnJ)
[https://vt.tiktok.com/ZSy9xodB3](https://vt.tiktok.com/ZSy9xodB3)
[https://vt.tiktok.com/ZSy4kYY9P](https://vt.tiktok.com/ZSy4kYY9P)
[https://vt.tiktok.com/ZSf8xQPTP](https://vt.tiktok.com/ZSf8xQPTP)
[https://vt.tiktok.com/ZSf8xTGuV](https://vt.tiktok.com/ZSf8xTGuV)
[https://vt.tiktok.com/ZSf8x3Qv6](https://vt.tiktok.com/ZSf8x3Qv6)
[https://vt.tiktok.com/ZSf8xv781](https://vt.tiktok.com/ZSf8xv781)

---

## City category

[https://vt.tiktok.com/ZSy4kVDr5](https://vt.tiktok.com/ZSy4kVDr5)
[https://vt.tiktok.com/ZSy4kCy46](https://vt.tiktok.com/ZSy4kCy46)
[https://vt.tiktok.com/ZSy4k4pax](https://vt.tiktok.com/ZSy4k4pax)
[https://vt.tiktok.com/ZSy4kBKjD](https://vt.tiktok.com/ZSy4kBKjD)
[https://vt.tiktok.com/ZSy4BFt9w](https://vt.tiktok.com/ZSy4BFt9w)
[https://vt.tiktok.com/ZSy4BdupB](https://vt.tiktok.com/ZSy4BdupB)
[https://vt.tiktok.com/ZSy4k7GFe](https://vt.tiktok.com/ZSy4k7GFe)
[https://vt.tiktok.com/ZSy4kvRg1](https://vt.tiktok.com/ZSy4kvRg1)
[https://vt.tiktok.com/ZSy4B1fNY](https://vt.tiktok.com/ZSy4B1fNY)
[https://vt.tiktok.com/ZSyKjHcM5](https://vt.tiktok.com/ZSyKjHcM5)
[https://vt.tiktok.com/ZSyKju64V](https://vt.tiktok.com/ZSyKju64V)
[https://vt.tiktok.com/ZSf8QAP2c](https://vt.tiktok.com/ZSf8QAP2c)
[https://vt.tiktok.com/ZSf8Qsweu](https://vt.tiktok.com/ZSf8Qsweu)
[https://vt.tiktok.com/ZSf8Q56d3](https://vt.tiktok.com/ZSf8Q56d3)
[https://vt.tiktok.com/ZSf8X8y11](https://vt.tiktok.com/ZSf8X8y11)
[https://vt.tiktok.com/ZSfMTGNaF](https://vt.tiktok.com/ZSfMTGNaF)

---

## Temple category

[https://vt.tiktok.com/ZSypC4LMR](https://vt.tiktok.com/ZSypC4LMR)
[https://vt.tiktok.com/ZSypCAYR7](https://vt.tiktok.com/ZSypCAYR7)
[https://vt.tiktok.com/ZSypXRe6y](https://vt.tiktok.com/ZSypXRe6y)
[https://vt.tiktok.com/ZSypCsJ7q](https://vt.tiktok.com/ZSypCsJ7q)
[https://vt.tiktok.com/ZSypXFw3x](https://vt.tiktok.com/ZSypXFw3x)
[https://vt.tiktok.com/ZSypCoA7U](https://vt.tiktok.com/ZSypCoA7U)
[https://vt.tiktok.com/ZSypXY8sR](https://vt.tiktok.com/ZSypXY8sR)
[https://vt.tiktok.com/ZSyp465MC](https://vt.tiktok.com/ZSyp465MC)
[https://vt.tiktok.com/ZSyp4NKYE](https://vt.tiktok.com/ZSyp4NKYE)
[https://vt.tiktok.com/ZSyp4aQDr](https://vt.tiktok.com/ZSyp4aQDr)
[https://vt.tiktok.com/ZSyp4MuVM](https://vt.tiktok.com/ZSyp4MuVM)
[https://vt.tiktok.com/ZSf8CCWP5](https://vt.tiktok.com/ZSf8CCWP5)
[https://vt.tiktok.com/ZSfMTMPnC](https://vt.tiktok.com/ZSfMTMPnC)

---

## Forest category

[https://vt.tiktok.com/ZSyo3s6cr](https://vt.tiktok.com/ZSyo3s6cr)
[https://vt.tiktok.com/ZSyo3GTh6](https://vt.tiktok.com/ZSyo3GTh6)
[https://vt.tiktok.com/ZSyo3A32P](https://vt.tiktok.com/ZSyo3A32P)
[https://vt.tiktok.com/ZSyo3H8KF](https://vt.tiktok.com/ZSyo3H8KF)
[https://vt.tiktok.com/ZSyo3cXGN](https://vt.tiktok.com/ZSyo3cXGN)
[https://vt.tiktok.com/ZSyo33bMf](https://vt.tiktok.com/ZSyo33bMf)
[https://vt.tiktok.com/ZSyo3WooP](https://vt.tiktok.com/ZSyo3WooP)
[https://vt.tiktok.com/ZSf8Cw1eb](https://vt.tiktok.com/ZSf8Cw1eb)
[https://vt.tiktok.com/ZSf8XF2gP](https://vt.tiktok.com/ZSf8XF2gP)
[https://vt.tiktok.com/ZSf8Xxaht](https://vt.tiktok.com/ZSf8Xxaht)
[https://vt.tiktok.com/ZSfMT4xqf](https://vt.tiktok.com/ZSfMT4xqf)

---
