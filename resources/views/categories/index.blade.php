@extends('layout')

@section('content')

    <section class="page-section" id="edit">
        <div class="container relative">
            @include('helpers.messages')
            <h2 class="section-title font-alt mb-70 mb-sm-40">
                {{ __('Categories') }}
            </h2>
            <div class="row mb-50">
                <div class="col">
                    <a class="btn btn-mod btn-medium btn-round" href="{{ route('category.create') }}"><i class="fa fa-plus"></i> {{ __('forms.new_category') }}</a>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">{{ __('forms.name') }}</th>
                        <th scope="col">{{ __('forms.type') }}</th>
                        <th scope="col">{{ __('forms.status') }}</th>
                        <th scope="col">{{ __('forms.count') }}</th>
                        <th scope="col">{{ __('forms.creation_date') }}</th>
                        <th scope="col">{{ __('forms.modify_date') }}</th>
                        <th scope="col">{{ __('forms.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->type }}</td>
                        <td>{{ $category->status }}</td>
                        <td>{{ $category->postCountPublic }} / {{ $category->postCountAll }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
                            @if($category->status == 'public')
                                <a href="{{ route('category.changeStatus', $category->id) }}"><i class="fa fa-ban"></i></a>
                            @else
                                <a href="{{ route('category.changeStatus', $category->id) }}"><i class="fa fa-check"></i></a>
                            @endif
                            <a href="{{ route('category.confirm', $category->id) }}"><i class="fa fa-trash" style="color: red"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
