# SkiSite

<h2> What is the project? </h2>

The project in question is a web application for a ski resort that manages information about slopes and chairlifts.

1️⃣ The first part of the project concerns the database, which is made up of several domains: stations, slopes and chairlifts. Each station is identified by a name and a unique identifier, and can have several associated slopes and chairlifts. Tracks have information such as their name, difficulty level, opening and closing times, and a closing message. The chairlifts have similar information, but do not have a level of difficulty.

2️⃣ The second part of the project consists of web pages that users can access by logging into the system. The home page displays general station information, while the registration page allows new users to create an account. The login page allows existing users to log into their account. The account page allows users to edit their personal information, such as name and password. Pages for adding a trail or chairlift are used to add new data to the database.

3️⃣ In summary, this project is a web application for a ski resort that allows to manage information related to slopes and chairlifts. It includes a database with information on stations, slopes and chairlifts, as well as web pages for users to access this information. The login and registration system allows users to access their account and modify their personal information. Pages for adding a trail or chairlift are used to add new data to the database.



<h2> Project setup </h2>


__Clone the project__


```
composer install
```

```
php bin/console doctrine:database:create
```

```
php bin/console doctrine:migrations:migrate
```

## Content of the project

🎩 Domains (contains all Stations)
<br>
📚 Stations (``id``, ``name``, ``roles``, ``password``)
<br>
🎿 Piste in Stations (``id``, ``name``, ``open_hour``, ``close_hour``, ``fermeture``, ``fermeture_message``, ``difficulty``, ``station_id``)
<br>
⛺ Télésiege in Station (``id``, ``name``, ``open_hour``, ``close_hour``, ``fermeture``, ``fermeture_message``, ``station_id``)
<br>
⛔ Login / Register System


## Page of the Project

🚪 Home Page | http://localhost:8000/home 
<br>
🔒 Register Page | http://localhost:8000/register
<br>
🔐 Login Page | http://localhost:8000/login
<br>
📂 Account Page | http://localhost:8000/account
<br>
🎿 Form Piste Page | http://localhost:8000/piste/add
<br>
⛄ Form Telesiege Page | http://localhost:8000/telesiege/add
