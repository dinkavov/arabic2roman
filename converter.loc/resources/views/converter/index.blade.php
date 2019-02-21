@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
            	<div class="card">
            		<button type="button" class="btn btn-warning">Задача</button>
            		<p>Спроектировать и разработать одностраничное веб-приложение, позволяющее конвертировать числа из римских в арабские и наоборот.</p>
            	</div>
                <div class="card"> 
                    <div class="card-body">

                        {!! Form::open(['action' => ['ConverterController@convert'], 'method' => 'POST', 'id' => 'ConvertForm']) !!}

                        <div class="form-group">
                            {{ Form::textarea('numerals', '', ['id' => 'arabicnumeralsField', 'class' => 'form-control', 'rows' => 3, 'cols' => 3, 'placeholder' => 'Numerals...', 'required' => true]) }}
                        </div>

                          <div class="form-group">
                            {{ Form::textarea('numerals', '', ['id' => 'romannumeralsField', 'class' => 'form-control', 'rows' => 3, 'cols' => 3, 'placeholder' => 'Numerals...', 'readonly' => 'true']) }}
                        </div>


                        {{ Form::submit('Convert', ['class' => 'btn btn-primary btn-lg']) }}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection