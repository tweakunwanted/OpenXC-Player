# OpenXC-Player
Open source web player compatilhe with OpenXC 

### How to install

Use a clean Ubuntu 18.04 (not running any other OpenXC service) and run the following:

```sh
curl -s https://raw.githubusercontent.com/tweakunwanted/OpenXC-Player/master/install.sh | sudo bash
```

After that edit the file `/var/www/html/libs/config.php`

```
// URL DNS
define('IP','http://domain.com:80'); 
```

Put your playlist DNS there!

Access the web interface on http://IP

Enjoy and don't forget to contribute back if this helped you :)
