<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Mob-ing web shop</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="{{asset('js/app.js')}}"></script>
  <script>
    $(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});
  </script>
  <style>
     #social {
    color: white;
    height: 60px;
    width: 60px;
    margin-left: 60px;
    margin-right: 10px;
    font-size: 40px;

  }

  #social a:hover {
    font-size: 50px;
    transition: 0.1s ease-in;
    /* color: #fc9700; */
    color:  #3B5998;
   
  }


  #social1 {
    color: white !important;
    height: 60px;


    font-size: 40px;

  }

  #social1 a:hover {
    font-size: 50px;
    transition: 0.1s ease-in;
    /* color: rgb(119, 237, 241); */
      color: #fc9700; 
  }
  #rotate-words {
  max-width:400px;
  margin:auto;
  padding:20% 0;
  font-size:2.2em;
  text-transform:uppercase;
  font-family: 'Oswald', sans-serif;
}

#rotate-words span {
  display:block;
  height:100px;
  /* font-size:.7em; */
  text-transform:lowercase;
  opacity:.8;
  font-family: 'Rubik', sans-serif;
}

#rotate-words h2 {
 position:absolute;
 opacity:0;
 overflow:hidden;
 left:10vw;
 /* width:80vw; */
 line-height:1.2em;
 animation: rotate-word 32s linear infinite 0s;
}

@keyframes rotate-word {
    0% { opacity: 0;  transform: translateX(0);filter:blur(10px);transform:scale(1.2)}
    3% { opacity: 1;  transform: translateX(0);filter:blur(0px);transform:scale(.9)}
    12% { opacity: 1; transform: translateX(0);filter:blur(0px);transform:scale(1)}
    16% { opacity: 0; transform: translateX(0);filter:blur(10px);transform:scale(1.2)}
    80% { opacity: 0}
    100% { opacity: 0}
}

#rotate-words div:nth-child(2) { animation-delay: 4s}
#rotate-words div:nth-child(3) { animation-delay: 8s}
#rotate-words div:nth-child(4) { animation-delay: 12s}
#rotate-words div:nth-child(5) { animation-delay: 16s}
#rotate-words div:nth-child(6) { animation-delay: 20s}
#rotate-words div:nth-child(7) { animation-delay: 24s}
#rotate-words div:nth-child(8) { animation-delay: 28s}

@keyframes author {
    0% { opacity: 0;  transform: translateY(100px);filter:blur(10px);transform: scaleY(2)}
    20% { opacity:0; transform: translateY(200px);filter:blur(10px); transform: scaleY(2)}
    30% { opacity:1; transform: translateY(0);filter:blur(0px);transform: scaleY(1)}
    90% { opacity:1; transform: translateY(0);filter:blur(0px);transform: scaleY(.9)}
    100% { opacity:0; transform: translateY(0);filter:blur(10px);transform: scale(2)}
}

  </style>

</head>

<body>
  <div id="app">
    <header class="with-background">
      <div class="top-nav flex items-center">
        <div class="top-nav-left">
          <div>
            @include('nav')
          </div>




          {{-- {{menu('main','partials.menus.main')}} --}}
        </div>

        {{-- <div class="top-nav-right">
                      @include('partials.menus.main-right') 
                    </div>
                </div> <!-- end top-nav --> --}}


        <div class="hero container ">
          <div class="hero-copy ">
            
            <div id="rotate-words">
              <h2 class=" animate-pulse italic text-4xl  font-bold text-gray-500 tracking-widest">Za porodicu <span>sa stilom.</span></h2> 
              <br>
              <p  class="italic text-3xl  font-bold tracking-widest pl-8">Proverite naš kvalitet !</p>
            </div>

            <div class="hidden md:block w3-animate-fading mb-6 text-2xl text-gray-800 font-semibold ml-2">Pronađite nas na društvenim
              mrežama :</div>
            <div class="hero-buttons text-gray-800 items-center flex ml-48 ">
              <div id="social">
                <a href=""><i class="fa fa-facebook-official" aria-hidden="true" 
                  ></i></a>
              </div>
              <div id="social1">
                <a href="" X><i class="fa fa-instagram w-24" aria-hidden="true"></i></a>
              </div>

              {{-- <a href="http://localhost/testsite/" class="button button-white " style="background-color:rgb(250, 125, 9); ">Facebook</a>
                            <a href="https://github.com/marijanatat/e-commerce" class="button button-white" style="background-color:rgb(20, 104, 107) !important">Instagram</a> --}}
            </div>

          </div> <!-- end hero-copy -->

          <div class="hero-image">
            {{-- <img src="img/deca.jpg" alt="deca"> --}}

            {{-- <img src="img/deca.jpg" alt="deca"> --}}
          </div> <!-- end hero-image -->
        </div> <!-- end hero -->
    </header>

    <div class="featured-section" style="background-color: white">

      <div class="container">
        <h1 class="text-center">Shop</h1>

        <p class="section-description text-center " style="font-size:30px ">Naši proizvodi su isključivo domaće
          proizvodnje od najkvalitetnijeg 100% pamuka</p>

        <div class="">
          @include('kategorije')
        </div>
        {{-- <a href="#" class="button">Featured</a>
                        <a href="#" class="button">On Sale</a> --}}
        {{-- </div> --}}

        {{-- <div class="tabs">
                        <div class="tab">
                            Featured
                        </div>
                        <div class="tab">
                            On Sale
                        </div>
                    </div> --}}

        <div class="products text-center">
          @foreach ($products as $product)
          <div class="product">
            <a href="{{route('shop.show',$product->slug)}}"><img src="{{productImage($product->image)}}"
                style="height:140px;" alt="product"></a>
            <a href="{{route('shop.show',$product->slug)}}">
              <div class="product-name">{{$product->name}}</div>
            </a>
            <div class="product-price">{{$product->presentPrice()}}</div>
          </div>
          @endforeach


        </div> <!-- end products -->

        <div class="text-center button-container text-base xl:text-lg">
          <a href="{{route('shop.index')}}" class="example_e button hover:bg-rgb(20, 104, 107)">View more products</a>
        </div>

      </div> <!-- end container -->

    </div> <!-- end featured-section -->
    <div class="bg-color-white rounded-md border-gray-400  border-transparent opacity-25">
      <hr class="zig-zag">

      <hr>
    </div>

    <div class="module">
      <h2 class="stripe-4 text-transparent">O</h2>

    </div>

    {{--      
          <blog-posts></blog-posts> --}}
    {{--         
            @include('partials.footer') --}}
    <div class="w-full ">
      @include('footer')
    </div>
  </div>

  <script>
    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
          window.onscroll = function() {scrollFunction()};
          
          function scrollFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
              document.getElementById("navbar").style.padding = "30px 10px";
              document.getElementById("logo").style.fontSize = "25px";
            } else {
              document.getElementById("navbar").style.padding = "80px 10px";
              document.getElementById("logo").style.fontSize = "35px";
            }
          }
  </script>



</body>

</html>