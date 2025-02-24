<?php

/**
 * Mailer
 * 実際のMailerクラスのつもり
 * Send messages
 */
class Mailer
{
    /**
     * Send a message
     *
     * @param string $email The email address
     * @param string $message The message
     *
     * @return boolean True if sent, false otherwise
     */
    public function sendMessage($email, $message)
    {
        if(empty($email)) {
            throw new Exception;
        }

        sleep(3);
        echo "send '$message' to '$email'";
        return true;
    }
}