<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Category;
use App\Rate;
use App\User;
use App\Bill;
use App\Monthlybill;
use App\Concessionaire;
use App\Position;

use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        // if (Auth::check())
        // {
        //     $name = Auth::user()->name;
        // }
        // dd($name);
        $dataBill = Monthlybill::where('status', '=', 0)
        ->where('billAmount', '!=', 0)
        ->where('monthlyDueDate', '<=', date('Y-m-d'))
        ->with('concessionaire')
        ->get();
        
        $dataConcessionaire = Concessionaire::where('status', '=', 'connected')->count();
        $dataApplicant = Concessionaire::where('status', '=', 'pending')->count();
        $dataConcessionaireAll = Concessionaire::where('status', '!=', 'pending')->count();
        $dataConcessionairediscon = Concessionaire::where('status', '=', 'disconnected')->count();
        $dataSetting = Setting::all();
        $collectibles = Monthlybill::where('status','=',0)->get();
        $amount = 0;
        foreach($collectibles as $dataCollectibles){
            $amount= $amount + $dataCollectibles->billAmount;
        }
        $payments = Monthlybill::where('status','=',1)->get();
        $paymentsamount = 0;
        foreach($payments as $payment){
            $paymentsamount= $paymentsamount + $payment->billAmount;
        }

        return view('admin.home', compact('dataSetting', 'dataConcessionaire', 'dataConcessionairediscon', 'dataConcessionaireAll','amount','paymentsamount', 'dataApplicant', 'dataBill'));
    }
    public function insert(){
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wbs_old";
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM consumer limit 0, 500";
        $result = $conn->query($sql);
        $consumers_array = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo "id: " . $row["consumer_id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                $first_name = $row["firstname"];
                $last_name = $row["lastname"];
                $middle_name = $row["middlename"];
                $town = $row["town"];
                $barangay = $row["barangay"];
                $town = $row["town"];
                $street = $row["street"];
                $installion_date = $row["date"];
                $consumer_id = $row["consumer_id"];

                if($row["service"] == 1){
                    $service = 'active';
                }
                else if($row["service"] == 2){
                    $service = 'disconnection';
                }
                else if($row["service"] == 3){
                    $service = 'reconnection';
                }
                else {
                    $service = 'inactive';
                }
            $x = 3; // Amount of digits
            $min = pow(10,$x);
            $max = pow(10,$x+1)-1;
            $value = rand($min, $max);
            $user = new User();
            $user->fname = $first_name;
            $user->mname = $middle_name;
            $user->lname = $last_name;
            $user->meternum = '000-000-000';
            $user->email = $row["consumer_id"].'_'.$value."@aurorazds.gov.ph";
            $user->usertype = 'concessionaire';
            $user->username= $row["consumer_id"].'@aurorazds.gov.ph';
            $user->password = bcrypt('password');
            $user->save();

            $data = new Concessionaire();
            $data->meternum = '000-000';
            $data->category = 'CONSUMERS';
            $data->userId = $user->id;
            $data->pic = 'picture.png';
            $data->brgy = $barangay;
            $data->town = $town;
            $data->street = $street;
            $data->service = $service;
            $data->installion_date = $installion_date;
            $data->status = 'active';
            $data->first_name = $first_name;
            $data->middle_name = $middle_name;
            $data->last_name = $last_name;
            $data->save();
                //array_push($consumers_array, $consumer);
            $cubic_count = "SELECT SUM(cubic) AS prev_bill FROM paybill WHERE consumer_id='".$consumer_id."'";
            $cubic_count_result = $conn->query($cubic_count);
            $cubic_count_result;
            if ($cubic_count_result->num_rows > 0) {
                while($row = $cubic_count_result->fetch_assoc()) {
                    echo $row['prev_bill'];
                }
            }
        }
        } else {
            echo "0 results";
        }
        $conn->close();

    }
    
    public function login()
    {
        return view('admin.login');
    }

    public function collectibles()
    {
        $dataBill = Monthlybill::where('status', '=', 0)
        ->where('billAmount', '!=', 0)
        ->with('concessionaire', 'user')
        ->get();
        $headername = 'Collectibles';
        //dd($dataBill);
        return view('admin.collectibles', compact('dataBill', 'headername'));
    }

    public function payments()
    {
        $dataBill = Monthlybill::where('status', '=', 1)
        ->with('concessionaire', 'user')
        ->get();
        //dd($dataBill);
        $headername = 'Payments';
        //dd($dataBill);
        return view('admin.collectibles', compact('dataBill', 'headername'));
    }

    public function employee (){
        $dataPosition = Position::all();
        $dataUser = User::where('usertype', '!=', 'concessionaire')
                        ->get();
        return view('admin.employee',compact('dataPosition', 'dataUser'));
    }
    // public function concessionaire(){
    //     return view('admin.concessionaire');
    // }
    public function applicants(){
        return view('admin.applicants');
    }
    public function setting(){
        $dataSetting= Setting::all();
        $dataCategory = Category::all();
        $dataRate = Rate::all();
        $dataPosition = Position::all();
        return view('admin.setting',compact('dataSetting', 'dataCategory', 'dataRate', 'dataPosition'));
    }
    public function report(){
        $dataConcessionaire = Concessionaire::where('status', '=', 'connected')->count();
        $dataApplicant = Concessionaire::where('status', '=', 'pending')->count();
        $dataConcessionaireAll = Concessionaire::where('status', '!=', 'pending')->count();
        $dataConcessionairediscon = Concessionaire::where('status', '=', 'disconnected')->count();
        $dataSetting = Setting::all();
        $collectibles = Monthlybill::where('status','=',0)->get();
        $amount = 0;
        foreach($collectibles as $dataCollectibles){
            $amount= $amount + $dataCollectibles->billAmount;
        }
        $payments = Monthlybill::where('status','=',1)->get();
        $paymentsamount = 0;
        foreach($payments as $payment){
            $paymentsamount= $paymentsamount + $payment->billAmount;
        }
        return view('admin.report', compact('dataSetting', 'dataConcessionaire', 'dataConcessionairediscon', 'dataConcessionaireAll','amount','paymentsamount', 'dataApplicant'));

        
    }
    public function generatereport(Request $request){
        $dataReport = Bill::where('datepaid', '>=', $request->from)
        ->where('datepaid', '<=', $request->to)
        ->get();
        return view('admin.reportresult', compact('dataReport'));
    }
    public function messages(){
        return view('admin.messages');
    }
    public function reminders(){
        return view('admin.reminders');
    }
    public function notifications(){
        return view('admin.notifications');
    }
    
}
