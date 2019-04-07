@extends('layouts.master')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
        <!-- danh muc banh ngot -->
        @foreach($banhngot as $row)      <!-- ->banhngot-->  
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">
            <div class="thumbnail mobile">              
              <div class="bt">
                <a href="{!!url('banhngot/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết"><!--sưa-->
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('/public/uploads/products/'.$row->images)!!}" alt="img responsive">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-mobile">{!!$row->name!!}</small></h1>
                  <li>{!!$row->intro!!}</li>
                  <span class="label label-info">Khuyễn mãi</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!}</li> 
                   
                </div><!-- /div introl -->
                </a>
              <span class="btn label-warning"><strong>{!!$row->price!!}</strong> Đ </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
              </div> <!-- /div bt -->
                
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 -->
          @endforeach
          <!-- danh muc banh ngot -->

        <!--========================== phan danh muc banh man   =========================================  -->
          <div id="laptop"></div>
          
          <!-- danh muc banh man -->
        @foreach($banhman as $row)        <!-- banhman -->
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">
            <div class="thumbnail mobile">              
              <div class="bt">
                <a href="{!!url('banhman/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết"><!-- sua -->
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('/public/uploads/products/'.$row->images)!!}" alt="img responsive">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-mobile">{!!$row->name!!}</small></h1>
                  <li>{!!$row->intro!!}</li>
                  <span class="label label-info">Khuyễn mãi</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!}</li> 
                   
                </div><!-- /div introl -->
                </a>
              <span class="btn label-warning"><strong>{!!$row->price!!}</strong> Đ </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
              </div> <!-- /div bt -->
                
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 -->
          @endforeach
          <!-- danh muc banh man -->
          
<!-- =============== danh muc keo ===================================== -->
        <div id="pc"></div>     

        <!-- danh muc keo -->
        @foreach($keo as $row)        
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding">
            <div class="thumbnail mobile">              
              <div class="bt">
                <a href="{!!url('keo/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết"> <!-- fix pc->keo -->
                <div class="image-m pull-left">
                  <img class="img-responsive" src="{!!url('/public/uploads/products/'.$row->images)!!}" alt="img responsive">
                </div>
                <div class="intro pull-right">
                  <h1><small class="title-mobile">{!!$row->name!!}</small></h1>
                  <li>{!!$row->intro!!}</li>
                  <span class="label label-info">Khuyễn mãi</span>   
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo1!!}</li> 
                  <li><span class="glyphicon glyphicon-hand-right"></span> {!!$row->promo2!!}</li> 
                   
                </div><!-- /div introl -->
                </a>
              <span class="btn label-warning"><strong>{!!$row->price!!}</strong> Đ </span>
                <a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-success pull-right add">Thêm vào giỏ </a>
              </div> <!-- /div bt -->
                
            </div> <!-- / div thumbnail -->
          </div>  <!-- /div col-4 -->
          @endforeach
          <!-- danh muc keo -->

    </div> <!-- /col 12 -->   



@endsection
