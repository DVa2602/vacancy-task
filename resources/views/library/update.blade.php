<x-app-layout>
    <x-slot name="header">
        <h2 class="">
            {{ __('Library') }}
        </h2>
    </x-slot>
    <div class="h1 mt-3">{{ __('Edit') }}</div>
    <div class="mt-5">
        <form method="POST" action="{{route('book.update', $book->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">{{__('table.name')}}</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$book->name)}}">
              @error('name')
                <small id="name" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="descript">{{__('table.description')}}</label>
              <input type="text" class="form-control" id="descript" name="description" value="{{ old('description',$book->description)}}">
              @error('description')
                <small id="description" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
                <label for="page_count">{{__('table.page_count')}}</label>
                <input type="text" class="form-control" id="page_count" name="page_count" value="{{ old('page_count',$book->page_count)}}">
                @error('page_count')
                <small id="page_count" class="form-text text-danger">{{$message}}</small>
              @enderror
              </div>
            <div class="mt-2 mb-2">
                <label for="authors">{{__('table.authors')}}</label>
                <div class="overflow-auto" style="height: 200px; width:300px">
                    @foreach ( $authors as $author)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="authors[]" @if( in_array($author->id, $book->authors->pluck('id')->all()) || in_array($author->id, old('authors',[])) )checked @endIf value="{{$author->id}}" id="{{$author->id}}">
                            <label class="form-check-label" for="{{$author->id}}">{{$author->name}}</label>
                        </div>
                    @endforeach
                </div>
                @error('authors')
                <small id="authors" class="form-text text-danger">{{$message}}</small>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
          </form>
    </div>
</x-app-layout>
