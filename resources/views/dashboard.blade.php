<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Вітаю <b>{{ Auth::user()->name }}</b> в особистому кабінеті!  Раді що Ви завітали до нас сьогодні.
            <b style="float:right;">Total Users
                <span class="badge badge-danger"> {{ count($users) }} </span>
            </b>
        </h2>

    </x-slot>

    <div class="py-12">
       {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <p>Це домашня сторінка</p>--}}{{--старий зпаис--}}{{----}}{{-- <x-jet-welcome />--}}{{--
            </div>
        </div>--}}
        <div class="container">
            <div classs="row">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Імя</th>
                        <th scope="col">Email</th>
                        <th scope="col">Добавлено</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php($i = 1)
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
    </div>

    </div>
</div>

</x-app-layout>
