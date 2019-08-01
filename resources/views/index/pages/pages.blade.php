@extends('index.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')

<section class="search search-vacancies">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 search-job col-sm-offset-1">
                <h1>{{$page->name}}</h1>
                <div class="row">
                    <div class="col-sm-12">
                        <p><?php echo $page->desc ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>
@stop