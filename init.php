<?php 

if( !session_id() ) {
    session_start();
}

require_once('helper.php');
require_once('models/database.php');
require_once('models/User.php');
require_once('models/Article.php');
require_once('models/Product.php');
require_once('models/Review.php');
require_once('models/Flasher.php');


?>