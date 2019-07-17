<?php

namespace App\Http\Controllers\Client;

use App\Model\MakeupAlbum;
use App\Model\Video;
use App\Model\WeddingCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function contact()
    {
        return view('client.pages.contact');
    }
}
