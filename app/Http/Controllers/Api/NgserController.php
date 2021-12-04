<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use File;

class NgserController extends BaseController
{
    public function index()
    {
        $up_price = 0;
        $clientArr = [];
        //get the JSON file
        $data = $this->openJSONFile();
        foreach ($data as $key => $clients) {
            $sum = 0;
            foreach ($data[$key]["achats"] as $vim => $value) {
                $sum += $value["prix"];
            }
            if ($sum > $up_price) {
                $up_price = $sum;
                $clientArr["id"] = $clients["id"];
                $clientArr["client"] = $clients["client"];
            }
        }

        return $this->sendResponse($clientArr, "Données du client avec le plus gros panier");
    }

    public function openJSONFile()
    {
        $jsonString = [];

        if (File::exists(base_path('data/articles.json'))) {

            $jsonString = file_get_contents(base_path('data/articles.json'));

            $jsonString = json_decode($jsonString, true);

        }
        return $jsonString;
    }

    public function findClient($id)
    {
            //get the JSON file
            $data = $this->openJSONFile();
            $sum = 0;
            $idArr = [];

            if (!is_numeric($id)) {
                return $this->sendBadRequestError("Le paramètre saisi n'est pas correct");
            }

            foreach ($data as $key => $value) {
                array_push($idArr, $value["id"]);
            }

            if ( in_array($id, $idArr) ) {
                for ($i=0; $i < count($data); $i++) {
                    if ($id == $data[$i]["id"]) {
                        foreach ($data[$i]["achats"] as $vim => $value) {
                            $sum += $value["prix"];
                        }
                        return $this->sendResponse($sum, "Le total de vente du client " . $id);
                 }
                }
            }
            else
            {
                return $this->sendNotFoundError("Le client avec l'id " . $id . " n'existe pas !");
            }
    }
}
