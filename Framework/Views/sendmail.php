<?php
 
    use Controllers\MailController as MailController;

    $m = new MailController();

    $m->SendGreatings("matiasmorilla@hotmail.com");
?>