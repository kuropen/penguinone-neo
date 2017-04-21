@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-3">
        <h2 class="sr-only">Kuropen's Profile</h2>
        <div>
            <div class="avatarBox">
                <img src="{{$imageUrl}}" alt="">
            </div> 
            <div class="nameText">
                Kuropen
            </div>
        </div>
        <ul class="nav nav-pills nav-stacked">
          <li role="presentation"><a href="https://akabe.co/@kuropen"><i class="fa fa-user-circle" aria-hidden="true"></i> Mastodon (Becospace)</a></li>
          <li role="presentation"><a href="https://twitter.com/kuropen_aizu"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</a></li>
          <li role="presentation"><a href="https://fb.me/yuda.hirochika"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a></li>
          <li role="presentation"><a href="https://github.com/kuropen"><i class="fa fa-github" aria-hidden="true"></i> GitHub</a></li>
          <li role="presentation"><a href="https://instagram.com/kuropen"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
        </ul>
    </div>
    <div class="col-md-9">
        <h2>My works</h2>
        <h3>Websites</h3>
        <ul>
            <li><a href="/mastodon/akabe.co">Becospace Mastodon</a></li>
        </ul>
        <h3>Qiita Contributions</h3>
        <ul>
        @foreach ($qiitaContent as $content)
            <li><a href="{{$content->url}}" target="_blank">{{$content->title}}</a></li> 
        @endforeach
        </ul>
    </div>
</div>
@endsection