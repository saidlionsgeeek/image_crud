@extends('layouts.index')
@section('content')
@include("backend.partials.upload_tuto.create")
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">delet</th>
                <th scope="col">edit</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image )
            <tr valign="middle" >
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$image->name}}</td>
                <td><img width="50" src={{asset("storage/img/".$image->image)}} alt=""></td>
                <td>
                    <form action={{route("image.destroy",$image->id)}} method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
                <td>@include("backend.partials.upload_tuto.edit")</td>
                {{-- <td><a href={{asset("storage/img/". $image->image)}} download="{{$image->name}}" >download</a></td> --}}
                <td><a href={{route('image.download',$image->id)}}>download</a></td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection
