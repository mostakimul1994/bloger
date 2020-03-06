<div class="form-group">
    <label for="name">Name</label>
    <input type="text" value="{{ old('name',isset($author)?$author->name:null) }}" name="name" class="form-control" id="name" placeholder="Enter Author Name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" value="{{ old('email',isset($author)?$author->email:null) }}" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" >
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" value="{{ old('phone',isset($author)?$author->phone:null) }}" name="phone" class="form-control" id="phone" placeholder="Enter Phone Number" >
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="address">Address</label>
    <textarea name="address" id="address" placeholder="Enter Yours Address" rows="5" class="form-control" >{{ old('address',isset($author)?$author->address:null) }}</textarea>
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>



<div class="form-group">
    <label for="status">Status</label><br>

   
    <input type="radio" @if(old('status',isset($author)?$author->status:null)=='Active') checked @endif  id="active" name="status" value="Active">
     <label for="active">Active</label>

    <input type="radio" @if(old('status',isset($author)?$author->status:null)=='Inactive') checked @endif  id="inactive" name="status" value="Inactive">
    <label for="inactive">Inactive</label>

    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
   
