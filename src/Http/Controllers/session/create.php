<?php
use Core\Session;

// Rendere Html
view('/session/create.view.php', ['errors' => Session::get('errors')]);