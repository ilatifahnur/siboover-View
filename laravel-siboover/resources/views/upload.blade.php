@extends('template.driver')

@section('title', 'Upload')

@section('content')
<h2>Upload files here</h2>

      {!! Form::open(array('url' => '/handleUpload', 'files' => true, 'action' => 'post')) !!}

		<div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                    <input type="file">
         	</div>
        	<div class="file-path-wrapper">
               {!! Form::file('file') !!}
        	</div>
        </div>
               
      
      {!! Form::token() !!}
     
      {!! Form::submit('Upload', ['class' => 'btn waves-effect waves-light']) !!}
      {!! Form::close() !!}

@endsection
