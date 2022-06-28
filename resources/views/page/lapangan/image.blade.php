@extends('page/layout/app')

@section('title', 'Image Lapangan')

@section('content')

<div class="page-heading">
	@foreach($id as $dt)
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-offset-md-4">
				<div class="card">
					<h5 class="card-header">Tambahkan beberapa Gambar</h5>
					<div class="card-body">
						<form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="imgPreview">
							<div class="form-group">
								<input type="hidden" value="{{$dt->id_lapangan}}" name="id_lapangan">
								<input type="file" required="" id="images" class="form-control" name="file[]" multiple>
							</div>
							</div>
							<button type="submit" class="btn btn-sm btn-primary mt-2">Upload</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).width('200').appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    
    </script>
	@endforeach
	<section id="content-types">
		<div class="row">
			@foreach($data as $dt)
			<div class="col-xl-3 col-md-6 col-sm-12">
				<div class="card">
					<div class="card-content">
						<img src="{{asset('image')}}/{{$dt->filename}}" class="card-img-top img-fluid"
						alt="singleminded">

					</div>
					<ul class="list-group list-group-flush">
						<form action="{{ route('delete_image', $dt->id_image) }}" method="post">
							@csrf
							<li class="list-group-item">
								@method('DELETE')
								<button class="btn btn-sm btn-danger">
									<i class="dripicons dripicons-trash"></i>
								</button>
							</li>
						</form>					
					</ul>
				</div>
			</div>
			@endforeach
		</div>
	</section>
</div>


@endsection