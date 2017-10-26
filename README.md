# How do I get set up? #

Nginx $root_path ```public/index.php```

#Back-end#

##1. Setup of configs##

All specific applications configs were added to ```.gitignore```. 
You should find all files that consist *.example.* and setup them.

## 2. File mods##
```chmod -R 0777 bootstrap/cache```

```chmod -R 0777 storage```

## 3. Composer##
```composer install```

## 4. Migrations##
```artisan migrate```

## 5. Check if all tests will pass##
We use global setup of [codecept](http://codeception.com/install#.VpFbT3WLTr4). 
```
wget http://codeception.com/codecept.phar
chmod +x codecept.phar
sudo mv codecept.phar /usr/local/bin/codecept
```
For initialization of codeception you should run  ```codecept build```

For test running command will be ```codecept run```


