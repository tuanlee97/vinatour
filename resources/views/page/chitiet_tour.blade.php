@extends('master')
@section('content')



<link href="css/preview.css" rel="stylesheet">
<script src="https://unpkg.com/vue"></script>
  <aside id="colorlib-hero">

      <div class="flexslider">
        <ul class="slides">
          <li style="background-image: url(images/cover-img-3.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                  <div class="slider-text-inner text-center">
                    <h2>VINATOUR</h2>
                    <h1>Chi tiết tour</h1>
                  </div>
                </div>
              </div>
            </div>
          </li>
          </ul>
        </div>
    </aside>

    <div class="colorlib-wrap">
<div class="colorlib-wrap">
      <div class="container">
          @if(session('thongbao'))
                    <script type="text/javascript">
                        jQuery('.alert-danger').html('');
              jQuery('.alert-danger').show();
                           jQuery('.alert-danger').append('Bạn cần đăng nhập để xét duyệt quyền thực hiện chức năng này');
                       $('#loginModal').modal('show');
                    </script>
                        @endif 
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-12">
                <div class="wrap-division">
                  <div class="col-md-12 col-md-offset-0 heading2 animate-box">
                    <h2>{{$tour->tentour}}</h2>
                     <input type="hidden" name="idtour" id="idtour"  value="{{ $tour->id }}">
                 
                  </div>
                  <div class="row">
                    <div class="col-md-12 animate-box">
                      <div class="room-wrap">
                        <div class="row">

                          <?php echo ($tour->noidung); ?>


                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>

          </div>

  

        <!-- SIDEBAR-->
        @if($tour->type==0)
          <div class="col-md-3">
            <div class="sidebar-wrap">
              <div class="side animate-box">
                <div class="row">
                  <div class="col-md-12">
                           <div class="sidebar-wrap">
              <div class="side search-wrap animate-box text-center">
                <h3 class="sidebar-heading">XÁCH BALO VÀ ĐI</h3>
                           <a href="{{route('booking',$tour->id)}}"  class="btn btn-success btn-sm" >Đặt tour ngay</a>
                         <!--  <input type="button" name="submit" id="submit" value="Mua tour" class="btn btn-primary btn-block"> -->
            
              </div>
         
          
            </div>
                    <h3 class="sidebar-heading">Đánh giá tour này</h3>
                    @if($rating==null)

                    <form action="{{ route('posts.post')}}" method="POST" class="colorlib-form-2">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" required="" value="{{ $tour->id }}">
                       <div class="form-check">
                        <input type="radio" class="form-check-input" id="rating"  name="rating" value="5">
                        <label class="form-check-label" for="rating">
                          <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
                        </label>
                       </div>
                       <div class="form-check">
                          <input type="radio" class="form-check-input" id="rating" name="rating" value="4">
                          <label class="form-check-label" for="rating">
                             <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
                          </label>
                       </div>
                       <div class="form-check">
                          <input type="radio" class="form-check-input" id="rating" name="rating" value="3">
                          <label class="form-check-label" for="rating">
                            <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
                         </label>
                       </div>
                       <div class="form-check">
                          <input type="radio" class="form-check-input" id="rating" name="rating" value="2">
                          <label class="form-check-label" for="rating">
                            <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
                         </label>
                       </div>
                       <div class="form-check">
                          <input type="radio" class="form-check-input" id="rating" name="rating" value="1">
                          <label class="form-check-label" for="rating">
                            <p class="rate"><span><i class="icon-star-full"></i></span></p>
                         </label>
                       </div>
                       <button class="btn btn-success">Bình chọn</button>
                    </form>
                    @else
                    <form  class="colorlib-form-2">
                      {{ csrf_field() }}
                      <div class="form-check">
                          <input type="radio" class="form-check-input colorlib-form-2" id="rating" name="rating" value="2" checked="checked" disabled="disabled">
                          <label class="form-check-label" for="rating">
                            Bạn đã đánh giá tour này :<br>
                            <p class="rate"><span>@for($i =1;$i<=$rating->rating;$i++)<i class="icon-star-full"></i>@endfor</span></p>
                         </label>
                       </div>
                       
                      
                    </form>
                    @endif
                    </br>
                  </div>
 
                </div>
              </div>
            
              </div>
            </div>
      
          </div>
          @endif

 <!-- START Bảng tính giá tour-->
 @if($tour->type==1)
          <div class="row animate-box">
             
            <div class="col-sm-12 col-md-12 thumbnail " id="tinhgiatour">
                <table class="table table-bordered">
          <thead>
              <tr>

               <th >Ngày</th>
                <th >Tỉnh</th>
                 <th>Địa điểm</th>
                <th >Nhà hàng</th>
                <th >Khách sạn</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
 <tbody><form id="contactForm1" method="POST" enctype="multipart/form-data"  >
              @csrf
              <input type="hidden" name ="tour_id " value="{{$tour->id}}">
                @for ($i = 1; $i <= $tour->songay ; $i++)


                          <tr>

                <td style="font-weight: bold;">Ngày {{ $i }}</td>


            <td style="font-weight: bold;">
              <div>     @foreach($diemden as $dd)
                   
                         <input type="radio" name="tinh_ngay_{{ $i}}" title="{{$dd->id}}" value="{{$dd->tentinh}}" class="{{$i}}" />{{$dd->tentinh}}<br />
                </span><br>
                      @endforeach



              </div>

              <input type="hidden" name ="diadanh_ngay_{{$i}} " id="diadanh_{{$i}}" class="{{ $i }}">
              <input type="hidden" name ="nhahang_ngay_{{$i}} " id="nhahang_{{$i}}" class="{{ $i }}">
              <input type="hidden" name ="khachsan_ngay_{{$i}} " id="khachsan_{{$i}}" class="{{ $i }}">
            </td>

            <td class="diadanh_{{$i}}" >
                
            </td>

            <td class="nhahang_{{$i}}"   >
              
                  
            
            </td>


            <td class="khachsan_{{$i}}">
                
                
                

            </td>
            <td width="100">
              <span style=" float: right;"  id="tongdukienngay_{{ $i }}"> 0.0 VND</span>
                    <input type="hidden" name ="tongdukienngay_{{ $i }} " id="tongngay_{{ $i }}" class="{{ $i }}">
            </td>


        </tr>


            @endfor




                <tr> <td colspan="6">
        <div class=" alert alert-info" role="alert">
          Tổng dự kiến tour đã chọn: &nbsp;
          <span style=" float: right;" id="tongdukien"> 0.0 VND</span>
          <input type="hidden" name ="tongtien " id="tongtien">
        </div>
         @if(Auth::guard('web')->check())
          <div class=" animate-box text-center">
                      <p><button type="Submit" class="btn btn-primary">Đặt ngay!</button></p>
                    </div>
            @else <div  class="alert alert-warning animate-box text-center" style=" text-align: center;">
      <h4>Để lưu thông tin vừa chọn và nhận kết quả lưu trong hộp thư email bạn cần phải <a id="dangnhapbinhluan"><i class="fa fa-sign-in"></i><b> Đăng nhập</b></a></h4> 
    </div>
    @endif
      </td>

      </tr>
      </form>
    </tbody>
    </table>
  </div>
 

          </div>
          @endif
   <!-- END Bảng tính giá tour-->


  <!-- Comment-->
   
          <div id="app" class="animate-box">
    <h3>Bình luận:</h3>
    <div style="margin-bottom:50px;"  v-if="user"  >
      <textarea  class="form-control" rows="3" name="body" placeholder="Để lại bình luận...." v-model="commentBox"></textarea>
      <button class="btn btn-success" style="margin-top:10px" @click.prevent="postComment">Đăng</button>
    </div>
   
  <div class="alert alert-warning animate-box " style="width: 280px;" v-else>
      <h4><a id="dangnhapbinhluan"><i class="fa fa-sign-in"></i><b> Đăng nhập</b></a> để bình luận </h4> 
    </div>


    <div class="media panel panel-default " style="margin-top:20px;width: 800px;" v-for="comment in comments">
     <div v-if="(comment.id % 2)== 0" style="background: #bce8f1">
      <div class="media-left"style="width: 850px;background: #bce8f1">
                 
          <img class="media-object "   src="images/user.png"  alt="...">
     
      </div>
      <div class="media-body"  style="background: #bce8f1"  >
        <h4 class="media-heading"><b> @{{comment.user.name}} : </b></h4>
        @{{comment.body}}<br>
        <span style="color: #aaa; font-size: 9px"> @{{comment.created_at}}</span>
      </div>
      </div>

         <div v-else>
      <div class="media-left"style="width: 850px;">
        <a href="#">            
          <img class="media-object "  src="images/user.png"  alt="...">
        </a>
      </div>
      <div class="media-body"    >
        <h4 class="media-heading"><b> @{{comment.user.name}} : </b></h4>
        @{{comment.body}}<br>
        <span style="color: #aaa; font-size: 9px"> @{{comment.created_at}}</span>
      </div>
      </div>
    </div>


  </div>

  <!--End Comment -->
</div>


  
        </div>
      </div>
    </div>

            



  </div>

<script type="text/javascript">
  //$(document).ready( function() {
    //$('input[type=date]').val(new Date().toDateInputValue());
   // $('#DateOfArrivalJPN').val('2018-1-2');
//}
//);​
$(document).ready( function()
{
$("#tinhgiatour input[type='radio']").click(function(){
  id=this.title;  
  c=this.className;
  tour=$('#idtour').val();

  /////Địa danh
      $('.diadanh_'+c+'').empty();
         
              var option1 = '';
          
              $.ajax({
                url: 'getDiadanhs/'+id+'/'+tour,
                type: 'GET',
                dataType : 'json',
                success: function(data){

                $.each(data,function(i, item){
              
                  option1 += '<input id="diadiem_'+item.id+'_ngay_'+c+'" type="checkbox" name="diadiem_ngay_'+c+'" value="'+item.tendiadanh+'"title="'+item.gia+'" class="'+c+'"><span data-toggle="tooltip" data-html="true"><a href="ctdiadanh/'+item.id+'" target="_thamquan" title="'+item.gia+' VND">'+item.tendiadanh+'</a> </br>';
                });
          
                 $('.diadanh_'+c+'').append(option1);
                }
              });
    /////Nhà hàng   
      
         $('.nhahang_'+c+'').empty();
              var option2 = '';
          
              $.ajax({
                url: 'getNhahangs/'+id+'/'+tour,
                type: 'GET',
                dataType : 'json',
                success: function(data){
                    
                $.each(data,function(i, item){
              option2 += '<input type="checkbox" name="nhahang_ngay_'+c+'" value="'+item.tennhahang+'"title="'+item.gia+'" class="'+c+'" ><span data-toggle="tooltip" data-html="true"><a href="ctnhahang/'+item.id+'" target="_nhahang" title="'+item.gia+' VND">'+item.tennhahang+'</a> </span></br>';
 
            
                });
            $('.nhahang_'+c+'').append(option2);
                
                }
              });
    /////Khách sạn
    
      $('.khachsan_'+c+'').empty();
         
              var option3 = '';
          
              $.ajax({
                url: 'getKhachsans/'+id+'/'+tour,
                type: 'GET',
                dataType : 'json',
                success: function(data){

                $.each(data,function(i, item){
       
                  option3 += '<input type="checkbox" name="khachsan_ngay_'+c+'" value="'+item.tenkhachsan+'"title="'+item.gia+'" class="'+c+'"><span data-toggle="tooltip" data-html="true"><a href="ctkhachsan/'+item.id+'" target="_khachsan" title="'+item.gia+' VND">'+item.tenkhachsan+'</a> </br>';
                });
          
                 $('.khachsan_'+c+'').append(option3);
                }
              });
                


});





$("#tinhgiatour").on('click',"input[type='checkbox']",function(){
var valuedd=[];
var valuenh=[];
var valueks=[];
c=this.className;




  

  tongngay =0;  
$.each($("#tinhgiatour  input."+c+":checkbox:checked"), function(k, v){
  //alert(v.value); 
if(this.name == "diadiem_ngay_"+c ) valuedd.push(this.value);
if(this.name == "khachsan_ngay_"+c ) valueks.push(this.value);
if(this.name == "nhahang_ngay_"+c ) valuenh.push(this.value);
  tongngay += parseInt(v.title);
});
$("#tinhgiatour #diadanh_"+c).attr('value',valuedd);
$("#tinhgiatour #khachsan_"+c).attr('value',valueks);
$("#tinhgiatour #nhahang_"+c).attr('value',valuenh);
$("#tinhgiatour #tongdukienngay_"+c).html(numberWithCommas(tongngay) +" VND");
$("#tinhgiatour #tongngay_"+c).attr('value',numberWithCommas(tongngay));

//--------------------------------------

  tong =0;
$.each($("#tinhgiatour input[type='checkbox']:checked"), function(k, v){
  //alert(v.value);
  tong += parseInt(v.title);
})

$("#tongdukien").html(numberWithCommas(tong) +" VND");
$("#tongtien").attr('value',numberWithCommas(tong));
});

  $(document).on('click', '#dangnhapbinhluan', function(){
           
                    $('#loginModal').modal('show');
                
                
            });
var frm = $('#contactForm1');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: "{{route('dattour')}}",
            data: frm.serialize(),
            success: function (data) {

                if(data.errors){
                      Swal.fire({     
                            type: 'error',
                text: 'Mỗi trường phải chọn ít nhất 1',
                showConfirmButton: false,
                  timer: 1500
              })
                }
                if(data.success){
                                   Swal.fire({     
                            type: 'success',
                text: 'Đã lưu lại thông tin và gửi tới email của bạn',
                showConfirmButton: false,
                  timer: 3000
              })
                    setTimeout(function(){
                        location.reload();
                                }, 3500);                 
                }
               
            }
        });
    });

});

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

      
</script>
  <script >
    $(function(){
      let id_tour = $('#idtour').val();
      let tours = localStorage.getItem('tours');
      if(tours == null)
      {
        arraytour = new Array();
        arraytour.push(id_tour);
        localStorage.setItem('tours',JSON.stringify(arraytour)); 
      } 
      else{
        tours = $.parseJSON(tours);
        if(tours.indexOf(id_tour) == -1)
        {
          tours.push(id_tour);
          localStorage.setItem('tours',JSON.stringify(tours));
        }
        console.log(tours)
      }
    });
  </script>


  <script>

    const app = new Vue({
      el: '#app',
      data: {
        comments: {},
      commentBox: '',
        post: {!! $tour->toJson() !!},
        user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!}
      },
      mounted() {
        this.getComments();
        this.listen();
      },
      methods: {

        getComments() {
          axios.get('/api/posts/'+this.post.id+'/comments')
                .then((response) => {
                  this.comments = response.data
                })
                .catch(function (error) {
                  console.log(error);
                });
        },
        postComment() {

          axios.post('/api/posts/'+this.post.id+'/comment', {
            api_token: this.user.api_token,
            body: this.commentBox
          })
          .then((response) => {
            this.comments.unshift(response.data);
            this.commentBox = '';
          })
          .catch(function(error){
           console.log(error);
        });

        },
        listen() {
          Echo.channel('post.'+this.post.id)
              .listen('NewComment', (comment) => {
                this.comments.unshift(comment);
              })
        }
      }
    })
</script>
@endsection
