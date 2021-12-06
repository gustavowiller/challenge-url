<html>
    <body>
        <h1>Novo Status</h1>

        <form method="POST" action="/status">
            @csrf

            <label for="url">Url</label>
            <input id="url" type="text" class="@error('url') is-invalid @enderror">
            @error('url')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button :class="{ danger: isDeleting }">
                Salvar
            </button>
        </form>
    </body>
</html>
