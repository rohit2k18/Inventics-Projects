
<div class="container">
<h4> Create new Tag</h4>
<form action="{{route('tag.store')}}" method="post">
@csrf()
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
