<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        if(session('magicLogin')){
            return redirect()->to('admin/set-password')
                             ->with('message', 'Please update your password');
        }

        return view('Home/index.php');

    }

    public function sendEmail(string $subject, string $message)
    {
        $email = \Config\Services::email();
        $email->setTo("ugp@pabc-ci.org");
        $email->setSubject($subject);
        $email->setMessage($message);
        If($email->send())
        {
            echo "Succès! Votre message a bien été envoyé. Nous vous reviendrons sous peu.";
        } 
        else
        {
            echo "Erreur. Le message n'a pas été envoyé!";
        } 
    }
}
