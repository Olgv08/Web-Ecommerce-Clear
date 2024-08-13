@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Orden
@endsection

@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Raestraer mi pedido</h4>
                        <ul>
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Raestraer mi pedido</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        TRACKING ORDER START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="wsus__track_area">
                <div class="row">
                    <div class="col-xl-5 col-md-10 col-lg-8 m-auto">

                        <form class="tack_form" action="{{route('product-traking.index')}}" method="GET">

                            <h4 class="text-center">rastreo de orden                            </h4>
                            <p class="text-center">Seguimiento del estado de su pedido</p>
                            <div class="wsus__track_input">
                                <label class="d-block mb-2">invoice id*</label>
                                <input type="text" placeholder="H25-21578455" name="tracker" value="{{@$order->invocie_id}}">
                            </div>
                            <button type="submit" class="common_btn">Seguir</button>
                        </form>
                    </div>
                </div>
                @if (isset($order))
                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__track_header">
                            <div class="wsus__track_header_text">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-lg-3">
                                        <div class="wsus__track_header_single">
                                            <h5>Fecha de Orden </h5>
                                            <p>{{date('d M Y', strtotime(@$order->created_at))}}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-lg-3">
                                        <div class="wsus__track_header_single">
                                            <h5>Comprado por:</h5>
                                            <p>{{@$order->user->name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-lg-3">
                                        <div class="wsus__track_header_single">
                                            <h5>Estado:</h5>
                                            <p>{{@$order->order_status}}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 col-lg-3">
                                        <div class="wsus__track_header_single border_none">
                                            <h5>Seguimiento:</h5>
                                            <p>{{@$order->invocie_id}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <ul class="progtrckr" data-progtrckr-steps="4">

                            <li class="progtrckr_done icon_one check_mark">Pendiente</li>

                            @if (@$order->order_status == 'canceled')
                                <li class="icon_four red_mark">Orden Cancelada</li>
                            @else
                            <li class="progtrckr_done icon_two
                            @if (@$order->order_status == 'processed_and_ready_to_ship' ||
                                @$order->order_status == 'dropped_off' ||
                                @$order->order_status == 'shipped' ||
                                @$order->order_status == 'out_for_delivery' ||
                                @$order->order_status == 'delivered')
                            check_mark
                            @endif">Procesando su orden</li>
                            <li class="icon_three
                            @if (
                                @$order->order_status == 'out_for_delivery' ||
                                @$order->order_status == 'delivered')
                            check_mark
                            @endif
                            ">En camino</li>
                            <li class="icon_four
                            @if (
                                @$order->order_status == 'delivered')
                            check_mark
                            @endif
                            ">Entregado</li>
                            @endif

                        </ul>
                    </div>
                    <div class="col-xl-12">
                        <a href="{{url('/')}}" class="common_btn"><i class="fas fa-chevron-left"></i>   Ir al inicio</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!--============================
        TRACKING ORDER END
    ==============================-->
@endsection
