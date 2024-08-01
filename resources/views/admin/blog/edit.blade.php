@extends('layouts.admin')

@section('title', 'Blog - Editar')

@section('header')
<link rel="stylesheet" href="{{ asset('css/admin/forms.css') }}">
@endsection

@section('content')

<main>
    <h1>Blog <span>> <a href="{{ route('blog.index') }}">Home</a> > Editar > {{ $post->title }}</span></h1>

    <form action="{{ route('blog.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="section">
            <h2 class="section-head"><i class="fa-solid fa-pen"></i> Cadastro</h2>
            <div class="section-wrap">
                <div class="row">
                    <div class="input-field">
                        <label for="title">Título da postagem: <span class="required-sign">*</span> </label>
                        <input type="text" name="title" id="title" maxlength="60" value="{{ $post->title }}">
                        <p class="remain-characters">Caracteres restantes: <span id="counter-title">60</span></p>
                    </div>
                    <div class="input-field">
                        <label for="subtitle">Subtítulo da postagem: <span class="required-sign">*</span> </label>
                        <input type="text" name="subtitle" id="subtitle" maxlength="120" value="{{ $post->subtitle }}">
                        <p class="remain-characters">Caracteres restantes: <span id="counter-subtitle">120</span></p>
                    </div>
                </div>
                <div class="input-field">
                    <label for="content">Texto da postagem: <span class="required-sign">*</span> </label>
                    <textarea name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
                </div>
                <div class="img-preview">
                    <div>
                        <div class="input-field">
                            <label for="image">Imagem do snippet: <span class="required-sign">*</span> </label>
                            <input type="file" name="image" id="image">
                        </div>
                        <div class="input-field">
                            <label for="convert-to-webp">
                                <span>Converter para webp?</span>
                                <input type="checkbox" name="convert-to-webp" id="convert-to-webp" checked>
                            </label>
                            <p class="explanation">
                                Webp é um formato de imagem para webp mais leve e otimizado
                            </p>
                        </div>
                    </div>
                    <div class="img-wrap">
                        <img src="{{ asset('upload/blog/' . $post->featured_image) }}" alt="">
                    </div>
                </div>
                <div class="row" style="--width: 70%">
                    <div class="input-field">
                        <label for="status">Status: </label>
                        <select name="status" id="status">
                            <option value="published" selected>Publicado</option>
                            <option value="pending">Pendente</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="date">Data da postagem: </label>
                        <input type="date" name="date" id="date" value="{{ $post->date }}">
                    </div>
                    <div class="input-field">
                        <label for="time">Hora da postagem: </label>
                        <input type="time" name="time" id="time" value="{{ $post->time }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <h2 class="section-head"><i class="fa-solid fa-pen"></i> SEO</h2>
            <div class="section-wrap">
                <div class="input-field">
                    <label for="tags">Tags: </label>
                    <input type="text" name="tags" id="tags" maxlength="255" value="{{ $post->tags }}">
                    <p class="remain-characters">Caracteres restantes: <span id="counter-tags">255</span></p>
                </div>
                <div class="input-field">
                    <label for="meta_description">Meta descrição: </label>
                    <input type="text" name="meta_description" id="meta_description" cols="30" rows="5" maxlength="160" value="{{ $post->meta_description }}">
                    <p class="remain-characters">Caracteres restantes: <span id="counter-meta_description">160</span></p>
                </div>
            </div>
        </div>
        <div class="button-wrap">
            <a href="{{ route('blog.index') }}" class="btn">Voltar</a>
            <button class="btn btn-success" type="submit">Editar a postagem</button>
        </div>
    </form>
</main>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#title').on('input', function() {
            var maxLength = $(this).attr('maxlength');
            var currentLength = $(this).val().length;
            var remainingLength = maxLength - currentLength;
            var counterElement = $('#counter-title');
            counterElement.text(remainingLength);
        });
        $('#subtitle').on('input', function() {
            var maxLength = $(this).attr('maxlength');
            var currentLength = $(this).val().length;
            var remainingLength = maxLength - currentLength;
            var counterElement = $('#counter-subtitle');
            counterElement.text(remainingLength);
        });
        $('#tags').on('input', function() {
            var maxLength = $(this).attr('maxlength');
            var currentLength = $(this).val().length;
            var remainingLength = maxLength - currentLength;
            var counterElement = $('#counter-tags');
            counterElement.text(remainingLength);
        });
        $('#meta_description').on('input', function() {
            var maxLength = $(this).attr('maxlength');
            var currentLength = $(this).val().length;
            var remainingLength = maxLength - currentLength;
            var counterElement = $('#counter-meta_description');
            counterElement.text(remainingLength);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('change', '#image', function() {
            var input = this;
            var imgWrap = $(input).closest('.img-preview').find('.img-wrap');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(imgWrap).find('img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>
@endsection
