@section('footer')

<footer class="mt-auto">
	<div class="container">
		<br><img class="img-fluid mx-auto d-block" alt='ロゴ' src="{{ asset( 'images/common/Logo.png' ) }}" width="160px">
		<br>
	</div>
</footer>

<!--JS -->
<!-- jQuery読み込み -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<!-- PopperのJS読み込み -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<!-- BootstrapのJS読み込み -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@yield('pageJs')

@endsection
