# Discoverly - Local Business Directory

A web app where business owners can list their businesses and regular users can find and review them. Built with Laravel for my Server-Side Development CA2.

## What it does

- Register as either a business owner or a regular user
- Business owners can add, edit and delete their own listings
- Regular users can browse businesses, search by name, filter by category and leave reviews
- Users can edit and delete their own reviews
- Each user type gets their own dashboard

## How to run it

1. Clone the repo
2. Run `composer install`
3. Copy `.env.example` to `.env` and run `php artisan key:generate`
4. Run `php artisan migrate`
5. Run `php artisan serve`
6. Go to `http://localhost:8000`

## Built with

- Laravel 13
- PHP 8.5
- SQLite
- Bootstrap 5
- Livewire

## Known issues

- No image upload for businesses
- Users can't change their role after registering