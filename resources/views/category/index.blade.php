@extends('admin.index')

@section('content')

    <h1>Hamma kategoriyalar sahifasi</h1>
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nomi</th>
                    <th scope="col" colspan="2">Malumoti</th>
                    <th scope="col" style="width:10% !important">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cate as $cate)
                <tr>
                    <td scope="row">{{ $cate->id }}</th>
                    <td class="d-flex"><a  class="mx-1" href="{{route('category.show', $cate->id)}}">{{ $cate->name }}</a><i class="bi bi-folder-fill"></i></td>
                    <td colspan="2">{{ $cate->desc }}</td>
                    <td  class="d-flex align-center justify-content-around">
                        <a href="{{ route('category.edit',$cate->id) }}" class="mt-2"><i class="bi bi-pencil btn-success w-100 p-2" style='border-radius:5px'></i></a>
                        <form action="{{ route('category.destroy',$cate->id) }}" method="post" class="d-flex align-center ">
                            @csrf
                            @method('delete')
                        <button  onclick="delet()" class="btn-danger w-100 p-1 "style='border-radius:5px' ><i class="bi bi-trash-fill " ></i></button>
                        </form>
                        <a href="{{ route('category.show') }}" class="btn btn-outline-primary">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            function delet(){
                confirm("Haqiqatdan ham o'chirmoqchimisiz?")
            }
        </script>
@endsection
