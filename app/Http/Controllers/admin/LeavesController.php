<?php

namespace App\Http\Controllers\admin;

//use Request;
use Config;
use Session;
use Validator;
use DB;
use Datatables;
use Input;
use Auth;
use Response;
use PDF;
use Mail;
use App\Shippingcompany;
use App\Customers;
use App\Contact;
use App\Department;
use App\Projects;
use App\Http\Controllers\Controller;
use App\leave;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class LeavesController extends Controller
{
    //

    function index()
    {
        //return $Mod = DB::select("SELECT * FROM `tbl_modules_rights` WHERE user_id = 1 ");

        // return $Mod = DB::table('tbl_modules_rights')->select('module_id')->where(array('user_id' => Auth::user()->id))->get();


        return View('admin.leaves.leaves');
        //return View('admin.ordercontainers.orders');
    }
    function leaves()
    {
        //return $Mod = DB::select("SELECT * FROM `tbl_modules_rights` WHERE user_id = 1 ");

        // return $Mod = DB::table('tbl_modules_rights')->select('module_id')->where(array('user_id' => Auth::user()->id))->get();


        return View('admin.leaves.leaves');
        //return View('admin.ordercontainers.orders');
    }
    public function getAllLeaves()
    {
        $data = DB::table('view_leaves')->select('*');
        return Datatables::of($data)
            ->addColumn('ID', function ($data) {
                return $data->ID;
            })
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->addColumn('StartDate', function ($data) {
                return $data->StartDate;
            })
            ->addColumn('EndDate', function ($data) {
                return ($data->EndDate ? $data->EndDate : "--------");
            })
            ->addColumn('DAYS', function ($data) {
                return ($data->DAYS ? $data->DAYS : "0");
            })
            ->addColumn('TYPE', function ($data) {
                return ($data->TYPE ? $data->TYPE : "----");
            })
            ->addColumn('Status', function ($data) {
                if ($data->Status == 0) {
                    //return "Pending";
                    return '<span class="label label-primary">Pending</span>';
                } else if ($data->Status == 1) {
                    return '<span class="label label-success">Approved</span>';
                } else {
                    return '<span class="label label-danger">Canelled</span>';
                }
                //return ($data->Status ? $data->Status : "----");
            })
            ->addColumn('Opties', function ($data) {
                if ($data->Status == 0) {
                    //return "Pending";
                    $disable = "";
                } else if ($data->Status == 1) {
                    $disable = "disabledbtn";

                } else {
                    $disable = "disabledbtn";
                }
                // <a href="View_OrderServices/' . $data->ID . '" title="Inzien" class="widget-icon d-none"><span class="icon-pencil"></span></a>
                return'<a href="Approvedleave/' . $data->ID . '" title="Inzien" class="btn btn-success '.$disable.'">Goedkeuren <span class="icon-check"></span></a>
					<a href="cancelledleave/' . $data->ID . '" title="Inzien" class="btn btn-danger '.$disable.'">Annuleer <span></span></a>';
            })
            ->make(true);
        // $V_orders = DB::table('v_getallorderservices')->select('*');

        // 	return Datatables::of($V_orders)
        // 		 ->addColumn('ID' , function ($V_orders) {
        // 			return $V_orders->id;
        // 		 })
        // 		 ->addColumn('Aanvraagnr' , function ($V_orders) {
        // 			 if ($V_orders->Rev_Nummer == 0) {
        // 				 return substr($V_orders->Aanvraagnr, 0, -2);
        // 			 	// return $V_orders->Aanvraagnr
        // 			 }
        // 				return $V_orders->Aanvraagnr;
        // 		 })
        // 		 ->addColumn('Project' , function ($V_orders) {
        // 				return $V_orders->ProjectName;
        // 		 })
        // 			->addColumn('Datum aanvraag' , function ($V_orders) {
        // 				return $V_orders->created_at;
        // 		 })
        // 		 ->addColumn('Begindatum' , function ($V_orders) {
        // 				return $V_orders->Begindatum;
        // 		 })
        // 		 ->addColumn('Aantal mensen' , function ($V_orders) {
        // 		 		return $V_orders->Aantal_Mensen;
        // 		})
        // 		 ->addColumn('Hoeveel dagen' , function ($V_orders) {
        // 		 		return $V_orders->Hoeveel_Dagen;
        // 		})
        // 		 ->addColumn('Werkzaamheden' , function ($V_orders) {
        // 		 		return $V_orders->Werkzaamheden;
        // 		})
        // 		 ->addColumn('Afgehandled' , function ($V_orders) {
        // 			 // return $V_orders->Afgehandled;
        // 			 if ($V_orders->Afgehandled == 1) {
        // 				 return '<span class="label label-success">Afgehandeld</span>';
        // 			 }
        // 			 return '<span class="label label-danger">Open</span>';
        // 		 })
        // 		 ->addColumn('Opties' , function ($V_orders) {
        // 			return '<a href="View_OrderServices/'.$V_orders->id.'" title="Inzien" class="widget-icon"><span class="icon-eye-open"></span></a>
        // 			<a href="Edit_OrderServices/'.$V_orders->id.'" title="Bewerken" class="widget-icon"><span class="icon-pencil"></span></a>

        // 			<a href="Delete_OrderServices/'.$V_orders->id.'" title="verwijderen" class="widget-icon"
        // 			onclick= \'return confirm("Weet u het zeker of u deze personeelsaanvraag wilt verwijderen ?")\'
        // 			><span class="icon-trash"></span></a>

        // 			<a href="OrderServices_print/'.$V_orders->id.'" title="Afdrukken" class="widget-icon"><span class="icon-print"></span></a>';
        // 			 })
        // 		 ->make(true);

    }


    public function cancelledleave($id)
    {
        $leave = leave::find($id);
        $leave->Status = 2;
        if ($leave->save()) {
            return redirect()->back()->with("message", "Leave Cancel Successfully");
        } else {
            return redirect()->back()->with("errormessage", "Leave Cancel not done");
        }
    }
    public function Approvedleave($id)
    {
        $leave = leave::find($id);
        $leave->Status = 1;
        if ($leave->save()) {
            return redirect()->back()->with("message", "Leave Approved Successfully");
        } else {
            return redirect()->back()->with("errormessage", "Leave approve not done");
        }
    }
}
