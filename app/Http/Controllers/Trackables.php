<?php

namespace App\Http\Controllers;

use App\Models\Trackable;
use App\Services\TrackableService;
use Illuminate\Support\Facades\Http;

class Trackables extends Controller
{
    protected $trackableService;

    public function __construct(TrackableService $trackableService) {
        $this->trackableService = $trackableService;
    }

    public function directory()
    {
        echo "PUPU";
    }

    public function showByUid(string $uid) {
        $data = $this->trackableService->getTrackableDataByUid($uid);
        return response()->json($data);
    }

    public function createNew() {
        $response = Http::get('https://random-word-api.herokuapp.com/word?number=1');

        $trackable = new Trackable();
        $trackable->user_uid = 1;
        $trackable->name = $response->json()[0];
        $trackable->save();

        $this->showByUid($trackable->uid);


    }
}
