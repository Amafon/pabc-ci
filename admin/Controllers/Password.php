<?php

namespace admin\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Password extends BaseController
{
    public function set()
    {
        return view('admin\Views\Password\set.php');
    }

    public function update()
    {
        $rules = [
            'password'=>[
                'label'=>'Password',
                'rules'=>'required|strong_password',
            ],
            'password_confirm'=>[
                'label'=>'Password Confirmation',
                'rules'=>'required|matches[password]',
            ], 
        ] ;

        $return = $this->validate($rules) ;
        If( ! $return)
        {
            return redirect()->back()
                    ->with('errors',$this->validator->getErrors());
        }

        $user = auth()->user();
        $user->password = $this->request->getPost('password');
        $model = new UserModel;
        $model->save($user);
        session()->removeTempdata('magicLogin');
        return redirect()->to('admin')
                ->with('message','Le mot de passe a été changé');

    }
}
