@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
        <button type="button" class="btn btn-danger" onclick="getFlash()">Axios Flash</button>

        <modal>
        	<template slot="header">Edit Modal</template>

        	This is the main body

        	<template slot="footer">
        		<button type="button" class="btn btn-info" data-dismiss="modal">Submit</button>
        		<button type="button" class="btn btn-warning" data-dismiss="modal">Reset</button>
        	</template>
        </modal>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
    </div>
</div>
@endsection
