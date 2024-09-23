<?php
namespace App\Models;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;

class InvoiceLog extends Model
{

    protected $table = 'invoicelog';
    protected $guarded = ['id'];

	public $timestamps = true;



    protected $fillable = [
		'id',
		'invoice_title',
        'invoice_id',
		'action',
		'admin_id',
	];


    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }


    public function admin(){
        return $this->belongsTo(Admin::class);
    }
 
 
}
