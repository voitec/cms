@extends('layout')

@section('content')

    <section class="page-section" id="edit">
        <div class="container relative">
            @include('helpers.messages')
            <h2 class="section-title font-alt mb-70 mb-sm-40">
                {{ __('Users') }}
            </h2>
            <div class="row mb-50">
                <div class="col">
                    <a class="btn btn-mod btn-medium btn-round" href="{{ route('user.create') }}"><i class="fa fa-plus"></i> {{ __('forms.new_user') }}</a>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">{{ __('forms.name') }}</th>
                        <th scope="col">{{ __('forms.email') }}</th>
                        <th scope="col">{{ __('forms.role') }}</th>
                        <th scope="col">{{ __('forms.active') }}</th>
                        <th scope="col">{{ __('forms.creation_date') }}</th>
                        <th scope="col">{{ __('forms.modify_date') }}</th>
                        <th scope="col">{{ __('forms.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->active }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                            @if($user->active == true)
                                <a href="{{ route('user.changeStatus', $user->id) }}"><i class="fa fa-ban"></i></a>
                            @else
                                <a href="{{ route('user.changeStatus', $user->id) }}"><i class="fa fa-check"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
