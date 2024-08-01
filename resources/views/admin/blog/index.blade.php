@extends('layouts.admin')

@section('title', 'Blog')

@section('header')
<link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('content')

<main>
    <h1>Blog <span>> Home</h1>
    <a class="btn btn-primary" href="{{ route('blog.create') }}"><i class="fa-solid fa-plus"></i> Criar</a>

    <div class="section">
        <h2 class="section-head"><i class="fa-solid fa-list"></i> Registros</h2>
        <div class="section-wrap">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Subtítulo</th>
                        <th scope="col">data de publicação</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td><b><a href="{{ route('blog.edit', $post->id) }}">{{ $post->title }}</a></b></td>
                        <td><a href="{{ route('blog.edit', $post->id) }}">{{ $post->subtitle }}</a></td>
                        <td><a href="{{ route('blog.edit', $post->id) }}">{{ $post->published_at }}</a></td>
                        <td><a href="{{ route('blog.edit', $post->id) }}">{{ $post->status }}</a></td>
                        <td>
                            <a class="edit-icon" href="{{ route('blog.edit', $post->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a class="del-icon">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $posts->links('pagination::default') }}
        </div>
    </div>
</main>

@endsection
