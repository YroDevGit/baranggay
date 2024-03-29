<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Members;


class MemberControll extends BaseController
{

    public function MEMBERS(){
        return new Members();
    }

    public function addMember(){
        try {
            $validation = \Config\Services::validation();

            $validation->setRule('fullname', 'Fullname', 'required');
            $validation->setRule('contact', 'Contact number', 'required|is_unique[members.contact]');
            $validation->setRule("email","Email address","required|valid_email|is_unique[members.email]");
            $validation->setRule('address', 'Address', 'required');
            if (! $validation->withRequest($this->request)->run()) {
              return redirect()->to("admin/test")->withInput()->with("validation",$validation);
            } else {
              $member = $this->MEMBERS();
              
              $member->insert([
                "fullname" => $this->request->getPost("fullname"),
                "contact" => $this->request->getPost("contact"),
                "email" => $this->request->getPost("email"),
                "address" => $this->request->getPost("address"),
                "stat" => 0
              ]);
            }
            return redirect()->route("memberForm")->with("msg","Member added successfully");
            
        } catch (\Throwable $th) {
          echo $th;
        }
    }

    public function showMembers(){
      try {
        $value = $this->request->getPostGet("val");
        $member = $this->MEMBERS();
        $results =  $member->where("fullname like '%$value%'")->get()->getResult();
        return $this->response->setJSON($results);
    
      } catch (\Throwable $th) {
        echo $th;
      }
    }

    public function deleteMember(){
      $value = $this->request->getPostGet("val");
      $member = $this->MEMBERS();
      $member->where("id =  $value")->delete();
      return $this->response->setJSON(["message"=>"success"]);
    }
}
