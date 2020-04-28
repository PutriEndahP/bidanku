<?php

namespace Phalcon\Init\Dashboard\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
// use Phalcon\Init\Dashboard\Models\anak;
// use Phalcon\Init\Dashboard\Models\bidan;
// use Phalcon\Init\Dashboard\Models\daftar;
// use Phalcon\Init\Dashboard\Models\ibu;
// use Phalcon\Init\Dashboard\Models\kb;
// use Phalcon\Init\Dashboard\Models\kia;
use Phalcon\Http\Request;
use Phalcon\Events\Manager as EventsManager;

class IndexController extends Controller
{
	public function indexAction()
	{
		
        $db = $this->getDI()->get('db');

        $sql = "SELECT * from ibu";

        $result = $db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

        echo var_dump($result);
	}

	public function show404Action()
	{
      $this->view->pick('index/show404');
	}
}