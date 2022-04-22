@extends('layouts.app')

@section('content')

<style>
    .loader-overlay {
        background: #0F1015;
        display: block;
        height: 100%;
        left: 245px;
        opacity: 0.9;
        position: fixed;
        top: 70px;
        vertical-align: middle;
        width: 100%;
        z-index: 100;
    }

    .loader-content {
        margin-left: auto;
        margin-top: auto;
        width: 50%;
    }

    .loader-center {
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        left: 50%;
        display: block;
        position: fixed;
        top: 50%;
        transform: translate(-50%, -55%);
    }

    .loader-text {
        color: #FFF;
        font-size: 18px;
        height: 50%;
    }

</style>

<div id="loadingOverlay" class="loader-overlay">
    <div class="loader-content loader-center">
        <img src="http://www.mysarkarinaukri.com/images/loadingBar.gif" class="loader-center" alt="" />
        <div class="loader-center loader-text">Content Comming Soon...</div>
    </div>
</div>

@endsection