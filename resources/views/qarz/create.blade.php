@extends('admin.index')

@section('content')
<h1>Qarz yaratish sahifasi</h1>
<hr>
    <form method="post" action="{{ route('qarz.store') }}" class="d-flex justify-content-between align-center">
        @csrf
        <div class="d-flex flex-column">
            <h3>Qarzdorning nomi:</h3>
            <h3>Qarzi:</h3>
            <h3>Malumoti:</h3>
        </div>
        <div class="d-flex flex-column">
            <input name="name" type="text" class="form-control" placeholder="Nomi" class="my-2">
            <input name="qarzi" type="number" class="form-control" placeholder="Qarzini so'mda kiriting:" class="my-2" style="margin:5px 0">
            <textarea name="desc" id="" cols="30" rows="10" class="m-2"></textarea>
            <button class="btn btn-success m-2">Saqlash</button>
        </div>
    </form>
    <hr>
@endsection