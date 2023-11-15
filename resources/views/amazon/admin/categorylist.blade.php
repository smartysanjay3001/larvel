
<div class="container  mt-2 p-4  w-100 rounded "ng-show="homeCtrl.categorylist1" >
    <button href="" class="btn text-decoration-none text-dark border-0 bg-success fw-bold   mb-4   text-white py-2 px-4 " ng-click="homeCtrl.category()">Category Add</button>

    @foreach ($category as $category1 )


    
    <div class="card mb-3 " >
        <div class="row g-0">
            
            <div class="col-md-8 ">
                <div class="card-body d-flex p-2 gap-1 flex-column ">
                    <h5 class="card-title"><a href="" class=" ms-1 text-decoration-none text-dark text-uppercase text-warning-emphasis">{{ $category1->categories }}</a></h5>
                   <div class="coantainer">
                    <button href=""  class="btn  px-4 text-dark border bg-danger text-white rounded" ng-click="homeCtrl.categorydelete({{ $category1->id }},$event )">Delete</button>
                   </div>
                
                 
                </div>
            </div>
        </div>
    </div>

    @endforeach


   
</div>