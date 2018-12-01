@extends('layouts.app')
@section('title', '微信登录')

@section('content')
    <div class="container">
        <div class="center">
            <a href="{{route('wechat.login.redirect')}}" class="btn btn-primary">点此使用微信登录</a>
        </div>
    </div>
@endsection
