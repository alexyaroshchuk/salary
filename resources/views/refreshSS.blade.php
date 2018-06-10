@extends('layouts.start')

@section('content') 
<div class="form">
  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="{{route('updateSS')}}">
              <div class="form-group">
                <label for="title">id sttlement sheet</label>
                <input type="text" class="form-control" id="title" name="id_settlement_sheet" placeholder="id_settlement_sheet">
              </div>
              <div class="form-group">
                <label for="title">annual_leave</label>
                <input type="text" class="form-control" id="title" name="annual_leave" placeholder="annual_leave">
              </div>
              <div class="form-group">
                <label for="alias">sick_leave</label>
                <input type="text" class="form-control" id="alias" name="sick_leave" placeholder="sick_leave">
              </div>
              <div class="form-group">
                <label for="alias">awards_fine</label>
                <input type="text" class="form-control" id="alias" name="awards_fine" placeholder="awards_fine">
              </div>
              <div class="form-group">
                <label for="alias">hours</label>
                <input type="text" class="form-control" id="alias" name="hours" placeholder="hours">
              </div>
              <div class="form-group">
                <label for="alias">pay_date</label>
                <input type="text" class="form-control" id="alias" name="pay_date" placeholder="pay_date">
              </div>
              <div class="form-group">
                <label for="alias">id_taxes</label>
                <input type="text" class="form-control" id="alias" name="id_taxes" placeholder="id_taxes">
              </div>
              <button type="submit" class="btn btn-warning">Update</button>
               {{ csrf_field() }}                 
            </form>
      </div>
    </div>
  </div>
</div>
@endsection 