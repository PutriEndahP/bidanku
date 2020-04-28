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

class KbController extends Controller
{
	public function createkbAction($idIbu)
	{
		// $ids = $this->session->get('ibu')['tipe'];
  //       if ($ids == NULL) {
  //           // echo "berhasil login";
  //           // die();
  //       (new Response())->redirect('login')->send();          
  //       }
        $this->view->data = (array) ibu::findFirst("idIbu='$idIbu'");
		// $ibu = ibu::findFirst("idIbu='$idp'");
  //       $this->view->ibu = $ibu;
		$this->view->pick('kb/createkb');
	}

	public function storecreatekbAction()
	{
		$kb = new kb();
	    $kb->idBidan =  $this->session->get('bidan')['id']; // ini lagi error
	    $kb->idIbu = $this->request->getPost('idIbu');
	    $kb->tanggal_datang = $this->request->getPost('tanggal_datang');
	    $kb->berat_badan = $this->request->getPost('berat_badan');
	    $kb->tekanan_darah = $this->request->getPost('tekanan_darah');
	    $kb->tanggal_kembali = $this->request->getPost('tanggal_kembali');
	    // echo $catatan;
	    // die();
	    // echo '<pre>';
	    // print_r((array ($kb)));
	    // echo '</pre>';
	    // die();
	    // $Posyandu->gender = $gender;

	    $kb->save();
	    $this->response->redirect('daftaribu');
	}

	public function daftarkbAction()
	{
	     $this->view->pick('kb/daftarkb');
	}

	public function listkbviewAction()
	{

	}

	public function listkbAction()
  {
    	$id = $this->session->get('bidan')['id'];
        $kbs = kb::find();
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

  public function detailkbAction($idKb)
  {
       $_iskb = kb::findFirst("idKb='$idKb'");
       if($_iskb)
        {
            $this->view->data = (array) kb::findFirst("idKb='$idKb'");
            $this->view->pick('kb/detailkb');
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