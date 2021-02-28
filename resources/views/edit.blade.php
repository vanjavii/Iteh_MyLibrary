<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align:center; font-size:25px">
            {{ __('Izmeni knjigu') }}
        </h2>
    </x-slot>
    <div class="py-12" style="background-color:#86592d">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5" style="background-color:#e6ccb3">
                <form method="POST" action="/book/{{$book->id}}">
                    <div style="display:flex; justify-content:space-between">
                        <div class="form-group">
                            <label for="">Ime knjige:</label>
                            <input type="text" name="book_name" autocomplete="off" class="bg-gray-100 rounded border border-gray-460 leading-normal py-2 px-3" />
                            @if ($errors->has('book_name'))
                            <span class="text-danger">{{ $errors->first('book_name') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Pisac:</label>
                            <input type="text" name="writer" autocomplete="off" class="bg-gray-100 rounded border border-gray-460 leading-normal py-2 px-3" />
                            @if ($errors->has('writer'))
                            <span class="text-danger">{{ $errors->first('writer') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" style="text-align:center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Izmeni</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>