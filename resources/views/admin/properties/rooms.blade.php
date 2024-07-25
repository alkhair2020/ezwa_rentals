@extends('layout.admin_main')
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12  ">
		<h3 class="content-header-title ">إدارة الغرف </h3>
		
	</div>
	<div class="content-header-right col-md-6 col-12 mb-1">
		<div class="dropdown float-md-right">
			<a href="#Add_item" data-toggle="modal" class="btn btn-primary float-right ">اضافة </a>
		</div>
	</div>

</div>
@include('admin.properties.create-modal')
<div class="row card-header" >
    @foreach ($properties as $property)
        <div class="col-xl-1 col-lg-6 col-3">
            <a href="{{url('property/exit_today')}}">
                <div class="card" style="    border: 1px solid #e7e5e5;">
                    
                            <div class="media d-flex">
                                <div class="image-container">
                                    <img src="{{asset('img/room.png')}}" class="img-fluid" alt="صورة">
                                    <div class="number-text">{{$property->number}}</div> 
                                </div>
                            </div>
                            <div class="row" style="    margin-right: -3px;">
                                <a class="btn btn-sm bg-success-light" data-toggle="modal" data-catid="{{ $property->id }}" data-target="#delete"
                                >
                                <i class="la la-trash "></i>
                                </a>
                        
                                <a class="btn btn-sm bg-success-light" data-toggle="modal"
								data-title_ar ="{{ $property->title_ar }}"data-catid="{{ $property->id }}"data-target="#edit{{$property->id}}">
                                <i class="la la-eyedropper"></i>
                                </a>
                                <a class="btn btn-sm bg-success-light edit-course" data-toggle="modal" data-title_ar ="{{ $property->title_ar }}"data-catid="{{ $property->id }}"data-target="#edit{{$property->id}}">
                                    <i class="la la-eye"></i>
                                </a>
                            </div>
                </div>
            </a>
        </div>
        <!-- Edit Details Modal -->
        @include('admin.properties.edit-modal')
        <!-- /Edit Details Modal -->
    @endforeach
  <!-- Delete Modal -->
  <div class="modal fade" id="delete" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">حذف</h4>
                        <p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
                        <div class="row text-center">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-2">
                                <form method="post" action="{{route('properties.destroy','test')}}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" id="cat_id">
                                    <button type="submit" class="btn btn-danger ">حذف </button>
                                </form>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
        .image-container {
            position: relative;
            text-align: center;
            color: white;
        }
        .number-text {
            position: absolute;
            top: 63%;
            left: 38%;
            transform: translate(-50%, -50%);
            font-size: 14px;
            color: #fff;
        }
    </style>

<style>
  .rented-color {
    background: #DADADA;
  }

  .rented-back {
    background: #aa342b;
    margin-bottom: -5px;
  }

  .waiting-color {
    background: #28D094;
  }

  .maintenance-color {
    background: #DADADA;
  }

  .maintenance-back {
    background: #DADADA;
    margin-bottom: -5px;
  }

  .notclean-back {
    background: #ff9149;
    margin-bottom: -5px;
  }

  .notclean-color {
    background: #DADADA;
  }

  .vacant-back {
    background: #28D094;
    margin-bottom: -5px;
  }

  .vacant-color {
    background: #DADADA;
  }
  .notclean_rented-color{
    background: #DADADA;
  }
  .notclean_rented-back {
    background: #aa342b;
    margin-bottom: -5px;
  }
</style>
<style>
  .rented-border {
    border-top: 3px solid #DADADA;
  }

  .waiting-border {
    border-top: 3px solid #28D094;
  }

  .maintenance-border {
    border-top: 3px solid #DADADA;
  }

  .notclean-border {
    border-top: 3px solid #DADADA;
  }

  .vacant-border {
    border-top: 3px solid #DADADA;
  }
  .notclean_rented-border{
    border-top: 3px solid #DADADA;
  }
</style>








@endsection