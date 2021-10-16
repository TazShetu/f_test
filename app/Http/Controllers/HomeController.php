<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Firestore;

//use Kreait\Laravel\Firebase\Facades\Firebase;
//use Kreait\Firebase\Factory;
//use Kreait\Firebase\ServiceAccount;
//use Kreait\Firebase\Database;

class HomeController extends Controller
{

//    public function __construct(Firestore $firestore)
//    {
//        $this->firestore = $firestore;
//    }

    public function download(Firestore $firestore, $key)
    {
        $db = $firestore->database();
        $collectionRef = $db->collection('stickers');
        $query = $collectionRef->where('uniqueKey', '=', "$key");
        $documents = $query->documents();

        foreach ($documents as $document) {
            // data() will show actual data
            dd($document->data());
            // id() will show document id
//            dd($document->id());
        }

        dd('nothing found');

        dd($collection->where('uniqueKey', '=', 'a')->documents());

        $stuRef = app('firebase.firestore')->database()->collection('User')->newDocument();
        $stuRef->set([
            'firstname' => '2',
            'lastname' => '3',
            'age'    => 100
        ]);
        die('check_2');
    }

}
