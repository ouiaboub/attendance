This is a comprehensive `README.md` template for a Laravel project. It includes specific instructions for configuring **MySQL**, migrating the schema, and seeding the database to ensure a smooth setup for other developers.

---

## 🚀 Getting Started

Follow these steps to get the project running on your local machine.

### Prerequisites

* **PHP** (>= 8.2 recommended)
* **Composer**
* **MySQL**
* **Node.js & NPM** (for frontend assets)

### Installation

1. **Clone the repository**
```bash
git clone https://github.com/ouiaboub/attendance.git
cd attendance

```


2. **Install dependencies**
```bash
composer install
npm install && npm run build

```


3. **Environment Configuration**
Copy the example environment file:
```bash
cp .env.example .env

```


4. **Generate Application Key**
```bash
php artisan key:generate

```



---

## 🗄️ Database Setup (MySQL)

By default, Laravel may be configured for SQLite. You must update your `.env` file to use **MySQL**.

1. **Create a database** in your MySQL instance (e.g., via Terminal or phpMyAdmin):
```sql
CREATE DATABASE your_database_name;

```


2. **Configure `.env**`
Ensure the following variables are set correctly to match your MySQL credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=your_password

```


3. **Run Migrations and Seed the Database**
This project requires initial data (admin users, settings, etc.) to function correctly. **Ensure you run the seeder** using the following command:
```bash
php artisan migrate --seed

```


*Note: This command creates the table structure and populates it with dummy/essential data.*

---

## 🛠️ Usage

Once the database is migrated and seeded, start the local development server:

```bash
composer run dev

```

The application will be available at `http://localhost:8000`.

* **Default Admin Credentials:** (If applicable, mention them here or refer to the `DatabaseSeeder.php` file).

---
