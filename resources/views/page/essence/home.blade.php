@extends('page.essence.index')
@section('pagina')
    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay"
             style="background-image: url({{asset('img/fondo.jpg')}}); background-attachment: fixed; background-size: cover;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>Mantente bien, mantente abrigado</h6>
                        <hr>
                        <h2>{{Session::get('configuracionpublica')['nombresistema']}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->
    @if(count($productos) > 8)
        <section class="new_arrivals_area section-padding-80 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="popular-products-slides owl-carousel">
                        @for($a = 0; $a < 8; $a++)
                            <!-- Single Product -->
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{asset($productos[$a]['rutaimagen'])}}"
                                             alt="{{$productos[$a]['nombre']}}">

                                        <!-- Hover Thumb -->
                                        <img class="hover-img"
                                             src="{{asset($productos[$a]['rutaimagen'])}}"
                                             alt="">
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>{{$productos[$a]['descripcion']}}</span>
                                        <a href="{{route('producto', ['id' => $productos[$a]['id']])}}">
                                            <h6>{{$productos[$a]['nombre']}}</h6>
                                        </a>
                                        <p class="product-price">
                                            ${{number_format($productos[$a]['valor'])}}</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="#" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay"
                         style="background-image: url({{asset('page/essence/img/bg-img/bg-5.jpg')}});">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>-60%</h6>
                                <h2>Global Sale</h2>
                                <a href="#" class="btn essence-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->
    @if(count($productos) > 16)
        <section class="new_arrivals_area section-padding-80 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="popular-products-slides owl-carousel">
                        @for($a = $a; $a < 16; $a++)
                            <!-- Single Product -->
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{asset($productos[$a]['rutaimagen'])}}"
                                             alt="{{$productos[$a]['nombre']}}">

                                        <!-- Hover Thumb -->
                                        <img class="hover-img"
                                             src="{{asset($productos[$a]['rutaimagen'])}}"
                                             alt="">
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>{{$productos[$a]['descripcion']}}</span>
                                        <a href="{{route('producto', ['id' => $productos[$a]['id']])}}">
                                            <h6>{{$productos[$a]['nombre']}}</h6>
                                        </a>
                                        <p class="product-price">
                                            ${{number_format($productos[$a]['valor'])}}</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="#" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- ##### New Arrivals Area End ##### -->
    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
            @for($b = 0; $b < count($categoria); $b++)
                @if($categoria[$b]['id'] != 1)
                    <!-- Single Catagory -->
                        <div class="col-12 col-sm-6 col-md-4" style="padding: 1%;">
                            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img"
                                 style="background-image: url({{asset($categoria[$b]['rutaimg'])}});">
                                <div class="catagory-content">
                                    <a href="{{route('categorias', ['nombre' => $categoria[$b]['nombre']])}}">{{$categoria[$b]['nombre']}}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->
@endsection
