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

class IbuController extends Controller
{
	public function registerAction()
	{
		$_isIbu = $this->session->get('ibu');
        if ($_isIbu) {
            $this->response->redirect('homeibu');
        }
        $_isBidan= $this->session->get('bidan');
        if ($_isIbu) {
            $this->response->redirect('homebidan');
        }
		$this->view->pick('ibu/register');
		// $this->view->pick('ibu/register');
	}

// public function storeAction()
//     {
//         $user = new Users();
//         $user->id_jabatan = '2';
//         $user->username = $this->request->getPost('username');
//         $user->nama = $this->request->getPost('nama');
//         $user->email = $this->request->getPost('email');
//         $password = $this->request->getPost('password');
//         $user->password = $this->security->hash($password);
//         $user->usia = $this->request->getPost('usia');
//         $user->alamat = $this->request->getPost('alamat'); 
//         $user->flag = '0';
//         $nama = Users::findFirst("username = '$user->username'");
//         if($nama){
//             $this->flashSession->error("username sudah digunakan");
//         }
//         else{
//             $user->save();
//             $this->flashSession->error("Anda telah berhasil mendaftar tunggu verifikasi dari admin");
//             $this->response->redirect('/');
//         }        
//     }

	public function storeregisterAction()
	{	
		$ibu = new ibu();
	    $ibu->username = $this->request->getPost('username');
	    // $username = $this->request->getPost('username');
	    // echo $username; die();
	    $ibu->email = $this->request->getPost('email');
	    $ibu->namaIbu = $this->request->getPost('namaIbu');
	    $ibu->alamat = $this->request->getPost('alamat');
	    $ibu->tgllahir = $this->request->getPost('tgllahir');
	    $ibu->usia = $this->request->getPost('usia');
	    $password = $this->request->getPost('password');
	    // echo $password; die();
	    $ibu->password = $this->security->hash($password);
	    $ibu->status = '0';
	    $usernames = ibu::findFirst("username = '$ibu->username'");
	    // echo $username; die();
	    // if($usernames){
	    //     // $this->flashSession->error("Gagal register. Username telah digunakan.");

	    //     // return $this->response->redirect('register');

	    //     // return $this->response->redirect('register');
	    //     echo "username sudah digunakan.";


	    // }
	    // else{
	    $ibu->save();
	    // var_dump($ibu);

	        // $ibu->save();
	    $this->response->redirect('login');
            // $this->response->redirect('ibu/login');
	    // }
	}

	public function loginAction()
	{
		$_isIbu = $this->session->get('ibu');
        if ($_isIbu) {
            $this->response->redirect('homeibu');
        }
        $_isBidan= $this->session->get('bidan');
        if ($_isIbu) {
            $this->response->redirect('homebidan');
        }
		$this->view->pick('ibu/login');
		
	}

	public function homeibuAction()
	{
		$this->view->pick('ibu/homeibu');
	}

	public function storeloginAction()
    {
        $username = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        $user = ibu::findFirst("username = '$username'");
            if ($user->status == 1){
                if($this->security->checkHash($pass, $user->password)){
                    $this->session->set(
                        'ibu',
                        [
                            'id' => $user->idIbu,
                            'username' => $user->username,
                        ]
                    );
                    // echo "Masuk bos mantap";
                    (new Response())->redirect('homeibu')->send();
                }
                else{
                    // echo "Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.";
                    $this->flashSession->error("Gagal masuk sebagai admin. Silakan cek kembali username dan password anda.");
                    $this->response->redirect('login');
                }
            }
            else{
                $this->flashSession->error("Akun admin tidak ditemukan.");
                // echo "Akun tidak ditemukan.";
                    $this->response->redirect('login');
            }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('/');
    }

    public function listkiauserviewAction()
    {

    }

    public function listkiauserAction()
    {
        $id = $this->session->get('ibu')['id'];
        $kias = kia::find("idIbu='$id'");
            $data = array();

            foreach ($kias as $kia) {
                if($kia->idAnak)
                {  
                    $anak = anak::findFirst("idAnak='$kia->idAnak'");
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'nama' => $anak->namaAnak,
                        'tanggal' => $kia->tanggal,
                        'link' => $kia->idKia,
                    );

                }
                else
                {
                    $ibu = ibu::findFirst("idIbu='$id'");
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'nama' => $ibu->namaIbu,
                        'tanggal' => $kia->tanggal,
                        'link' => $kia->idKia,
                    );

                }
                


            }
            
            $content = json_encode($data);
            return $this->response->setContent($content);
    }

    public function detailkiauserAction($idKia)
    {
       $_iskiauser = kia::findFirst("idKia='$idKia'");
       if($_iskiauser)
        {
            $this->view->datas = (array) kia::findFirst("idKia='$idKia'");
            $this->view->pick('ibu/detailkiauser');
        }
        else
        {
            $this->response->redirect('index/show404');
         // $this->view->pick('ibu/detailkiauser');
        }
        // if($kms) echo("ada");
        // else echo("tidak"); die();
        // $this->view->kia = $kia;
      // $this->view->pick('kia/detailkia');
    }

    public function tambahanakAction()
    {
        $this->view->pick('ibu/tambahanak');
    }

    public function storeanakAction()
    {
        $id = $this->session->get('ibu')['id'];
        $anak = new anak();
        $anak->namaAnak = $this->request->getPost('namaAnak');
        $anak->idIbu = $id;
        $anak->jeniskelamin = $this->request->getPost('jeniskelamin');
        $anak->tgllahir = $this->request->getPost('tgllahir');
        $anak->usia = $this->request->getPost('usia');

        // $Posyandu->gender = $gender;

        $anak->save();
        $this->response->redirect('listanak');
    }

    public function listanakAction()
    {
        $this->view->pick('ibu/listanak');
    }

    public function lihatanakviewAction()
    {

    }

    public function lihatanakAction()
    {
        $id = $this->session->get('ibu')['id'];
        $anaks = anak::find("idIbu='$id'");
            $data = array();

            foreach ($anaks as $anak) {
                $data[] = array(
                    // 'id' => $datpasien->idpasien,
                    'namaAnak' => $anak->namaAnak,
                    'jeniskelamin' => $anak->jeniskelamin,
                    'tgllahir' => $anak->tgllahir,
                    'usia' => $anak->usia,
                    'link' => $anak->idAnak,
                );


            }
            
            $content = json_encode($data);
            return $this->response->setContent($content);
    }

    public function hapusanakAction($idAnak)
    {
        $anak = anak::findFirst("idAnak='$idAnak'");

        $anak->delete();

        $this->response->redirect('listanak');

    }

    public function listuserkbAction()
    {
        $this->view->pick('ibu/listuserkb');
    }

    public function lihatuserkbviewAction()
    {

    }

    public function lihatuserkbAction()
    {
        $id = $this->session->get('ibu')['id'];
        $kbs = kb::find("idIbu='$id'");
        $data = array();

            foreach($kbs as $kb) {
                $ibu = ibu::findFirst("idIbu='$kb->idIbu'");
                
                    
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'tanggal_datang' => $kb->tanggal_datang,
                        'namaIbu' => $ibu->namaIbu,
                        'link' => $kb->idKb,
                    );
                    

                    
            }
            
            $content = json_encode($data);
            return $this->response->setContent($content);
    }

    public function detailkbuserAction($idKb)
    {
       $_iskb = kb::findFirst("idKb='$idKb'");
       if($_iskb)
        {
            $this->view->kb = (array) kb::findFirst("idKb='$idKb'");
            $this->view->pick('ibu/detailkbuser');
        }
         // $this->view->pick('kia/detailkia');
        else
        {
            $this->response->redirect('index/show404');
         // $this->view->pick('ibu/detailkiauser');
        }
        // if($kms) echo("ada");
        // else echo("tidak"); die();
        // $this->view->kia = $kia;
      // $this->view->pick('kia/detailkia');
    }


}