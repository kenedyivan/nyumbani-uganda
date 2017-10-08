@extends('...layouts.user_layout')
@section('title')
  <title>e-NYUMBANI : Agents</title>
@endsection
@section('content')


    <!--start section page body-->
    <section id="section-body">
        <div class="container">
            <div class="page-title breadcrumb-top">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb">
                            <li><a href="/"><i class="fa fa-home"></i></a></li>
                            <li class="active">All Agents</li>
                        </ol>
                        <div class="page-title-left">
                            <h2>All Agents</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 list-grid-area container-contentbar">
                    <div id="content-area">
                        <div class="agent-listing">
                            @foreach($agents as $agent)
                            <div class="profile-detail-block">
                                <div class="media">
                                    <div class="media-left">
                                        <figure>
                                            <img src="/images/agents/all_agents_239x239/{{$agent->profile_picture}}" alt="Author Thumb" width="239" height="239">
                                        </figure>
                                        <a href="/agent-details/{{$agent->id}}" class="btn btn-primary btn-block hidden-xs">View My Properties</a>
                                    </div>
                                    <div class="media-body">
                                        <div class="profile-description">
                                            <h3>{{$agent->first_name}} {{$agent->last_name}}</h3>
                                            <h4 class="position">{{$agent->company}}</h4>
                                            <p>{{$agent->bio}}</p>
                                            <ul class="profile-contact">
                                                <li><span>OFFICE:</span> <a href="#">{{$agent->office_phone}}</a></li>
                                                <li><span>MOBILE:</span> <a href="#">{{$agent->mobile_phone}}</a></li>
                                                <li><span>FAX:</span> <a href="#">{{$agent->fax}}</a></li>
                                                <li class="email"><span>Email:</span> <a href="mailto:{{$agent->email}}">{{$agent->email}}</a></li>
                                            </ul>
                                            <ul class="profile-social">
                                                <li><a href="tel:{{$agent->mobile_phone}}"><i class="fa fa-phone-square"></i></a></li>
                                                <li><a href="{{$agent->facebook_link}}"><i class="fa fa-facebook-square"></i></a></li>
                                                <li><a href="{{$agent->twitter_link}}"><i class="fa fa-twitter-square"></i></a></li>
                                                <li><a href="{{$agent->linkedin_link}}"><i class="fa fa-linkedin-square"></i></a></li>
                                            </ul>
                                            <a href="/agent-details/{{$agent->id}}" class="btn btn-primary btn-block visible-xs">View My Properties</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <hr>

                        <!--start Pagination-->
                        <div class="text-center">
                            <?php echo $agents->render(); ?>
                        </div>
                        <!--start Pagination-->

                    </div>
                </div>
                @include('users.left_bar')
            </div>
        </div>
    </section>
    <!--end section page body-->


@endsection
