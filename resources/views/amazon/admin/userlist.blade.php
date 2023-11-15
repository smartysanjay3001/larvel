<div class="container mb-4 " ng-show='homeCtrl.user'>


    <div class="row">
        <div class="col">
            <div class="card bg-secondary  shadow-lg  ">
                <div class="card-header">

                </div>

                <div class="card-body">

                    <table class="table table-dark table-striped  rounded">
                        <thead class=" text-center">
                            <tr>


                                <th>USER</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody class=" text-center">


                            @foreach ($users as $user )
                            <tr>



                                <td>{{ $user->username }}</td>
                                <td>{{ $user->is_admin }}</td>

                                <td class="mt-2">
                                    <button class=" text-center rounded px-4 py-2 text-white {{$user->is_admin == 0 ? 'bg-success' :'bg-danger'  }}  border-0" id="approve" ng-click="homeCtrl.admin({{$user->id}} , {{  $user->is_admin}},$event)">{{$user->is_admin == 0 ? 'Make Admin' : 'Dismiss as admin' }}</button> 

                                    
                                    
                                </td>
                            </tr>
                                
                            @endforeach

                           
                            


                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>

            </div>

        </div>

    </div>
</div>


</section>
