<?php

namespace App\Http\Controllers; 

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Degree;
use App\Models\Design;
use App\Models\Timing;
use App\Models\Program;
use App\Models\Download;
use App\Http\Utils\Levels;
use Illuminate\Http\Request;
use App\Http\Utils\Countries;
use App\Http\Utils\Provinces;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $degrees=Degree::all();
        $courses=DB::table('courses')->join('modalities','modalities.id','=','courses.modality_id')
        ->join('degrees','degrees.id','=','courses.degree_id')
        ->join('languages','languages.id','=','courses.language_id')
        ->join('modes','modes.id','=','courses.mode_id')
        ->leftjoin('responsables','responsables.id','=','courses.responsable_id')
        ->select('courses.*','modalities.name as modalitiy_name','degrees.name as degrees_name','responsables.surname as responsables_surname','languages.name as languages_name','modes.name as modes_name','responsables.photo as responsables_photo')
        ->orderBy('courses.position','Asc')
        ->get();
        
        
        foreach ($courses as $key => $item) {
            $item->datelimite=Carbon::parse($item->datelimite)->toObject();
            $item->description=substr($item->description,0,200);    
        } 
        
        return view('courses.index')->with([
            'courses'=>$courses,
            'degrees'=>$degrees,
        ]);
        

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
    
        $val=$course->where('courses.id',$course->id)->join('modalities','modalities.id','=','courses.modality_id')
        ->join('degrees','degrees.id','=','courses.degree_id')
        ->join('languages','languages.id','=','courses.language_id')
        ->join('modes','modes.id','=','courses.mode_id')
        ->leftjoin('responsables','responsables.id','=','courses.responsable_id')
        ->select('courses.*','modalities.name as modalitiy_name','degrees.name as degrees_name','responsables.surname as responsables_surname','languages.name as languages_name','modes.name as modes_name','responsables.name as responsables_name')
        ->get();
       

        foreach ($val as $key => $item) {
            Carbon::parse($item->datelimite)->locale('FR_fr')->diffForHumans();
        }
        
        
      
        $programs=Program::where('course_id',$course->id)->get();
        $downloads=Download::where('course_id',$course->id)->get();
        $degrees=Degree::all();
        $design=Design::first();
        
        
        
        $last_courses= $course->join('modalities','modalities.id','=','courses.modality_id')
        ->select('courses.name','courses.id','modalities.name as modalitiy_name')
        ->orderByDesc('courses.created_at')
        ->limit(3)->get();
        
      
        $countries= [
            "Maroc",
             "Afghanistan",
             "Afrique du Sud",
             "Albanie",
             "Alg??rie",
             "Allemagne",
             "Andorre",
             "Angola",
             "Anguilla",
             "Antarctique",
             "Antigua-et-Barbuda",
             "Antilles n??erlandaises",
             "Arabie saoudite",
             "Argentine",
             "Arm??nie",
             "Aruba",
             "Australie",
             "Autriche",
             "Azerba??djan",
             "Bahamas",
             "Bahre??n",
             "Bangladesh",
             "Barbade",
             "B??larus",
             "Belgique",
             "Belize",
             "B??nin",
             "Bermudes",
            "Bhoutan",
            "Bolivie",
            "Bosnie-Herz??govine",
            "Botswana",
            "Br??sil",
            "Brun??i Darussalam",
            "Bulgarie",
            "Burkina Faso",
            "Burundi",
            "Cambodge",
            "Cameroun",
            "Canada",
            "Cap-Vert",
            "Ceuta et Melilla",
            "Chili",
            "Chine",
            "Chypre",
            "Colombie",
            "Comores",
            "Congo-Brazzaville",
            "Cor??e du Nord",
            "Cor??e du Sud",
            "Costa Rica",
            "Croatie",
            "C??te d???Ivoire",
            "Cuba",
            "Danemark",
            "Diego Garcia",
            "Djibouti",
            "Dominique",
            "??gypte",
            "El Salvador",
            "??mirats arabes unis",
            "??quateur",
            "??rythr??e",
            "Espagne",
            "Estonie",
            "??tat de la Cit?? du Vatican",
            "??tats f??d??r??s de Micron??sie",
            "??tats-Unis",
            "??thiopie",
            "Fidji",
            "Finlande",
            "France",
            "Gabon",
            "Gambie",
            "G??orgie",
            "G??orgie du Sud et les ??les Sandwich du Sud",
            "Ghana",
            "Gibraltar",
            "Gr??ce",
            "Grenade",
            "Groenland",
            "Guadeloupe",
            "Guam",
            "Guatemala",
            "Guernesey",
            "Guin??e",
            "Guin??e ??quatoriale",
            "Guin??e-Bissau",
            "Guyana",
            "Guyane fran??aise",
            "Ha??ti",
            "Honduras",
            "Hongrie",
            "??le Bouvet",
            "??le Christmas",
            "??le Clipperton",
            "??le de l'Ascension",
            "??le de Man",
            "??le Norfolk",
            "??les ??land",
            "??les Ca??mans",
            "??les Canaries",
            "??les Cocos - Keeling",
            "??les Cook",
            "??les F??ro??",
            "??les Heard et MacDonald",
            "??les Malouines",
            "??les Mariannes du Nord",
            "??les Marshall",
            "??les Mineures ??loign??es des ??tats-Unis",
            "??les Salomon",
            "??les Turks et Ca??ques",
            "??les Vierges britanniques",
            "??les Vierges des ??tats-Unis",
            "Inde",
            "Indon??sie",
            "Irak",
            "Iran",
            "Irlande",
            "Islande",
            "Isra??l",
            "Italie",
            "Jama??que",
            "Japon",
            "Jersey",
            "Jordanie",
            "Kazakhstan",
            "Kenya",
            "Kirghizistan",
            "Kiribati",
            "Kowe??t",
            "Laos",
            "Lesotho",
            "Lettonie",
            "Liban",
            "Lib??ria",
            "Libye",
            "Liechtenstein",
            "Lituanie",
            "Luxembourg",
            "Mac??doine",
            "Madagascar",
            "Malaisie",
            "Malawi",
            "Maldives",
            "Mali",
            "Malte",
            "Martinique",
            "Maurice",
            "Mauritanie",
            "Mayotte",
            "Mexique",
            "Moldavie",
            "Monaco",
            "Mongolie",
            "Mont??n??gro",
            "Montserrat",
            "Mozambique",
            "Myanmar",
            "Namibie",
            "Nauru",
            "N??pal",
            "Nicaragua",
            "Niger",
            "Nig??ria",
            "Niue",
            "Norv??ge",
            "Nouvelle-Cal??donie",
            "Nouvelle-Z??lande",
            "Oman",
            "Ouganda",
            "Ouzb??kistan",
            "Pakistan",
            "Palaos",
            "Panama",
            "Papouasie-Nouvelle-Guin??e",
            "Paraguay",
            "Pays-Bas",
            "P??rou",
            "Philippines",
            "Pitcairn",
            "Pologne",
            "Polyn??sie fran??aise",
            "Porto Rico",
            "Portugal",
            "Qatar",
            "R.A.S. chinoise de Hong Kong",
            "R.A.S. chinoise de Macao",
            "r??gions ??loign??es de l???Oc??anie",
            "R??publique centrafricaine",
            "R??publique d??mocratique du Congo",
            "R??publique dominicaine",
            "R??publique tch??que",
            "R??union",
            "Roumanie",
            "Royaume-Uni",
            "Russie",
            "Rwanda",
            "Saint-Barth??l??my",
            "Saint-Kitts-et-Nevis",
            "Saint-Marin",
            "Saint-Martin",
            "Saint-Pierre-et-Miquelon",
            "Saint-Vincent-et-les Grenadines",
            "Sainte-H??l??ne",
            "Sainte-Lucie",
            "Samoa",
            "Samoa am??ricaines",
            "Sao Tom??-et-Principe",
            "S??n??gal",
            "Serbie",
            "Serbie-et-Mont??n??gro",
            "Seychelles",
            "Sierra Leone",
            "Singapour",
            "Slovaquie",
            "Slov??nie",
            "Somalie",
            "Soudan",
            "Sri Lanka",
            "Su??de",
            "Suisse",
            "Suriname",
            "Svalbard et ??le Jan Mayen",
            "Swaziland",
            "Syrie",
            "Tadjikistan",
            "Ta??wan",
            "Tanzanie",
            "Tchad",
            "Terres australes fran??aises",
            "Territoire britannique de l'oc??an Indien",
            "Territoire palestinien",
            "Tha??lande",
            "Timor oriental",
            "Togo",
            "Tokelau",
            "Tonga",
            "Trinit??-et-Tobago",
            "Tristan da Cunha",
            "Tunisie",
            "Turkm??nistan",
            "Turquie",
            "Tuvalu",
            "Ukraine",
            "Union europ??enne",
            "Uruguay",
            "Vanuatu",
            "Venezuela",
            "Vi??t Nam",
            "Wallis-et-Futuna",
            "Y??men",
            "Zambie",
            "Zimbabwe"
         ];
        $provinces= [
        
            "Al Haouz"
           ,
           
             "Al Hoceima"
           ,
           
            "Aousserd???"
           ,
           
             "Assa-Zag"
           ,
           
           "Azilal"
           ,
           
             "B??ni Mellal"
           ,
           
             "Benslimane"
           ,
           
             "Berkan"
           ,
           
             "Berrechid"
           ,
           
             "Boujdour"
           ,
           
             "Boulemane"
           ,
           
             "Casablanca"
           ,
           
             "Chefchaouen"
           ,
           
             "Chichaoua"
           ,
           
             "Chtouka-A??t Baha"
           ,
           
             "Driouch"
           ,
           
             "El Hajeb"
           ,
           
            "El Jadida"
           ,
           
            "Errachidia"
           ,
           
            "Es-Semara???"
           ,
           
            "Essaouira"
           ,
           
             "Fahs-Anjra"
           ,
           
            "F??s"
           ,
           
             "Figuig"
           ,
           
             "Fquih Ben Salah"
           ,
           
            "Guelmim"
           ,
           
             "Guercif"
           ,
           
             "Ifrane"
           ,
           
             "Inezgane-A??t Melloul"
           ,
           
            "Jerada"
           ,
           
             "Kel??a des Sraghna"
           ,
           
             "K??nitra"
           ,
           
            "Kh??misset"
           ,
           
            "Kh??nifra"
           ,
           
             "Khouribga???"
           ,
           
             "La??youne"
           ,
           
             "Larache"
           ,
           
            "M'diq-Fnideq"
           ,
           
             "Marrakech"
           ,
           
            "M??diouna"
           ,
           
           "Mekn??s"
           ,
           
           "Midelt"
           ,
           
           "Mohammadia"
           ,
           
           "Moulay Yacoub"
           ,
           
           "Nador"
           ,
           
           "Nouaceur"
           ,
           
           "Ouarzazate"
           ,
           
           "Ouazzane"
           ,
           
           "Oued Ed-Dahab"
           ,
           
           "Oujda-Angad"
           ,
           
           "Rabat"
           ,
           
           "Rehamna"
           ,
           
           "Safi"
           ,
           
           "Sal??"
           ,
           
           "Sefrou"
           ,
           
           "Settat"
           ,
           
           "Sidi Bennour"
           ,
           
           "Sidi Ifni"
           ,
           
           "Sidi Kacem"
           ,
           
           "Sidi Slimane"
           ,
           
           "Skhirate-T??mara"
           ,
           
            "Tan-Tan"
           ,
           
           "Tanger-Assilah"
           ,
           
           "Taounate"
           ,
           
           "Taourirt"
           ,
           
           "Tarfaya"
           ,
           
           "Taroudannt"
           ,
           
           "Tata"
           ,
           
           "Taza"
           ,
           
           "T??touan"
           ,
           
           "Tinghir"
           ,
           
           "Tiznit"
           ,
           
           "Youssoufia"
           ,
           
           "Zagora???"
           ,
           
           "Autre"
           
       ];
       
       $levels=[
            "Bac",
            "Bac+1",
            "Technicien",
          "Technicien sp??cialis??",
             "Bac+2/DUT/DEUG",
            "Bac+3/Licence",
             "Bac+4/Master 1",
            "Bac+5/Master 2",
           "MBA",
            "Ing??nieur",
           "Doctorat",
          "Autres",
         ];
        
      
      
      
         return view('courses.details')->with([
            'courses'=>$val,
            'programs'=> $programs, 
            'downloads'=> $downloads, 
            'degrees'=>$degrees,
            'last_courses'=>$last_courses,
            'countries'=>$countries,
            'provinces'=>$provinces,
            'levels'=>$levels,
          'design'=>$design

        ]);

        
    }
    
    public function showByName(string $res)
    {
    
      $programs=[];
      $downloads=[];
      $degrees=[];
      $last_courses=[];
      $countries=[];
      $levels=[];
      $provinces=[];
      $val=[];
      $design=Design::first();

      

      $val=DB::table('courses')->where('courses.name',$res)->join('modalities','modalities.id','=','courses.modality_id')
      ->join('degrees','degrees.id','=','courses.degree_id')
      ->join('languages','languages.id','=','courses.language_id')
      ->join('modes','modes.id','=','courses.mode_id')
      ->join('locations','locations.id','=','courses.location_id')
      ->leftjoin('responsables','responsables.id','=','courses.responsable_id')
      ->select('courses.*','modalities.name as modalitiy_name','locations.name as locations_name','degrees.name as degrees_name','responsables.surname as responsables_surname','languages.name as languages_name','modes.name as modes_name','responsables.name as responsables_name')
      ->get();




      if (count($val)>0) {
      
      foreach ($val as $key => $item) {
          Carbon::parse($item->datelimite)->locale('FR_fr')->diffForHumans();
      }
      $programs=Program::where('course_id',$val[0]->id)->get();
      $downloads=Download::where('course_id',$val[0]->id)->get();
      $degrees=Degree::all();
      
      $last_courses= DB::table('courses')->join('modalities','modalities.id','=','courses.modality_id')
      ->select('courses.name','courses.id','modalities.name as modalitiy_name')
      ->orderByDesc('courses.created_at')
      ->limit(3)->get();
    
      $countries= [
          "Maroc",
           "Afghanistan",
           "Afrique du Sud",
           "Albanie",
           "Alg??rie",
           "Allemagne",
           "Andorre",
           "Angola",
           "Anguilla",
           "Antarctique",
           "Antigua-et-Barbuda",
           "Antilles n??erlandaises",
           "Arabie saoudite",
           "Argentine",
           "Arm??nie",
           "Aruba",
           "Australie",
           "Autriche",
           "Azerba??djan",
           "Bahamas",
           "Bahre??n",
           "Bangladesh",
           "Barbade",
           "B??larus",
           "Belgique",
           "Belize",
           "B??nin",
           "Bermudes",
          "Bhoutan",
          "Bolivie",
          "Bosnie-Herz??govine",
          "Botswana",
          "Br??sil",
          "Brun??i Darussalam",
          "Bulgarie",
          "Burkina Faso",
          "Burundi",
          "Cambodge",
          "Cameroun",
          "Canada",
          "Cap-Vert",
          "Ceuta et Melilla",
          "Chili",
          "Chine",
          "Chypre",
          "Colombie",
          "Comores",
          "Congo-Brazzaville",
          "Cor??e du Nord",
          "Cor??e du Sud",
          "Costa Rica",
          "Croatie",
          "C??te d???Ivoire",
          "Cuba",
          "Danemark",
          "Diego Garcia",
          "Djibouti",
          "Dominique",
          "??gypte",
          "El Salvador",
          "??mirats arabes unis",
          "??quateur",
          "??rythr??e",
          "Espagne",
          "Estonie",
          "??tat de la Cit?? du Vatican",
          "??tats f??d??r??s de Micron??sie",
          "??tats-Unis",
          "??thiopie",
          "Fidji",
          "Finlande",
          "France",
          "Gabon",
          "Gambie",
          "G??orgie",
          "G??orgie du Sud et les ??les Sandwich du Sud",
          "Ghana",
          "Gibraltar",
          "Gr??ce",
          "Grenade",
          "Groenland",
          "Guadeloupe",
          "Guam",
          "Guatemala",
          "Guernesey",
          "Guin??e",
          "Guin??e ??quatoriale",
          "Guin??e-Bissau",
          "Guyana",
          "Guyane fran??aise",
          "Ha??ti",
          "Honduras",
          "Hongrie",
          "??le Bouvet",
          "??le Christmas",
          "??le Clipperton",
          "??le de l'Ascension",
          "??le de Man",
          "??le Norfolk",
          "??les ??land",
          "??les Ca??mans",
          "??les Canaries",
          "??les Cocos - Keeling",
          "??les Cook",
          "??les F??ro??",
          "??les Heard et MacDonald",
          "??les Malouines",
          "??les Mariannes du Nord",
          "??les Marshall",
          "??les Mineures ??loign??es des ??tats-Unis",
          "??les Salomon",
          "??les Turks et Ca??ques",
          "??les Vierges britanniques",
          "??les Vierges des ??tats-Unis",
          "Inde",
          "Indon??sie",
          "Irak",
          "Iran",
          "Irlande",
          "Islande",
          "Isra??l",
          "Italie",
          "Jama??que",
          "Japon",
          "Jersey",
          "Jordanie",
          "Kazakhstan",
          "Kenya",
          "Kirghizistan",
          "Kiribati",
          "Kowe??t",
          "Laos",
          "Lesotho",
          "Lettonie",
          "Liban",
          "Lib??ria",
          "Libye",
          "Liechtenstein",
          "Lituanie",
          "Luxembourg",
          "Mac??doine",
          "Madagascar",
          "Malaisie",
          "Malawi",
          "Maldives",
          "Mali",
          "Malte",
          "Martinique",
          "Maurice",
          "Mauritanie",
          "Mayotte",
          "Mexique",
          "Moldavie",
          "Monaco",
          "Mongolie",
          "Mont??n??gro",
          "Montserrat",
          "Mozambique",
          "Myanmar",
          "Namibie",
          "Nauru",
          "N??pal",
          "Nicaragua",
          "Niger",
          "Nig??ria",
          "Niue",
          "Norv??ge",
          "Nouvelle-Cal??donie",
          "Nouvelle-Z??lande",
          "Oman",
          "Ouganda",
          "Ouzb??kistan",
          "Pakistan",
          "Palaos",
          "Panama",
          "Papouasie-Nouvelle-Guin??e",
          "Paraguay",
          "Pays-Bas",
          "P??rou",
          "Philippines",
          "Pitcairn",
          "Pologne",
          "Polyn??sie fran??aise",
          "Porto Rico",
          "Portugal",
          "Qatar",
          "R.A.S. chinoise de Hong Kong",
          "R.A.S. chinoise de Macao",
          "r??gions ??loign??es de l???Oc??anie",
          "R??publique centrafricaine",
          "R??publique d??mocratique du Congo",
          "R??publique dominicaine",
          "R??publique tch??que",
          "R??union",
          "Roumanie",
          "Royaume-Uni",
          "Russie",
          "Rwanda",
          "Saint-Barth??l??my",
          "Saint-Kitts-et-Nevis",
          "Saint-Marin",
          "Saint-Martin",
          "Saint-Pierre-et-Miquelon",
          "Saint-Vincent-et-les Grenadines",
          "Sainte-H??l??ne",
          "Sainte-Lucie",
          "Samoa",
          "Samoa am??ricaines",
          "Sao Tom??-et-Principe",
          "S??n??gal",
          "Serbie",
          "Serbie-et-Mont??n??gro",
          "Seychelles",
          "Sierra Leone",
          "Singapour",
          "Slovaquie",
          "Slov??nie",
          "Somalie",
          "Soudan",
          "Sri Lanka",
          "Su??de",
          "Suisse",
          "Suriname",
          "Svalbard et ??le Jan Mayen",
          "Swaziland",
          "Syrie",
          "Tadjikistan",
          "Ta??wan",
          "Tanzanie",
          "Tchad",
          "Terres australes fran??aises",
          "Territoire britannique de l'oc??an Indien",
          "Territoire palestinien",
          "Tha??lande",
          "Timor oriental",
          "Togo",
          "Tokelau",
          "Tonga",
          "Trinit??-et-Tobago",
          "Tristan da Cunha",
          "Tunisie",
          "Turkm??nistan",
          "Turquie",
          "Tuvalu",
          "Ukraine",
          "Union europ??enne",
          "Uruguay",
          "Vanuatu",
          "Venezuela",
          "Vi??t Nam",
          "Wallis-et-Futuna",
          "Y??men",
          "Zambie",
          "Zimbabwe"
       ];
      $provinces= [
      
          "Al Haouz"
         ,
         
           "Al Hoceima"
         ,
         
          "Aousserd???"
         ,
         
           "Assa-Zag"
         ,
         
         "Azilal"
         ,
         
           "B??ni Mellal"
         ,
         
           "Benslimane"
         ,
         
           "Berkan"
         ,
         
           "Berrechid"
         ,
         
           "Boujdour"
         ,
         
           "Boulemane"
         ,
         
           "Casablanca"
         ,
         
           "Chefchaouen"
         ,
         
           "Chichaoua"
         ,
         
           "Chtouka-A??t Baha"
         ,
         
           "Driouch"
         ,
         
           "El Hajeb"
         ,
         
          "El Jadida"
         ,
         
          "Errachidia"
         ,
         
          "Es-Semara???"
         ,
         
          "Essaouira"
         ,
         
           "Fahs-Anjra"
         ,
         
          "F??s"
         ,
         
           "Figuig"
         ,
         
           "Fquih Ben Salah"
         ,
         
          "Guelmim"
         ,
         
           "Guercif"
         ,
         
           "Ifrane"
         ,
         
           "Inezgane-A??t Melloul"
         ,
         
          "Jerada"
         ,
         
           "Kel??a des Sraghna"
         ,
         
           "K??nitra"
         ,
         
          "Kh??misset"
         ,
         
          "Kh??nifra"
         ,
         
           "Khouribga???"
         ,
         
           "La??youne"
         ,
         
           "Larache"
         ,
         
          "M'diq-Fnideq"
         ,
         
           "Marrakech"
         ,
         
          "M??diouna"
         ,
         
         "Mekn??s"
         ,
         
         "Midelt"
         ,
         
         "Mohammadia"
         ,
         
         "Moulay Yacoub"
         ,
         
         "Nador"
         ,
         
         "Nouaceur"
         ,
         
         "Ouarzazate"
         ,
         
         "Ouazzane"
         ,
         
         "Oued Ed-Dahab"
         ,
         
         "Oujda-Angad"
         ,
         
         "Rabat"
         ,
         
         "Rehamna"
         ,
         
         "Safi"
         ,
         
         "Sal??"
         ,
         
         "Sefrou"
         ,
         
         "Settat"
         ,
         
         "Sidi Bennour"
         ,
         
         "Sidi Ifni"
         ,
         
         "Sidi Kacem"
         ,
         
         "Sidi Slimane"
         ,
         
         "Skhirate-T??mara"
         ,
         
          "Tan-Tan"
         ,
         
         "Tanger-Assilah"
         ,
         
         "Taounate"
         ,
         
         "Taourirt"
         ,
         
         "Tarfaya"
         ,
         
         "Taroudannt"
         ,
         
         "Tata"
         ,
         
         "Taza"
         ,
         
         "T??touan"
         ,
         
         "Tinghir"
         ,
         
         "Tiznit"
         ,
         
         "Youssoufia"
         ,
         
         "Zagora???"
         ,
         
         "Autre"
         
     ];
      $levels=[
          "Bac",
          "Bac+1",
          "Technicien",
        "Technicien sp??cialis??",
           "Bac+2/DUT/DEUG",
          "Bac+3/Licence",
           "Bac+4/Master 1",
          "Bac+5/Master 2",
         "MBA",
          "Ing??nieur",
         "Doctorat",
        "Autres",
       ];
      }
     
   
       return view('courses.byname')->with([
          'courses'=>$val,
          'programs'=> $programs, 
          'downloads'=> $downloads, 
          'degrees'=>$degrees,
          'last_courses'=>$last_courses,
          'countries'=>$countries,
          'provinces'=>$provinces,
          'levels'=>$levels,
          'design'=>$design
      ]);
    }

 

}