<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyList extends Model
{
    use HasFactory;
    
    protected $table = 'company_list';

    public function job()
    {
        return $this->hasMany(JobList::class, 'company_id');
        
    }
}
