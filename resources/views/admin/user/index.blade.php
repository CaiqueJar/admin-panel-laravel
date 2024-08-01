@extends('layouts.admin')

@section('title', 'Perfil')

@section('header')
<link rel="stylesheet" href="{{ asset('css/admin/forms.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/users.css') }}">
@endsection

@section('content')

<main>
    <h1>Perfil</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="section img-section">
            <div class="section-wrap">
                <div class="img-wrap">
                    <img src="{{ $user->image ? asset('upload/users/' . $user->image) : asset('img/user.png') }}" alt="">
                </div>
                <div class="input-field">
                    <input type="file" name="image" id="image">
                </div>
            </div>
        </div>
        <div class="section">
            <div class="section-wrap">
                <div class="input-field">
                    <label for="name">Nome: <span class="required-sign">*</span></label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="input-field">
                    <label for="login">Login: <span class="required-sign">*</span></label>
                    <input type="text" name="login" id="login" value="{{ $user->login }}">
                </div>
                <div class="input-field">
                    <label for="email">E-mail: <span class="required-sign">*</span></label>
                    <input type="text" name="email" id="email" value="{{ $user->email }}">
                </div>
                <div class="button-wrap">
                    <button class="btn btn-success" type="submit">Editar perfil</button>
                </div>
            </div>
        </div>
    </form>

</main>

@endsection
