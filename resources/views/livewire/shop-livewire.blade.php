<div class="">

    <div class="">
        @component('components.breadcrumbs')
       <a href="/">Home</a>
       <i class="fa fa-chevron-right breadcrumb-separator"></i>
       <span>Shop</span>
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
        <div class="container flex justify-center md:justify-end text-sm pt-8 pb-2">
            
            {{-- <h1 class="stylish-heading font-bold text-2xl pt-2 mr-auto" wire:model="categoryName">{{$categoryName}}</h1> --}}
            
            <div class="mr-6">
                <label for="sortiranje" class="font-bold">Sortiraj:</label>
                <select wire:model.debounce.0ms="sort" name="sortiranje" class="border border-gray-700 p-1">
                    <option value="popular">Najpopularnije</option>  
                    <option value="low_high">Po ceni rastuće</option>
                    <option value="high_low">Po ceni opadajuće</option>
                    <option value="a_to_z">Po nazivu (A-Š)</option>
                    <option value="z_to_a">Po nazivu (Š-A)</option>
                    <option value="newest">Najnovije</option>
                </select>
            </div>
            <div>
                <label for="prikazi" class="font-bold">Prikaži po strani:</label>
                <select name="prikazi" wire:model.debounce0ms="productsPerPage" class="border border-gray-700 p-1">
                    <option value="12">12</option>
                    <option value="24">24</option>
                    <option value="36">36</option>
                    <option value="48">48</option>
                </select>
            </div>
        </div>

        <hr class="mb-3">

    <div class="flex px-20 pb-16">
        <div class="hidden md:flex h-auto w-1/5">
            <div class="w-1/4 flex-1 flex p-3">
                <div class="w-full">
                    <h3 class="uppercase text-lg">Kategorije</h3>
                    <hr class="bg-boja h-1 w-32 mb-3">
                    <button class="text-left font-bold text-sm text-gray-700 cursor-pointer focus:outline-none duration-500 transform hover:translate-x-1" wire:click="resetQueries">Sve kategorije
                        <i class="fa fa-angle-double-right text-gray-700 cursor-pointer" aria-hidden="true"></i>
                    </button>   
                @foreach ($categories as $category)
                    <div x-data="{open: false}">
                            <div class="">
                                <div class="duration-500 transform hover:translate-x-1" @click="open=!open">
                                    {{-- <input class="w-4" type="checkbox" id="{{$category->id}}" value="{{$category->id}}" wire:model="requestedCategories"> --}}
                                    <button class="font-bold text-sm text-gray-700 cursor-pointer focus:outline-none">{{$category->name}}
                                    <i x-show="!open" class="fa fa-angle-double-right text-gray-700 cursor-pointer" aria-hidden="true"></i>
                                    <i x-show="open" class="fa fa-angle-double-down text-gray-700 cursor-pointer" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                                    <div x-show="open" x-cloak
                                    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform -translate-y-3"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-end="opacity-0 transform -translate-y-3"    
                                    >
                                          
                                        @foreach ($category->children as $children)
        
                                            <div class="flex-col">
                                                <div class="pl-6">
                                                    <span class="uppercase italic text-sm font-bold text-gray-700">{{$children->name}}</span>
                                                </div>
                                            </div>
                                                @foreach ($children->children as $ch)
        
                                                <div class="flex-col">
                                                    <label class="hover:bg-gray-300 pl-12 text-sm text-gray-700">
                                                        <input class="w-4 pt-5" type="checkbox" id="{{$ch->id}}" value="{{$ch->id}}" wire:model="requestedCategories">
                                                        <span>{{$ch->name}}</span>
                                                    </label>
                                                </div>
        
                                                @endforeach
                                            @endforeach
                                            
                                    </div>
                                </div>
                                @endforeach
                                
                                <div class="flex flex-1 items-center mt-10 justify-between mr-4">
                                    <h3 class="uppercase text-lg">Veličine</h3>
                                    <div x-data="{otvori:true}" >
                                        <div @click="otvori=!otvori" id="otvori">
                                            <i x-show="otvori" class='fa fa-angle-double-up'></i>
                                            <i x-show="!otvori" class='fa fa-angle-double-down'></i>
                                            
                                        </div>
                                    </div>
                                </div>  
                                    
                                    <hr class="bg-boja h-1 w-32">
                                    <div id="all-sizes" class="w-32 h-auto rounded-lg mt-4"
                                    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-end="opacity-0 transform -translate-y-3">
                                        <div class="flex flex-col  items-start  ml-4 justify-center ">
                                            @foreach ($sizes as $size)
                                            <div class="flex flex-col w-12 max-h-full" >
                                                <label class="inline-flex items-center  text-sm">
                                                    <input type="checkbox" class="form-checkbox h-3 w-3 text-gray-600 text-sm " id="{{$size->id}}" value="{{$size->id}}" wire:model="requestedSizes">
                                                    <li class="list-none ml-2">{{$size->value}}</li>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    
                                     
                        
                                        <div x-data="{ open: false }" class="flex flex-col justify-center items-center  bg-gray-300 w-20 h-auto rounded-b-lg" 
                                       >
                                            @foreach ($sizesAll as $size)
                                        
                                        <div class="flex flex-col w-12 max-h-full" x-show="open" 
                                      >
                                            <label class="inline-flex items-center text-sm">
                                                <input type="checkbox" class="form-checkbox h-3 w-3 text-gray-600 text-sm " id="{{$size->id}}" value="{{$size->id}}" wire:model="requestedSizes">
                                                <li class="list-none ml-2">{{$size->value}}</li>
                                            </label>
                                        </div>
                                        
                                        @endforeach
                                        
                                        <button @click="open = !open" type="button" 
                                        class="bg-boja hover:bg-orange-900 text-white mt-2 rounded"  x-html="open ? `Prikaži manje` :`Prikaži više`">
                                        </button>
                                        </div>
                                    
                                     </div>  


                            <div x-data="{otvori:true}">
                               <div class="flex items-center  justify-between mr-4 mt-10">
                                 <h3 class="uppercase text-lg">Cena:</h3>
                                    <div @click="otvori=!otvori" >
                                        <i x-show="otvori" class='fa fa-angle-double-up'></i>
                                        <i x-show="!otvori" class='fa fa-angle-double-down'></i> 
                                    </div>
                               </div>
                                <hr class="bg-boja h-1 w-32 mb-3">
                               
                                    <div class="slidecontainer w-auto text-sm" x-show="otvori" 
                                    x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-end="opacity-0 transform -translate-y-3">
                                        <div class="mb-3" x-show="open">Opseg od <span class="font-semibold">{{presentPrice($min)}}</span> 
                                            do <span class="font-semibold">{{presentPrice($max)}}</span></div>
                                        
                                        <div class="price-slider mt-6">
                                                <span>Od:
                                                      <input name="min" type="number" wire:model.debounce.200ms="min" class="mr-3 ml-1"/>
                                                      Do:                                            
                                                      <input name="max" type="number" wire:model.debounce.200ms="max" class="ml-1"/>
                                                </span>
                                                 
                                          <input wire:model.debounce.0ms="min" min="1" max="10000" type="range"/>
                                          <input wire:model.debounce.0ms="max" min="1" max="10000" type="range"/>
                                          <svg width="100%" height="24">
                                            <line x1="4" y1="0" x2="300" y2="0" stroke="#212121" stroke-width="12" stroke-dasharray="1 28"></line>
                                          </svg>
                                        </div>
                                        {{-- <div data-role="main" class="ui-content">
                                            <div data-role="rangeslider">
                                                <label for="price-min">Minimalna cena:</label>
                                                <input type="range"  name="price-min" id="price-min" wire:model.debounce.0ms="min" min="1" max="5000"><br>
                                                <label for="price-max">Maksimalna cena:</label>
                                                <input type="range"   name="price-max" id="price-max" wire:model.debounce.0ms="max" min="1" max="5000">
                                            </div>
                                        </div> --}}
                                    </div>
                            </div>

                </div>
            </div>
        </div>
            
            
            
            {{-- <div class="flex-col">
                <h1>Requested Categories: {{implode(', ',$requestedCategories)}}</h1>
                <h1>Ids: {{implode(', ', Arr::flatten($categoryIds))}}</h1>
                
            </div> --}}
            {{-- <div class="w-2/3 justify-center">
                @foreach ($products as $product)
                <div class="list-none">
                    <li>{{$product->name}}</li>
                </div>
                @endforeach
            </div> --}}
            <div class="w-4/5" >

                <div id="proizvodi" class="grid grid-cols-1 md:grid-cols-3 md:min-h-0 md:min-w-0 md:row-gap-12 text-center w-full pt-4">
                    @forelse ($products as $product)
                    <div class="flex flex-col justify-center items-center space-y-2" style="max-height:400px;">
                        <a href="{{route('shop.show',$product->slug)}}"><img class="h-32 md:h-64 object-cover" src="{{productImage($product->image)}}"
                                alt="product"></a>
                        <a href="{{route('shop.show',$product->slug)}}">
                            <div class="">{{$product->name}}</div>
                        </a>
                        <div>{{presentPrice($product->price)}}</div>
                    </div>
                    @empty
                    <div class="flex flex-col  text-gray-700">
                        <div class="text-left">Za izabrane kriterijume proizvodi nisu pronađeni!</div>
                        <div class="spacer"></div>
                        <button class="text-left font-bold text-sm text-gray-700 cursor-pointer focus:outline-none" wire:click="resetQueries">Svi proizvodi
                            <i class="fa fa-angle-double-right text-gray-700 cursor-pointer" aria-hidden="true"></i>
                        </button>
                       
                    </div> @endforelse
                </div>
    
             
            </div> <!-- end products -->
        </div>
                        <div class="spacer container flex justify-end">
                            {{$products->links('pagination.livewire-tailwind')}}
                            {{-- {{ $products->appends(request()->input())->links() }} --}}
                        </div>
</div>

@section('extra-js')
<script>

    document.getElementById('otvori').onclick = function(){
      document.getElementById('all-sizes').classList.toggle('hidden');
    }
    
  </script>
@endsection