@extends('admin.layout.app')
<style>
    .btn{
        height:27px !important;
    }
    .material-icons{
        margin-top:0px !important;
        margin-bottom:0px !important;
    }
</style>
@section ('content')
<div class="container-fluid">
 <div class="row">
<div class="col-lg-12">
@if (session()->has('success'))
<div class="alert alert-success">
@if(is_array(session()->get('success')))
        <ul>
            @foreach (session()->get('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
        @else
            {{ session()->get('success') }}
        @endif
    </div>
@endif
 @if (count($errors) > 0)
  @if($errors->any())
    <div class="alert alert-danger" role="alert">
      {{$errors->first()}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif
@endif
</div>  

<div class="col-lg-12">
<div class="card">    
<div class="card-header card-header-primary">
      <h4 class="card-title ">{{ __('keywords.Area')}} {{ __('keywords.List')}}</h4>
       <a href="{{route('society')}}" class="btn btn-primary ml-auto" style="width:10%;float:right;padding: 3px 0px 3px 0px;">{{ __('keywords.Add')}}</a>
    </div>
    <div class="container"> <br> 

<table id="datatableDefault" class="table text-nowrap w-100">
    <thead class="thead-light">
        <tr>
            <th class="text-center">#</th>
            <th>{{ __('keywords.Society')}} {{ __('keywords.Name')}}</th>
            <th>{{ __('keywords.City')}} {{ __('keywords.Name')}}</th>

            <th class="text-center">{{ __('keywords.Actions')}}</th>
        </tr>
    </thead>
    <tbody>
           @if(count($city)>0)
          @php $i=1; @endphp
          @foreach($city as $cities)
        <tr>
            <td class="text-center">{{$i}}</td>
            <td>{{$cities->society_name}}</td>
            <td>{{$cities->city_name}}</td>

            <td class="td-actions text-center">
                <a href="{{route('societyedit',$cities->society_id)}}" rel="tooltip" class="btn btn-success">
                    <i class="fa fa-edit"></i>
                </a>
               <a href="{{route('societydelete',$cities->society_id)}}"  onClick="return confirm('Are you sure you want to permanently remove this Society/Area.')" rel="tooltip" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
          @php $i++; @endphp
                 @endforeach
                  @else
                    <tr>
                      <td>{{ __('keywords.No data found')}}</td>
                    </tr>
                  @endif
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div>
    </div>
    @endsection
</div>