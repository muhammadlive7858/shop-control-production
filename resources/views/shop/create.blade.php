@extends('admin.index')

@section('content')


<h2>Sotuv Ofisi</h2>
<hr>



<form class="row g-3 d-flex justify-content-between align-center form-control m-1" action="{{ route('product-id') }}">
    @csrf
    <h4 class="col-md-6">Tavar ID raqamini kiriting:</h4>
    <div class="div col-md-6 d-flex aling-center justify-content-between">
    <div class="col-auto" style="width:80%">
        <label for="inputPassword2" class="visually-hidden">Tavar</label>
        <input type="text" name="productid"  class="form-control" id="inputPassword2" placeholder="ID kiriting:">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2">Topish</button>
    </div>
    </div>
</form>

<hr>



        <form action="{{ route('sotish') }}" method="post">
            @csrf

            <table class="table table-bordered w-100">
            <thead>
                <tr>
                    <th scope="col" style="width:10%">#</th>
                    <th scope="col">Tavar nomi</th>
                    <th style="width:10%">Narxi</th>
                    <th scope="col" style="width:10%">mavjud</th>
                    <th scope="col" style="width:20% !important">Sotilmoqda...</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prod_vaqt as $prod)
                    <tr>
                        <td scope="row" style="width:10%">{{ $prod->product_id }}</th>
                        <td>{{ $prod->product_name }}</td>
                        <td>{{ $prod->price }}</td>
                        <td style="width:10%">{{ $prod->product_count }}</td>
                        <td class="d-flex justify-content-around align-center">
                            @csrf
                            @method('POST')
                            <input type="number" name="sotish_soni[]" id="" class="form-control" placeholder="Tavarlar soni:">
                            <input class="p-2 m-2 input-control " style="width:50px" type="hidden" name="prod_id[]" id="" value="{{ $prod->product_id }}">
                        </td>
                    </tr>
                    @empty
                    <h1>Tavar yoq</h1>
                    @endforelse
                </tbody>
            </table>
            
            <hr>
            <div class="w-100 d-flex align-center justify-content-between">
                <div class="div w-50 d-flex align-center justify-content-center mx-1">
                    <h4 class="w-50">To'lav turini tanlang</h4>
                    <select name="tolav_turi" id="" class="form-control w-50">
                        <option value="Naxt">Naxt</option>
                        <option value="Plastik">Plastik</option>
                    </select>
                </div>
                <div class="div w-50 d-flex align-center justify-content-center mx-1">
                    <h4 class="w-50">Qaytim pulini kiriting:</h4>
                    <input type="number" name="skidka" id="" value="0" class="form-control  w-50">
                </div>
            </div>
            <hr>
            <button  class="btn btn-primary" onclick="sotish()">Sotish</button>
            <a href="{{ route('tozalash') }}" onclick="tozalash()" class="btn btn-danger">Tozalash</a>
        </form>
        <!-- <label for="sotish" class="btn btn-primary">Sotish</label> -->

<script>
    function sotish(){
        confirm("Sotish amalga oshirilishga ishonchingiz komilmi?");
    }
    function tozalash(){
        confirm('Tavarlar tozalansinmi?')
    }
</script>

@endsection