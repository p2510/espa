<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Impact;
use App\Models\Downloadpage;
use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade;

class ImpactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $datas=Impact::latest('id')->limit(1)->get();
        $medias=Media::all();
        $shareFacebook=ShareFacade::currentPage()->facebook()->getRawLinks();
        

        $shareWhatsapp=ShareFacade::currentPage()->whatsapp()->getRawLinks();
        $shareLinkedin=ShareFacade::currentPage()->linkedin()->getRawLinks();


        $downloads=Downloadpage::where('pagename','impact-cluster')->get();
        
        return view('static.impact')->with(['datas'=>$datas,'medias'=>$medias,'shareFacebook'=>$shareFacebook,'shareWhatsapp'=>$shareWhatsapp,'shareLinkedin'=>$shareLinkedin,'downloads'=>$downloads]);
    }
}