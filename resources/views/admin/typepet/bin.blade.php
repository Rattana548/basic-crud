<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

       <div class="container">
            <div class="row">

                <div class="col-md-8">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            Back to List Type Pet 
                            <a href="{{route('typepet')}}" class="btn btn-success float-end">Back</a>
                           
                        </div>
                        <div class="card-body">

                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Number</th>
                                    <th scope="col">Type Pet Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Restore</th>
                                    <th scope="col">Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($bin as $item)
                                  <tr>
                                    <th scope="row">{{$bin->firstItem()+$loop->index}}</th>
                                    <td>{{$item->type_name}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{route('restore',$item->id)}}" class="btn btn-primary">Restore</a>
                                    </td>
                                    <td>
                                        <a href="{{route('delete',$item->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                              {{$bin->links()}}
                        </div>
                    </div>

                </div>

            </div>
       </div>

    </div>
</x-app-layout>
