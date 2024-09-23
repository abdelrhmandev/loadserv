<?php
namespace App\Models;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Cache;
class Setting extends Model
{

    protected $table = 'settings';
    protected $guarded = [];
    protected $fillable = ['key','value'];

    public $timestamps = false;



}

?>
