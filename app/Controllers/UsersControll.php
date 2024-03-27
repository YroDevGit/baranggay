<?php

namespace App\Controllers;
use App\Models\Users;

class UsersControll extends BaseController
{
    public function login()
    {
        try {

            $validation = \Config\Services::validation();
        $data = [];

        $validation->setRule('username', 'Username', 'required');
        $validation->setRule('password', 'Password', 'required');
        
        if (! $validation->withRequest($this->request)->run()) {
              return redirect()->to("/")->withInput()->with("validation",$validation);
            } else {
                $userModel = new Users();
                $user = $userModel->where([
                    'username' => $this->request->getPOST('username'),
                    'password' => $this->request->getPOST('password')
                ])->first();

                if ($user) {
                    $this->setUserSession($user);
                    helper('cookie');
                    // built in nga set_cookie set_cookie('login', $user['id'], strtotime('+1 week')) pero nd ni mg gana kng may redirect ky conflict
                    return redirect()->to('admin/test')->setCookie('login', $user['id'], strtotime('+1 week'));
                } else {
                    return redirect('/')->withInput()->with("invalid","Account not found.!");
                }
            }
             
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    private function setUserSession($user)
    {
        $session = session();
        $session->set([
            'userID' => $user['id']
        ]);
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/')->deleteCookie('login');
    }
}
