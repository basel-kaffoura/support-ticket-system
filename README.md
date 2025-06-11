# Support Ticket System - STS (Laravel 12)
- A multi-department support ticket system
- Anyone can send support tickets based on the type
- System automatically routes each ticket to the appropriate MySQL database for that department
____________________________________________________________________
## Tech Stack
- Laravel 12
- PHP 8.2+
- MySQL (with multiple database connections)
- Customized Laravel Breeze (for admin authentication)
- Bootstrap 5
____________________________________________________________________
## Requirements
- PHP 8.1 or later
- Composer
- Node.js + npm
- MySQL
____________________________________________________________________
## Installation
Clone the project
```
git clone https://github.com/basel-kaffoura/support-ticket-system.git
cd support-ticket-system
```
____________________________________________________________________
## Install dependencies
```
composer install
npm install && npm run build
```
____________________________________________________________________
## Set up environment
Copy .env.example to .env
```
cp .env.example .env
```
____________________________________________________________________
## Create those six databases in your local
- `sts_db` : The main database
- `sts_technical_db` : For technical department
- `sts_billing_db` : For billing department
- `sts_product_db` : For product department
- `sts_general_db` : For general department
- `sts_feedback_db` : For feedback department
____________________________________________________________________
## Migrate main database
```
php artisan migrate
php artisan db:seed
```
____________________________________________________________________
## Admin Login Credentials
- Email : `basel@admin.com`
- Password : `admin12345`
____________________________________________________________________
## Run the local development server
```
php artisan serve
```
Access the app at `http://localhost:8000`
____________________________________________________________________
## Supported Ticket Types & Databases
Each ticket type is stored in a separate MySQL database:

|  Ticket Type           |  Connection Name |  Database Name       |
|--------------------------|--------------------|-------------------------|
| Technical Issues         | `technical`        | `sts_technical_db`      |
| Account & Billing        | `billing`          | `sts_billing_db`        |
| Product & Service        | `product`          | `sts_product_db`        |
| General Inquiry          | `inquiry`          | `sts_general_db`        |
| Feedback & Suggestions   | `feedback`         | `sts_feedback_db`       |

____________________________________________________________________
## Testing
Run send ticket test:
```
php artisan test
```
or
```
php artisan test --filter=SendTicketTest
```
____________________________________________________________________
## Routes
- `/` or `/tickets/create` : Send a support ticket
- `/login` : Admin login page
- `/dashboard` : Admin dashboard with ticket list
- `/tickets/{connection}/{id}` : View the ticket details by admin
____________________________________________________________________
## Notes
- Each department has its own tickets table in its own database
- Edit .env file if your six local databases have different names
- Only admin login is available. No public registration
- Ticket ID: ticket_number is used as the unique identifier across all databases
____________________________________________________________________
## Get In Touch

- **Email : baselkaffoura@gmail.com**

- **Phone : +971503898795**

- **<a href="https://basel-kaffoura-portfolio.vercel.app">Visit My Portfolio</a>**
