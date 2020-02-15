@csrf
    <div class="form-group">
        <label for="title">News name</label>
    <input type="text" class="col-md-4 form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Categories name" value="{{$news->title}}">
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="category">Categories</label><br>
        <select name="category" id="category"  class="col-md-4 custom-select @error('category') is-invalid @enderror">
            <option >Change categories</option>
            @foreach ($categories as $item)
                <option value="{{$item->id}}" {{$news?($item->id===$news->category_id?'selected':''):''}}>{{ucfirst(trans($item->name))}}</option>
            @endforeach
        </select>
        @error('category')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">News name</label>
    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Categories name">{{$news->content}}
    </textarea>
        @error('content')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="img">News image</label>
    <input type="file" class="col-md-4 custom-form-control @error('img') is-invalid @enderror" name="img" id="img" placeholder="Categories name" value="{{$news->img}}">
        @error('img')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Image</label>

        <img src="/images/{{$news->img}}" alt="" class="thumbnail">
        <a href="#" class="remove-img"> Remove</a>
        <input type="hidden" name="removeImg">
    {{-- <input type="file" class="col-md-4 custom-form-control @error('img') is-invalid @enderror" name="img" id="img" placeholder="Categories name" value="{{$news->img}}"> --}}
        @error('img')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>



    <button type="submit" class="btn btn-success">{{$news->id ? 'Save changes':'Add news'}}</button>
    <a href="/news" class="ml-3 text-success">back</a>
