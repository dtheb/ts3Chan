ts3Chan
=======

#####Installation:
- Import the dependencies 
```composer update```
- Check files in ```app/config``` edit the values as you wish.
- Edit the ```.htaccess``` in the public folder
  change it to your new base Example:- 
  link is ```www.site.com/requestchannel/public``` then the base is ```/requestchannel/public/```
  so ```RewriteBase /ts3chan_v2/public/``` to ```RewriteBase /requestchannel/public/```
- Create the database and import the ```ts3chan.sql```

and it should work fine :D

--- important info ---
- Default admin pass: ```admin``` (change it in settings)
- If something didn't work check ```app/logs/errors.log```
- To change language go to ```app/lang``` copy the ```en``` folder and rename it then edit the language files as you wish, when done edit set your new language in the ```General.php``` file in the configs folder ```app/config```


THERE WILL BE BUGS :D 
