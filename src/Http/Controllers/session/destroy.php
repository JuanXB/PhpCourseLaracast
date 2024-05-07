<?php 
use Core\App;


App::resolver(Authenticator::class)->logout();

redirect();