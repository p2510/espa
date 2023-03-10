@extends('layouts.app')
@section('content')
    <style>
        section>.container,
        section>.container-fluid {
            padding-top: 0px;
            padding-bottom: 0px;


        }
    </style>
    
    <div class="main-content">

        <div class="main-content">
            <section class="inner-header divider " style="background-color:white;border-top:solid 2px rgb(45, 69, 88) ;">
                <div class=" pt-10 pb-10 ">
                    <!-- Section Content -->
                    <div class="section-content ml-90 ">
                        <div class="row">
                            <div class="col-md-6">
                                <ol class="breadcrumb text-left mt-10" style="color:rgb(45, 69, 88);font-weight:bold;">
                                    <li><a href="/">Acceuil</a></li>
                                    <li>Corps professoral et staff </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @if (count($responsables) > 0)
                <!-- Section: team -->
                <section id="team">
                    <div class="container">
                        <div class="section-content">
                            <div class="row mtli-row-clearfix">
                                @foreach ($responsables as $responsable)
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <div class="team-members mb-40">
                                            <div class="team-thumb mr-0">
                                                <img src="{{ asset('storage') }}/{{ $responsable->photo }}" alt=""
                                                    class="img-fullwidth">
                                            </div>
                                            <div class="team-bottom-part border-1px p-15">
                                                <h4 class="text-uppercase font-weight-600 m-0 pb-5">{{ $responsable->name }}
                                                    {{ $responsable->surname }}</h4>
                                                <h6 class="font-13 text-gray mt-0">{{ $responsable->statut }}</h6>
                                                <h6 class="font-13 text-gray mt-0">{{ $responsable->poste }}</h6>

                                                <h6 class="font-13 text-gray mt-0">{{ $responsable->etablissement }}</h6>
                                                <ul class="list-inline mt-15">

                                                    @if (isset($responsable->country))
                                                        <li class="m-0 pr-10" style="width:100%;"> <i
                                                                class="pe-7s-global font-16  text-theme-colored2 mr-5"></i>
                                                            <a class="text-gray" href="#">
                                                                @php
                                                                    $countries = [
                                                                        'AF' => 'Afghanistan',
                                                                        'ZA' => 'Afrique du Sud',
                                                                        'AL' => 'Albanie',
                                                                        'DZ' => 'Alg??rie',
                                                                        'DE' => 'Allemagne',
                                                                        'AD' => 'Andorre',
                                                                        'AO' => 'Angola',
                                                                        'AI' => 'Anguilla',
                                                                        'AQ' => 'Antarctique',
                                                                        'AG' => 'Antigua-et-Barbuda',
                                                                        'SA' => 'Arabie saoudite',
                                                                        'AR' => 'Argentine',
                                                                        'AM' => 'Arm??nie',
                                                                        'AW' => 'Aruba',
                                                                        'AU' => 'Australie',
                                                                        'AT' => 'Autriche',
                                                                        'AZ' => 'Azerba??djan',
                                                                        'BS' => 'Bahamas',
                                                                        'BH' => 'Bahre??n',
                                                                        'BD' => 'Bangladesh',
                                                                        'BB' => 'Barbade',
                                                                        'BE' => 'Belgique',
                                                                        'BZ' => 'Belize',
                                                                        'BJ' => 'B??nin',
                                                                        'BM' => 'Bermudes',
                                                                        'BT' => 'Bhoutan',
                                                                        'BY' => 'Bi??lorussie',
                                                                        'BO' => 'Bolivie',
                                                                        'BA' => 'Bosnie-Herz??govine',
                                                                        'BW' => 'Botswana',
                                                                        'BR' => 'Br??sil',
                                                                        'BN' => 'Brun??i Darussalam',
                                                                        'BG' => 'Bulgarie',
                                                                        'BF' => 'Burkina Faso',
                                                                        'BI' => 'Burundi',
                                                                        'KH' => 'Cambodge',
                                                                        'CM' => 'Cameroun',
                                                                        'CA' => 'Canada',
                                                                        'CV' => 'Cap-Vert',
                                                                        'CL' => 'Chili',
                                                                        'CN' => 'Chine',
                                                                        'CY' => 'Chypre',
                                                                        'CO' => 'Colombie',
                                                                        'KM' => 'Comores',
                                                                        'CG' => 'Congo-Brazzaville',
                                                                        'CD' => 'Congo-Kinshasa',
                                                                        'KP' => 'Cor??e du Nord',
                                                                        'KR' => 'Cor??e du Sud',
                                                                        'CR' => 'Costa Rica',
                                                                        'CI' => 'C??te d???Ivoire',
                                                                        'HR' => 'Croatie',
                                                                        'CU' => 'Cuba',
                                                                        'CW' => 'Cura??ao',
                                                                        'DK' => 'Danemark',
                                                                        'DJ' => 'Djibouti',
                                                                        'DM' => 'Dominique',
                                                                        'EG' => '??gypte',
                                                                        'AE' => '??mirats arabes unis',
                                                                        'EC' => '??quateur',
                                                                        'ER' => '??rythr??e',
                                                                        'ES' => 'Espagne',
                                                                        'EE' => 'Estonie',
                                                                        'SZ' => 'Eswatini',
                                                                        'VA' => '??tat de la Cit?? du Vatican',
                                                                        'FM' => '??tats f??d??r??s de Micron??sie',
                                                                        'US' => '??tats-Unis',
                                                                        'ET' => '??thiopie',
                                                                        'FJ' => 'Fidji',
                                                                        'FI' => 'Finlande',
                                                                        'FR' => 'France',
                                                                        'GA' => 'Gabon',
                                                                        'GM' => 'Gambie',
                                                                        'GE' => 'G??orgie',
                                                                        'GS' => 'G??orgie du Sud et ??les Sandwich du Sud',
                                                                        'GH' => 'Ghana',
                                                                        'GI' => 'Gibraltar',
                                                                        'GR' => 'Gr??ce',
                                                                        'GD' => 'Grenade',
                                                                        'GL' => 'Groenland',
                                                                        'GP' => 'Guadeloupe',
                                                                        'GU' => 'Guam',
                                                                        'GT' => 'Guatemala',
                                                                        'GG' => 'Guernesey',
                                                                        'GN' => 'Guin??e',
                                                                        'GQ' => 'Guin??e ??quatoriale',
                                                                        'GW' => 'Guin??e-Bissau',
                                                                        'GY' => 'Guyana',
                                                                        'GF' => 'Guyane fran??aise',
                                                                        'HT' => 'Ha??ti',
                                                                        'HN' => 'Honduras',
                                                                        'HU' => 'Hongrie',
                                                                        'BV' => '??le Bouvet',
                                                                        'CX' => '??le Christmas',
                                                                        'IM' => '??le de Man',
                                                                        'NF' => '??le Norfolk',
                                                                        'AX' => '??les ??land',
                                                                        'KY' => '??les Ca??mans',
                                                                        'CC' => '??les Cocos',
                                                                        'CK' => '??les Cook',
                                                                        'FO' => '??les F??ro??',
                                                                        'HM' => '??les Heard et McDonald',
                                                                        'FK' => '??les Malouines',
                                                                        'MP' => '??les Mariannes du Nord',
                                                                        'MH' => '??les Marshall',
                                                                        'UM' => '??les mineures ??loign??es des ??tats-Unis',
                                                                        'PN' => '??les Pitcairn',
                                                                        'SB' => '??les Salomon',
                                                                        'TC' => '??les Turques-et-Ca??ques',
                                                                        'VG' => '??les Vierges britanniques',
                                                                        'VI' => '??les Vierges des ??tats-Unis',
                                                                        'IN' => 'Inde',
                                                                        'ID' => 'Indon??sie',
                                                                        'IQ' => 'Irak',
                                                                        'IR' => 'Iran',
                                                                        'IE' => 'Irlande',
                                                                        'IS' => 'Islande',
                                                                        'IL' => 'Isra??l',
                                                                        'IT' => 'Italie',
                                                                        'JM' => 'Jama??que',
                                                                        'JP' => 'Japon',
                                                                        'JE' => 'Jersey',
                                                                        'JO' => 'Jordanie',
                                                                        'KZ' => 'Kazakhstan',
                                                                        'KE' => 'Kenya',
                                                                        'KG' => 'Kirghizistan',
                                                                        'KI' => 'Kiribati',
                                                                        'KW' => 'Kowe??t',
                                                                        'RE' => 'La R??union',
                                                                        'LA' => 'Laos',
                                                                        'LS' => 'Lesotho',
                                                                        'LV' => 'Lettonie',
                                                                        'LB' => 'Liban',
                                                                        'LR' => 'Lib??ria',
                                                                        'LY' => 'Libye',
                                                                        'LI' => 'Liechtenstein',
                                                                        'LT' => 'Lituanie',
                                                                        'LU' => 'Luxembourg',
                                                                        'MK' => 'Mac??doine du Nord',
                                                                        'MG' => 'Madagascar',
                                                                        'MY' => 'Malaisie',
                                                                        'MW' => 'Malawi',
                                                                        'MV' => 'Maldives',
                                                                        'ML' => 'Mali',
                                                                        'MT' => 'Malte',
                                                                        'MA' => 'Maroc',
                                                                        'MQ' => 'Martinique',
                                                                        'MU' => 'Maurice',
                                                                        'MR' => 'Mauritanie',
                                                                        'YT' => 'Mayotte',
                                                                        'MX' => 'Mexique',
                                                                        'MD' => 'Moldavie',
                                                                        'MC' => 'Monaco',
                                                                        'MN' => 'Mongolie',
                                                                        'ME' => 'Mont??n??gro',
                                                                        'MS' => 'Montserrat',
                                                                        'MZ' => 'Mozambique',
                                                                        'MM' => 'Myanmar (Birmanie)',
                                                                        'NA' => 'Namibie',
                                                                        'NR' => 'Nauru',
                                                                        'NP' => 'N??pal',
                                                                        'NI' => 'Nicaragua',
                                                                        'NE' => 'Niger',
                                                                        'NG' => 'Nig??ria',
                                                                        'NU' => 'Niue',
                                                                        'NO' => 'Norv??ge',
                                                                        'NC' => 'Nouvelle-Cal??donie',
                                                                        'NZ' => 'Nouvelle-Z??lande',
                                                                        'OM' => 'Oman',
                                                                        'UG' => 'Ouganda',
                                                                        'UZ' => 'Ouzb??kistan',
                                                                        'PK' => 'Pakistan',
                                                                        'PW' => 'Palaos',
                                                                        'PA' => 'Panama',
                                                                        'PG' => 'Papouasie-Nouvelle-Guin??e',
                                                                        'PY' => 'Paraguay',
                                                                        'NL' => 'Pays-Bas',
                                                                        'BQ' => 'Pays-Bas carib??ens',
                                                                        'PE' => 'P??rou',
                                                                        'PH' => 'Philippines',
                                                                        'PL' => 'Pologne',
                                                                        'PF' => 'Polyn??sie fran??aise',
                                                                        'PR' => 'Porto Rico',
                                                                        'PT' => 'Portugal',
                                                                        'QA' => 'Qatar',
                                                                        'HK' => 'R.A.S. chinoise de Hong Kong',
                                                                        'MO' => 'R.A.S. chinoise de Macao',
                                                                        'CF' => 'R??publique centrafricaine',
                                                                        'DO' => 'R??publique dominicaine',
                                                                        'RO' => 'Roumanie',
                                                                        'GB' => 'Royaume-Uni',
                                                                        'RU' => 'Russie',
                                                                        'RW' => 'Rwanda',
                                                                        'EH' => 'Sahara occidental',
                                                                        'BL' => 'Saint-Barth??lemy',
                                                                        'KN' => 'Saint-Christophe-et-Ni??v??s',
                                                                        'SM' => 'Saint-Marin',
                                                                        'MF' => 'Saint-Martin',
                                                                        'SX' => 'Saint-Martin (partie n??erlandaise)',
                                                                        'PM' => 'Saint-Pierre-et-Miquelon',
                                                                        'VC' => 'Saint-Vincent-et-les-Grenadines',
                                                                        'SH' => 'Sainte-H??l??ne',
                                                                        'LC' => 'Sainte-Lucie',
                                                                        'SV' => 'Salvador',
                                                                        'WS' => 'Samoa',
                                                                        'AS' => 'Samoa am??ricaines',
                                                                        'ST' => 'Sao Tom??-et-Principe',
                                                                        'SN' => 'S??n??gal',
                                                                        'RS' => 'Serbie',
                                                                        'SC' => 'Seychelles',
                                                                        'SL' => 'Sierra Leone',
                                                                        'SG' => 'Singapour',
                                                                        'SK' => 'Slovaquie',
                                                                        'SI' => 'Slov??nie',
                                                                        'SO' => 'Somalie',
                                                                        'SD' => 'Soudan',
                                                                        'SS' => 'Soudan du Sud',
                                                                        'LK' => 'Sri Lanka',
                                                                        'SE' => 'Su??de',
                                                                        'CH' => 'Suisse',
                                                                        'SR' => 'Suriname',
                                                                        'SJ' => 'Svalbard et Jan Mayen',
                                                                        'SY' => 'Syrie',
                                                                        'TJ' => 'Tadjikistan',
                                                                        'TW' => 'Ta??wan',
                                                                        'TZ' => 'Tanzanie',
                                                                        'TD' => 'Tchad',
                                                                        'CZ' => 'Tch??quie',
                                                                        'TF' => 'Terres australes fran??aises',
                                                                        'IO' => 'Territoire britannique de l???oc??an Indien',
                                                                        'PS' => 'Territoires palestiniens',
                                                                        'TH' => 'Tha??lande',
                                                                        'TL' => 'Timor oriental',
                                                                        'TG' => 'Togo',
                                                                        'TK' => 'Tokelau',
                                                                        'TO' => 'Tonga',
                                                                        'TT' => 'Trinit??-et-Tobago',
                                                                        'TN' => 'Tunisie',
                                                                        'TM' => 'Turkm??nistan',
                                                                        'TR' => 'Turquie',
                                                                        'TV' => 'Tuvalu',
                                                                        'UA' => 'Ukraine',
                                                                        'UY' => 'Uruguay',
                                                                        'VU' => 'Vanuatu',
                                                                        'VE' => 'Venezuela',
                                                                        'VN' => 'Vietnam',
                                                                        'WF' => 'Wallis-et-Futuna',
                                                                        'YE' => 'Y??men',
                                                                        'ZM' => 'Zambie',
                                                                        'ZW' => 'Zimbabwe',
                                                                    ];
                                                                    echo $countries[$responsable->country];
                                                                @endphp


                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if (isset($responsable->phone))
                                                        <li class="m-0 pr-10"> <i
                                                                class="fa fa-phone text-theme-colored2 mr-5"></i>
                                                            <a class="text-gray"
                                                                href="#">{{ $responsable->phone }}</a>
                                                        </li>
                                                    @endif
                                                    @if (isset($responsable->email))
                                                        <li class="m-0 pr-10"> <i
                                                                class="fa fa-envelope-o text-theme-colored2 mr-5"></i>
                                                            <a class="text-gray"
                                                                href="mailto:{{ $responsable->email }}">{{ $responsable->email }}</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                                <ul class="styled-icons icon-sm icon-dark icon-theme-colored2 mt-15">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </section>
            @else
                <h2 class="text-theme-colored2 font-36">Il n'y a pas de responsable </h2>
            @endif


        </div>
    @endsection
