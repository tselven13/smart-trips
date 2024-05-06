<?php

use Modules\Controller;
use Config\Config;
use Modal\Place;

class Places extends Controller
{
    // Get all items
    function GET()
    {
        if (isset($_POST['place'])) {
            $place = $_POST['place'];
            $places =  new Place();
            $res = $places->select('*')->where("Name LIKE '%{$place}%'")->get();
            return $this->JSON($res);
        } else {
            $places = new Place();
            $data = $places->getAll();
            $i = 0;
            foreach ($data as $r) {
                $data[$i]['Image'] = Controller::Image($r['Image']);
                $i++;
            }
            $this->JSON($data);
        }
    }

    //TODO: get items by a id.
    function GETBY()
    {
        $place = explode('/', $_SERVER['REQUEST_URI'])[2];
        $places =  new Place();
        $res = $places->select('*')->where("Name LIKE '%$place%'")->get();
        echo $this->JSON($res);
    }
    //TODO: save a item.
    function POST()
    {
    }

    //TODO: Update Items.
    function PUT()
    {
    }

    //TODO: Delete Items.
    function DELETE()
    {
        $place = explode('/', $_SERVER['REQUEST_URI'])[3];
        $places =  new Place();
        $res = $places->delete($place);
        echo $this->JSON($res);
    }
}
