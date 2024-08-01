@if($errors->any())
<div class="messages-wrap">
    @foreach ($errors->all() as $key => $error)
        <div class="message message-error" style="--delay: {{ ($key + 1) * 0.8 }}s">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div class="message-text">
                <p>Oops!</p>
                <span>{{ $error }}</span>
            </div>
        </div>
    @endforeach
</div>

<script>
    setTimeout(function() {
        document.querySelector('.messages-wrap').classList.add('active');
    }, 3000);
    setTimeout(function() {
        document.querySelector('.messages-wrap').remove();
    }, 8000);
</script>

@endif
@if(session()->has('success'))
<div class="messages-wrap">
    <div class="message message-success" style="--delay: 0.8s">
        <i class="fa-solid fa-circle-check"></i>
        <div class="message-text">
            <p>Sucesso!</p>
            <span>{{ session()->get('success') }}</span>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        document.querySelector('.messages-wrap').classList.add('active');
    }, 3000);
    setTimeout(function() {
        document.querySelector('.messages-wrap').remove();
    }, 8000);
</script>

@endif
