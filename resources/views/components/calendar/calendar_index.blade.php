@section('content')
<div class="container mt-3">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                  {{ $calendar->getTitle() }}
               </div>
               <div class="card-body">
                  <div class="calendar">
                  <table class="table">
                  <thead>
                  <tr>
                  <th>月</th>
                  <th>火</th>
                  <th>水</th>
                  <th>木</th>
                  <th>金</th>
                  <th>土</th>
                  <th>日</th>
                  </tr>
                  </thead>
                  <tbody>
                  {!! $calendar->render() !!}
                  </tbody>
                  </table>
                  </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
