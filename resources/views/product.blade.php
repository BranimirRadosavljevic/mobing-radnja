@extends('layouts.master')

{{-- @section('title', $product->name) --}}

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/algolia.css')}}">
@endsection

@section('content')

    <div class="text-gray-700 hover:text-green-900">
        @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span><a href="{{ route('shop.index') }}">Shop</a></span>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>{{ $product->name }}</span>
    @endcomponent
    </div>

        <div class="container">
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif
    
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

    <div class="product-section container grid-cols-1 md:grid-cols-2 p-4 md:p-4">
        <div>
            <div class="product-section-image">
                {{-- <img src="{{asset('storage/'.$product->image)}}" alt="product"> --}}
                <img src="{{productImage($product->image)}}" alt="product" style="height:340px;" class="active" id="currentImage"> 
            </div>
         
            <div class="product-section-images ">
                 <div class="product-section-thumbnail selected" >
                    <img src="{{productImage($product->image)}}" alt="product" style="height:50px;" class="mx-auto"> 
                </div>

                @if ($product->images)
                    @foreach (json_decode($product->images,true)  as $image)  
                     <div class="product-section-thumbnail" >
                        <img src="{{productImage($image)}}" alt="product" style="height:50px;" class="mx-auto"> 
                     </div>
                    @endforeach
                @endif            
            </div>
        </div>

        <div class="product-section-information -mt-16 lg:mt-12">
            <div class="product-section-subtitle ">{{$product->details}}</div>
            {{-- <div>{!!$stock!!}</div> --}}
            <div>{{$product->quantity}}</div>
            <div class="product-section-price">{{$product->presentPrice()}}</div>

            <p>
                {!!$product->description!!}
            </p>
    
            @if ($product->quantity>0)
            <form action="{{route('cart.store')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$product->id}}">
                 <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                
                <button type="submit" class="button button-plain transition duration-500 ease-in-out border border-gray-300 rounded-md bg-gray-500 hover:bg-red-500 transform hover:-translate-y-1 hover:scale-110 ...">Dodaj u korpu</button>

             </form>
            @endif

          
       
        </div>
    </div> <!-- end product-section -->

    @include('partials.might-like')
    @endsection
  
    
    
@section('extra-js')

    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{asset('js/algolia.js')}}"></script>

 <script>
    (function(){
        const currentImage = document.querySelector('#currentImage');
        const images = document.querySelectorAll('.product-section-thumbnail');
        images.forEach((element) => element.addEventListener('click', thumbnailClick));
        function thumbnailClick(e) {
            currentImage.classList.remove('active');
            currentImage.addEventListener('transitionend', () => {
                currentImage.src = this.querySelector('img').src;
                currentImage.classList.add('active');
            })
            images.forEach((element) => element.classList.remove('selected'));
            this.classList.add('selected');
        }
    })();
</script>
@endsection

