<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" value="{{ old('title',isset($post)?$post->title:null) }}" name="title" class="form-control" id="title" placeholder="Enter post title" >
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="details">Post Details</label>
      <textarea class="form-control" rows="5" id="details" name="details" >{{ old('details',isset($post)?$post->details:null) }}</textarea>
    @error('details')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="images">Upload Image</label><br>
    <input type="file" id="images" name="images">
    @error('images')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="status">Status</label><br>
    <input type="radio" @if(old('status',isset($post)?$post->status:null)=='Published') checked @endif  id="active" name="status" value="Published">
     <label for="active">Published</label>

    <input type="radio" @if(old('status',isset($post)?$post->status:null)=='Unpublished') checked @endif  id="inactive" name="status" value="">
    <label for="inactive">Unpublished</label>

    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
   