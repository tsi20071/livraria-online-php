<?php
session_name('livrariaonline');
session_start();
session_destroy();

header('Location: ./');
?>