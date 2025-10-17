# Gestion Stock

A stock management system built with Symfony 7.3.

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- MySQL 8.0+ or PostgreSQL 16+ 
- Node.js (for asset management)
- Docker & Docker Compose (optional, for containerized setup)

## 🚀 Quick Start

### Option 1: Local Development Setup

#### 1. Clone the repository
```bash
git clone https://github.com/ylm-py/gestion-stock.git
cd gestion-stock
```

#### 2. Install PHP dependencies
```bash
composer install
```

#### 3. Configure environment variables
Copy the environment file and update the database configuration:
```bash
cp .env .env.local
```

Edit `.env.local` and configure your database connection:
```env
# For MySQL
DATABASE_URL="mysql://username:password@127.0.0.1:3306/gestion_stock_db?serverVersion=8.0.32&charset=utf8mb4"

# For PostgreSQL  
DATABASE_URL="postgresql://username:password@127.0.0.1:5432/gestion_stock_db?serverVersion=16&charset=utf8"

# Generate a secret key
APP_SECRET=your-secret-key-here
```

#### 4. Create the database
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

#### 5. Install frontend assets
```bash
php bin/console importmap:install
```

#### 6. Start the development server
```bash
symfony server:start
# or
php -S localhost:8000 -t public/
```

Your application will be available at `http://localhost:8000`

### Option 2: Docker Setup

#### 1. Clone the repository
```bash
git clone https://github.com/ylm-py/gestion-stock.git
cd gestion-stock
```

#### 2. Start with Docker Compose
```bash
docker-compose up -d
```

#### 3. Install dependencies inside the container
```bash
docker-compose exec app composer install
```

#### 4. Run database migrations
```bash
docker-compose exec app php bin/console doctrine:database:create
docker-compose exec app php bin/console doctrine:migrations:migrate
```

## 🛠️ Development Commands

### Database Management
```bash
# Create database
php bin/console doctrine:database:create

# Run migrations
php bin/console doctrine:migrations:migrate

# Generate migration
php bin/console make:migration

# Load fixtures (if available)
php bin/console doctrine:fixtures:load
```

### Cache Management
```bash
# Clear cache
php bin/console cache:clear

# Warm up cache
php bin/console cache:warmup
```

### Asset Management
```bash
# Install assets
php bin/console importmap:install

# Update assets
php bin/console importmap:update
```

### Code Generation
```bash
# Generate controller
php bin/console make:controller

# Generate entity
php bin/console make:entity

# Generate form
php bin/console make:form

# Generate CRUD
php bin/console make:crud
```

## 🧪 Testing

Run the test suite:
```bash
# Run all tests
php bin/phpunit

# Run tests with coverage
php bin/phpunit --coverage-html coverage/
```

## 📁 Project Structure

```
gestion-stock/
├── assets/              # Frontend assets (CSS, JS)
├── bin/                 # Executable files
├── config/              # Configuration files
├── migrations/          # Database migrations
├── public/              # Web server document root
├── src/                 # PHP source code
│   ├── Controller/      # Controllers
│   ├── Entity/          # Doctrine entities
│   └── Repository/      # Data repositories
├── templates/           # Twig templates
├── tests/               # Test files
├── translations/        # Translation files
└── var/                 # Generated files (cache, logs)
```

## 🔧 Configuration

### Database Configuration
Update your `.env.local` file with your database credentials:

**MySQL:**
```env
DATABASE_URL="mysql://user:password@127.0.0.1:3306/gestion_stock?serverVersion=8.0.32&charset=utf8mb4"
```

**PostgreSQL:**
```env
DATABASE_URL="postgresql://user:password@127.0.0.1:5432/gestion_stock?serverVersion=16&charset=utf8"
```

### Environment Variables
Key environment variables to configure:

- `APP_ENV`: Application environment (dev, prod, test)
- `APP_SECRET`: Secret key for security features
- `DATABASE_URL`: Database connection string
- `MAILER_DSN`: Email configuration
- `MESSENGER_TRANSPORT_DSN`: Message queue transport

## 📚 Additional Resources

- [Symfony Documentation](https://symfony.com/doc/current/index.html)
- [Doctrine ORM Documentation](https://www.doctrine-project.org/projects/orm.html)
- [Twig Documentation](https://twig.symfony.com/doc/)

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is proprietary software.

## 🐛 Issues

If you encounter any issues, please check the following:

1. Ensure all requirements are met
2. Check that environment variables are properly configured
3. Verify database connectivity
4. Clear cache: `php bin/console cache:clear`

For additional support, please open an issue in the repository.
