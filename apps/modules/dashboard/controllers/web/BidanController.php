<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Init\Dashboard\Models\anak;
use Phalcon\Init\Dashboard\Models\bidan;
use Phalcon\Init\Dashboard\Models\daftar;
use Phalcon\Init\Dashboard\Models\ibu;
use Phalcon\Init\Dashboard\Models\kb;
use Phalcon\Init\Dashboard\Models\kia;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;

class BidanController extends Controller
{
	public function registerAction()
	{
		$this->view->pick('bidan/register');
	}

	public function storeregisterAction()
	{
		$bidan = new bidan();
        $bidan->namaBidan = $this->request->getPost('namaBidan');
        $bidan->alamatBidan = $this->request->getPost('alamatBidan');
        $bidan->email = $this->request->getPost('email');
        $bidan->username = $this->request->getPost('username');
        // $username = $this->request->getPost('username');
        // echo $username; die();
        $password = $this->request->getPost('password');
        // echo $password; die();
        $bidan->password = $this->security->hash($password);
        // $ibu->status = 0;
        $usernames = bidan::findFirst("username = '$bidan->username'");
        if($usernames){
            $this->flashSession->error("Gagal register. Username Bidan telah digunakan.");

            return $this->response->redirect('registerbidan');

            // return $this->response->redirect('register');
            // echo "username sudah digunakan.";


        }
        else{

            $bidan->save();
            return $this->response->redirect('loginbidan');
            // $this->response->redirect('ibu/login');
        }


	}

    public function loginAction()
    {
        $_isBidan = $this->session->get('bidan');
        if ($_isBidan) {
            $this->response->redirect('homebidan');
        }
        $_isIbu= $this->session->get('ibu');
        if ($_isIbu) {
            $this->response->redirect('homeibu');
        }
        $this->view->pick('bidan/login');
    }


    public function homebidanAction()
    {
        $this->view->pick('bidan/homebidan');
    }


    public function storeloginAction()
    {
        $username = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        $user = bidan::findFirst("username = '$username'");
            if ($user){
                if($this->security->checkHash($pass, $user->password)){
                    $this->session->set(
                        'bidan',
                        [
                            'id' => $user->idBidan,
                            'username' => $user->username,
                        ]
                    );
                    // echo "Masuk bos mantap";
                    (new Response())->redirect('homebidan')->send();
                }
                else{
                    // echo "Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.";
                    $this->flashSession->error("Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.");
                    $this->response->redirect('loginbidan');
                }
            }
            else{
                $this->flashSession->error("Akun admin tidak ditemukan.");
                // echo "Akun tidak ditemukan.";
                    $this->response->redirect('loginbidan');
            }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('/');
    }

     public function daftaribuAction()
    {
        $_isBidan= $this->session->get('bidan');
        if (!$_isBidan) {
            $this->response->redirect('loginbidan');
        }

       $this->view->pick('bidan/daftaribu');
    }

    public function listuseribuviewAction($idIbu)
    {
        
    }

    public function listuseribuAction()
    {
        $daftaribus = ibu::find();
        $data = array();

        foreach ($daftaribus as $daftaribu)
        {

            if($daftaribu->status == 1)
            {
                $status_sekarang = "Sudah";
            }
            else
            {
                $status_sekarang = "Belum";
            }

            $data[] = array(
                'idIbu' => $daftaribu->idIbu,
                'username' => $daftaribu->username,
                'status' => $status_sekarang,
                // 'status' => $status,
                // 'link' => $listuser->idIbu,
                // 'verifikasi' => $verifikasi,
            );
        }

        $content = json_encode($data);
        return $this->response->setContent($content);
    }

    public function verifikasiuserAction($idIbu)
    {
        $user = ibu::findFirst("idIbu='$idIbu'");
        $user->status = 1;
        $user->save();
        return $this->response->redirect('daftaribu' . '/' . $id);
    }

    public function verifdetailAction($idIbu)
    {
       $ids = $this->session->get('bidan');
        // if ($ids == NULL) {
        //     (new Response())->redirect('loginbidan')->send();          
        // }

        $_isID = ibu::findFirst("idIbu='$idIbu'");
        if($_isID)
        {
            $this->view->pick('verifdetail');
            $this->view->data = (array) ibu::findFirst("idIbu='$idIbu'");
        }
        // else{
        //     $this->flashSession->error("Akun psikolog tidak ditemukan.");
        //     $this->response->redirect('homebidan');
        // }
        // echo '<pre>';print_r($this->view->data);echo '</pre>';die();

        $this->view->pick('bidan/verifdetail');
    }

}