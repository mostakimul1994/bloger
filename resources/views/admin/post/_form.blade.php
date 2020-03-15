<div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" name="category_id" id="category">
        <option value="">Select Category</option>
        @foreach($categories as $id=>$category)
            <option value="{{ $id }}" @if(old('category_id',isset($post)?$post->category_id:null) == $id) selected @endif>{{ $category }}</option>
        @endforeach
    </select>
    @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="author">Author</label>
    <select class="form-control" name="author_id" id="author">
        <option value="">Select Author</option>
        @foreach($authors as $id=>$author)
            <option value="{{ $id }}" @if(old('author_id',isset($post)?$post->author_id:null) == $id) selected @endif>{{ $author }}</option>
        @endforeach
    </select>
    @error('author_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" value="{{ old('title',isset($post)?$post->title:null) }}" name="title" class="form-control" id="title" placeholder="Enter post title">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="details">Details</label>
    <textarea class="form-control" placeholder="Write details" name="details" id="details" cols="30" rows="10">{{ old('details',isset($post)?$post->details:null) }}</textarea>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="image">Image</label>
    <br>
    <input type="file" name="image">
</div>
<div class="form-group">
    <label for="is_featured">Is Featured ?</label>
    <input id="is_featured" type="checkbox" @if(old('is_featured',isset($post)?$post->is_featured:null) == 1) checked @endif name="is_featured" value="1">
    <label for="is_featured">Yes</label>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <br>
    <input id="published" type="radio" @if(old('status',isset($post)?$post->status:null) == 'Published') checked @endif name="status" value="Published">
    <label for="published">Published</label>
    <input id="unpublished" type="radio" @if(old('status',isset($post)?$post->status:null) == 'Unpublished') checked @endif name="status" value="Unpublished">
    <label for="unpublished">Unpublished</label>
    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>