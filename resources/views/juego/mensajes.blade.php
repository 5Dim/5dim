@extends('juego.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form>
                                <textarea class="ckeditor" name="editor1" id="editor1" rows="10" cols="80">
                                    Este es el textarea que es modificado por la clase ckeditor
                                </textarea>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection