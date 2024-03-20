# Admin Panel

## System Requirements

- Composer
- npm
- PHP >= 8.3.
- BCMath PHP Extension.
- Ctype PHP Extension.
- cURL PHP Extension.

## How to Setup

 1. Clone the repository

> git clone https://github.com/animfahmy/admin-panel.git admin-panel
 2. Goto directory `admin-panel`
 > cd c:\wamp64\www\admin-panel\
 3. Run composer install
 > composer install
 4. Run npm install
 > npm install
 5. Run npm run build
 > npm run build
 6. Create database admin-panel like in .env
 > DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin-panel
DB_USERNAME=root
DB_PASSWORD=
 7. Run php artisan migrate
 > php artisan migrate
 8. Run php artisan db:seed
 > php artisan db:seed 
 9. Run php artisan serve
 > php artisan serve
 10. Login account
> Email: test@example.com
> Password: password
## Documentation
- To add flight, click menu Flight on navigation section. Click button Create, and fill the information. Click Create.
- To update flight, on page Flight, click Edit link in the table. Fill the information and click Update.
- To delete flight, on page Flight, click Delete link in the table. Click Yes when confirmation message shown and flight data will be deleted.