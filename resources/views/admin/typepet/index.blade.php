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
                            List Type Pet 
                            @if (count($bin)>0)
                                <a href="{{route('bin')}}" class="btn btn-success float-end">Bin</a>
                            @else
                                <a href="" class="btn btn-success float-end disabled">Bin</a>
                            @endif
                        </div>
                        <div class="card-body">

                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Number</th>
                                    <th scope="col">Type Pet Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Move to Bin</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($typepet as $item)
                                  <tr>
                                    <th scope="row">{{$typepet->firstItem()+$loop->index}}</th>
                                    <td>{{$item->type_name}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{route('edit',$item->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{route('softdelete',$item->id)}}" class="btn btn-warning">Move to Bin</a>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                              {{$typepet->links()}}
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Form Insert TypePet
                        </div>
                        <div class="card-body">

                            <form action="{{route('addtypepet')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                  <label for="type_name" class="form-label">Type Name</label>
                                  <input type="text" class="form-control" name="type_name">
                                </div>
                                @error ('type_name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                               
                                <input type="submit" value="Submit" class="btn btn-primary" style="background-color: #0d6efd">
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
       </div>

    </div>
</x-app-layout>
