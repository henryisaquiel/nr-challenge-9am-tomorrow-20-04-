<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    /**
     * Definição da tabela
     * @var $table
     */
	protected $table = 'sites';
	protected $primaryKey = 'id';
    protected $fillable = ['name', 'urlsite', 'urlsearch', 'parameters', 'datetime'];
    
    /**
     * Retorna as páginas
     * @param void
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sitesdados() {
    	return $this->hasMany(SitesDados::class);
    }
}
