@extends('layout')

@section('content')

    <section class="page-section" id="deleting">
        <div class="container relative">
            <h2 class="section-title font-alt mb-70 mb-sm-40">
                {{ __('Deleting') }}
            </h2>
            <div class="row">
                <form method="POST" action="{{ route('category.destroy', $category->id) }}" class="form">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <div class="row mb-3 justify-content-center">
                        <div class="col align-center">
                            <p class="font-alt strong">{{__('forms.confirm',['attribute' => $category->name])}}</p>
                        </div>
                    </div>

                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6 align-center">
                            <button type="submit" class="btn btn-mod btn-large">
                                {{ __('forms.delete') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
