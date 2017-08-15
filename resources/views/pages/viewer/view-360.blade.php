@extends('layouts.viewer')


@section('add-scripts')
	<script type="text/javascript">
        window.textures = ["<?php echo $path;?>"]
    </script>
@endsection

@section('content')
	<div id="viewer360"></div>
@endsection




