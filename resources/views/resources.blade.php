@extends('layouts.app')

@section('content')
    <div class="main-content pt--125">


        <div class="rn-service-area rn-section-gap ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center sal-animate" data-sal="slide-up" data-sal-duration="700" data-sal-delay="100">
                            <h4 class="subtitle "><span class="theme-gradient">Our Resources</span></h4>
                            <h2 class="title w-600 mb--20">Resources.</h2>
                        </div>
                    </div>
                </div>
                <div class="row row--15 service-wrapper">

                    @foreach ( $resources as $resource )

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12  mt-3sal-animate" data-sal="slide-up" data-sal-duration="700">
                            <div class="service service__style--2 text-center pt-5">
                                <div class="inner">
                                    <div class="image">
                                        <img src="{{ asset("images/resources/".$resource->img) }}" alt="resource-image">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">
                                            <a href="#">{{ $resource->title }}</a>
                                        </h4>
                                        <p class="description b1 color-gray mb--0">
                                            {!! $resource->content !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach



                </div>
            </div>
        </div>



    </div>
@endsection
