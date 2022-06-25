<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Carrier;
use App\Models\Company;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{


    private $cities =  [
        "Ada",
        "Aleksinac",
        "Apatin",
        "Arilje",
        "Avala",
        "Backa Topola",
        "Backi Jarak",
        "Backi Petrovac",
        "Backo Gradiste",
        "Banatsko Novo Selo",
        "Barajevo",
        "Basaid",
        "Batajnica",
        "Becej",
        "Belgrade",
        "Bocar",
        "Bor",
        "Cantavir",
        "Coka",
        "Cukarica",
        "Cuprija",
        "Debeljaca",
        "Despotovac",
        "Dolovo",
        "Drenovac",
        "Futog",
        "Glozan",
        "Golubinci",
        "Gornji Milanovac",
        "Grocka",
        "Ingija",
        "Izvor",
        "Jagodina",
        "Kacarevo",
        "Kanjiza",
        "Kovin",
        "Kragujevac",
        "Kraljevo",
        "Leskovac",
        "Loznica",
        "Melenci",
        "Nikinci",
        "Nova Pazova",
        "Novi Banovci",
        "Novi Becej",
        "Novi Belgrade",
        "Novi Pazar",
        "Novi Sad",
        "Odzaci",
        "Palic",
        "Paracin",
        "Petrovac",
        "Petrovaradin",
        "Pirot",
        "Popovac",
        "Priboj",
        "Prokuplje",
        "Ratkovo",
        "Ruma",
        "Rumenka",
        "Savski Venac",
        "Selo Mladenovac",
        "Senta",
        "Sibac",
        "Simanovci",
        "Sirig",
        "Smederevo",
        "Sombor",
        "Srbobran",
        "Sremcica",
        "Sremska Kamenica",
        "Sremska Mitrovica",
        "Sremski Karlovci",
        "Stara Pazova",
        "Stari Banovci",
        "Subotica",
        "Surcin",
        "Svilajnac",
        "Svrljig",
        "Temerin",
        "Titel",
        "Tornjos",
        "Ugrinovci",
        "Umcari",
        "Umka",
        "Vajska",
        "Valjevo",
        "Veternik",
        "Vrbas",
        "Zajecar",
        "Zemun Polje",
        "Zlatibor",
        "Zrenjanin",
        "Aranđelovac",
        "Badovinci",
        "Bajina Bašta",
        "Banovo Polje",
        "Barič",
        "Bečmen",
        "Belotić",
        "Biljača",
        "Bogatić",
        "Bogosavac",
        "Boljevci",
        "Brdarica",
        "Bukor",
        "Čačak",
        "Čajetina",
        "Ćićevac",
        "Čokešina",
        "Crna Bara",
        "Ćuprija",
        "Dobanovci",
        "Dobrić",
        "Donji Dobrić",
        "Donji Milanovac",
        "Draginje",
        "Dublje",
        "Duboka",
        "Ðurići",
        "Glušci",
        "Golubac",
        "Gornja Bukovica",
        "Grabovac",
        "Jablanica",
        "Jadranska Lešnica",
        "Jarebice",
        "Jelenča",
        "Jevremovac",
        "Joševa",
        "Kamenica",
        "Klenje",
        "Knjazevac",
        "Kolubara",
        "Kozjak",
        "Krivaja",
        "Krupanj",
        "Kruševac",
        "Lagja e Poshtme",
        "Lapovo",
        "Lazarevac",
        "Lešnica",
        "Lipnički Šor",
        "Lipolist",
        "Ljig",
        "Ljubovija",
        "Lugavčina",
        "Mačva",
        "Majdanpek",
        "Majur",
        "Mala Moštanica",
        "Mali Zvornik",
        "Metković",
        "Miratovac",
        "Morava",
        "Negotin",
        "Niš",
        "Nišava",
        "Novo Selo",
        "Obrenovac",
        "Osečina",
        "Osječenik",
        "Ostružnica",
        "Ovča",
        "Paraćin",
        "Pčinja",
        "Petkovica",
        "Pocerski Pričinović",
        "Podunavlje District",
        "Pomoravlje",
        "Požarevac",
        "Prijepolje",
        "Prislonica",
        "Prnjavor",
        "Radenka",
        "Radovnica",
        "Rajince",
        "Rasina",
        "Raška",
        "Ribari",
        "Rumska",
        "Rušanj",
        "Šabac",
        "Salaš Crnobarski",
        "Samoljica",
        "Ševarice",
        "Ševica",
        "Sinošević",
        "Sjenica",
        "Smederevska Palanka",
        "Sokolovica",
        "Sokolovo Brdo",
        "Sremčica",
        "Stepojevac",
        "Štitar",
        "Stubline",
        "Šumadija",
        "Sumulicë",
        "Surčin",
        "Tabanović",
        "Toplica",
        "Tršić",
        "Trstenik",
        "Turija",
        "Tutin",
        "Užice",
        "Uzveće",
        "Varna",
        "Velika Moštanica",
        "Vladimirci",
        "Vranić",
        "Vranje",
        "Vrnjačka Banja",
        "Zaječar",
        "Zemun",
        "Zminjak",
        "Žujince",
        "Zvečka",
        "Adorjan",
        "Aleksandrovo",
        "Alibunar",
        "Aradac",
        "Bačka Palanka",
        "Bačka Topola",
        "Bački Breg",
        "Bački Petrovac",
        "Bačko Gradište",
        "Bačko Petrovo Selo",
        "Banatska Topola",
        "Banatski Despotovac",
        "Banatski Dvor",
        "Banatski Karlovac",
        "Banatsko Karađorđevo",
        "Banatsko Veliko Selo",
        "Baranda",
        "Barice",
        "Bašaid",
        "Bečej",
        "Bela Crkva",
        "Belegiš",
        "Belo Blato",
        "Beška",
        "Bočar",
        "Bogojevo",
        "Boka",
        "Bosut",
        "Botoš",
        "Buđanovci",
        "Čelarevo",
        "Čenta",
        "Čestereg",
        "Čoka",
        "Čortanovci",
        "Crepaja",
        "Čurug",
        "Debeljača",
        "Despotovo",
        "Dobrica",
        "Doroslovo",
        "Ðurđevo",
        "Ečka",
        "Elemir",
        "Farkaždin",
        "Gakovo",
        "Gardinovci",
        "Gložan",
        "Gornji Breg",
        "Grabovci",
        "Gudurica",
        "Hajdučica",
        "Hetin",
        "Hrtkovci",
        "Idvor",
        "Ilandža",
        "Inđija",
        "Irig",
        "Izbište",
        "Janošik",
        "Jarak",
        "Jarkovac",
        "Jaša Tomić",
        "Jazovo",
        "Jermenovci",
        "Kanjiža",
        "Kikinda",
        "Kisač",
        "Klek",
        "Klenak",
        "Knićanin",
        "Kolut",
        "Konak",
        "Kovačica",
        "Kovilj",
        "Krajišnik",
        "Krčedin",
        "Kulpin",
        "Kumane",
        "Kupinovo",
        "Kupusina",
        "Kuštilj",
        "Lazarevo",
        "Ljukovo",
        "Lok",
        "Lokve",
        "Lukićevo",
        "Mačvanska Mitrovica",
        "Maglić",
        "Margita",
        "Međa",
        "Mihajlovo",
        "Mokrin",
        "Mol",
        "Mošorin",
        "Nakovo",
        "Neuzina",
        "Nikolinci",
        "Nova Crnja",
        "Novi Itebej",
        "Novi Karlovci",
        "Novi Kneževac",
        "Novi Kozarci",
        "Novi Slankamen",
        "Novo Miloševo",
        "Obrovac",
        "Opovo",
        "Orlovat",
        "Ostojićevo",
        "Padej",
        "Padina",
        "Pančevo",
        "Pavliš",
        "Pećinci",
        "Perlez",
        "Plandište",
        "Platičevo",
        "Prigrevica",
        "Putinci",
        "Radenković",
        "Radojevo",
        "Ravni Topolovac",
        "Ravnje",
        "Ravno Selo",
        "Riđica",
        "Rusko Selo",
        "Sajan",
        "Šajkaš",
        "Sakule",
        "Salaš Noćajski",
        "Samoš",
        "Sanad",
        "Šašinci",
        "Sečanj",
        "Sefkerin",
        "Seleuš",
        "Šimanovci",
        "Sonta",
        "Srpska Crnja",
        "Srpski Itebej",
        "Stajićevo",
        "Stanišić",
        "Stari Lec",
        "Stepanovićevo",
        "Surduk",
        "Sutjeska",
        "Taraš",
        "Tiszahegyes",
        "Toba",
        "Tomaševac",
        "Torak",
        "Torda",
        "Uljma",
        "Uzdin",
        "Velika Greda",
        "Veliki Gaj",
        "Veliko Središte",
        "Vilovo",
        "Višnjićevo",
        "Vladimirovac",
        "Vlajkovac",
        "Vojka",
        "Vojvoda Stepa",
        "Vrdnik",
        "Vršac",
        "Žabalj",
        "Žitište",
        "Zmajevo"
    ];
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.register', ['cities' => $this->cities]);
    }

    public function indexCompany()
    {
        return view('company.register');
    }

    public function indexCarrier()
    {




        return view('carrier.register', ['cities' => $this->cities]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'city' =>   ['required','string', Rule::in($this->cities)],
            'phone' => ['required', 'string', 'max:12', 'unique:addresses'],
            'address' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Address::create([
            'user_id' => $user->id,
            'city' => $request->city,
            'phone' => $request->phone,
            'address' => $request->address,
            'zip' => $request->zip,
            'full_name' => $request->full_name,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function storeCompany(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255', 'unique:companies,name'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'logo' => ['required', 'mimes:jpg,jpeg,png'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $company = Company::create([
            'name' => $request->company_name,   // ***************FOLYAMATBAN************//
            'company_logo' => 'unknown.jpg',

        ]);

        if ($request->has('logo')) {
            $file = $request->file('logo');

            $filename = md5(Str::uuid() . time()) . '.' . $file->getClientOriginalExtension();

            $company->addMedia($file)->usingName('company_logos')->usingFileName($filename)->toMediaCollection('logo');
        }
        $company->update([
            'company_logo' => 'company_logos/' . $company->attachment->first()->file_name
        ]);


        $company->user()->save($user);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function storeCarrier(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'location' =>   ['required','string', Rule::in($this->cities)],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // success_deliveries	is_online	location
        $carrier = Carrier::create([
            'success_deliveries' => 0,
            'is_online' => false,
            'location' => $request->location
        ]);

        $carrier->user()->save($user);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
