Amazing Quote Thingie
=====================

A simple quote engine for Ze Frank

put this somewhere the webserver can get to it, and set the DocumentRoot to be PROJECT_DIR/site

initialize the site by going into PROJECT_DIR/db and running `php initialize.php`

If you are using a sqlite database (the default - change in PROJECT_DIR/models/Base.php), make sure the web process can write to the db file. For example:
`chgrp www-data inspire.sqlite3 && chmod g+w inspire.sqlite3`

hit me up with any questions: kastner@gmail.com