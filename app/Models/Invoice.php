<?php
namespace App\Models;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'invoices';
    protected $guarded = ['id'];

	public $timestamps = true;



    protected $fillable = [
		'title',
		'amount',
        'date',
		'image',
		'description',
		'admin_id',
	];





    public function admin(){
        return $this->belongsTo(Admin::class);
    }
 
 
}
