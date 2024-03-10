### FOR VLADISLAV!!!
1. open your ~/.bashrc file and put this code to it
```bash
if [ -z "$SSH_AUTH_SOCK" ] || ! ssh-add -l &>/dev/null; then
    eval "$(ssh-agent -s)"
    ssh-add
    ssh-add ~/.ssh/laravel_store
fi
```
It will start ssh-agent every time you start session. 
Also it adds rsa secret keys to agent.
After that use this command this name laravel_store (enter it on the first step)
```bash
cd ~/.ssh/
ssh-keygen -t rsa
```
It will create rsa ssh keys for our repository *(we are cool!)*

So, now you must go to our repository in github, open settings in it, deploy keys, copy all from ~/.ssh/laravel_store.pub and create new key this it.

Good, now you have access to repository.

But there is one more important thing. Open your local repository and check
```bash
git remote -v
```
If there are https entries, then
```bash
git remote remove origin
git remote add origin git@github.com:Intzer/laravel_store.git
```

Okey, now you can work with repository, use:
```bash
git pull
composer install
./vendor/bin/sail up -d
```

Niceee!

Okey, what cool thing i do? 
I host project on http://89.223.66.228/
So, we must deploy it))

### HOW TO DEPLOY
-u if you are not have pushed yet
```
git push -u origin main
php ./vendory/bin/envoy run deploy
```

How it works?
After you push changes to repository, you run envoy and his task deploy.
It connects to vds server and execute a script (/Envoy.blade.php in our project).
It stop sail, pull changes, make migrations, and etc.

So it is easy to delivery code to production!

But it will require password from user vlad on vds, to avoid this connect to vds

user: vlad, password i send to you in telegram

open ~/.ssh/authorized_keys and put on new line key from ~/.ssh/id_rsa.pub from your pc!

it allows you to run envoy without entering password!

