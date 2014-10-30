<?php

/*
 * If the public directory is not the root directoy and the user tries to access
 * the project folder, redirect to the public directory.
 */

header('Location: public/');

die();