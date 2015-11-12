@extends('layouts.frontend')

@section('content')
    <section class="ui container page">

        <div class="ui grid">
            <div class="column ten wide">
                <h2 class="">{!! $ujiPublik->present('name') !!}</h2>

                <table class="ui definition table small">
                    <tbody>
                    <tr><td>Materi</td><td>{{ $ujiPublik->present('materi') }}</td></tr>
                    </tbody>
                </table>

                {!! Votee::render($ujiPublik, ['class' => 'fluid']) !!}
                {!! Mural::render($ujiPublik, 'default') !!}

            </div>
            <div class="column six wide">

            </div>
        </div>

    </section>
@endsection