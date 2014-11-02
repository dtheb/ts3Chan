Ts3Chan (Beta)
=======
PHP Web based system for Teamspeak 3 servers to Request channels on the server.

Free opensource feel free to use, edit and share but don't forget to give credit/linkback and of you added something feel free to pull request :D

####Admin CP preview
![adminCP](http://i.imgur.com/EWRfBk7.png)

###Features:
- Admin CP for accepting/rejecting requests. (with the abilty to sort, search and requests per page)
- Limit requests per email.
- Auto channel create.
- Create channels anywhere with base OrderID. (not only in the bottom of channels list)
- Create channels with custom permissions.  (multi permissions supported)
- Auto email on accept/deny the request with a custom message. (SMTP based)
- Email the channel admin token on accept.
- Basic email templating. (also supports custom message)
- Language/translation support with clean seperated language files.


###Installation:
- Import the dependencies 
```composer update``` (more info ```www.getcomposer.org```)
- Check files in ```app/config``` edit the values as you wish.
- Set the ```app/cache``` & ```app/logs``` folders to writeable ```chmod 777```
- Edit the ```.htaccess``` in the ```public``` folder
  change it to your new base Example:- 
  link is ```www.site.com/requestchannel/public``` then the base is ```/requestchannel/public/```
  so ```RewriteBase /ts3chan_v2/public/``` to ```RewriteBase /requestchannel/public/```
- Create the database and import the ```ts3chan.sql```

and it should work :D

###--- important info ---
- Default admin pass: ```admin``` (change it in settings) and admin CP link is ```/public/admin```
- If something didn't work check ```app/logs/errors.log```
- To change language go to ```app/lang``` copy the ```en``` folder and rename it then edit the language files as you wish, when done edit set your new language in the ```General.php``` file in the configs folder ```app/config```


THERE WILL BE BUGS :D 

====
###Credits
- [TS3 PHP Framework](http://forum.teamspeak.com/showthread.php/54132-API-TS3-PHP-Framework)
- [Simple MVC](https://github.com/alexgarrett/simple-mvc)
- [Password compat](https://github.com/ircmaxell/password_compat)
- [Monolog](https://github.com/Seldaek/monolog)
- [SwiftMailer](http://swiftmailer.org)
