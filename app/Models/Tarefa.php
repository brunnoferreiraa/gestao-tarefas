<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tarefa extends Model
{
    use HasFactory;

    // Permite a atribuição em massa para estes campos
    protected $fillable = [
        'titulo',
        'data_vencimento',
        'concluida', // Adicione outros campos conforme necessário
    ];

    protected $dates = ['data_vencimento'];

    public function categoria()
{
    return $this->belongsTo(Categoria::class);
}

}
