Ts3Chan (Beta)
=======
PHP Web based system for Teamspeak 3 servers to Request channels on the server

###Features:
- Admin CP for accepting/rejecting requests.
- Limit requests per email.
- Auto channel create.
- Create channels anywhere with base OrderID. (not only in the bottom of channels list)
- Create channels with custom permissions. 
- Auto email on accept/deny the request with a custom message.
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

and it should work fine :D

###--- important info ---
- Default admin pass: ```admin``` and admin CP link is ```/public/admin``` (change it in settings)
- If something didn't work check ```app/logs/errors.log```
- To change language go to ```app/lang``` copy the ```en``` folder and rename it then edit the language files as you wish, when done edit set your new language in the ```General.php``` file in the configs folder ```app/config```


THERE WILL BE BUGS :D 
