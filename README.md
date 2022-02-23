#How to Install
git clone https://github.com/OmarSobhi369/WaseeTech.git
Install the composer dependencies

composer install
Save .env.example as .env and put your database credentials

Set application key

php artisan key:generate        
And Migrate with

php artisan migrate

Install node dependencies

npm install

Run watcher

npm run watch
