<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SitesDadosArquivos extends Model
{
    protected $table = 'sitesdados';
    protected $primaryKey = 'id';
    protected $fillable = ['idlicitacao', 'urlarquivo', 'datatime'];
    
}
