@extends('index.templates.default')

@section('title', 'Home')

@section('description', 'Descrição')

@section('content')

<section class="search search-vacancies">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 search-job col-sm-offset-1">
                @forelse($frequentlys as $frequently)
                <div class="row">
                    <div class="col-sm-12">
                        
                        <p><b>{{$frequently->question}}</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p><?php echo $frequently->answer ?></p>
                    </div>
                </div>
                <hr>
                @empty
                @endforelse
            </div>
        </div>
    </div>    
</section>
@stop