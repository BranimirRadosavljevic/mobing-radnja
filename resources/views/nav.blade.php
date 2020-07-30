<nav
  class="navbar flex items-center bg-transparent justify-between flex-wrap  p-1  w-full  pin-t fixed z-10 top-0 mt-0 ">
  <div class="block lg:hidden">
    <button id="nav-toggle"
      class="flex items-center px-3 py-2  rounded text-gray-600 font-bold border border-red-900  hover:text-red-700 hover:border-white">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <title>Menu</title>
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
      </svg>
    </button>
  </div>
  <!--dodatak-->

  <!--dodatak-->
  <div class="flex" id="nav-content">
    <ul class="list-reset lg:flex items-center">
      <li>
        <div class="flex items-center ">

          <div class="flex  ">

            <a href="/"><img src="{{asset('./img/baby.svg')}}" alt="kolica za bebe" style=""
                class="w-16 h-16 bg-transparent  hover:text-red-800 py-2 px-2 rounded-md"> </a>

          </div>
          <div class="flex-1 font-bold text-lg xl:text-2xl text-white px-2  lg:px-4 uppercase py-2 hover:text-gray-400">
            Mob-ing
          </div>
        </div>

        {{-- <a class="inline-block px-2  lg:px-4 py-2 text-white text-lg  lg:text-2xl hover:no-underline no-underline"
            href="/">Home</a> --}}
      </li>
      @foreach ($categories as $category)

      <li class="dropdown mr-6">
        <button
          class="dropbtn inline-block px-2  lg:px-4 bg-transparent uppercase text-white  text-md  lg:text-base no-underline hover:text-gray-200 hover:no-underline py-2 "
          href="#">{{$category->name}}</button>

        <div class="dropdown-content  ">


          
          @foreach ($category->children as $child)
            <div class="flex">
            <div class="justify-end">
              @if (!$child->isLeaf())
              <div class="flex-row justify-around uppercase">
                <a href="{{route('shop.index', ['category' => $child->id])}}" style="color:gray">{{$child->name}}</a>
              </div>
                @foreach ($child->children as $ch)

                <div class="flex-col">
                  <a href="{{route('shop.index', ['category' => $ch->id])}}" style="color:gray">{{$ch->name}}</a>
                </div>
                @endforeach
            </div>
            @else
            <div class="flex-col">
              <a href="{{route('shop.index', ['category' => $child->id])}}" style="color: #3c434e">{{$child->name}}</a>
            </div>
            @endif
            @endforeach
          </div>
        </div>

        @endforeach



    </ul>
    <div class="">
      @include('partials.menus.main-right')
    </div>

  </div>

</nav>