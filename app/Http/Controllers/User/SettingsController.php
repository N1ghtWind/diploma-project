<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCarrierAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class SettingsController extends Controller
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

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Inertia::render('User/Settings', [

            'user_profile_picture' => User::find(auth()->user()->id)?->getMedia()?->first()?->getUrl(),
            'is_carrier' => User::find(auth()?->user()?->id)?->is_carrier(),
            'default_image' => asset('assets/images/default.webp'),
        ]);
    }

    public function account()
    {
        return Inertia::render('User/Account', [
            'user_email' => auth()->user()->email,
            'user_location' => User::find(auth()->user()->id)?->address()?->first()?->city,
            'user_phone' => User::find(auth()->user()->id)?->address()?->first()?->phone,
            'cities' => $this->cities,
        ]);
    }

    public function update_user_data(Request $request)
    {

        if ($request?->has('image') && $request?->image != null && $request?->image?->getSize() > 0) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            if (User::find(auth()->user()->id)?->getMedia()?->first() != null) {
                foreach (User::find(auth()->user()->id)?->getMedia() as $media) {
                    $media->delete();
                }
            }
            User::findOrFail(auth()->user()->id)->addMediaFromRequest('image')->usingName($image_name)->toMediaCollection();
        } else {
            return redirect()->back()->with('error', ['Please select an image']);
        }
        return redirect()->back()->with('success', 'Successfully updated the profile data!');
    }

    public function update_carrier_account(UpdateCarrierAccountRequest $request)
    {

        $user = User::findOrFail(auth()->user()->id);

        $user_input = [
            'email' => $request->email ?? null,
            'password' => $request->password ?? null,
        ];

        $carrier_input = [
            'location' => $request->location ?? null,
            'phone' => $request->phone ?? null,
        ];

        $filtered_user_input = collect($user_input)->filter()->all();
        $filtered_carrier_input = collect($carrier_input)->filter()->all();

        if (auth()->user()->email === $request->email) {
            unset($filtered_user_input['email']);
        }

        if (isset($filtered_user_input['password'])) {
            $filtered_user_input['password'] = Hash::make($filtered_user_input['password']);
        }


        if (isset($filtered_user_input['email'])) {
            $user->email_verified_at = null;
            $user->save();
        }


        User::find(auth()->user()->id)->update($filtered_user_input);
        auth()->user()->userable->update($filtered_carrier_input);


        if (isset($filtered_user_input['email'])) {
            User::find(auth()->user()->id)->sendEmailVerificationNotification();
            Auth::logout();
            session()->flush();
            return Inertia::location(url('/login'));
        }
        if (isset($filtered_user_input['password'])) {
            Auth::logout();
            session()->flush();
            return Inertia::location(url('/login'));
        }

        return redirect()->back()->with('success', 'Successfully updated the account data!');
    }
}
