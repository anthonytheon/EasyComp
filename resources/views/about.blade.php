@extends('layouts.app')

@section('page-content')
    <section class="py-20 min-h-screen flex items-center">
        <div class="max-w-screen-lg mx-auto">
            <h2 class="text-6xl text-center mb-6">About</h2>
            <h3 class="text-4xl text-center text-gray-200 mb-6">What is EasyComp ?</h3>
            <p class="mb-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus atque, magni sint, consectetur iure voluptatibus doloremque vero non est dicta saepe voluptatem porro error? Commodi ut sint omnis, at quae voluptatem quasi. Quod in rem repellat, cum eum ad neque, facere commodi cupiditate similique consequatur quis reiciendis ut, corrupti veritatis corporis temporibus culpa. Commodi obcaecati odio dicta iste fuga, impedit laboriosam, animi ut a facilis, voluptatibus eligendi veritatis veniam assumenda culpa quae ullam eius nihil natus harum. Vero, cupiditate. Quas vitae ab aspernatur necessitatibus fuga, repudiandae quae consequuntur, voluptatum quos atque a enim obcaecati dolores tenetur odit, voluptatem ducimus culpa.
            </p>
            <p class="mb-3">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus neque magnam excepturi illo, deserunt temporibus repudiandae modi quas nemo, ipsum unde id libero odio quod!
            </p>
            <div class="mb-6">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam fugit eum ratione pariatur illum a voluptatem mollitia quaerat minus id rem aspernatur eius illo unde eligendi, aperiam, voluptate laborum quia eveniet magnam. Unde aspernatur ut, voluptate ducimus cumque qui ea saepe odit, quis sint culpa iure deleniti sunt corrupti quos.
            </div>
            <div class="text-center">
                <a href="{{ route('home') }}" class="inline-block bg-pink-500 text-center py-2 px-4 rounded hover:bg-purple-500 transition">Go Home </a>
            </div>
        </div>
    </section>
@endsection