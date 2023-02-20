<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // initialize email setting from emailConfig function.
        $this->email->initialize($this->emailConfig());
        // Set sender email and name from .env file
        $this->email->setFrom(getenv('email_config_SMTPUser'), getenv('email_config_senderName'));
        // target email or receiver
        $this->email->setTo('jaironlanda@gmail.com');
        // Email subject
        $this->email->setSubject('Reset Password');
        // Email message
        $this->email->setMessage('Testing the email class.');

        // echo json_encode($this->email);
        // exit;
        
        // make sure email is send
        if ($this->email->send()) {
            echo 'Success!';
        } else {
            echo 'failed';
        }
    }

    public function emailConfig()
    {
        // Protocol
        $config['protocol'] = getenv('email_config_protocol');
        // Host
        $config['SMTPHost'] = getenv('email_config_SMTPHost');
        // Port
        $config['SMTPPort'] = getenv('email_config_SMTPPort');
        // User
        $config['SMTPUser'] = getenv('email_config_SMTPUser');
        // Pass
        $config['SMTPPass'] = getenv('email_config_SMTPPass');

        return $config;
    }
}
