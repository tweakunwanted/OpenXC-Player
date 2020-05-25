# OpenXC-Player
Open source web player compatible with XtreamCodes V2 API

### How to install

Use a clean Ubuntu 18.04 (not running any other service or script will fail) and run the following:

*** Original Language ***
```sh
curl -s https://raw.githubusercontent.com/tweakunwanted/OpenXC-Player/master/install.sh | sudo bash
```

*** English Version ***


```sh
curl -s https://raw.githubusercontent.com/R3tr0R4z0r/OpenXC-Player/master/install-ENG.sh | sudo bash
```

After that edit the file `/var/www/html/libs/config.php`

```
// URL DNS
define('IP','http://domain.com:80'); 
```

Put your playlist DNS there!

Access the web interface on http://IP

Enjoy and don't forget to contribute back if this helped you :)

#### Custom domain

Edit `/etc/apache2/sites-available/000-default.conf` and add the following above "DocumentRoot":

```
ServerName domain.com
```

#### Customisation

Edit `/var/www/html/libs/idioma.php` for the following
* To use your own service name edit -- `define("NOME_IPTV", "YOUR SERVICE NAME HERE");`
* Welcome message edit -- `define('HOME_TEXTO_BEMVINDO','Welcome to the webplayer, login below.');`

Change images and design
* All web player graphics can be found here -- `/var/www/html/assets/blue`
* Swap between Pre-configured tempaltes can eb done in -- `/var/www/html/libs/config.php -- $template = 'blue';`
Avialable Templates -- pink, aqua, orange or blue.


#### NOTE: Chrome and Firefox do not support MKV or AVI files as standard, this player has been tested with OperaGX which supports MKV.


### Screenshots

![image](https://user-images.githubusercontent.com/56216907/66614072-f1c31e80-eb9d-11e9-93ad-81610630685a.png)

![image](https://user-images.githubusercontent.com/56216907/66614142-3484f680-eb9e-11e9-9c54-4388fa865bae.png)

![image](https://user-images.githubusercontent.com/56216907/66614200-731ab100-eb9e-11e9-8bc5-3731e55690ac.png)
