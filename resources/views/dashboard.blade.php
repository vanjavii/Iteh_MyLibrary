<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align:center; font-size:25px">
            {{ __('Moja biblioteka') }}
        </h2>
        <i class="fas fa-music"></i>
    </x-slot>
    <div class="py-12" style="background-color:#86592d">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5" style="background-color:#e6ccb3">
                <div class="flex">
                    <div class="flex-auto text-2xl mb-4" style="text-align:center; font-size:25px">Spisak knjiga</div>
                    <div>
                        <a href="/book" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Dodaj knjigu</a>
                    </div>
                </div>
                <table class=" w-full text-md rounded mb-4">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5" style="text-align:center">Ime knjige</th>
                            <th class="text-left p-3 px-5" style="text-align:center">Pisac</th>
                            <th class="text-left p-3 px-S" style="text-align:end">Operacije</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(auth()->user()->books as $book)
                        <tr class="border-b hover: bg-orange-100">
                            <td class="p-3 px-5" style="text-align:center">
                                {{$book->book_name}}
                            </td>
                            <td class="p-3 px-5" style="text-align:center">
                                {{$book->writer}}
                            </td>
                            <td class="p-3 px-5" style="display: flex; justify-content: flex-end">
                                <a href="/book/{{$book->id}}" name="edit" class="mr-3 text-sm bg-blue-700 hover:bg-blue-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" style="text-align:end">Izmeni</a>
                                <form action=" /book/{{$book->id}}" class="inline-block">
                                    <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Obrisi</button>
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
