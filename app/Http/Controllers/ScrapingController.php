<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Artisan;
use Goutte\Client;
use App\Models\category;
use App\Models\subCategory;
use App\Models\classified;

class ScrapingController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$subCategory=subCategory::dis();
        $subCategory=subCategory::all();
        $categories=category::all();
        $classifieds=classified::orderBy('id','DESC')->paginate(6);
         return view ('home',compact('subCategory','categories','classifieds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function milAnuncios(Client $client){

        $scrawler=$client->request('GET','https://www.milanuncios.com/'); 
        $id_category=null;   
        //dd($scrawler);
        $inlineClass='"ma-CategoriesCategory"';
        $category=$scrawler->filter("[class=$inlineClass]")->each(function($nodeCategory){
           $category= $nodeCategory->filter("[class='ma-MainCategory']");
           $categoria=$category->text();
            $this->id_category=$this->addCategory($categoria);
            

        
           if ($this->id_category) {
                  
                   $subCategory= $nodeCategory->filter("[class='ma-SharedCrosslinks ma-SharedCrosslinks-size-s ma-SharedCrosslinks-type-neutral']")->each(function($sCategory){
                        // echo "<br>";
                    //echo $sCategory->text();
                     $this->addSubCategory($this->id_category,$sCategory->text());
                   });

              
           }
           


        });   
       return redirect('/')->with('info',"El Scraping se realizo exitosamente!");

    }






    public function addCategory($adCategory){

            switch ($adCategory) {
                case 'Empleo':
                   $adCategory= 'ofertas-de-empleo';
                    break;
                
                case 'Formación y libros':
                    $adCategory= 'formacion';
                    break;

                case 'Informática':
                      $adCategory= 'informatica-segunda-mano';  
                  break;
                case 'Imagen y Sonido':
                  $adCategory= 'imagen-y-sonido';  
                  break;
            }


            $categoryExist = Category::where('category', '=',$adCategory)->first();
            if ($categoryExist == null) {
                  $category= Category::create([
                             'category' => $adCategory ]);

                 return $category->id;
            }else
            {
                return false;
            }
          
    }


       public function addSubCategory($id_category,$subCategory){


        $subCategoryExist = subCategory::where('subcategory', '=',$subCategory)->first();
        if ($subCategoryExist == null) {

            $subCategoryExist= subCategory::create([
                'category_id' => $id_category,
                'subcategory'=> $subCategory]);

            $this->ScrapingAnuncios($id_category);
           // return $category->id;
        }
        else
            {
                return false;
            }
      }


    public function ScrapingAnuncios($category_id=5){
        $client = new \Goutte\Client();
        $cID=null;
        $this->cID=$category_id;
        $category=Category::find($category_id);
      //  echo strtolower('https://www.milanuncios.com/'.$category->category.'/');
        $scrawler=$client->request('GET','https://www.milanuncios.com/'.$category->category.'/'); 

        $clase="aditem-detail-image-container";

         $anuncio=$scrawler->filter("[class='$clase']")->each(function($nodeAnuncio){
                $classTittles="aditem-detail-title";
                $classLocation="list-location-region";
                $classBody="tx";
                $classImg="ee";

                $textTitle= $nodeAnuncio->filter("[class='$classTittles']");
                $tittle=$textTitle->text();
                $textBody= $nodeAnuncio->filter("[class='$classBody']");
                $body=$textBody->text();

                 $this->saveAnuncios($this->cID,$tittle,$body);

         });


    }


    public function saveAnuncios($category_id,$tittle,$body){

        $classifiedExist = classified::where('tittle', '=',$tittle)->first();
        if ($classifiedExist == null) {

            $clasified= classified::create([
            'category_id' => $category_id,
            'tittle'=> $tittle,
            'body'=>$body,
            'img'=>"N/A"
                ]);
    }else
            {
                return false;
            }
      }


      public function clean(){

        Artisan::call('migrate:refresh');
         return redirect('/')->with('info',"Lista vaciada exitosamente");
      }
}
