@extends('Layouts.main')
@section('title_page','transaction')
@section('title','checkout')
@section('content')
<div class="container">
    <h1>Complete Payment</h1>
    <button id="pay-button" class="btn btn-primary">Pay Now</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){ console.log(result); },
            onPending: function(result){ console.log(result); },
            onError: function(result){ console.log(result); },
            onClose: function(){ console.log('customer closed the popup without finishing the payment'); }
        });
    };
</script>
@endsection