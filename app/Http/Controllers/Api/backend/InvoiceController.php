<?php
namespace App\Http\Controllers\Api\backend;
use App\Traits\ApiFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use App\Models\InvoiceLog;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Http\Resources\InvoiceResource;
class InvoiceController extends Controller{
    use ApiFunctions;


    public function __construct()
    {
        $this->middleware('auth:api');
        $this->guard = "admin";
    }

    public function index()
    {

        $model = Invoice::select('id', 'title','admin_id', 'image','amount','date', 'created_at')->with(['admin']);

        $data = InvoiceResource::collection($model->get());

        return $this->returnData('data', $data, 200, 'Invoices List');


    }

     public function store(Request $request) {
 
            $rules = array(
            'title' => 'required|unique:invoices,title',
            'amount' => 'required|integer',
            'date' => 'required|date',
            'image' => 'nullable|max:1000|mimes:jpeg,bmp,png,gif',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
            return $validator->errors();
            }else{
                $request['admin_id'] =   Auth::guard('api')->user()->id;                 
                $invoice = Invoice::create($request->all());
                InvoiceLog::create(['invoice_title'=>$request['title'],'action'=>'created','invoice_id'=>$invoice->id,'admin_id'=>$request['admin_id']]);            
                return $this->returnData('data', 'success', 200, __('invoice.storeMessageSuccess'));

            }
        }

            public function update(Request $request,$id) {
                $invoice = Invoice::find($id);          
                $rules = array(
                'title' => 'required|unique:invoices,title,'.$id ?? '',
                'amount' => 'required|integer',
                'date' => 'required|date',
                'image' => 'nullable|max:1000|mimes:jpeg,bmp,png,gif',
                );
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                return $validator->errors();
                }else{
                    
                    $request['admin_id'] =   Auth::guard('api')->user()->id;                      
                    $invoice->update($request->all());                    
                    InvoiceLog::create(['invoice_title'=>$request['title'],'action'=>'updated','invoice_id'=>$invoice->id,'admin_id'=>$request['admin_id']]);            
                    return $this->returnData('data', 'success', 200, __('invoice.updateMessageSuccess'));
    
                }
    }

        public function destroy($id)
    {
        $invoice = Invoice::find($id);
        InvoiceLog::create(['invoice_title'=>$invoice->title,'action'=>'deleted','invoice_id'=>$invoice->id,'admin_id'=>Auth::guard('api')->user()->id]);
        $invoice->image ? $this->unlinkFile($invoice->image) : '';
        return $this->returnData('data', 'success', 200, __('invoice.deleteMessageSuccess'));

    }

}
