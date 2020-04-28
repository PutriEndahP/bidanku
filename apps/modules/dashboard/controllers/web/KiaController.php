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

class KiaController extends Controller
{
	public function createkiaibuAction($idIbu)
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
		$this->view->pick('kia/createkiaibu');
	}

	public function storecreatekiaibuAction()
	{
		$kia = new kia();
    $kia->idBidan =  $this->session->get('bidan')['id']; // ini lagi error
    $kia->idIbu = $this->request->getPost('idIbu');
    $kia->tanggal = $this->request->getPost('tanggal');
    $kia->berat_badan = $this->request->getPost('berat_badan');
    $kia->tekanan_darah = $this->request->getPost('tekanan_darah');
    $kia->usia_kandungan = $this->request->getPost('usia_kandungan');
    $kia->vitamin = $this->request->getPost('vitamin');
    $kia->tanggal_kembali = $this->request->getPost('tanggal_kembali');
    $kia->catatan = $this->request->getPost('catatan');
    // echo $catatan;
    // die();
    // echo '<pre>';
    // print_r((array ($kia)));
    // echo '</pre>';
    // die();
    // $Posyandu->gender = $gender;

    $kia->save();
    $this->response->redirect('daftaribu');
	}

  public function daftarkiaAction()
  {
     $this->view->pick('kia/daftarkia');
  }

  public function listkiaviewAction()
  {

  }

  public function listkiaAction()
  {
    $id = $this->session->get('bidan')['id'];
        $kias = kia::find();
        $data = array();

            foreach($kias as $kia) {
                $ibu = ibu::findFirst("idIbu='$kia->idIbu'");
                if($kia->idAnak == NULL)
                {
                    
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'nama' => $ibu->namaIbu,
                        'namaIbu' => NULL,
                        'tanggal' => $kia->tanggal,
                        'link' => $kia->idKia,
                    );
                    
                }
                else{
                    $anak = anak::findFirst("idAnak='$kia->idAnak'");
                    $data[] = array(
                        // 'id' => $datpasien->idpasien,
                        'nama' => $anak->namaAnak,
                        'namaIbu' => $ibu->namaIbu,
                        'tanggal' => $kia->tanggal,
                        'link' => $kia->idKia,
                    );

                }

                    
            }
            
            $content = json_encode($data);
            return $this->response->setContent($content);
  }

  public function detailkiaAction($idKia)
  {
       $_iskia = kia::findFirst("idKia='$idKia'");
       if($_iskia)
        {
            $this->view->data = (array) kia::findFirst("idKia='$idKia'");
            $this->view->pick('kia/detailkia');
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

  public function daftaranakAction()
  {
    $this->view->pick('bidan/daftaranak');
  }

  public function listuseranakviewAction()
  {

  }

  public function listuseranakAction()
  {
  
    $data = $this->db->query('SELECT ibu.idIbu, idAnak, namaAnak, namaIbu FROM anak, ibu WHERE anak.idIbu=ibu.idIbu')->fetchAll();

    return $this->response->setContent(json_encode($data));

  }

  public function hapuskiaAction($idKia)
  {
    {
        $kia = kia::findFirst("idKia='$idKia'");

        $kia->delete();

        $this->response->redirect('daftarkia');

    }
  }

  public function createkiaanakAction($idAnak)
  {
    // $ids = $this->session->get('ibu')['tipe'];
  //       if ($ids == NULL) {
  //           // echo "berhasil login";
  //           // die();
  //       (new Response())->redirect('login')->send();          
  //       }
        $this->view->anak = (array) anak::findFirst("idAnak='$idAnak'");
    // $ibu = ibu::findFirst("idIbu='$idp'");
  //       $this->view->ibu = $ibu;
    $this->view->pick('kia/createkiaanak');
  }

  public function storecreatekiaanakAction()
  {
    $kia = new kia();
    $kia->idBidan =  $this->session->get('bidan')['id']; // ini lagi error
    $kia->idIbu = $this->request->getPost('idIbu');
    $kia->idAnak = $this->request->getPost('idAnak');
    $kia->tanggal = $this->request->getPost('tanggal');
    $kia->berat_badan = $this->request->getPost('berat_badan');
    $kia->tinggi_badan = $this->request->getPost('tinggi_badan');
    $kia->lingkar_kepala = $this->request->getPost('lingkar_kepala');
    $kia->imunisasi = $this->request->getPost('imunisasi');
    $kia->vitamin = $this->request->getPost('vitamin');
    $kia->tanggal_kembali = $this->request->getPost('tanggal_kembali');
    $kia->catatan = $this->request->getPost('catatan');
    // echo $catatan;
    // die();
    // echo '<pre>';
    // print_r((array ($kia)));
    // echo '</pre>';
    // die();
    // $Posyandu->gender = $gender;

    $kia->save();
    $this->response->redirect('daftaranak');
  }

  public function editkiaAction($idKia)
  {
    $this->view->kia = (array) kia::findFirst("idKia='$idKia'");

  }

  public function storeeditAction()
  {

    $idKia = $this->request->getPost('idKia');

    $kia= kia::findFirst("idKia='$idKia'");

    $kia->tanggal = $this->request->getPost('tanggal');
    $kia->berat_badan = $this->request->getPost('berat_badan');
    $kia->tinggi_badan = $this->request->getPost('tinggi_badan');
    $kia->tekanan_darah = $this->request->getPost('tekanan_darah');
    $kia->usia_kandungan = $this->request->getPost('usia_kandungan');
    $kia->lingkar_kepala = $this->request->getPost('lingkar_kepala');
    $kia->imunisasi = $this->request->getPost('imunisasi');
    $kia->vitamin = $this->request->getPost('vitamin');
    $kia->tanggal_kembali = $this->request->getPost('tanggal_kembali');
    $kia->catatan = $this->request->getPost('catatan');

    if ($kia->update()){
      $this->response->redirect('homebidan');
    }

    // http_redirect()
  }

}