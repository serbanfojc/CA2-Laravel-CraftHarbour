# CraftHarbour
### Local Artisan & Maker Discovery Platform
**SD2A — Serban Moldovan, Luke McGloin, Gerard McGreevy**

---

## What is this project?

CraftHarbour is a Laravel web application we built for our CA2 Serverside Development module. The idea came from noticing that a lot of local craftspeople in Ireland have no real online presence. They rely on Instagram or word of mouth to get customers. We wanted to build something that gives them a proper space to show off their work and lets people in the area find and review them.

The app lets artisans create a profile listing for their craft, upload photos, and add workshop events. Regular users can browse artisans, filter by category, leave reviews, and save their favourite makers.

---

## How to set it up

1. Clone the repo
```bash
   git clone https://github.com/serbanfojc/CA2-Laravel-Discoverly
   cd CA2-Laravel-Discoverly
```

2. Install dependencies
```bash
   composer install
   npm install
```

3. Copy the env file and generate a key
```bash
   cp .env.example .env
   php artisan key:generate
```

4. Set up your database in `.env`

5. Run migrations and seed the database
```bash
   php artisan migrate --seed
```

6. Create the storage link for image uploads
```bash
   php artisan storage:link
```

7. Start the server
```bash
   php artisan serve
```

8. Visit `http://localhost:8000`

---

## Test accounts

| Email | Password | Role |
|-------|----------|------|
| admin@craftharbour.ie | password | Admin |
| niamh@craftharbour.ie | password | Artisan |
| ciaran@craftharbour.ie | password | Member |

---

## Features

- User registration and login with Google OAuth support
- Four user roles — guest, member, artisan, admin
- Full CRUD for artisan listings
- Full CRUD for reviews with automatic average rating update
- Full CRUD for workshop events
- Portfolio image upload using Laravel file storage
- Search artisans by name or keyword
- Filter by craft category
- Pagination on artisan listings
- Artisan of the week — highest rated artisan featured on home page
- Saved artisans / bookmarks for members
- Admin panel — approve listings, delete reviews, manage user roles
- Responsive layout using Bootstrap 5
- Database seeders with 15 artisans, 28 workshops and 28 reviews

---

## Known limitations

- Images are stored locally, not on a cloud service
- Google login requires SSL certificate setup on Windows localhost
- No real payment processing for workshops
- No email notifications
- Facebook login was removed as we only had Google API credentials

---

## Tech stack

- PHP 8.5 / Laravel 13
- SQLite database
- Bootstrap 5
- Livewire / Flux for auth
- Laravel Socialite for Google login