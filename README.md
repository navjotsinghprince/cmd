## Prince Ferozepuria - https://navjotsinghprince.com

### ``` VERSION CHECK ```
```bash
composer -v
composer validate
php artisan --version
vue --version 
node -v
npm -v
php -v
apache2 -v
mysql -V
git --version
cat /etc/os-release
lsb_release -a
hostnamectl
```

### ```ARTISAN ```  
```bash
php artisan config:clear
php artisan cache:clear 
php artisan route:clear  
php artisan route:cache   
php artisan view:clear 
php artisan optimize:clear
composer dump-autoload
composer du
composer update 

### ```ARTISAN KEY ```
php artisan key:generate
php artisan key:generate --show
php artisan db:monitor
php artisan db:show
php artisan channel:list
php artisan db:table
php artisan package:discover

### ```ARTISAN MODEL CONTROLLER MIGRATIONS```
php artisan make:model Lorem -mc
php artisan make:model -mc Lorem
php artisan make:model Lorem -m

### ```ARTISAN ROUTES```
php artisan route:list 
php artisan route:clear 
php artisan route:cache
php artisan route:list --except-vendor
php artisan route:list --path=users

### ```ARTISAN MODEL```
php artisan make:model User
php artisan model:show User

### ```ARTISAN MIGRATION```
php artisan migrate:refresh --path=/database/migrations/filename.php
php artisan make:migration create_my_name_table
php artisan make:migration add_is_suspended_to_users_table --table=users
php artisan migrate
php artisan migrate:fresh
php artisan migrate:refresh
php artisan migrate:refresh --force
php artisan migrate:status

### ```ARTISAN SEEDERS```
php artisan make:seeder UserSeeder
php artisan db:seed
php artisan db:seed --class=UserSeeder
php artisan migrate:fresh --seed   

### ```ARTISAN CONTROLLERS```
php artisan make:controller LoremController
php artisan make:controller Api/User/LoremController
php artisan make:controller Api/Admin/LoremController
php artisan make:controller LoremController --invokable
php artisan make:model Lorem -m -r  #Resource Controller

### ```ARTISAN MIDDLEWARE```
php artisan make:middleware Lorem

### ```ARTISAN COMMANDS```
php artisan make:command LoremCommand

### ```ARTISAN REQUEST```
php artisan make:request LoremRequest

### ```ARTISAN EMAIL```
php artisan make:mail ResetPasswordMail

### ```ARTISAN JOBS```
php artisan make:job ProcessPodcast
composer require laravel/horizon
php artisan horizon:install
sudo apt update
sudo apt install redis-server
.env QUEUE_CONNECTION=redis
sudo apt-get install php-redis

redis-cli flushall
php artisan horizon

### ```ARTISAN STORAGE```
php artisan storage:link
sudo chmod -R gu+w storage 
sudo chmod -R guo+w storage
php artisan cache:clear

sudo chmod -R 777 PictureUploads 
sudo chmod -R 777 storage/ 

### ```ARTISAN MODULE```
php artisan module:seed --class=LoremTableSeeder ModuleName
php artisan module:make-model LoremModel ModuleName  
php artisan module:migrate ModuleName

### ```ENV```
ls -lha | grep env
cp .env.example .env
nano .env

### ```NPM```
npm run watch
npm run dev
npm run prod
npm run hot
npm install

rm -rf node_modules/
rm package-lock.json
npm install sass@1.32.12
npm install -D babel-loader @babel/core @babel/preset-env webpack  #install mutliple package
```


### ```GIT```
```bash
sudo add-apt-repository ppa:git-core/ppa -y
sudo apt-get update
sudo apt-get install git -y
git --version

git config --list
git config --global user.name "princeferozepuria"
git config --global user.email "fzr@navjotsinghprince.com"

git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin git@github.com:navjotsinghprince/lorem.git
git push -u origin main

#EXISTING REPOSITORY
git remote add origin git@github.com:navjotsinghprince/lorem.git
git branch -M main
git push -u origin main

git add --all
git add -A
git add .
git commit -a -m "updated add files"  #Only modified files excluding untracked files

git status --short
git status

git log
git log --stat
git log --oneline
git log --oneline -3
git show d41b44082218177319c19a5be9021087f547e285


### ```BRANCH```
git branch -help
git help --all

git branch
git checkout -b test
git status
git add .
git commit -m "updated add modify files"
git push origin test

git checkout main
git merge test
git push -u origin main

#PULL REMOTE BRANCH
git pull test  #first way
git branch --set-upstream-to=origin/test test  #second way
git pull #second way
git merge origin/test #solve diverged warning'

git pull --rebase origin main #solve divergent

git branch -a    #local branch
git branch -r    #remote branch
git branch -d test  #delete local branch
git push origin -d test  #delete remote branch


#CLONE
git remote show origin
git remote -v
git clone git@github.com:navjotsinghprince/lorem.git myfolder

git remote add gh-page git@github.com:navjotsinghprince/lorem.git
git push gh-page main

echo '.log' > .gitignore
git rm -r --cached .
git add .
git commit -m 'clean'
git push origin main
git push

git tag v1.0.0
git push --tag
git push origin v1.0.0

git tag --delete v1.0.0
git push --delete origin v1.0.0

ssh-keygen -t rsa -b 4096 -C "info@navjotsinghprince.com"
ssh-add /home/prince/.ssh/id_rsa
cat /home/prince/.ssh/id_rsa.pub
ssh -T git@github.com

git revert HEAD --no-edit

#DELETE ALL COMMIT HISTORY , BUT KEEP IN EXISTING CODE
git checkout --orphan latest_branch #Checkout
git add -A #Add all the files
git commit -am "commit message" #Commit the changes
git branch -D main  #Delete the branch
git branch -m main #Rename the current branch to main
git push -f origin main #Finally,force update

```


### ```EXTENSIONS```
```bash
GitLens — Git supercharged - GitKraken
Base16 Themes - AndrsDC
Prettier - Code formatter - prettier.io
ESLint - Microsoft
Path Intellisense - Christian Kohler
PHP IntelliSense - Damjan Cvetko
PHP Namespace Resolver - Mehedi Hassan
Laravel Extra Intellisense - amir
Laravel goto view - codingyu

Firefox Multi-Account Containers by Mozilla Firefox , Lightshot , Wappalyzer
```

### ```ARTIFICIAL INTELLIGENCE```
```bash
Copilot — https://github.com/copilot
Google Bard — https://bard.google.com
Chat GPT — https://chat.openai.com
```

## Author
<img src="https://navjotsinghprince.com/img/signature-black.png" alt="Navjot Singh" height="50">

## Contact
If you discover any question within details, please send an e-mail to Prince Ferozepuria via [fzr@navjotsinghprince.com](mailto:fzr@navjotsinghprince.com). Your all questions will be answered.

## Buy Me A Coffee! :coffee: 
Feel free to buy me a coffee at [__Buy me a coffee! :coffee:__]( https://ko-fi.com/princeferozepuria), I would be really grateful for anything, be it coffee or just a kind comment towards my work, that helps me a lot.

## Donation
The information is completely free to use, however, it has taken a lot of time to build. If you would like to show your appreciation by leaving a small donation, you can do so by clicking here [here](https://www.paypal.com/paypalme/navjotsinghprince). Thanks!
