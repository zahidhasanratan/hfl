<form id="myForm" method="post" action="{{ route('dmc.pay.success') }}" >
@csrf
    <input type="hidden" name="random" value="{{ $invoice->random }}">
    <input type="hidden" name="email" value="{{ $invoice->email }}">
    <input type="hidden" name="name" value="{{ $invoice->name }}">

</form>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        document.getElementById('myForm').submit();
    });
</script>

