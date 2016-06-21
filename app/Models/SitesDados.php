<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SitesDados extends Model
{
    protected $table = 'sitesdados';
    protected $primaryKey = 'id';
    protected $fillable = ['idsite', 'description', 'unidade', 'titulo', 'objeto', 'data_bertura', 'situacao', 'local_licitacao', 'telefone', 'telefone2', 'datatime'];
    
    
    
    /**
     * Retorna os arquivos anexos da licitação
     * @param void
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dadosArquivos() {
    	return $this->hasMany(SitesDadosArquivos::class);
    }
    
}
