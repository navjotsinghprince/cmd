<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserNote;
use App\Models\UserPaymentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Class CRUDController
 * @group CRUD Management
 * APIs for managing CRUD
 * Feel Free To Visit https://navjotsinghprince.com
 */
class CRUDController extends Controller
{

    /**
     * CREATE
     * This will be used to create the data on the database 🙂
     * @bodyParam email string required The email of the User. Example: najotsinghprince1@gmail.com
     * @unauthenticated
     */
    public function CREATE(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->validationFailed($message, "all fields are required");
        }

        DB::beginTransaction();
        try {
            DB::commit();
            return $this->actionSuccess("success", "");
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->actionFailure("An error occured =>  {$e->getMessage()}");
        }

        #Create Records With All Request Parameters
        $data = $request->input();
        $created = User::create($data);
        if ($created) {
            return $this->actionSuccess("success");
        } else {
            return $this->actionfailure("Failed, Could not created");
        }

        #Record Create With Custom Array
        $data =  [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'mobile' => $request->mobile,
        ];
        $created = User::create($data);
        if ($created) {
            return $this->actionSuccess("success");
        }
    }


    /**
     * UPDATE
     * This will be used to update the data on the database 🙂
     */
    public function UPDATE(Request $request)
    {
        #Single Column Update
        $updated = User::where('id', $request->id)->update(['name' => $request->name]);

        #Multiple Column Array
        $updated = User::where('id', $request->id)->update(['name' => $request->name, 'phone' => $request->phone_number]);

        #Update Multiple Nested Table Records //Get Last Inserted ID $result1->id
        DB::beginTransaction();
        try {
            $record =  [
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'mobile' => $request->mobile,
            ];
            $result1 = User::where('id', $request->id)->update($record);
            $userpaymentinfo =  [
                'credit_card' => $request->credit_card,
                'expiration' =>  $request->expiration,
                'cvv' => $request->cvv,
            ];
            $result2 = UserPaymentInfo::where('user_id', '=', $request->id)->update($userpaymentinfo);
            $Data = User::where('id', $request->id)->with('payment')->first(); //also fetch and return
            return $this->actionSuccess("User Information Updated", $Data);

            DB::commit();
            return $this->actionSuccess("success", "");
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->actionFailure("An error occured =>  {$e->getMessage()}");
        }

        #Enable and disable user
        $query = User::query();
        $query->where('id', $request->user_id);
        $user = $query->first();
        $query->update(['status' => !$user->status]);
        return $this->actionSuccess('success', []);
    }


    /**
     * GET,FETCH,READ 
     * This will be used to get , fetch , read the data on the database 🙂
     */
    public function GET_FETCH_READ(Request $request)
    {
        //(TODO::as a key as value is pending)
        $RowsPerPage = 30;

        #Single User Record
        $User = User::where('id', $request->user_id)->first();
        if ($User->isEmpty()) {
            return $this->notFound("User Not Found", $User);
        }

        #All Normal Users Records
        #$User = User::all();
        $User = User::orderBy('id', 'desc')->paginate($RowsPerPage); //with paginate
        if ($User->isEmpty()) {
            return $this->notFound("No Users Found");
        }

        #Single Column Value
        $UsedCoins = UserCoins::where('user_id', $request->user_id)->pluck('used_coins')->first();


        #Fetch Records With Selected Columns
        $result = Language::select('is_default', 'file_name')->where('id', $request->lang_id)->get();


        #Multiple Where Conditions Used For Fetch Records 
        $reports = ReportUser::where([['report_id', $request->report_id], ['status', '1']])->get();

        #Distinct((Different Values) Records With Count
        $user_report = ReportUser::distinct('report_id')->count('report_id');


        #Unique Single Report_Id Of User (Return only unique reports) (TODO::update this )
        $reports = ReportUser::select('report_id')->pluck('report_id')->unique();
        $data = array();
        //How many reports of single user
        foreach ($reports as $key => $value) {
            $d = ReportUser::where('reportee_id', $value)->with('reportedTo:id,name,username')->first();
            array_push($data, $d);
        }

        //Pass Variable To Query
        DB::table('users')->where(function ($query) use ($activated) {
            $query->where('activated', '=', $activated);
        })->get();


        #Use Function With Query  (Return warnings of user)
        $warningUser = User::whereIn('id', $warningUserID)->with('profile')
            ->withCount(['warning' => function ($q) {
                $q->where('warning', '1');
            }])->get();


        #Single Column With Multiple Where Conditions (Check user phone not empty or null)
        $user = Profile::where('user_id', $request->user_id)
            ->where(function ($query) {
                $query->where('phone', '!=', "")
                    ->orWhereNull('phone');
            })
            ->first();

        #Fetch all Only Trashed Records
        $books = Book::onlyTrashed()->with('payment', 'order')
            ->orderBy('created_at', 'desc')->paginate($RowsPerPage);
        if ($books->isEmpty()) {
            return $this->notFound("No Trashed Books Found");
        }

        #Fetch All Normal and Trashed Records
        $books = Book::withTrashed()->with('payment', 'order')
            ->orderBy('created_at', 'desc')->paginate($RowsPerPage);
        if ($books->isEmpty()) {
            return $this->notFound("No Trashed and All Books Found");
        }


        #Fetch Records With Relationships(Mutilple tables related data) 
        $homedata = Book::with('payment', 'order')->orderBy('id', 'desc')->paginate($RowsPerPage);
        if ($homedata->isEmpty()) {
            return $this->notFound("Home data Not Found");
        }

        #Fetch Orders And users/payment of Specified User with Matching book_id(forign key)
        $orders = AddOrder::with('payment', 'users')->where('book_id', $request->uid)
            ->orderBy('id', 'desc')->paginate($RowsPerPage);
        if ($orders->isEmpty()) {
            return $this->notFound("Orders Not Found");
        }

        #Ignore(Columns) user phone number where id=1(Search Another People Phone Number Not User_id =1)
        $Exists = Profile::where('user_id', '!=', 1)->where('phone', $phone)->count();


        //WORKING WITH DATES

    }
}
