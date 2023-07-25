@extends('main')
@section('title')
    shoping-kiel
@endsection
@section('content')
    <div class="container-fluid mt-2 mb-2">
        <div class="row">
            <h4>Shopping Form</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Form</li>
                    </ol>
                </nav>
            <div class="col-md-4 offset-md-4">
                <div class="card mt-3">
                    <div class="card-header ">
                        <strong>BUYER</strong> DETAIL
                    </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @elseif (Session::has('msg'))
                                <div class="alert alert-danger">
                                    {{Session::get('msg')}}
                                </div>
                            @endif

                            @if($errors -> any())
                            <div class="alert alert-info">
                                <ul class="mb-0">
                                    @foreach ($errors -> all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                
                                </ul>
                            </div>
                            @endif 
                            
                            <form action="{{url('shopping-kiel')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">Full Name</label>
                                    <input value="{{old('name')}}" type="text" name="name" id="name" class="form-control" placeholder="Input your name ..." autocomplete="off">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="Whatsapp">Whatsapp</label>
                                    <input value="{{old('Whatsapp')}}" type="text" name="Whatsapp" id="Whatsapp" class="form-control" placeholder="Input your whatsapp number ..." autocomplete="off">
                                    @error('Whatsapp')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea value="{{old('address')}}" type="text" class="form-control" id="address" name="address" rows="2" placeholder="Input your address"></textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @endif
                                </div>   
                        </div>   

                            <div class="card-header ">
                                <strong>ITEM</strong> DETAIL
                            </div>  

                            <div class="card-body">                       
                                <div class="mb-3">                                
                                    <label for="product">Choose Product</label>
                                    <select name="product" id="product" class="form-control">
                                        <option value="{{old('product')}} ">Choose</option>
                                        @foreach ($pro as $item)
                                            <option value="{{$item->id}}">{{$item->name}}-->{{$item ->price}}</option>
                                        @endforeach
                                    </select>
                                    @error ('product')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="qty">QTY</label>
                                    <input value="{{old('qty')}}" type="number" name="qty" id="qty" class="form-control" placeholder="Input qty..." autocomplete="off">
                                    @error('qty')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea value="{{old('note')}}" type="text" class="form-control" id="note" name="note" rows="2" placeholder="Input your note *) IF Needed"></textarea>
                                    @error('note')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @endif
                                </div>  
                                <button type="submit" class="btn btn-dark form-control">
                                    <i class="bi bi-bag-check"></i> Buy Now
                                </button> 
                            </div>                          
                        </form>                     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection