@extends('admin.layout.app')
<style>
  
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
      <h4 class="card-title ">{{ __('keywords.Store')}} {{ __('keywords.List')}}</h4>
      <a href="{{route('store')}}" class="btn btn-primary ml-auto" style="width:10%;float:right;padding: 3px 0px 3px 0px;">{{ __('keywords.Add')}} {{ __('keywords.Store')}} </a>
    </div>
<div class="container"> <br> 
<table id="datatableDefault" class="table text-nowrap w-100">
    <thead class="thead-light">
        <tr>
            <th class="text-center">#</th>
                      <!--<th>ID</th>-->
                      <th>{{ __('keywords.Store Name')}}</th>
                      <th>{{ __('keywords.City')}}</th>
                      <th>{{ __('keywords.Mobile')}}</th>
                      <th>{{ __('keywords.Email')}}</th>
                      <th>{{ __('keywords.Delivery time')}}</th>
                      <th>{{ __('keywords.Admin Share')}}</th>
                      <th>{{ __('keywords.orders')}}</th>
                      <th>{{ __('keywords.Store Status')}}</th>
                      <th align="center">{{ __('keywords.Action')}}</th>
                    </thead>
                    <tbody>
                         @if(count($city)>0)
                          @php $i=1; @endphp
                          @foreach($city as $cities)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td>{{$cities->store_name}}</td>
                                <td>{{$cities->city}}</td>
                                <td>{{$cities->phone_number}}</td>
                                <td>{{$cities->email}}</td>
                                <td>{{$cities->store_opening_time}} - {{$cities->store_closing_time}}</td>
                                <td>{{$cities->admin_share}} %</td>
                                <td><a href="{{route('admin_store_orders', $cities->id)}}" rel="tooltip">
                                <i class="fa fa-cubes" style="color:green"></i></a></td>
                                <td> @if($cities->store_status==1)
                                   <span style="color:green"><b>Active</b></span>
                                    @else
                                   <span style="color:red"><b>Inactive</b></span>
                                    @endif</td>
                                <td class="td-actions text-center">
                    
                                    <a href="{{route('storedit', $cities->id)}}" button type="button" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </button></a>
                                     <a href="{{route('storedelete', $cities->id)}}" button type="button" class="btn btn-danger"  onClick="return confirm('Are you sure you want to permanently remove this Store.This store may have orders Please check its panel.')" rel="tooltip" >
                                        <i class="fa fa-trash"></i>
                                    </button></a>
                                 
                                    @if($cities->store_status==1)
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2{{$cities->id}}">
                                        <i class="fa fa-unlock-alt"></i>
                                    {{ __('keywords.Mark Inactive')}}</button>
                                   
                                    @else
                                     <a href="{{route('storeunhide', $cities->id)}}" button type="button" class="btn btn-primary"  onClick="return confirm('Are you sure you want to Active this Store.')" rel="tooltip" >
                                        <i class="fa fa-lock"></i>
                                    </button>{{ __('keywords.Mark Active')}}</a>
                                    @endif
                                     <a target="_blank" rel="noopener noreferrer" href="{{route('secret-store-login', $cities->id)}}" style=" background-color:black" button type="button" class="btn btn-success">
                                       <i class="fa fa-user-secret"></i>
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
    <!--/////////reject orders///////////-->
@foreach($city as $cities)
        <div class="modal fade" id="exampleModal2{{$cities->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        	<div class="modal-dialog" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">{{ __('keywords.Mark Inactive')}}(<b>{{$cities->store_name}}</b>)</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        						<span aria-hidden="true">&times;</span>
        					</button>
        			</div>
        			<!--//form-->
        		<form class="forms-sample" action="{{route('storehide', $cities->id)}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
        			<div class="row">
        			  <div class="col-md-3" align="center"></div>  
                      <div class="col-md-6" align="center">
                          <br>
                        <div class="form-group">
                           <label>{{ __('keywords.Inactive Reason')}}</label>    
        		     	   <textarea name="cause" row="5" required></textarea>
        			    </div><br>
        			<button type="submit" class="btn btn-primary pull-center">{{ __('keywords.Submit')}}</button>
        			</div>
        			</div>
        			  
                    <div class="clearfix"></div>
        			</form>
        		
        		</div>
        	</div>
        </div>
 @endforeach
    </div>

    @endsection
</div>