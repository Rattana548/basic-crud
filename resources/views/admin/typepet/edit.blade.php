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

                    <div class="card">
                        <div class="card-header">
                            Edit Type Pet 
                        </div>
                        <div class="card-body">

                            <form action="{{route('update',$typepet->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                  <label for="type_name" class="form-label">Edit Type Name</label>
                                  <input type="text" class="form-control" name="type_name" value="{{$typepet->type_name}}">
                                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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
