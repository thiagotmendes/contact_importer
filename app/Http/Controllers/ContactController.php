<?php
namespace App\Http\Controllers;

use App\Imports\ContactInfoImportTest;
use App\Models\ContactInfo;
use App\Models\FranchiseInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use SebastianBergmann\CodeUnit\Exception;
// For CSV File
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $contactInfo = ContactInfo::
                        join('franchise_info', 'contact_info.id_franchise', '=', 'franchise_info.id')
                        ->simplePaginate(10);

        return view('grid.grid-contact', ['listContact' => $contactInfo]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('form.form-contact');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $arrayData = array(
            $request->name,
            $request->birth_date,
            $request->phone,
            $request->address,
            $request->credit_card,
            $request->franchise,
            $request->email
        );

        if($this->validateNameField($request->name)){
            return redirect()->route('contact-create')->with('msg_error', 'Impossible save data');
        }

        $saveData = $this->saveData($arrayData);
        return view('form.form-contact')->with('msg_success', $saveData);
    }

    /**
     * @param $request
     * @return string
     */
    protected function saveData($array)
    {
        try {
            /**
             * @var $contactInfo save contact data on contact_info table
             */
            $contactInfo = new ContactInfo();
            /**
             * @var $franchiseInfo used to save franchise info data on franchise_info table
             */
            $franchiseInfo = new FranchiseInfo();
            // Data block
            $contactInfo->name = $array[0]; // index 0
            $contactInfo->date_birth = $array[1]; // index 1
            $contactInfo->phone = $array[2];  // index 2
            $contactInfo->address = $array[3]; // index 3
            $franchiseInfo->credcard = Crypt::encrypt($array[4]); // index 4 Needs to be encrypted
            $franchiseInfo->franchise = $array[5]; // index 5
            $contactInfo->email = $array[6]; // index 6
            // Save data on database
            $franchiseInfo->save();
            // Create a relation with franchise table
            $contactInfo->id_franchise = $franchiseInfo->id; // Result of franchise insert
            $contactInfo->save();

            return "Success on save  the contact";
        } catch (Exception $exception){
            Return "error ao save data: " . $exception;
        }
    }

    /**
     * @param $name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function validateNameField($name)
    {
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/', $name))
        {
            return true;
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function importFileCreate()
    {
        return view('form.form-importFile');
    }

    /**
     * Create the import file request
     *
     * @param Request $request
     */
    public function importFile(Request $request)
    {
        /**
         * A simple way to import CSV file and save in database
         *
         * This code will import directly for DB: Excel::import(new ContactInfoImportTest(), $request->import_file)->toArray();
         *
         * This code transform the excel imported in a array
         */
        $array = array_values((new ContactInfoImportTest)->toArray($request->import_file));
        /**
         * Get the Excel header
         */
        $headings = (new HeadingRowImport)->toArray($request->import_file);
        // Get the array size
        $arraySize = count($array[0]);
        // just a loop
        for ($index = 0; $index < $arraySize; $index++){
            if($index > 0){
                $this->saveData($array[0][$index]);
            }
        }
        return view('form.form-contact')->with('msg_success', 'File imported with success');
    }
}
