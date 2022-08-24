<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{
    
    use HasFactory;

    protected $fillable = ['descricao', 'size'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'banner';

    public function listbanner(){
        $banner = Banner::orderBy('descricao')->get();
        return view('banner.list', compact('banner'));
    } 
}
