<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    use GeneralTrait;


    public function allWithOrm(){

        $categories = Category::select('id','name','parent_id')->where('parent_id',0)

        ->with('children')

        ->get();

        return $this->returnData('categories',$categories,'This is all categories with child');	

    }

    public function singleWithOrmAndChildren($id){

        $category = Category::select('id','name','parent_id')->with('children')->find($id);

        if($category){
            return $this->returnData('category',$category,'This is category with children');	
        }else{
            return $this->returnError("404","No Category in this Id");
        }

    }
    public function  singleWithOrmAndParent($id){

        $category = Category::select('id','name','parent_id')->with('parent')->find($id);

        if($category){
            return $this->returnData('category',$category,'This is category with Parant');	
        }else{
            return $this->returnError("404","No Category in this Id");
        }

    }

    
    public function allWithOutOrm(){
        
        $categoriesArray = array();
        $categories = DB::table('categories')->select('id','name','parent_id')->orderBy('parent_id')->chunk(100, function ($categories) use(&$categoriesArray){
            foreach($categories as $category){
                $categoriesArray[] =  $categories;
            }
        });

        $mainCategories = collect($categoriesArray)->where('parent_id',0);

        $otherCategories = collect($categoriesArray)->where('parent_id','<>',0);        

        $resultArray = array();

        foreach($mainCategories as $mainCategory){
            $resultArray[] = $this->child($mainCategory,$otherCategories);
        }
       
        return $this->returnData('categories',$resultArray,'this is all categories with child');
    }


    public function child($maincategory,$otherCategories){
        $subCategories =  $otherCategories->where('parent_id',$maincategory->id);
        if($subCategories->count() > 0){
            $subCategoryArray = array();
            foreach($subCategories as $subCategory){
                $subCategoryArray[] =  $this->child($subCategory,$otherCategories);
            }
            $maincategory->child = $subCategoryArray;
            
            return  $maincategory;

        }else{
            $maincategory->child = [];
            return  $maincategory;
        }
    }

  



    

   

        
    
}
