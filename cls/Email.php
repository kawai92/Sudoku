<?php
/**
 * Created by PhpStorm.
 * User: AbdullahAlkawai
 * Date: 4/21/15
 * Time: 9:40 PM
 */

class Email {
    public function mail($to, $subject, $message, $headers) {
        mail($to, $subject, $message, $headers);
    }
}