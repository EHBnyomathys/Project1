# Boekenclub Anderlecht - Laravel Webapplicatie

Dit is een webapplicatie voor een fictieve lokale boekenclub in Anderlecht.
Gebruikers kunnen zich registreren, nieuwsberichten bekijken, vragen stellen via de FAQ en contact opnemen met de beheerders.

## Functionaliteiten

Deze webapplicatie bevat alle minimumvereisten die zijn beschreven in de opdracht.
Daarnaast zijn er enkele extra functionaliteiten toegevoegd om een hogere score te behalen:
- Zoekfunctie bij het gebruikersoverzicht
- Privéberichten-systeem
- Ingelogde gebruikers kunnen commentaar achterlaten op nieuwsberichten
- Administrators kunnen reageren op contactformulieren

## Vereisten

Om dit project lokaal te draaien, heb je de volgende tools nodig:
- XAMPP (Apache & MySQL)
- PHP ≥ 8.1
- Composer
- Node.js & NPM

## Installatieinstructies

### 1. Repository klonen
- `git clone https://github.com/EHBnyomathys/Project1.git`
- `cd Project1`

### 2. Pakketten installeren
- `composer install`
- `npm install`

### 3. .env instellen
- Kopieer het configuratiebestand:
  ```bash
  cp .env.example .env
  ```
- Open `.env` en stel de volgende waarden in:
  ```
  APP_NAME=Laravel
  APP_URL=http://localhost
  
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=project1
  DB_USERNAME=root
  DB_PASSWORD=
  ```
- Genereer een applicatiesleutel:
  ```bash
  php artisan key:generate
  ```

### 4. Database aanmaken
- Open phpMyAdmin op `http://localhost/phpmyadmin`
- Maak een nieuwe database genaamd `project1`
- Migreer de database en voer de seeders uit:
  ```bash
  php artisan migrate:fresh --seed
  ```

### 5. Symbolische link voor opslag maken
- Zorg ervoor dat opslaglinks correct zijn ingesteld:
  ```bash
  php artisan storage:link
  ```

### 6. Applicatie starten
- Start de ontwikkelserver:
  ```bash
  npm run dev
  ```
- Open een nieuw terminalvenster en start Laravel:
  ```bash
  php artisan serve
  ```
- Bezoek de applicatie op:
  `http://127.0.0.1:8000`

## Testaccounts

Extra accounts kunnen altijd worden aangemaakt.

**Admin account:**
- Email: admin@ehb.be
- Password: Password!321

**User account:**
- Email: user@ehb.be
- Password: Password!321

## Bronvermelding

- https://canvas.ehb.be/courses/40595
- https://laravel.com/docs/11.x/starter-kits
- ChatGPT gebruikt om pagina's snel en efficiënt te stijlen (Ik dat de chat wat anders is als bij mij. Bij mij gaf chatGPT steeds een mooiere versie terug die ik dan steeds kopiëerde en plakte): https://chatgpt.com/share/67740b02-b66c-8006-bf8c-d0ff4449a5ae

## Auteur

- Nyo Mathys
Gemaakt voor de opdracht Project1 - Laravel voor het vak Backend Web TI2.