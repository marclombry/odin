@extends('layouts.app')
@section('content')
@if(Auth::check())
<div class="row">
  <div class="col-md-9">
      <div class="d-flex flex-wrap justify-content-between">
          @foreach($links as $key => $link)
          <div class="card m-2 " style="min-width: 14rem; max-width: 14rem;">
            <img class="card-img-top" src="{{url('/img')}}/{{$link->picture}}" alt="" style="min-height: 8rem;max-height: 8rem;">
            <div class="card-body">
              <h4 class="card-title text-center">{{ucfirst($link->title)}}</h4>
              <p class="card-text">Allez sur <a href="{{$link->href}}" target="_BLANK"><i class="icofont-hand-right text-size15 "></i> {{ucfirst($link->name)}}</a></p>
              <p class="card-text">{{ucfirst($link->category)}}</p>
            </div>
          </div>
          @endforeach
      </div>

  </div>
  <div class="col-md-3">
    <!-- récupéré toute les category différente puis les afficher avec un list group bootsrap-->
    <div class="list-group">
      <div class="list-group-item list-group-item-action active">
          Trier par :
      </div>
      <a href="{{ url('/home') }}" class="list-group-item list-group-item-action">Tous</a>
      @foreach($lists as $key =>$list)
         <a href="{{route('list',$list->category)}}" class="list-group-item list-group-item-action">{{ucfirst($list->category)}}</a>
      @endforeach
    </div>
  </div>
</div>
@endif
@endsection