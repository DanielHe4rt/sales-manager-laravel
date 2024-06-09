<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Manager</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':

                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
                    break;
                case 'success':

                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'warning':

                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'error':

                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
            }
        @endif
    </script>
</head>

<body>
    <div class="bg-zinc-950 flex flex-col items-center justify-center min-h-screen">
        <form action="{{ route('addClient') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="number-client">
                        Nome
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="name-client" id="name-client" placeholder="Digite o nome do cliente">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="number-client">
                        Telefone
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="number-client" name="number-client" type="text" placeholder="Digite o telefone">
                </div>
            </div>

            <div class="flex flex-col items-center justify-between gap-4">
                <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Enviar
                </button>
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" formaction="/removeClient">
                    Deletar
                </button>
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold w-full py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" formaction="/editClient">
                    Editar
                </button>
            </div>
        </form>
        @if (sizeof($clients) > 0)
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @foreach ($clients as $result)
                    <p>{{ $result['name'] }}</p>
                @endforeach
            </div>
        @endif
    </div>

</body>

</html>
