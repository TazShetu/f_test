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

    private $collectionRef;

    public function __construct(Firestore $firestore)
    {
        $db = $firestore->database();
        $this->collectionRef = $db->collection('stickers');
    }

    public function ajaxFirebase(Request $request)
    {
        if (request()->ajax()) {
            $key = $request->key;
            $url = $request->url;
            $newDocument = $this->collectionRef->newDocument();
            $newDocument->set([
                'uniqueKey' => $key,
                'url' => $url
            ]);
            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false]);
        }
    }

    public function download($key)
    {
        $query = $this->collectionRef->where('uniqueKey', '=', "$key");
        $documents = $query->documents();

        return view('download', compact('documents'));

//        foreach ($documents as $document) {
            // data() will show actual data
//            dd($document->data()['url']);
            // id() will show document id
//            dd($document->id());
//        }
//
//        dd('nothing found');
    }

}
