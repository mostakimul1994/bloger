<div class="form-group">
    <label for="name">Name</label>
    <input type="text" value="{{ old('name',isset($user)?$user->name:null) }}" name="name" class="form-control" id="name" placeholder="Enter user name" >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" value="{{ old('email',isset($user)?$user->email:null) }}" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" >
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" value="{{ old('phone',isset($user)?$user->phone:null) }}" name="phone" class="form-control" id="phone" placeholder="Enter phone number" >
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>