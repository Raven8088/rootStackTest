@extends('layouts.app')

@section('content')
<script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});



</script>

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="loader"></div>
      </div>
      @if(session('info'))
           <div class="col-sm-12 col-md-10 col-lg-10 offset-lg-2 alert alert-success">
                        <center>{{session('info')}}</center>
            </div>
        @endif
                <div class="col-sm-12 col-md-2 col-lg-2">
                  <form action="http://localhost/rootstacktest/public/scraping" method="GET">
                    <button class="btn btn-primary" style="margin-bottom: 4%" type="submit" id="scraping" name="scraping">
                          Scraping
                    </button>

                  </form>

                  <form action="http://localhost/rootstacktest/public/clean" method="GET">
                    <button class="btn btn-primary" style="margin-bottom: 4%" type="submit" id="clean" name="clean">
                          Clean
                    </button>
                    
                  </form>
                  
                                @foreach($categories as $category) 
                           
                                 <a  data-toggle="collapse" href="#{{$category->category}}" role="button" aria-expanded="false" aria-controls="{{$category->category}}">
                                   <button type="button" class="list-group-item list-group-item-action header_card_home ">
                                         {{$category->category}}
                                        </button>
                                </a>
                                    @foreach($subCategory as $sb) 
                                        @if($sb->category->category==$category->category)
                                              <div class="collapse" id="{{$category->category}}">
                                                    <div class="list-group">
                                                        <button type="button" class="list-group-item list-group-item-action">
                                                              <i class="fas fa-angle-right" style="color:#335cb4"></i>  
                                                              <a href="#">{{$sb->subcategory}}</a>
                                                        </button>
                                  
                                                    </div>  
                                     </div> 
                                        @endif
                                    @endforeach
                                @endforeach
               
            </div> 

            <div class="col-sm-12 col-md-10 col-lg-10">
                <div class="row">
                @foreach($classifieds as $classified) 
                    <div class="col-sm-12 col-md-4 col-lg-4 d-flex ">
                        <div class="card zoom" style="width:21rem; margin-bottom: 4%">
                               
                              <div class="card-body">
                                <h5 class="card-title">{{$classified->tittle}}</h5>
                                <span style="font-size: 10px;font-weight: 800;color:red">Categoria: {{$category->category}}</span>
                                <p class="card-text">{{$classified->body}}</p>
                                
                              </div>
                        </div>
                    </div> 
                @endforeach
              </div>
                 <div class="row justify-content-md-center">
            <div class="col-sm-12  col-md-12 col-lg-12">
              {{$classifieds->render()}}
            </div>
          </div>
              </div>

    </div>
</div>
@endsection
