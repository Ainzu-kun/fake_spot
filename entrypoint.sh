#!/bin/bash

# Tunggu database siap (opsional, bisa pakai sleep atau healthcheck)

# Jalankan migrasi
# php artisan migrate:fresh --force

# Jalankan seeder (opsional)
# php artisan db:seed --force || echo "Seeder error, lanjut ke Apache..."
php artisan db:seed MataKuliahSeeder --force

# Start apache
exec apache2-foreground
