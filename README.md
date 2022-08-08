## Welcome To Prince Ferozepuria

### ``` VERSION CHECK ```
```bash
composer -v
php artisan
vue --version 
node -v
npm -v
php -v
apache2 -v
mysql -V
git --version
hostnamectl
```

### ```ARTISAN OPTIMIZATION```  
```bash
php artisan config:clear  #resolve query error if we submit data on database
php artisan cache:clear 
php artisan route:clear  
php artisan route:cache   #The POST method is not supported for this route Fix Error
php artisan view:clear 
php artisan optimize:clear 
composer dump-autoload    #For no such file or directory then use
composer du     #shorthand
composer update 
```

### ```ARTISAN MODEL CONTROLLER MIGRATIONS```
```bash
php artisan make:model Lorem -mc
php artisan make:model -mc Lorem
php artisan make:model Lorem -m  #Create migration and model 
```

### ```ARTISAN ROUTES```
```bash
php artisan route:list 
php artisan route:clear 
php artisan route:cache #The POST method is not supported for this route fix error
```

### ```ARTISAN MODEL```
```bash
php artisan make:model Lorem 
```

### ```ARTISAN MIGRATION```
```bash
php artisan migrate:refresh --path=/database/migrations/filename.php
php artisan make:migration create_my_name_table 
php artisan make:migration add_parent_id_column_to_events_table  
php artisan migrate
php artisan migrate fresh
php artisan migrate refresh
php artisan migrate refresh --force
```


### ```ARTISAN SEEDERS```
```bash
php artisan make:seeder UserSeeder
php artisan db:seed
php artisan db:seed --class=UserSeeder #run specific seeder
php artisan migrate:fresh --seed   
```

### ```ARTISAN CONTROLLERS```
```bash
php artisan make:controller LoremController
php artisan make:controller Api/User/LoremController
php artisan make:controller Api/Admin/LoremController
php artisan make:controller LoremController --invokable
php artisan make:model Lorem -m -r  #Resource Controller
  
```


### ```ARTISAN MIDDLEWARE```
```bash
php artisan make:middleware Lorem
```

### ```ARTISAN COMMANDS```
```bash
php artisan make:command LoremCommand
```

### ```ARTISAN REQUEST```
```bash
php artisan make:request LoremRequest #request for validation
```

### ```ARTISAN JOBS```
```bash
php artisan make:job ProcessPodcast
composer require laravel/horizon
php artisan horizon:install
sudo apt update
sudo apt install redis-server
.env QUEUE_CONNECTION=redis
sudo apt-get install php-redis

redis-cli flushall
php artisan horizon

```

### ```ARTISAN STORAGE```
```bash
php artisan storage:link
sudo chmod -R gu+w storage 
sudo chmod -R guo+w storage
php artisan cache:clear

sudo chmod -R 777 PictureUploads 
sudo chmod -R 777 storage/ 

```

### ```ARTISAN MODULE```
```bash
php artisan module:seed --class=LoremTableSeeder ModuleName
php artisan module:make-model LoremModel ModuleName  
php artisan module:migrate ModuleName

```


### ```NPM```
```bash
npm run watch
npm run dev
npm run prod
npm run hot
npm install

rm -rf node_modules/ #Warning:- don't add space if / root path then otherwise system will crash)
rm package-lock.json
npm install sass@1.32.12
npm install -D babel-loader @babel/core @babel/preset-env webpack  #install mutliple package
```


### ```GIT```
```bash
git log
git show d41b44082218177319c19a5be9021087f547e285 
git config --list

git rm -r --cached .
git add .
git commit -m 'clean'
git push origin master
git push

#git reset HEAD~ ==== for undo a commit
#git reset --soft HEAD~1 ==Undo Last Commit

```

### ```ENV```
```bash
ls -lha | grep env
cp .env.example .env
nano .env
```

