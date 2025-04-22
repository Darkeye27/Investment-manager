# 💰 Investment Management Web Application

A simple web application that allows users to register, log in, and manage their investments including Fixed Deposits, Properties, and Stocks. Users can view summaries, filter investments, and see charts showing how their investments are divided and performing.

## ✨ Features

- ✅ User Registration and Login
- 📁 Add/Edit/Delete investments (Fixed Deposits, Properties, Stocks)
- 🔍 Search and Filter investments
- 📊 Dashboard with:
  - Total value of all investments
  - Total value by investment type
  - Charts and graphs for investment distribution/performance

## 🛠 Tech Stack

- **Backend:** Laravel (PHP)
- **Database:** SQLite
- **Frontend:** Blade Templates / HTML / CSS (or your preferred frontend)
- **Charts:** Chart.js or any other chart library

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/Darkeye27/Investment-manager
cd Investment-manager
```

### 2. Install dependencies
Make sure you have PHP, Composer, and Laravel installed.

```bash   
composer install
```
### 3. Set up environment
Copy the example environment file and generate an app key:

```bash 
cp .env.example .env
php artisan key:generate
```
### 4. Configure database
Open .env and update the database config for SQLite:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

Create the database.sqlite file:

```bash
touch database/database.sqlite
```

### 5. Run migrations

```bash
php artisan migrate
```

### 6. Start the development server

```bash
php artisan serve
```
Open http://localhost:8000 in your browser.


