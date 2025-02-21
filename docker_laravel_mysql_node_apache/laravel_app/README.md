# Docker and Application Setup Commands

## Docker Commands

### View Running Containers
```bash
docker ps -a
```

### Access Container Shell
```bash
docker exec -it <container-name> bash
```

## Backend Setup (Laravel)

### Fix Permissions
```bash
chmod -R 777 /var/www/html
```

### Laravel Installation and Setup
```bash
# Install composer dependencies
composer install

# Generate encryption key
php artisan key:generate

# Run database migrations
php artisan migrate
```

### InertiaJS Backend Setup
```bash
# Install Inertia Laravel package
composer require inertiaJS/inertia-laravel

# Add Inertia middleware
php artisan inertia:middleware
```

## Frontend Setup (Vue + InertiaJS)
```bash
# Install Vue.js
npm install vue@latest

# Install Inertia Vue 3 adapter
npm install @inertiajs/vue3

# Install Vite Vue plugin
npm install @vitejs/plugin-vue
```
