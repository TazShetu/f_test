<?php

namespace App\Http\Controllers;

use App\Actions\GenerateKeyFromIdAction;
use App\Models\CollectionKey;
use Illuminate\Http\Request;
use Kreait\Firebase\Firestore;

class HomeController extends Controller
{

    private $db;

    public function __construct(Firestore $firestore)
    {
        $this->db = $firestore->database();
    }

    public function ajaxFirebase(GenerateKeyFromIdAction $action, Request $request)
    {
        if (request()->ajax()) {
            $key = null;
            $url = $request->url;
            $collection = $request->collection;
            $is_new = $request->is_new;
            if ($is_new == 'yes') {
                $ck = new CollectionKey;
                $ck->save();
                $key = $action->handle($ck->id);
                $collectionRef = $this->db->collection('collections');
                $newDocument = $collectionRef->newDocument();
                $newDocument->set([
                    'uniqueKey' => $key,
                    'name' => $collection
                ]);
            } else {
                $collectionRef = $this->db->collection('collections');
                $query = $collectionRef->where('name', '=', "$collection")->limit(1);
                $documents = $query->documents();
                foreach ($documents as $d) {
                    $key = $d->data()['uniqueKey'];
                    break;
                }
            }
            $collectionRef = $this->db->collection('stickers');
            $newDocument = $collectionRef->newDocument();
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
        $collectionRef = $this->db->collection('stickers');
        $query = $collectionRef->where('uniqueKey', '=', "$key");
        $documents = $query->documents();
        return view('download', compact('documents'));
//        foreach ($documents as $document) {
        // data() will show actual data
//            dd($document->data()['url']);
        // id() will show document id
//            dd($document->id());
//        }
//        dd('nothing found');
    }


    public function test()
    {

        $collectionRef = $this->db->collection('stickers');
        $query = $collectionRef->where('uniqueKey', '=', "a")->limit(1);
        $documents = $query->documents();
        foreach ($documents as $d) {
            dd($d->data()['url']);
        }


        $ck = new CollectionKey;
        $ck->save();
        dd(strtoupper(dechex(30)));
//        dd(hexdec('1E'));


        //        dd(uniqid());
        $length = 8;
        dd(substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1, $length))), 1, $length));
    }


}
