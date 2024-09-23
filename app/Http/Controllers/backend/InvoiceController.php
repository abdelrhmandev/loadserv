<?php
namespace App\Http\Controllers\backend;
use DataTables;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\InvoiceLog;
use App\Traits\Functions;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\backend\InvoiceRequest;

class InvoiceController extends Controller
{
    use UploadAble, Functions;
    public function __construct()
    {
        $this->ROUTE_PREFIX = 'admin.invoices';
        $this->TRANS = 'invoice';
        $this->UPLOADFOLDER = 'invoices';
        $this->middleware('permission:'.$this->TRANS.'-list,admin');
        $this->middleware('permission:'.$this->TRANS.'-create,admin', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->TRANS.'-edit,admin', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->TRANS.'-delete,admin', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $model = Invoice::select('id', 'title','admin_id', 'image','amount','date', 'created_at')->with(['admin']);
        if ($request->ajax()) {
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('title', function ($row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->title . '</a>';
                })
 
                ->editColumn('image', function ($row) {
                    return $this->dataTableGetImage($row, $this->ROUTE_PREFIX . '.edit');
                })
                ->editColumn('admin_id', function ($row) {
                    return $row->admin->name.'<br>'.$row->admin->getRoleNames() ;
                })
                ->editColumn('created_at', function ($row) {
                    return $this->dataTableGetCreatedat($row->created_at);
                })

                ->editColumn('actions', function ($row) {
                    return $this->dataTableEditRecordAction($row, $this->ROUTE_PREFIX);
                })

                ->rawColumns(['image', 'title', 'admin_id', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('backend.invoices.index')) {
            $compact = [
                'trans' => $this->TRANS,
                'createRoute' => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('backend.invoices.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('backend.invoices.create')) {
            $compact = [
                'trans' => $this->TRANS,
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('backend.invoices.create', $compact);
        }
    }
    public function store(InvoiceRequest $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validated();
            $validated['image'] = !empty($validated['image']) ? $this->uploadFile($validated['image'], $this->UPLOADFOLDER) : null;
            $validated['admin_id'] = Auth::guard('admin')->user()->id;
            $invoice = Invoice::create($validated);

            InvoiceLog::create(['invoice_title'=>$validated['title'],'action'=>'created','invoice_id'=>$invoice->id,'admin_id'=>Auth::guard('admin')->user()->id]);

            if ($invoice) {
                $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageSuccess'), 'status' => true];
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function edit(Invoice $invoice)
    {
        if (view()->exists('backend.invoices.edit')) {

            $compact = [
                'updateRoute' => route($this->ROUTE_PREFIX . '.update', $invoice->id),
                'row' => $invoice,
                'destroyRoute' => route($this->ROUTE_PREFIX . '.destroy', $invoice->id),
                'redirect_after_destroy' => route($this->ROUTE_PREFIX . '.index'),
                'trans' => $this->TRANS,
            ];

            return view('backend.invoices.edit', $compact);
        }
    }

    /////////////
    public function update(InvoiceRequest $request, Invoice $invoice)
    {

        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $image = $invoice->image;
            if (!empty($request->file('image'))) {
                $invoice->image && File::exists(public_path($invoice->image)) ? $this->unlinkFile($invoice->image) : '';
                $image = $this->uploadFile($request->file('image'), $this->UPLOADFOLDER);
            }if (isset($request->drop_image_checkBox) && $request->drop_image_checkBox == 1) {
                $this->unlinkFile($invoice->image);
                $image = null;
            }

         
            $validated['image'] = $image;
            $invoice->update($validated);
 

            InvoiceLog::create(['invoice_title'=>$validated['title'],'action'=>'updated','invoice_id'=>$invoice->id,'admin_id'=>Auth::guard('admin')->user()->id]);


            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageSuccess'), 'status' => true];
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __($this->TRANS . '.' . 'updateMessageError'), 'status' => false];
        }
        return response()->json($arr);



    }
    public function destroy($id)
    {
        $invoice = Invoice::find($id);

        InvoiceLog::create(['invoice_title'=>$invoice->title,'action'=>'deleted','invoice_id'=>$id,'admin_id'=>Auth::guard('admin')->user()->id]);


        $invoice->image ? $this->unlinkFile($invoice->image) : '';

        if ($invoice->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroyMultiple(Request $request)
    {
        $ids = explode(',', $request->ids);
        $invoices = Invoice::whereIn('id', $ids); // Check
        foreach ($invoices->get() as $invoice) {

            InvoiceLog::create(['invoice_title'=>$invoice->title,'action'=>'deleted','invoice_id'=>$invoice->id,'admin_id'=>Auth::guard('admin')->user()->id]);

            $invoice->image ? $this->unlinkFile($invoice->image) : '';
        }
        if ($invoices->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'MulideleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'MiltideleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

 /////////////log

 public function log(Request $request)
 {
     $model = InvoiceLog::select('id', 'invoice_title','invoice_id','admin_id', 'action', 'created_at')->with(['admin']);
     if ($request->ajax()) {
         return Datatables::of($model)
             ->addIndexColumn()
             ->editColumn('title', function ($row) {
                 return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->title . '</a>';
             })

             ->editColumn('invoice_id', function ($row) {
                return $row->invoice_id .'&nbsp;<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->invoice_id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . 'Details'. '</a>';
            })


    
             ->editColumn('admin_id', function ($row) {
                 return $row->admin->name.'<br>'.$row->admin->getRoleNames() ;
             })
             ->editColumn('created_at', function ($row) {
                 return $this->dataTableGetCreatedat($row->created_at);
             })

             ->editColumn('actions', function ($row) {
                 return $this->dataTableEditRecordAction($row, $this->ROUTE_PREFIX);
             })

             ->rawColumns(['invoice_title', 'invoice_id','admin_id','action', 'actions', 'created_at', 'created_at.display'])
             ->make(true);
     }
     if (view()->exists('backend.invoices.log')) {
         $compact = [
             'trans' => $this->TRANS,
             'createRoute' => route($this->ROUTE_PREFIX . '.create'),
             'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
             'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
             'listingRoute' => route($this->ROUTE_PREFIX . '.log'),
         ];
         return view('backend.invoices.log', $compact);
     }
 }

}
