<?php
namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\FranchiseInfo;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\Exception;

/**
 * Creating a Contact Controller class
 */
class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contactInfo = ContactInfo::join('franchise_info', 'contact_info.id_franchise', '=', 'franchise_info.id')->get();
        return view('grid.grid-contact', ['listContact' => $contactInfo]);
    }

    public function create()
    {
        return view('form.form-contact');
    }

    public function store(Request $request)
    {
        $saveData = $this->saveData($request);

        return view('form.form-contact')->with('msg_success', $saveData);
    }


    protected function saveData($request)
    {
        try {
            /**
             * @var $franchiseInfo used to save franchise info data on franchise_info table
             */
            $franchiseInfo = new FranchiseInfo();
            $franchiseInfo->franchise = $request->franchise;
            $franchiseInfo->credcard = $request->credit_card; // Needs to be encrypted
            $franchiseInfo->save();
            /**
             * @var $contactInfo save contact data on contact_info table
             */
            $contactInfo = new ContactInfo();
            $contactInfo->name = $request->name;
            $contactInfo->email = $request->email;
            $contactInfo->phone = $request->phone;
            $contactInfo->date_birth = $request->birth_date;
            $contactInfo->address = $request->address;
            $contactInfo->id_franchise = $franchiseInfo->id;
            $contactInfo->save();

            return "Success on save  the contact";
        } catch (Exception $exception){
            Return "error ao save data: " . $exception;
        }
    }


}
