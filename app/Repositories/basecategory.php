<?php
namespace App\Repositories;

// use App\Models\detailfilm;
use Illuminate\Support\Facades\DB as DB;;

class basecategory extends baserepository implements basecategoryInterface
{
    protected function getModel()
    {
        return DB::table('category');
    }

    public function allcategory(){
        return $this->model->get();
    }
 

}